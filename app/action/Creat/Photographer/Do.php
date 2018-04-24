<?php
/**
 *  Creat/Photographer/Do.php
 *  Action 新規登録処理
 */
class Yeahcheese_Form_CreatPhotographerDo extends Yeahcheese_ActionForm
{
    public $form = [
           'mailaddress' => [
               'name'           => 'メールアドレス',
               'required'       => true,
               'custom'         => 'checkMailaddress',
               'type'           => VAR_TYPE_STRING,
               'max'            => self::MAX_MAILADDRESS_LENGTH,
           ],
           'password' => [
               'name'           => 'パスワード',
               'required'       => true,
               'type'           => VAR_TYPE_STRING,
               'max'            => self::MAX_PASSWORD_LENGTH,
               'min'            => self::MIN_PASSWORD_LENGTH,
           ],
           'password_confirm' => [
               'name'           => 'パスワード確認用',
               'required'       => true,
               'type'           => VAR_TYPE_STRING,
               'max'            => self::MAX_PASSWORD_LENGTH,
               'min'            => self::MIN_PASSWORD_LENGTH,
           ],
    ];
}

class Yeahcheese_Action_CreatPhotographerDo extends Yeahcheese_ActionClass
{
    public function authenticate()
    {
        $this->session->start();
    }

    public function prepare()
    {
        if ($this->af->validate() > 0) {
            return 'creat_photographer';
        }
        $cu = $this->backend->getManager('user');
        $comparisonpassword = $cu->comparisonPassword($this->af->get('password'), $this->af->get('password_confirm'));
        if (Ethna::isError($comparisonpassword)) {
            $this->ae->addObject('password_confirm', $comparisonpassword);
            return 'creat_photographer';
        }

        $registeredmailaddress = $cu->isRegisteredMailaddress($this->af->get('mailaddress'));
        if (Ethna::isError($registeredmailaddress)) {
            $this->ae->addObject('mailaddress', $registeredmailaddress);
            return 'creat_photographer';
        }
        return null;
    }

    public function perform()
    {
        $db = $this->backend->getDB();
        $table = 'photographer_info';
        $record['photographer_mailaddress'] = $this->af->get('mailaddress');
        $record['photographer_pw'] = hash('sha256', $this->af->get('password'));
        $insertSQL = $db->AutoExecute($table, $record, 'INSERT');

        $userid = $cu->loadId($this->af->get('mailaddress'));
        $sessionUserId = [
            'id' =>  $userid['photographer_id']
        ];
        $this->session->set('userid', $sessionUserId);

        return 'creat_photographer_success';
    }
}
