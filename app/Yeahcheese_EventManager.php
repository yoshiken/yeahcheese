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
    }
    /* 写真家(ユーザー)がイベントを担当しているか
     * 担当しているならイベントIDを返す
     *
     * @param string $photographer_id
     * @return mixed 正常時:array、異常時：Ethna_Error
     */
    public function hasEvents(string $photographer_id)
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
     * イベント情報を取得
     *
     * @param string $event_id
     * @return mixed 正常時:array、異常時：Ethna_Error
     */
    public function fetchEvent(string $event_id)
    {
        $sql = "
            SELECT *
              FROM event_info
             WHERE event_id =
        ";
        return $this->db->getAll($sql.$event_id)[0];
    }
    /**
     * イベント更新
     *
     * @param array $record
     * @return mixed 正常時:null、異常時：Ethna_Error
     */
    public function updateEvent(array $record): ?\Ethna_Error
    {
        $this->db->AutoExecute(event_info, $record, 'UPDATE', 'event_id = '.$record['event_id']);
        return null;
    /*
     * 認証キーを元にイベントを取得
     *
     * @param string $eventkey
     * @return mixed 正常時:null、異常時：Ethna_Error
     */
    public function loadEventPutKey(string $eventkey): ?\Ethna_Error
    {
        $sql = "
            SELECT *
              FROM event_info
             WHERE event_key = ?
        ";
        return ($this->db->getRow($sql, $eventkey))
        ? null:
        Ethna::raiseNotice('イベントが存在していません', E_EVENT_NOTFOUND);
    }
}
