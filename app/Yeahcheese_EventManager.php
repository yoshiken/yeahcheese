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
   * @return mixed 正常時:null、異常時：Ethna_Error
   */
    public function eventsCreate(Array $record): ?\Ethna_Error
    {
        $this->db->AutoExecute(event_info, $record, 'INSERT');
        return null;
    }
    /**
     * 日付チェック
     *
     * @param string $startday
     * @param string $endday
     * @return mixed 正常時:null、異常時：Ethna_Error
     */
    public function compareTime($startday, $endday): ?\Ethna_Error
    {
        $sd = strtotime($startday);
        $ed = strtotime($endday);

        $result = null;
        !($sd > $ed)
        ?: $result = Ethna::raiseNotice('公開開始日より公開終了日の方が早いです', E_DAY_EARLY);

        !($sd == $ed)
        ?: $result = Ethna::raiseNotice('公開開始日と公開終了日が同じです', E_DAY_SAME);
        return $result;
    }
}
