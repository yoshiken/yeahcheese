<?php
/**
 *  Event/Info.php
 *  Action イベントページ表示
 */
class Yeahcheese_Form_EventInfo extends Yeahcheese_ActionForm
{
    public $form = [
           'event_id' => [
               'name'           => 'イベントID',
               'required'       => true,
               'type'           => VAR_TYPE_STRING,
           ],
           'event_key' => [
               'name'           => '認証キー',
               'required'       => true,
               'type'           => VAR_TYPE_STRING,
           ],
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
    ];
}

class Yeahcheese_Action_EventInfo extends Yeahcheese_ActionClass
{
    public function prepare()
    {
        $eventdata = ($this->af->form_vars);
        $this->af->setApp('eventdata', $eventdata);
        foreach (glob('uploads/' . $eventdata['event_key'] . '/*') as $file) {
            if (is_file($file)) {
                $eventphoto[] = $file;
            }
        }
        $this->af->setApp('event_photo', $eventphoto);
        return null;
    }

    public function perform()
    {
        return 'event_info';
    }
}
