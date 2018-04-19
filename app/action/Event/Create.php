<?php
/**
 *  Event/Create.php
 *  Action イベント画面表示
 */
class Yeahcheese_Action_EventCreate extends Yeahcheese_ActionClass
{
    public function perform()
    {
        $this->af->validate();
        return 'event_create';
    }
}
