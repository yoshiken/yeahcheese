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
        return ($password === $password_confirm)
        ? null
        : Ethna::raiseNotice('パスワードが一致しません', E_PASSWORD_COMPARISON);
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
        ? Ethna::raiseNotice('このメールアドレスは既に登録されています', E_MAILADDRESS_REGISTERED)
        : null ;
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
        ? null
        : Ethna::raiseNotice('メールアドレスまたはパスワードが違います', E_LOGIN_USER) ;
    }
    /**
     * メールアドレスからID取得
     *
     * @param string $mailaddress
     * @return mixed 正常値:string 異常時:null
     */
    public function loadId(string $mailaddress): ?string
    {
        $sql = "
            SELECT photographer_id
              FROM photographer_info
             WHERE photographer_mailaddress = ?
        ";
        return $this->db->getOne($sql, $mailaddress);
    }
    /**
     * IDからメールアドレスを取得
     *
     * @param string $id
     * @return mixed 正常値:string 異常時:null
     */
    public function loadMailaddress(string $id): ?string
    {
        $sql = "
            SELECT photographer_mailaddress
              FROM photographer_info
             WHERE photographer_id = ?
        ";
        return $this->db->getOne($sql, $id);
    }

}
