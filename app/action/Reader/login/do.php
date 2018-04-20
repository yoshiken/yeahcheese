<?php
/**
 *  Reader/Login/Do.php
 *  Action 認証キーの認証
 *         イベント情報取得
 */
class Yeahcheese_Form_ReaderLoginDo extends Yeahcheese_ActionForm
{

    public $form = [
    'event_key' => [
      'name'          => '認証キー',
      'required'      => true,
      'type'          => VAR_TYPE_STRING,
      ],
    ];
}

class Yeahcheese_Action_ReaderLoginDo extends Yeahcheese_ActionClass
{
    public function prepare()
    {
        if ($this->af->validate() > 0) {
            return 'reader_home';
        }
        $ev = $this->backend->getManager('event');

        $eventdata = $ev->loadEventData($this->af->get('event_key'));
        if (Ethna::isError($eventdata)) {
            $this->ae->addObject('event_key_error', $eventdata);
            return 'reader_home';
        }

        $Viewingrights = $ev->isViewingPeriod($eventdata['event_start_day'], $eventdata['event_end_day']);
        if (Ethna::isError($Viewingrights)) {
            $this->ae->addObject('event_key_error', $Viewingrights);
            return 'reader_home';
        }
        $this->af->setApp('eventdate', $eventdata);

        foreach (glob('uploads/'.$this->af->get('event_key').'/*') as $file) {
            if (is_file($file)) {
                $eventphoto[] = $file;
            }
        }
        $this->af->setApp('event_photo', $eventphoto);

        return null;
    }

    public function perform()
    {
        return 'reader_event_view';
    }
}
