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

require_once 'CreatUserManager.php';

class Yeahcheese_Action_CreatPhotographerDo extends Yeahcheese_ActionClass
{
    public function prepare()
    {
        if ($this->af->validate()>0) {
            return 'creat_photographer';
        }

        $cu = new CreatUserManager();

        $comparisonpassword = $cu->comparisonPassword($this->af->get('password'), $this->af->get('password_confirm'));
        if (Ethna::isError($comparisonpassword)) {
            $this->ae->addObject('password_confirm', $comparisonpassword);
            return 'creat_photographer';
        }

        $db = $this->backend->getDB();
        $registeredmailaddress = $cu->isRegisteredMailaddress($this->af->get('mailaddress'), $db);
        if (Ethna::isError($registeredmailaddress)) {
            $this->ae->addObject('mailaddress', $registeredmailaddress);
            return 'creat_photographer';
        }
        return null;
    }

    public function perform()
    {
        $table = 'photographer_info';
        $record["photographer_mailaddress"] = $this->af->get('mailaddress');
        $record["photographer_pw"] = hash('sha256', $this->af->get('password'));
        $insertSQL = $db->AutoExecute($table, $record, 'INSERT');
        return 'creat_photographer_success';
    }
}
