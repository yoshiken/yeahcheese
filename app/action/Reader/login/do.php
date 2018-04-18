<?php
/**
 *  Reader/Login/Do.php
 *  Action 認証キーの認証
 */
class Yeahcheese_Form_PhotographerLoginDo extends Yeahcheese_ActionForm
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
        return null;
    }

    public function perform()
    {
        return 'event_info';
    }
}
