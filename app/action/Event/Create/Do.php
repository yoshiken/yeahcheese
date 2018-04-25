<?php
/**
 *  Event/Create/do.php
 *  Action イベント作成画面から各種バリデーション・エラーチェック
 */
class Yeahcheese_Form_EventCreateDo extends Yeahcheese_ActionForm
{
    public $form = [
           'event_name' => [
               'name'           => 'イベント名',
               'required'       => true,
               'type'           => VAR_TYPE_STRING,
           ],
           'event_start_day' => [
               'name'           => '公開開始日',
               'required'       => true,
               'type'           => VAR_TYPE_DATETIME,
           ],
           'event_end_day' => [
               'name'           => '公開終了日',
               'required'       => true,
               'type'           => VAR_TYPE_DATETIME,
           ],
           'photo_tmp_path' => [
               'name'           => 'tmppath',
               'required'       => true,
               'type'           => [VAR_TYPE_STRING],
           ],
    ];
}

class Yeahcheese_Action_EventCreateDo extends Yeahcheese_ActionClass
{
   /**
     * イベントキー(認証キー)作成
     *
     * @return string r_str
     */
    public function createEventkey()
    {
        $dk = true;
        $ev = $this->backend->getManager('event');
        while ($dk) {
            $str = array_merge(range('0', '9'), range('A', 'Z'));
            $r_str = null;
            for ($i = 0; $i < 16; $i++) {
                $r_str .= $str[rand(0, count($str) - 1)];
            }
            $dk = $ev->duplicationKey($r_str);
        }
        return $r_str;
    }
    public function prepare()
    {
        $eventkey = $this->createEventkey();

        //eventごとのDirectory作成
        $uploaddir = 'uploads/' . $eventkey . '/';
        mkdir($uploaddir, 755);

        //SQL発行
        $record = [
            'event_name'        =>  $this->af->get('event_name'),
            'event_key'         =>  $eventkey,
            'event_start_day'   =>  $this->af->get('event_start_day'),
            'event_end_day'     =>  $this->af->get('event_end_day'),
            'photographer_id'   =>  $this->session->get('userid')[id],
        ];
        $ev = $this->backend->getManager('event');
        $insertevent = $ev->eventsCreate($record);
        if (Ethna::isError($insertevent)) {
            $this->ae->addObject('dberror', $insertevent);
            return 'event_create';
        }

        //uploads/tmpファイルからeventごとのフォルダに移動
        for ($i=0; $i < count($this->af->get('photo_tmp_path')); $i++) {
            rename($this->af->get('photo_tmp_path')[$i], $uploaddir . basename($this->af->get('photo_tmp_path')[$i]));
        }

        return null;
    }

    public function perform()
    {
        if ($this->af->validate() > 0) {
            return 'event_create';
        }
        return 'event_create_do';

    }
}
