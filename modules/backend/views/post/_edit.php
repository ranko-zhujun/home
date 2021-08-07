<?php

use app\widgets\Message;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;

$this->title = '控制面板';
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?php echo $catalog_type[$posttype] ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item ">内容管理</li>
                    <li class="breadcrumb-item active">编辑<?php echo $catalog_type[$posttype] ?></li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <?php $form = ActiveForm::begin(['id' => 'form-edit']); ?>
            <div class="card-body pb-0">
                <?php $form->action = 'index.php?r=backend/post/save'; ?>
                <?= $form->field($model, 'id')->textInput()->label(false)->hiddenInput(['value' => $model->attributes['id']]) ?>
                <?php
                echo Message::widget();
                ?>
                <div class="row">
                    <div class="col-4">
                        <?= $form->field($model, 'catalogId', ['errorOptions' => ['class' => 'error  text-danger'],
                            'options' => ['class' => 'form-group']])
                            ->dropDownList($catalogs) ?>
                    </div>
                    <div class="col-4">
                        <?= $form->field($model, 'title', ['errorOptions' => ['class' => 'error  text-danger'],
                            'options' => ['class' => 'form-group']])
                            ->textInput(['value' => $model->attributes['title']]) ?>
                    </div>
                    <div class="col-4">
                        <?= $form->field($model, 'keywords', ['errorOptions' => ['class' => 'error  text-danger'],
                            'options' => ['class' => 'form-group']])
                            ->textInput() ?>
                    </div>
                </div>
                <?php
                if ($posttype == 'download') {
                    ?>
                    <div class="row">
                        <div class="col-12">
                            <label class="control-label" for="backendcmspost-downloadurl">附件地址</label>
                            <div class="input-group mb-3">
                                <input type="text" id="backendcmspost-downloadurl"
                                       value="<?php echo $model->downloadurl; ?>" readonly="readonly"
                                       name="BackendCmsPost[downloadurl]" class="form-control">
                                <div class="input-group-append">
                                    <span class="input-group-text" onclick="showDownload()"><i
                                                class="fas fa-download"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="row">
                        <div class="col-12">
                            <label class="control-label" for="backendcmspost-mainimage">主图地址</label>
                            <div class="input-group mb-3">
                                <input type="text" id="backendcmspost-mainimage"
                                       value="<?php echo $model->mainimage; ?>" readonly="readonly"
                                       name="BackendCmsPost[mainimage]" class="form-control">
                                <div class="input-group-append">
                                    <span class="input-group-text" onclick="showImageSet()"><i class="fas fa-image"></i></span>
                                    <span class="input-group-text text-danger" onclick="setImageEmpty()"><i class=" fas fa-trash"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <div id="content-editor">
                    <textarea style="display:none;"><?php echo $model->attributes['content'] ?></textarea>
                </div>
                <?= $form->field($model, 'content', ['errorOptions' => ['class' => 'error  text-danger'],
                    'options' => ['class' => 'form-group']])
                    ->textarea()->hiddenInput()->label(false); ?>
                <?= $form->field($model, 'status', ['errorOptions' => ['class' => 'error  text-danger'],
                    'options' => ['class' => 'form-group']])
                    ->dropDownList($post_status); ?>
                <?php
                if($metas!=null){
                    ?>
                    <div class="row">
                        <?php
                        foreach ($metas as $meta){
                            ?>
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="control-label" ><?php echo $meta['metaname']; ?></label>
                                    <input type="text"  class="form-control" name="<?php echo $meta['metakey']; ?>"
                                           value="<?php echo $metavalues[$meta['metakey']]; ?>" aria-required="true">
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="card-footer">
                <?= Html::submitButton('提 交', ['class' => 'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</section>

<div class="modal fade" id="modal-select">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">选择图片</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="card-table">

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-download">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">选择附件</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="card-table-download">

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script type="text/javascript">
    var editor = null;
    var image_selector = null;
    $(function () {
        editor = editormd("content-editor", {
            width: "100%",
            height: "450px",
            path: "backend/plugins/editor.md/lib/",
            imageUpload: true,
            imageFormats: ["jpg", "jpeg", "gif", "png", "bmp", "webp"],
            imageUploadURL: "index.php?r=backend/attachment/upload",
            placeholder: "请使用Markdown语法。",
            toolbarIcons: function () {
                return [
                    "undo", "redo", "|",
                    "bold", "del", "italic", "quote", "ucwords", "uppercase", "lowercase", "|",
                    "h1", "h2", "h3", "h4", "h5", "h6", "|",
                    "list-ul", "list-ol", "hr", "|",
                    "link", "reference-link", "image", "imageselect", "code", "preformatted-text", "code-block", "table", "datetime", "emoji", "html-entities", "pagebreak", "|",
                    "goto-line", "watch", "preview", "fullscreen", "clear", "search", "|",
                    "help", "info"
                ];
            },
            toolbarIconsClass: {
                imageselect: "fa-picture-o"
            },
            toolbarHandlers: {
                imageselect: function (cm, icon, cursor, selection) {
                    image_selector = 'content';
                    $("#modal-select").modal();
                }
            },
            lang: {
                toolbar: {
                    imageselect: "选择图片"
                }
            }
        });

        $.get('index.php?r=backend/attachment/image', null, function (response) {
            $("#card-table").html(response);
            $("#card-table").find(".img-list").click(function () {
                setImage(this);
            });
        }, 'html');

        $.get('index.php?r=backend/attachment/download', null, function (response) {
            $("#card-table-download").html(response);
            $("#card-table-download").find(".tr-file").click(function () {
                var downloadurl = $(this).find("td").attr("downloadurl");
                $("#backendcmspost-downloadurl").val(downloadurl);
                $("#modal-download").modal('hide');
            });
        }, 'html');

        $('#form-edit').on('beforeValidate', function (e) {
            $("#backendcmspost-content").val(editor.getMarkdown());
            return true;
        });
    });

    function showImageSet() {
        image_selector = 'mainimage';
        $("#modal-select").modal();
    }

    function setImageEmpty() {
        $("#backendcmspost-mainimage").val("");
    }


    function setImage(obj) {
        var imgsrc = $(obj).find("img").attr("src");
        if (image_selector == 'content') {
            editor.insertValue("![图片描述](" + imgsrc + ")");
            $("#modal-select").modal('hide');
        } else if (image_selector == 'mainimage') {
            $("#backendcmspost-mainimage").val(imgsrc);
            $("#modal-select").modal('hide');
        }
    }

    function showDownload() {
        $("#modal-download").modal();
    }


</script>
