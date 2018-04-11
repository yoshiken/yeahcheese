<?php

class Yeahcheese_Form_PhotographerLoginDo extends Yeahcheese_ActionForm
{
    public $form = array(
    'mailaddress' => [
      'name'          => 'メールアドレス',
      'required'      => true,
      'custom' => 'checkMailaddress',
      'type'          => VAR_TYPE_STRING,
      ],
    'password' => [
      'name'          => 'パスワード',
      'required'      => true,
      'type'          => VAR_TYPE_STRING,
      ],
    );
}
class Yeahcheese_Action_PhotographerLoginDo extends Yeahcheese_ActionClass
{
    public function prepare()
    {
        if ($this->af->validate() > 0) {
            return 'photographer_home';
        }
    }
    public function perform()
    {
    }
}
