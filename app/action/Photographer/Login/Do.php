<?php
/**
 *  Photographer/Login/Do.php
 *  Action ログイン実行処理
 */
class Yeahcheese_Form_PhotographerLoginDo extends Yeahcheese_ActionForm
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
    ];
}

class Yeahcheese_Action_PhotographerLoginDo extends Yeahcheese_ActionClass
{
    public function prepare()
    {
        if ($this->af->validate() > 0) {
            return 'photographer_login';
        }

        $cu = $this->backend->getManager('user');
        $userlogin = $cu->doLogin($this->af->get('mailaddress'), hash('sha256', $this->af->get('password')));

        if (Ethna::isError($userlogin)) {
            $this->ae->addObject('login_error', $userlogin);
            return 'photographer_login';
        }
        $this->session->start();
        $sessionUserId = [
            'id' =>  $cu->loadId($this->af->get('mailaddress'))
        ];
        $this->session->set('userid', $sessionUserId);

        return null;
    }

    public function perform()
    {
        return 'photographer_home';
    }
}
