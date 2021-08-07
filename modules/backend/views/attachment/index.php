<?php

use app\widgets\Message;

$this->title = '附件';
$post_status = Yii::$app->params['select']['post_status'];
?>

<div class="page-header">
    <h3 class="page-title"> 附件 </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">功能列表</li>
            <li class="breadcrumb-item active" aria-current="page">附件</li>
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

<div id="card-table"></div>

<div class="row mb-3">
    <div class="col-6  ">
        <div class="card h-100 mb-0">
            <!-- Our markup, the important part here! -->
            <div id="drag-and-drop-zone" class="dm-uploader p-5">
                <h3 class="mb-5 mt-5 text-muted text-center">拖拽文件至框内</h3>

                <div class="btn btn-primary btn-block mb-5">
                    <span>选择文件</span>
                    <input type="file" title='增加文件'/>
                </div>
            </div><!-- /uploader -->

        </div>

    </div>
    <div class="col-6 ">
        <div class="card h-100">
            <div class="card-header">
                文件列表
            </div>

            <ul class="list-unstyled p-2 d-flex flex-column col" id="files">
                <li class="text-muted text-center empty">没有文件上传.</li>
            </ul>
        </div>
    </div>
</div><!-- /file list -->

<div class="row mb-3" >
    <div class="col-12">
        <div class="card h-100">
            <div class="card-header">
                调试信息
            </div>

            <ul class="list-group list-group-flush" id="debug">
                <li class="list-group-item text-muted empty">加载插件....</li>
            </ul>
        </div>
    </div>
</div> <!-- /debug -->

<link href="backend/vendors/dm-uploader/css/jquery.dm-uploader.min.css" rel="stylesheet">
<script src="backend/vendors/dm-uploader/js/jquery.dm-uploader.min.js"></script>
<script src="backend/vendors/dm-uploader/upload-ui.js"></script>
<script src="backend/vendors/dm-uploader/upload-config.js"></script>
<script type="text/html" id="files-template">
    <li class="media">
        <div class="media-body mb-1">
            <p class="mb-2">
                <strong>%%filename%%</strong> - 状态: <span class="text-muted">等待</span>
            </p>
            <div class="progress mb-2">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary"
                     role="progressbar"
                     style="width: 0%"
                     aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                </div>
            </div>
            <hr class="mt-1 mb-1"/>
        </div>
    </li>
</script>

<!-- Debug item template -->
<script type="text/html" id="debug-template">
    <li class="list-group-item text-%%color%%"><strong>%%date%%</strong>: %%message%%</li>
</script>
<script>
    $(function () {
        loadtable();
    });

    function delAttach(filepath) {
        doConfirm('删除附件？', function () {
            $.get("index.php?r=backend/attachment/remove&filepath=" + filepath,null,function (response){
                if(response.code=='success'){
                    toastSuccess(response.message);
                    loadtable();
                }else{
                    toastError('文件删除失败')
                }
            },'json');
        });
    }
    function pagereload() {
        loadtable();
    }
    function loadtable() {
        $.get('index.php?r=backend/attachment/table',null,function (response) {
            $("#card-table").html(response);
        },'html');
    }
</script>