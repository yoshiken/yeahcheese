<?php
/**
 *  Event/Create/do.php
 *  Action イベント作成画面から各種バリデーション・エラーチェック
 */
class Yeahcheese_Form_EventEditDo extends Yeahcheese_ActionForm
{
    public $form = array(
    'event_id' => [
        'name'          => 'イベントID',
        'required'      => true,
        'type'          => VAR_TYPE_STRING,
        ],
    'event_key' => [
        'name'          => '認証キー',
        'required'      => true,
        'type'          => VAR_TYPE_STRING,
        ],
    'event_name' => [
        'name'          => 'イベント名',
        'required'      => true,
        'type'          => VAR_TYPE_STRING,
        ],
    'event_start_day' => [
        'name'          => '公開開始日',
        'required'      => true,
        'type'          => VAR_TYPE_DATETIME,
        ],
    'event_end_day' => [
        'name'          => '公開終了日',
        'required'      => true,
        'type'          => VAR_TYPE_DATETIME,
        ],
    'event_photo_tmp' => [
        'name'          => 'イベント写真',
        'type'          => array(VAR_TYPE_STRING),
        ],
    'event_photo_url' => [
        'name'          => 'イベント写真',
        'type'          => array(VAR_TYPE_STRING),
        ],
    );
}

class Yeahcheese_Action_EventEditDo extends Yeahcheese_ActionClass
{
    public function prepare()
    {
        $record['event_id'] = $this->af->get('event_id');
        $record['event_name'] = $this->af->get('event_name');
        $record['event_key'] = $this->af->get('event_key');
        $record['event_start_day'] = $this->af->get('event_start_day');
        $record['event_end_day'] = $this->af->get('event_end_day');
        $record['photographer_id'] = $this->session->get('userid')[id];

        $ev = $this->backend->getManager('event');
        $updateevent = $ev->updateEvent($record);
        if (Ethna::isError($updateevent)) {
            $this->ae->addObject('dberror', $updateevent);
            return 'event_edit';
        }

        return null;
    }

    public function perform()
    {
        if ($this->af->validate() > 0) {
            return 'event_edit';
        } else {
            return 'event_edit_success';
        }
    }
}