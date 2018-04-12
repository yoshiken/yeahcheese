<?php
class Yeahcheese_Form_CreatPhotographerDo extends Yeahcheese_ActionForm
{
    public $form = [
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
        'password_confirm' => [
            'name'          => 'パスワード確認用',
            'required'      => true,
            'type'          => VAR_TYPE_STRING,
        ],
    ];
}

class Yeahcheese_Action_CreatPhotographerDo extends Yeahcheese_ActionClass
{
    public function perform()
    {
        if ($this->af->validate() > 0 || $this->af->get('password') !== $this->af->get('password_confirm')) {
              return 'creat_photographer';
        } else {
              return 'creat_photographer_success';
        }
    }
}
