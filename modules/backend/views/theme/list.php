<?php

use app\widgets\Message;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = '主 题';
$this->context->data['menu'] = 'theme';

$current_edit = $edit;
?>
<div class="page-header">
    <h3 class="page-title"> Accordions </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">UI Elements</a></li>
            <li class="breadcrumb-item active" aria-current="page">Accordions</li>
        </ol>
    </nav>
</div>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>主题列表</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item ">主 题</li>
                    <li class="breadcrumb-item active">主题编辑</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <ul class="list-group">
                    <?php
                    foreach ($files as $file) {
                        ?>
                        <li class="list-group-item list-group-item-dark "><?php echo $file['folder']; ?></li>
                        <?php
                        if (sizeof($file['files']) > 0) {
                            foreach ($file['files'] as $fileitem) {
                                $edititem =  $theme['path'] . '/template/' . $file['folder'] . '/' . $fileitem;
                                if ($current_edit == null) {
                                    $current_edit = $edititem;
                                    ?>
                                    <li class="list-group-item active ">
                                        <span class="ml-3">
                                            <a class=" text-white"
                                               href="index.php?r=backend/theme/list&id=<?php echo $theme['id']; ?>&edit=<?php echo $edititem; ?>"><?php echo $fileitem; ?></a>
                                            </span></li>
                                    <?php
                                } else {
                                    ?>
                                    <li class="list-group-item <?php echo $current_edit == $edititem ? 'active ' : ''; ?>">
                                        <span class="ml-3"><a
                                                    class="<?php echo $current_edit == $edititem ? 'text-white ' : ''; ?> "
                                                    href="index.php?r=backend/theme/list&id=<?php echo $theme['id']; ?>&edit=<?php echo $edititem; ?>">
                                                <?php echo $fileitem; ?></a></span></li>
                                    <?php
                                }

                            }
                        }
                    }
                    ?>
                </ul>
            </div>
            <div class="col-10">

                <?php
                echo Message::widget();
                ?>

                <div class="card">
                    <?php $form = ActiveForm::begin(['id' => 'form-default']); ?>
                    <?php $form->action = 'index.php?r=backend/theme/save'; ?>
                    <input type="hidden" name="themeid" value="<?php echo $theme['id']; ?>"/>
                    <input type="hidden" name="currentedit" value="<?php echo $current_edit; ?>"/>
                    <input type="hidden" id="page-content" name="content" value=""/>
                    <div class="card-body pb-0">
                        <textarea id="code-editable"></textarea>
                    </div>
                    <div class="card-footer">
                        <button onclick="return formatCode()" class="btn btn-info mr-1">代码格式化</button>
                        <?= Html::submitButton('保 存', ['class' => 'btn btn-primary']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    var editor = null;
    var current_edit = '<?php echo $current_edit; ?>';
    $(function () {
        editor = ace.edit("code-editable");
        editor.setTheme("ace/theme/chrome");
        editor.session.setMode("ace/mode/php");
        editor.setAutoScrollEditorIntoView(true);
        editor.setOption("maxLines", 100);
        editor.setFontSize(14);

        if (current_edit != '') {
            loadContent(current_edit);
        }

        $('#form-default').on('beforeValidate', function (e) {
            $("#page-content").val(editor.getValue());
            return true;
        });

    });

    function loadContent(editfile) {
        $.get('index.php?r=backend/theme/load&editfile=' + editfile, {}, function (data) {
            editor.setValue(data);
        }, 'html');
    }

    function formatCode() {
        var beautify = ace.require("ace/ext/beautify");
        beautify.beautify(editor.session);
        return false;
    }
</script>