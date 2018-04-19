<?php
/**
 *  Photographer/Login/Do.php
 *  Action ログイン実行処理
 */
class Yeahcheese_Action_PhotographerLoginOut extends Yeahcheese_ActionClass
{
    public function perform()
    {
        $this->session->destroy();
        return 'photographer_login';
    }
}
