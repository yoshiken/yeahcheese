<?php
/**
 *  Photographer/Login/Do.php
 *  Action ログイン実行処理
 */
class Yeahcheese_Action_PhotographerLoginOut extends Yeahcheese_ActionClass
{
    public function authenticate()
    {
        unset($this->session);
    }

    public function perform()
    {
        return 'photographer_login';
    }
}
