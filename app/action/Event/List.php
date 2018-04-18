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
        $hasevent = $ev->hasEvents((int)$this->session->get('userid')[id]);
        if (Ethna::isError($hasevent)) {
            $this->ae->addObject('hasnotevent', $hasevent);
            return 'event_list';
        }
        return null ;
    }

    public function perform()
    {
        return 'event_list';
    }
}
