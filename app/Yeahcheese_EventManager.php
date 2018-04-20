<?php
/**
 *  Yeahcheese_EventManager
 *
 *  イベントに関する処理
 *
 */
class Yeahcheese_EventManager extends Ethna_AppManager
{
  /**
   * イベント作成
   *
   * @param array $record
   * @return null
   */
    public function eventsCreate(array $record)
    {
        $this->db->AutoExecute(event_info, $record, 'INSERT');
    }
    /**
     * 日付チェック
     *
     * @param string $startday
     * @param string $endday
     * @return mixed 正常時:null、異常時：Ethna_Error
     */
    public function compareTime(string $startday, string $endday): ?\Ethna_Error
    {
        $sd = strtotime($startday);
        $ed = strtotime($endday);

        $result = null;
        ! ($sd > $ed)
        ?: $result = Ethna::raiseNotice('公開開始日より公開終了日の方が早いです', E_DAY_EARLY);

        ! ($sd === $ed)
        ?: $result = Ethna::raiseNotice('公開開始日と公開終了日が同じです', E_DAY_SAME);
        return $result;
     * 写真家(ユーザー)がイベントを担当しているか
     * 担当しているならイベントIDを返す
     *
     * @param integer $photographer_id
     * @return mixed 正常時:null、異常時：Ethna_Error
     */
    public function hasEvents(int $photographer_id)
    {
        $sql = "
            SELECT *
              FROM event_info
             WHERE photographer_id  =
        ";
         $dbresult = $this->db->getCol($sql.$photographer_id);
        return ($dbresult)
        ? $dbresult :
        Ethna::raiseNotice('現在イベントが作成されていません', E_EVENT_DONTHAVE) ;
    }
    /**
    * 日付取得
    *
    * @param string $startday
    * @param string $endday
    * @return $array = ('start' => string ,'end' => staring);
    */
    public function isViewingperiod(string $startday, string $endday): ?\Ethna_Error
    {
        $today = time();
        $day = ['start' => strtotime($startday)];
        $day += ['end' => strtotime($endday)];

        $result = null;
        $today<=$dat['start']
        ?: $result = Ethna::raiseNotice('公開開始日前です', E_DAY_START);
        $today>$dat['end']
        ?: $result = Ethna::raiseNotice('公開終了日を過ぎています', E_DAY_END);

        return $result;
    }
}
