<?php
/**
 *  Event/Create.php
 *  Action イベント画面表示
 */
class Yeahcheese_Form_EventCreate extends Yeahcheese_ActionForm
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
           'event_photo' => [
               'type'           => [VAR_TYPE_FILE],
               'form_type'      => FORM_TYPE_FILE,
               'name'           => '写真',
               'required'       => true,
           ],
    ];
}

class Yeahcheese_Action_EventCreate extends Yeahcheese_ActionClass
{
    public function perform()
    {
        return 'event_create';
    }
}
