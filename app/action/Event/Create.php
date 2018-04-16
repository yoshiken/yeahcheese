<?php
/**
 *  Event/Create.php
 *  Action イベント画面表示
 */
class Yeahcheese_Form_EventCreate extends Yeahcheese_ActionForm
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
     'event_photo' => [
       'name'          => '写真',
       'required'      => true,
       'type'          => VAR_TYPE_FILE,
       'file_size_max' => '5000KB',
       'file_name' => '/.*.jp.*g/',
       ],
    );
}

class Yeahcheese_Action_EventCreate extends Yeahcheese_ActionClass
{
    public function perform()
    {
        $this->af->validate();
        return 'event_create';
    }
}
