<?php

use app\widgets\Message;
use yii\widgets\LinkPager;

$this->title = '控制面板';
$this->context->data['menu'] = 'content';
$this->context->data['item']= 'content-download';

$post_status = Yii::$app->params['select']['post_status'];
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>下载</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item ">内容管理</li>
                    <li class="breadcrumb-item active">下载</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">

        <?php
        echo Message::widget();
        ?>

        <div class="row mb-3">
            <div class="col-12 text-right">
                <button class="btn btn-primary btn-sm"><i class="fa fa-plus-circle" onclick="newPost()"></i></button>
            </div>
        </div>

        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>编号</th>
                        <th>附件</th>
                        <th>标题</th>
                        <th>创建时间</th>
                        <th>状态</th>
                        <th width="20%">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($postlist['list'] as $post) {
                        ?>

                        <tr>
                            <td><?php echo $post['id']; ?></td>
                            <td><?php echo $post['title']; ?></td>
                            <td><a href="index.php?r=backend/download/edit&id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></td>
                            <td><?php echo $post['createtime']; ?></td>
                            <td><?php echo $post_status[$post['status']]; ?></td>
                            <td>
                                <i class="fas fa-edit mr-1 text-primary"></i>
                                <i class="fas fa-trash text-danger"></i>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div>
            <?php
            echo LinkPager::widget([
                'pagination' => $postlist['pagination'],
                'options' => [
                    'class' => 'pagination m-0 ms-auto'
                ],
                'linkOptions' => [
                    'class' => 'page-link'
                ],
                'linkContainerOptions' => [
                    'class' => 'page-item'
                ],
                'disabledPageCssClass'=>[
                    'class' => 'page-link disabled'
                ]
            ]);
            ?>
        </div>

        <div class="row row-cards">
            <div class="col-md-6  ">
                <div class="card">
                    <!-- Our markup, the important part here! -->
                    <div id="drag-and-drop-zone" class="dm-uploader p-5">
                        <h3 class="mb-5 mt-5 text-muted">拖拽文件至框内</h3>

                        <div class="btn btn-primary btn-block mb-5">
                            <span>选择文件</span>
                            <input type="file" title='增加文件'/>
                        </div>
                    </div><!-- /uploader -->

                </div>

            </div>
            <div class="col-md-6 ">
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

        <div class="row" style="display: none;">
            <div class="col-12">
                <div class="card h-100">
                    <div class="card-header">
                        Debug Messages
                    </div>

                    <ul class="list-group list-group-flush" id="debug">
                        <li class="list-group-item text-muted empty">Loading plugin....</li>
                    </ul>
                </div>
            </div>
        </div> <!-- /debug -->
    </div>
</section>
<link href="static/plugins/dm-uploader/css/jquery.dm-uploader.min.css" rel="stylesheet">
<script src="static/plugins/dm-uploader/js/jquery.dm-uploader.min.js"></script>
<script src="static/plugins/dm-uploader/upload-ui.js"></script>
<script src="static/plugins/dm-uploader/upload-config.js"></script>
<script type="text/html" id="files-template">
    <li class="media">
        <div class="media-body mb-1">
            <p class="mb-2">
                <strong>%%filename%%</strong> - Status: <span class="text-muted">Waiting</span>
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