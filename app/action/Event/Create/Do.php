<?php
/**
 *  Event/Create/do.php
 *  Action イベント作成画面から各種バリデーション・エラーチェックをして
 *  プレビュー画面に遷移する
 */
class Yeahcheese_Form_EventCreateDo extends Yeahcheese_ActionForm
{
    public $form = array(
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
      'event_photo' => [
        'name'          => '写真',
        'required'      => true,
        'type'          => VAR_TYPE_FILE,
        'file_size_max' => '5000KB',
        'file_name' => '/.*.jp.*g/',
        ],
    );
}

class Yeahcheese_Action_EventCreateDo extends Yeahcheese_ActionClass
{
    public function perform()
    {
        if ($this->af->validate() > 0) {
            return 'event_create';
        } else {
            return 'event_info';
        }
    }
}
