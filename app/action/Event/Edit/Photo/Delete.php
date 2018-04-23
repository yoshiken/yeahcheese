<?php
/**
 *  Event/Edit/Photo/Delete.php
 *  Action 写真削除
 */
class Yeahcheese_Form_EventEditPhotoDelete extends Yeahcheese_ActionForm
{
    public $form = [
    'delphoto_url' => [
        'name'          => '写真削除',
        'required'      => true,
        'type'          => [VAR_TYPE_STRING],
        ],
    ];
}

class Yeahcheese_Action_EventEditPhotoDelete extends Yeahcheese_ActionClass
{
    public function perform()
    {
        var_dump($this->af->get('delphoto_url'));
        foreach ($this->af->get('delphoto_url') as $key => $delurl) {
            unlink($delurl);
        }
        return 'event_edit_photo_delete_do';
    }
}
