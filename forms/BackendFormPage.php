<?php


namespace app\forms;


class BackendFormPage extends \yii\base\Model
{

    public $themeid;
    public $currentedit;
    public $content;

    public function rules()
    {
        return [
            [['themeid','currentedit','content'], 'required', 'message' => '必填项']
        ];
    }


}