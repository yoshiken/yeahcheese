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
        $sql = "
            SELECT *
              FROM photographer_info
             WHERE photographer_mailaddress = ?
        ";
        if ($this->db->getRow($sql, $mailaddress)) {
            return Ethna::raiseNotice('このメールアドレスは既に登録されています', E_MAILADDRESS_REGISTERED);
        }
        return null;
    }
}
