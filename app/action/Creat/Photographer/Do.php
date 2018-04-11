<?php
  class Yeahcheese_Action_CreatPhotographerDo extends Yeahcheese_ActionClass
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

      public function perform()
      {
          if ($this->af->validate() > 0) {
              return 'creat_photographer';
          } else {
              return 'creat_photographer_success';
          }
      }
  }
