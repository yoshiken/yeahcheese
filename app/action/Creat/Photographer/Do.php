<?php
class Yeahcheese_Form_CreatPhotographerDo extends Yeahcheese_ActionForm
{
    public $form = [
        'mailaddress' => [
            'name'          => 'メールアドレス',
            'required'      => true,
            'custom'        => 'checkMailaddress',
            'type'          => VAR_TYPE_STRING,
            'max'           => self::MAX_MAILADDRESS_LENGTH,
        ],
        'password' => [
            'name'          => 'パスワード',
            'required'      => true,
            'type'          => VAR_TYPE_STRING,
            'max'           => self::MAX_PASSWORD_LENGTH,
            'min'           => self::MIN_PASSWORD_LENGTH,
        ],
        'password_confirm' => [
            'name'          => 'パスワード確認用',
            'required'      => true,
            'type'          => VAR_TYPE_STRING,
            'max'           => self::MAX_PASSWORD_LENGTH,
            'min'           => self::MIN_PASSWORD_LENGTH,
        ],
    ];
}

class Yeahcheese_Action_CreatPhotographerDo extends Yeahcheese_ActionClass
{
    public function perform()
    {
        if ($this->af->validate() > 0 || $this->af->get('password') !== $this->af->get('password_confirm')) {
              return 'creat_photographer';
        } else {
            $db = $this->backend->getDB();
            $dbresult = $db->query("SELECT * FROM photographer_info WHERE photographer_mailaddress = $1", $this->af->get('mailaddress'));
            if ($dbresult->fetchRow()) {
                return 'creat_photographer';
            }
            $table = 'photographer_info';
            $record["photographer_mailaddress"] = $this->af->get('mailaddress');
            $record["photographer_pw"] = hash('sha256', $this->af->get('password'));
            $insertSQL = $db->AutoExecute($table, $record, 'INSERT');
            return 'creat_photographer_success';
        }
    }
}
