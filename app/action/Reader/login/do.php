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
        $eventdate = $ev->loadEventData($this->af->get('event_key'));
        if (Ethna::isError($eventdate)) {
            $this->ae->addObject('event_key_error', $eventdate);
            return 'reader_home';
        }

        //公開日前 or 公開終了後判定
        $Viewingrights = $ev->isViewingPeriod($eventdate['event_start_day'], $eventdate['event_end_day']);
        if (Ethna::isError($Viewingrights)) {
            $this->ae->addObject('event_key_error', $Viewingrights);
            return 'reader_home';
        }
        $this->af->setApp('eventdate', $eventdate);

        //写真データ取得
        foreach (glob('uploads/' . $this->af->get('event_key') . '/*') as $file) {
            if (is_file($file)) {
                $eventphoto[] = $file;
            }
        }
        $this->af->setApp('event_photo', $eventphoto);

        return null;
    }

    public function perform()
    {
        return 'reader_event_view';
    }
}
