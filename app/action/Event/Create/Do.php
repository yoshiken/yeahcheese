<?php
/**
 *  Event/Create/do.php
 *  Action イベント作成画面から各種バリデーション・エラーチェック
 */
class Yeahcheese_Form_EventCreateDo extends Yeahcheese_ActionForm
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
      'event_photo_tmp_name' => [
        'required'      => true,
        'type'          => VAR_TYPE_STRING,
        'file_size_max' => '5000KB',
        ],

    );
}

class Yeahcheese_Action_EventCreateDo extends Yeahcheese_ActionClass
{
    public function createEventkey()
    {
        $str = array_merge(range('0', '9'), range('A', 'Z'));
        $r_str = null;
        for ($i = 0; $i < 16; $i++) {
            $r_str .= $str[rand(0, count($str) - 1)];
        }
        return $r_str;
    }
    public function prepare()
    {
        $uploaddir = 'uploads/'.$this->createEventkey();
        $uploadfile = $uploaddir . basename($this->af->get('event_photo_tmp_name'));
        move_uploaded_file($_FILES['event_photo']['tmp_name'], $uploadfile);
        return null;
    }


    public function perform()
    {
        if ($this->af->validate() > 0) {
            return 'event_create_view';
        } else {
            return 'event_create_info';
        }
    }
}
