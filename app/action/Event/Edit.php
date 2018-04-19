<?php
/**
 *  Event/Edit.php
 *  Action イベント編集画面
 */
class Yeahcheese_Form_EventEdit extends Yeahcheese_ActionForm
{
    public $form = array(
      'event_id' => [
        'name'          => 'イベントID',
        'required'      => true,
        'type'          => VAR_TYPE_STRING,
        ],
      'event_key' => [
        'name'          => '認証キー',
        'required'      => true,
        'type'          => VAR_TYPE_STRING,
        ],
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
        ],
     );
}

class Yeahcheese_Action_EventEdit extends Yeahcheese_ActionClass
{
    public function perform()
    {
        foreach (glob('uploads/'.$this->af->get('event_key').'/*') as $file) {
            if (is_file($file)) {
                $eventphoto[] = $file;
            }
        }
        $this->af->setApp('event_photo', $eventphoto);
        $this->af->validate();
        return 'event_edit';
    }
}
