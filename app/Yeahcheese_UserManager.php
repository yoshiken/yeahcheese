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
        return ($this->db->getRow($sql, [$mailaddress, $password]))
        ? null : Ethna::raiseNotice('メールアドレスまたはパスワードが違います', E_LOGIN_USER);
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
        return ($this->db->getRow($sql, $mailaddress))
        ? null : Ethna::raiseNotice('このメールアドレスは既に登録されています', E_MAILADDRESS_REGISTERED);
    }
    /**
     * ログインチェック
     *
     * @param string $mailaddress
     * @param string $password
     * @return mixed 正常時:null、異常時：Ethna_Error
     */
    public function doLogin(string $mailaddress, string $password): ?\Ethna_Error
    {
        $sql = "
            SELECT *
              FROM photographer_info
             WHERE photographer_mailaddress = ?
               AND photographer_pw = ?
        ";
        return($this->db->getRow($sql, [$mailaddress, $password]))
        ? Ethna::raiseNotice('メールアドレスまたはパスワードが違います', E_LOGIN_USER) :
        null ;
    }
    /**
     * メールアドレスからID取得
     *
     * @param string $mailaddress
     * @return array = array('id' => integer )
     */
    public function loadID(string $mailaddress): array
    {
        $sql = "
            SELECT photographer_id
              FROM photographer_info
             WHERE photographer_mailaddress = ?
        ";
        return $this->db->getRow($sql, $mailaddress);
    }
}
