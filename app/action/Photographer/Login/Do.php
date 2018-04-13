<?php
/**
 *  Photographer/Login/Do.php
 *  Action ログイン実行処理
 */
class Yeahcheese_Form_PhotographerLoginDo extends Yeahcheese_ActionForm
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
}
class Yeahcheese_Action_PhotographerLoginDo extends Yeahcheese_ActionClass
{
    public function prepare()
    {
        if ($this->af->validate() > 0) {
            return 'photographer_login';
        }
        $db = $this->backend->getDB();
        $cu = new Yeahcheese_UserManager();
        $userlogin = $cu->doLogin($this->af->get('mailaddress'), hash('sha256', $this->af->get('password')), $db);
        if (Ethna::isError($userlogin)) {
            $this->ae->addObject('login_error', $userlogin);
            return 'photographer_login';
        }
        return null;
    }
    public function perform()
    {
        $cu = new Yeahcheese_UserManager();
        $db = $this->backend->getDB();
        $userid = $cu->getID($this->af->get('mailaddress'), $db);
        $this->session->start();
        $sessionUserId = [
            'id' =>  $userid["photographer_id"]
        ];
        $this->session->set('userid', $sessionUserId);
        return 'photographer_home';
    }
}
