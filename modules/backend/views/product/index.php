<?php

use app\widgets\Message;
use yii\widgets\LinkPager;

$this->title = '控制面板';
$this->context->data['menu'] = 'content';
$this->context->data['item']= 'content-product';

$post_status = Yii::$app->params['select']['post_status'];
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>产品</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item ">内容管理</li>
                    <li class="breadcrumb-item active">产品</li>
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
                        <th>主图</th>
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
                            <td><?php echo $post['title']; ?></td>
                            <td><?php echo $post['createtime']; ?></td>
                            <td><?php echo $post_status[$post['status']]; ?></td>
                            <td>
                                <i class="fas fa-search mr-1 text-primary"></i>
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

    </div>
</section>