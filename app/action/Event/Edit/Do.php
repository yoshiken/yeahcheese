<?php
/**
 *  Event/do.php
 *  Action イベント作成画面から各種バリデーション・エラーチェック
 */
class Yeahcheese_Form_EventEditDo extends Yeahcheese_ActionForm
{
    public $form = [
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
    'event_photo' => [
        'type'          => [VAR_TYPE_FILE],
        'name'          => '写真',
        'required'      => true,
        ],
    ];
}

class Yeahcheese_Action_EventEditDo extends Yeahcheese_ActionClass
{
    public function prepare()
    {
        if ($this->af->validate() > 0) {
            return 'event_edit';
        }

        $record = $this->af->getArray();
        $record['photographer_id']   = $this->session->get('userid')['id'];
        unset($record['event_photo']);

        $ev = $this->backend->getManager('event');
        $updateevent = $ev->updateEvent($record);
        if (Ethna::isError($updateevent)) {
            $this->ae->addObject('dberror', $updateevent);
            return 'event_edit';
        }

        //イベント写真をtmpからuploads/$event_key以下に移動
        foreach ($this->af->get('event_photo') as $key => $item) {
            //画像ファイル名は重複する恐れがあるので画像自体をハッシュ化してrenameする
            $uploaddir = 'uploads/' . $this->af->get('event_key') . '/' . $uploaddir . hash_file("sha1", $item['tmp_name']).'.jpg';
            move_uploaded_file($item['tmp_name'], $uploaddir);
        }
        return null;
    }

    public function perform()
    {
        return 'event_edit_success';
    }
}
