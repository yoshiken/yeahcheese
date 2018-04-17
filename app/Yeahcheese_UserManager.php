<?php
/**
 *  Yeahcheese_UserManager
 *
 *  ユーザー情報に関する処理
 *
 */
class Yeahcheese_UserManager extends Ethna_AppManager
{
  /**
   * パスワード比較処理
   *
   * @param string $password
   * @param string $password_confirm
   * @return mixed 正常時:null、異常時：Ethna_Error
   */
    public function comparisonPassword(string $password, string $password_confirm): ?\Ethna_Error
    {
        if ($password !== $password_confirm) {
            return Ethna::raiseNotice('パスワードが一致しません', E_PASSWORD_COMPARISON);
        }
        return null;
    }
    /**
     * 既存のメールアドレスを検索
     *
     * @param string $mailaddress
     * @return mixed 正常時:null、異常時：Ethna_Error
     */
    public function isRegisteredMailaddress(string $mailaddress): ?\Ethna_Error
    {
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
