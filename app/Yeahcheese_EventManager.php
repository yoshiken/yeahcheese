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
}
