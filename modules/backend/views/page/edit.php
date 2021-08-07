<?php

use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

$dataset = Yii::$app->params['options']['page-dataset'];

?>
<?php $this->title = '页面编辑'; ?>

<div class="page-header d-print-none">
    <div class="row align-items-center">
        <div class="col">
            <h2 class="page-title">
                页面编辑
            </h2>
        </div>
        <div class="col-auto ms-auto d-print-none">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <?php $form = ActiveForm::begin(['id' => 'form-edit']); ?>
                <?php $form->action = 'index.php?r=backend/page/edit' ?>
                <input name="FormPage[body]" type="hidden" id="formpage-body">
                <?= $form->field($model, 'id')->textInput()->label(false)->hiddenInput(['value' => $model->attributes['id']]) ?>
                <?= $form->field($model, 'pageKey')->textInput()->label(false)->hiddenInput(['value' => is_null($model->attributes['pageKey']) ? '未设置' : $model->attributes['pageKey']]) ?>
                <div class="row">
                    <div class="col-md-6"><?= $form->field($model, 'pageName', ['errorOptions' => ['class' => 'error mt-2 text-danger']]) ?></div>
                    <div class="col-md-6"><?= $form->field($model, 'pagePath', ['errorOptions' => ['class' => 'error mt-2 text-danger']]) ?></div>
                </div>
                <div class="row">
                    <div class="col-md-6"><?= $form->field($model, 'metaTitle', ['errorOptions' => ['class' => 'error mt-2 text-danger']]) ?></div>
                    <div class="col-md-6"><?= $form->field($model, 'metaKeywords', ['errorOptions' => ['class' => 'error mt-2 text-danger']]) ?></div>
                </div>
                <?= $form->field($model, 'metaDescription', ['errorOptions' => ['class' => 'error mt-2 text-danger']]) ?>
                <div class="form-group">
                    <label>
                        <button class="btn btn-primary btn-xs" onclick="return formatCode()">
                            <i class="fa fa-code"></i>代码格式化
                        </button>
                    </label>
                    <textarea id="code-editable"></textarea>
                    <?php
                    if (isset($model->getErrors()['body'])) {
                        ?>
                        <div class="error mt-2 text-danger">
                            <?php
                            foreach ($model->getErrors()['body'] as $error_fc) {
                                echo $error_fc;
                                echo '</br>';
                            }
                            ?>
                        </div>
                        <?php

                    }
                    ?>
                </div>
                <div class="form-group">
                    <label class="form-label">数据集</label>
                    <input type="hidden" name="FormPage[pageDataset]" id="formpage-pagedataset" value="" >
                    <select name="select-dataset" id="select-dataset" class="form-select" multiple>
                        <?php
                        foreach ($dataset as $key => $value){
                            ?>
                            <option value="<?php echo $key; ?>" <?php echo array_key_exists($key,$pagedataset)==true?"selected":"";?> ><?php echo $value; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <?= Html::submitButton('保存', ['class' => 'btn btn-primary btn-block']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
<script>
    var editor = null;
    var id = null;
    $(function () {
        editor = ace.edit("code-editable");
        editor.setTheme("ace/theme/chrome");
        editor.session.setMode("ace/mode/php");
        editor.setAutoScrollEditorIntoView(true);
        editor.setOption("maxLines", 100);
        editor.setFontSize(14);
        id = $("#formpage-id").val();
        if (id != null && id != 0) {
            loadPageBody(id);
        }
        $('#select-dataset').selectize({
            maxItems: 100,
            plugins: ['remove_button']
        });
        $('#form-edit').on('beforeSubmit', function (e) {
            $("#formpage-pagedataset").val(getDatasetStrings());
            $("#formpage-body").val(editor.getValue());
            return true;
        });
    });

    function getDatasetStrings() {
        var vals = $('#select-dataset').val();
        var valStrings = "";
        if(vals.length>0){
            for(var i=0;i<vals.length;i++){
                if(valStrings==""){
                    valStrings += vals[i];
                }else{
                    valStrings +=","+vals[i];
                }
            }
        }
        return valStrings;
    }

    function formatCode() {
        var beautify = ace.require("ace/ext/beautify");
        beautify.beautify(editor.session);
        return false;
    }
    function loadPageBody(id) {
        $.post('index.php?r=backend/page/getbody', {
            'id': id,
            '_csrf': '<?= Yii::$app->request->csrfToken ?>'
        }, function (data) {
            editor.setValue(data);
        });
    }
</script>