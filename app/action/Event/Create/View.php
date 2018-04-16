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
      'event_photo' => [
        'name'          => '写真',
        'required'      => true,
        'type'          => VAR_TYPE_FILE,
        'file_size_max' => '5000KB',
        ],
    );
}

class Yeahcheese_Action_EventCreateView extends Yeahcheese_ActionClass
{
    public function perform()
    {
        if ($this->af->validate() > 0) {
            return 'event_create';
        } else {
            $uploaddir = './uploads/';
            $uploadfile = $uploaddir . basename($_FILES['event_photo']['name']);
            move_uploaded_file($_FILES['event_photo']['tmp_name'], $uploadfile);
            $this->af->setApp('photo_name', $this->af->get('event_photo')['name']);
            $this->af->setApp('photo_date', $uploadfile);
            return 'event_create_view';
        }
    }
}
