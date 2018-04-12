<?php

class Yeahcheese_Form_EventCreateDo extends Yeahcheese_ActionForm
{
    public $form = array(
    );
}

class Yeahcheese_Action_EventCreateDo extends Yeahcheese_ActionClass
{
    public function prepare()
    {
        return null;
    }
    public function perform()
    {
        return 'event_view';
    }
}
