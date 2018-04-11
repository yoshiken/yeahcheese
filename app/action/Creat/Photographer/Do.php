<?php
class Yeahcheese_Form_CreatPhotographerDo extends Yeahcheese_ActionForm
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

class Yeahcheese_Action_CreatPhotographerDo extends Yeahcheese_ActionClass
{
    public function perform()
    {
        if ($this->af->validate() > 0) {
              return 'creat_photographer';
        } else {
              return 'creat_photographer_success';
        }
    }
}
