<?php

use app\widgets\Message;
use yii\widgets\LinkPager;

$post_status = Yii::$app->params['select']['post_status'];

$this->title = '内容管理';

?>
<div class="page-header">
    <h3 class="page-title"> 内容 </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">功能列表</li>
            <li class="breadcrumb-item active" aria-current="page">内容</li>
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
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body ">
                <form class="form-inline float-right">
                    <select class="form-control form-control-sm mb-2 mr-sm-2" onchange="changeCatalog(this.value)">
                        <?php
                        foreach ($select_catalog as $key => $val) {
                            if ($key == $catalogId) {
                                ?>
                                <option selected="selected" value="<?php echo $key; ?>"><?php echo $val; ?></option>
                                <?php
                            } else {
                                ?>
                                <option value="<?php echo $key; ?>"><?php echo $val; ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                    <a href="index.php?r=backend/post/edit&id=0" class="btn btn-primary mb-2">创建内容</a>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>标 题</th>
                            <th>目 录</th>
                            <th>创建时间</th>
                            <th>状 态</th>
                            <th>操 作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($postlist['list'] as $post) {
                            ?>
                            <tr>
                                <td><?php echo $post['title']; ?></td>
                                <td><?php echo $post->catalog['catalogname'] == null ? '根目录' : $post->catalog['catalogname']; ?></td>
                                <td><?php echo $post['createtime']; ?></td>
                                <td>
                                    <label class="badge badge-<?php echo $post['status'] == 'online' ? 'success' : 'danger'; ?>"><?php echo $post_status[$post['status']]; ?></label>
                                </td>
                                <td>
                                    <a href="index.php?r=backend/post/edit&id=<?php echo $post['id']; ?>"
                                       class="btn btn-primary btn-sm mr-2">编辑</a>
                                    <a href="javascript:deletePost(<?php echo $post['id']; ?>)"
                                       class="btn btn-danger btn-sm mr-2">删除</a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <nav style="overflow: hidden;">
            <?php
            echo LinkPager::widget([
                'pagination' => $postlist['pagination'],
                'options' => [
                    'class' => 'pagination d-flex justify-content-center table-pagination'
                ],
                'linkOptions' => [
                    'class' => 'page-link'
                ],
                'linkContainerOptions' => [
                    'class' => 'page-item'
                ],
                'disabledPageCssClass' => [
                    'class' => 'page-link disabled'
                ]
            ]);
            ?>
        </nav>
    </div>
</div>
<script>
    function deletePost(id) {
        doConfirm('删除内容？', function () {
            window.location.href = "index.php?r=backend/post/delete&id=" + id;
        });
    }
    function changeCatalog(catalogId){
        window.location.href = "index.php?r=backend/post/index&catalogId=" + catalogId;
    }
</script>