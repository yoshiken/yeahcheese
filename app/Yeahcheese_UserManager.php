<?php
class Yeahcheese_UserManager extends Ethna_AppManager
{
    public function comparisonPassword($password, $password_confirm)
    {
        if ($password !== $password_confirm) {
            return Ethna::raiseNotice('パスワードが一致しません', E_PASSWORD_COMPARISON);
        }
        return null;
    }

    public function isRegisteredMailaddress($mailaddress)
    {
        $db = $this->backend->getDB();
        $dbresult = $db->query("SELECT * FROM photographer_info WHERE photographer_mailaddress = $1", $mailaddress);
        if ($dbresult->fetchRow()) {
            return Ethna::raiseNotice('このメールアドレスは既に登録されています', E_MAILADDRESS_REGISTERED);
        }
        return null;
    }
}
