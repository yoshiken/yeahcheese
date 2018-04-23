<?php
/**
 *  Event/List.php
 *  Action イベント一覧表示
 */
class Yeahcheese_Action_EventList extends Yeahcheese_ActionClass
{
    public function prepare()
    {
        $ev = $this->backend->getManager('event');

        $hasevent = $ev->hasEvents($this->session->get('userid')['id']);
        if (Ethna::isError($hasevent)) {
            $this->ae->addObject('hasnotevent', $hasevent);
            return 'event_list';
        }
        foreach ($hasevent as $key => $value) {
            $eventinfo[$key] = $ev->fetchEvent($value)[0];
        }
            $this->af->setApp('eventinfo', $eventinfo);
        return null ;
    }

    public function perform()
    {
        return 'event_list';
    }
}
