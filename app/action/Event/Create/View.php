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
    );
}

class Yeahcheese_Action_EventCreateView extends Yeahcheese_ActionClass
{
    public function perform()
    {
        if ($this->af->validate() > 0) {
            return 'event_create';
        } else {
            $uploadphoto= [];
            for ($i=0; $i < count($_FILES['event_photo']['name']); $i++) {
                $tmpuploaddir = 'uploads/tmp/';
                $eventphototmpname = $_FILES['event_photo']['tmp_name'][$i];
                $eventnamehash = hash_file("sha1", $eventphototmpname).'jpg';
                $tmpuploaddir = $tmpuploaddir. $eventnamehash;
                move_uploaded_file($_FILES['event_photo']['tmp_name'][$i], $tmpuploaddir);
                $uploadphoto[$i]['photoname'] = $_FILES['event_photo']['name'][$i];
                $uploadphoto[$i]['phototmppath'] = $tmpuploaddir;
            }
            $this->af->setApp('uploadphoto', $uploadphoto);
            return 'event_create_view';
        }
    }
}
