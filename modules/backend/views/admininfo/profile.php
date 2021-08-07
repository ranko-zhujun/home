<?php $this->title = '密码设置';

use yii\helpers\Html;
use yii\widgets\ActiveForm; ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>密码设置</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">密码设置</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <?php
                if (isset($model->getErrors()['tips'])) {
                    ?>
                    <div class="alert alert-danger">
                        <?php
                        foreach ($model->getErrors()['tips'] as $error_fc) {
                            echo $error_fc;
                            echo '</br>';
                        }
                        ?>
                    </div>
                    <?php

                }
                if(isset($message)){
                    ?>
                    <div class="alert alert-success">
                        <?php
                        echo $message['message'];
                        ?>
                    </div>
                    <?php
                }
                ?>
                <?php $form = ActiveForm::begin(['id' => 'from-edit']); ?>
                <?php $form->action = 'index.php?r=backend/admininfo/updatepwd' ?>

                <?= $form->field($model, 'id')->textInput()->label(false)->hiddenInput(['value' => $this->context->userId]) ?>
                <?= $form->field($model, 'adminpassword', ['errorOptions' => ['class' => 'error mt-2 text-danger']]) ?>
                <?= $form->field($model, 'newpassword', ['errorOptions' => ['class' => 'error mt-2 text-danger']]) ?>

                <div class="form-group">
                    <?= Html::submitButton('保存', ['class' => 'btn btn-primary']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</section>
