<?php
/**
 *  Reader/Login/Do.php
 *  Action 認証キーの認証
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
        $rl = $this->backend->getManager('event');
        $eventdata = $rl->loadEventData($this->af->get('event_key'));
        if (Ethna::isError($eventdata)) {
            $this->ae->addObject('event_key_error', $eventdata);
            return 'reader_home';
        }
        $this->af->setApp('eventdate'$eventdata)
        $Viewingrights = $ev->isViewingPeriod($this->af->get('event_start_day'), $this->af->get('event_end_day'));
        if (Ethna::isError($Viewingrights)) {
            $this->ae->addObject(null, $Viewingrights);
            return 'reader_home';
        }
        return null;
    }

    public function perform()
    {
        return 'reader_event_view';
    }
}
