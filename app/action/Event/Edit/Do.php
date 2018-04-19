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
    'event_photo_url' => [
        'name'          => 'イベント写真',
        'required'      => true,
        'type'          => array(VAR_TYPE_STRING),
        ],
    );
}

class Yeahcheese_Action_EventEditDo extends Yeahcheese_ActionClass
{
    public function prepare()
    {
        return null;
    }

    public function perform()
    {
        if ($this->af->validate() > 0) {
            return 'event_create';
        } else {
            return 'event_info';
        }
    }
}
