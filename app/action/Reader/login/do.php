<?php
/**
 *  Reader/Login/Do.php
 *  Action 認証キーの認証
 *         イベント情報取得
 */
class Yeahcheese_Form_ReaderLoginDo extends Yeahcheese_ActionForm
{

    public $form = [
           'event_key' => [
               'name'          => '認証キー',
               'required'      => true,
               'type'          => VAR_TYPE_STRING,
           ],
    ];
}

class Yeahcheese_Action_ReaderLoginDo extends Yeahcheese_ActionClass
{
    public function prepare()
    {
        if ($this->af->validate() > 0) {
            return 'reader_home';
        }
        $ev = $this->backend->getManager('event');

        //イベントが合っているか and イベントデータの取得
        $eventDate = $ev->loadEventData($this->af->get('event_key'));
        if (Ethna::isError($eventDate)) {
            $this->ae->addObject('event_key_error', $eventDate);
            return 'reader_home';
        }

        //公開日前 or 公開終了後判定
        $viewIngrights = $ev->isViewingPeriod($eventDate['event_start_day'], $eventDate['event_end_day']);
        if (Ethna::isError($viewIngrights)) {
            $this->ae->addObject('event_key_error', $viewIngrights);
            return 'reader_home';
        }
        $this->af->setApp('eventdate', $eventDate);

        //写真データ取得
        foreach (glob('uploads/' . $this->af->get('event_key') . '/*') as $file) {
            if (is_file($file)) {
                $eventPhoto[] = $file;
            }
        }
        $this->af->setApp('event_photo', $eventPhoto);

        return null;
    }

    public function perform()
    {
        return 'reader_event_view';
    }
}
