<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = '用户';

$user_status = Yii::$app->params['select']['user_status'];
?>
<input type="hidden" name="location" value="index.php?r=backend/user/index"/>
<div class="page-header">
    <h3 class="page-title"> 用户 </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">功能列表</li>
            <li class="breadcrumb-item ">用 户</li>
            <li class="breadcrumb-item active">编 辑</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <?php $form = ActiveForm::begin(['id' => 'form-edit']); ?>
                <?php $form->action = 'index.php?r=backend/user/save'; ?>
                <fieldset>
                    <?= $form->field($model, 'id')->textInput()->label(false)->hiddenInput(['value' => $model->attributes['id']]) ?>
                    <?php
                    if($model->attributes['id']==0){
                        ?>
                        <?= $form->field($model, 'loginname')->textInput(['value' => $model->attributes['loginname']]) ?>
                        <?php
                    }else{
                        ?>
                        <?= $form->field($model, 'loginname')->textInput(['value' => $model->attributes['loginname'],'readonly'=>'readonly']) ?>
                        <?php
                    }
                    ?>
                    <?= $form->field($model, 'loginpassword')->textInput(['value' => '']) ?>
                    <?= Html::submitButton('提 交', ['class' => 'btn btn-primary']) ?>
                </fieldset>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>