<?php
class Yeahcheese_Action_CreatPhotographerDo extends Yeahcheese_ActionClass
{
    public $form = array(
    'mailaddress' => [
      'name'          => 'メールアドレス',
      'required'      => true,
      'custom'        => 'checkMailaddress',
      'type'          => VAR_TYPE_STRING,
      ],
    'password' => [
      'name'          => 'パスワード',
      'required'      => true,
      'type'          => VAR_TYPE_STRING,
      ],
    );

    public function prepare()
    {
        $passowrd_compare = $this->af->get('password') == $this->af->get('password_confirm') ? true : false;
        if ($this->af->validate() > 0 && $passowrd_compare) {
              return 'creat_photographer';
        } else {
              return 'creat_photographer_success';
        }
    }
}
