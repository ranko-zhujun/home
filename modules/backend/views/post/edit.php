<?php

use app\widgets\Message;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$post_status = Yii::$app->params['select']['post_status'];
$post_meta = isset(Yii::$app->params['meta']['default']) ? json_encode(Yii::$app->params['meta']['default']) : null;

$this->title = '内容管理';

?>
<input type="hidden" name="location" value="index.php?r=backend/post/index"/>

<div class="page-header">
    <h3 class="page-title"> 内容 </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">功能列表</li>
            <li class="breadcrumb-item ">内容</li>
            <li class="breadcrumb-item active">编辑内容</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-12">
        <?php
        echo Message::widget();
        ?>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <?php $form = ActiveForm::begin(['id' => 'form-edit']); ?>
                <?php $form->action = 'index.php?r=backend/post/save'; ?>
                <?= $form->field($model, 'metavalues')->textInput()->label(false)->hiddenInput(['value' => $model->attributes['metavalues']]) ?>
                <fieldset>
                    <?= $form->field($model, 'id')->textInput()->label(false)->hiddenInput(['value' => $model->attributes['id']]) ?>
                    <?= $form->field($model, 'catalogId')->dropDownList($select_catalog) ?>
                    <?= $form->field($model, 'title') ?>
                    <?= $form->field($model, 'content', ['options' => ['class' => 'form-group']])
                        ->textarea()->label(false); ?>
                    <?= $form->field($model, 'status', ['options' => ['class' => 'form-group']])
                        ->dropDownList($post_status); ?>
                    <div id="meta-grid" class="mb-3"></div>
                    <?= Html::submitButton('提 交', ['class' => 'btn btn-primary']) ?>
                </fieldset>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="backend/vendors/jsgrid/jsgrid.min.css">
<link rel="stylesheet" href="backend/vendors/jsgrid/jsgrid-theme.min.css">
<script src="backend/vendors/jsgrid/jsgrid.min.js"></script>
<script>
    var meta_grid = null;
    var data = new Array();
    $(function () {
        initTinyMce('formpost-content');
        initGrid();
        beforeSubmit();

    });

    function beforeSubmit() {
        $('#form-edit').on('beforeSubmit', function (e) {

            $("#meta-grid").find(".jsgrid-grid-body .jsgrid-table tbody tr").each(function (j) {
                var tds = $(this).find("td");
                data[j] = {
                    'key': $(tds[0]).text(),
                    'value': $(tds[1]).text()
                };
            });

            $("input[id=formpost-metavalues]").val(JSON.stringify(data));

            return true;
        });
    }

    function initGrid() {
        if ($("#meta-grid").length) {
            meta_grid = $("#meta-grid").jsGrid({
                height: "500px",
                width: "100%",
                filtering: false,
                editing: true,
                inserting: true,
                sorting: false,
                paging: false,
                autoload: true,
                deleteConfirm: "删除配置？",
                noDataContent: "无数据",
                data: <?php echo $model->attributes['metavalues'] == null ? '[]' : $model->attributes['metavalues']; ?>,
                fields: [{
                    name: "key",
                    type: "text"
                },
                    {
                        name: "value",
                        type: "text"
                    },
                    {
                        type: "control"
                    }]
            });
        }
    }
</script>