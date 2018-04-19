<?php
/**
 *  Event/Create/View.php
 *  Action イベント画面のプレビュー画面
 */
class Yeahcheese_Form_EventCreateView extends Yeahcheese_ActionForm
{
    public $form = array(
      'event_name' => [
        'name'          => 'イベント名',
        'required'      => true,
        'type'          => VAR_TYPE_STRING,
        ],
      'event_start_day' => [
        'name'          => '公開開始日',
        'required'      => true,
        'type'          => VAR_TYPE_DATETIME,
        ],
      'event_end_day' => [
        'name'          => '公開終了日',
        'required'      => true,
        'type'          => VAR_TYPE_DATETIME,
        ],
      'event_photo'      => [
        'type'       => [VAR_TYPE_FILE],
        'form_type'  => FORM_TYPE_FILE,
        'name'       => '写真',
        'required'   => true,
        ],
    );
}

class Yeahcheese_Action_EventCreateView extends Yeahcheese_ActionClass
{
    public function prepare()
    {
        if ($this->af->validate() > 0) {
            return 'event_create';
        } else {
            //日付チェック
            $ev = $this->backend->getManager('event');
            $comparetime = $ev->compareTime($this->af->get('event_start_day'), $this->af->get('event_end_day'));
            if (Ethna::isError($comparetime)) {
                $code = $comparetime->getCode();
                if ($code == 303) {
                    $this->ae->addObject('event_end_day', $comparetime);
                    return 'event_create';
                }
                elseif ($code == 304) {
                    $this->ae->addObject('event_start_day', $comparetime);
                    $this->ae->addObject('event_end_day', $comparetime);
                    return 'event_create';
                }
            }

            //ファイルサイズチェック
            for ($i=0; $i < count($_FILES['event_photo']['size']); $i++) {
                if ($_FILES['event_photo']['size'][$i] > 5242880) {
                    return 'event_create';
                }
            }


            //www/uploads/tmpに一旦入れて作業完了はeventkeyごとのフォルダーに
            //そうでない場合は破棄
            $uploadphoto= [];
            for ($i=0; $i < count($_FILES['event_photo']['name']); $i++) {
                $tmpuploaddir = 'uploads/tmp/';
                $eventphototmpname = $_FILES['event_photo']['tmp_name'][$i];
                //画像ファイル名は重複する恐れがあるので画像自体をハッシュ化してrenameする
                $eventnamehash = hash_file("sha1", $eventphototmpname).'.jpg';
                $tmpuploaddir = $tmpuploaddir. $eventnamehash;

                //phpのtmpファイルからwww/tmp/以下に移動
                //doアクションクラスに移動する前にphpのプロセスが終了と同時にtmpが消えてしまうため
                move_uploaded_file($_FILES['event_photo']['tmp_name'][$i], $tmpuploaddir);

                //表示用変数代入
                $uploadphoto[$i]['photoname'] = $_FILES['event_photo']['name'][$i];
                $uploadphoto[$i]['phototmppath'] = $tmpuploaddir;
            }
            $this->af->setApp('uploadphoto', $uploadphoto);
            return null;
        }
    }


    public function perform()
    {
            return 'event_create_view';
    }
}
