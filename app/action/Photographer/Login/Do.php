<?php

class Yeahcheese_Form_PhotographerLoginDo extends Yeahcheese_ActionForm
{
    public $form = array(
    );
}
class Yeahcheese_Action_PhotographerLoginDo extends Yeahcheese_ActionClass
{
    public function prepare()
    {
        return null;
    }
    public function perform()
    {
        return 'photographer_home';
    }
}
