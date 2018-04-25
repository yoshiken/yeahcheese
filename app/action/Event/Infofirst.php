<?php
/**
 *  Event/Info.php
 *  Action イベントページ表示
 */
class Yeahcheese_Action_EventInfofirst extends Yeahcheese_ActionClass
{
    public function prepare()
    {
        if (isset($_GET['event_id'])) {
            $event_id = $_GET['event_id'];
        }
        $ev = $this->backend->getManager('event');
            $eventdata = $ev->fetchEvent($event_id);
        $this->af->setApp('eventdata', $eventdata);
        foreach (glob('uploads/'.$eventdata['event_key'].'/*') as $file) {
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
