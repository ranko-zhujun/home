<?php

use app\widgets\Message;

$this->title = '主 题';
$this->context->data['menu'] = 'theme';
$theme_status = Yii::$app->params['select']['theme_status'];
?>
<div class="page-header">
    <h3 class="page-title"> 主题 </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">功能列表</li>
            <li class="breadcrumb-item active" aria-current="page">主题</li>
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
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>主题名称</th>
                            <th>主题标识</th>
                            <th>状态</th>
                            <th>创建时间</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($themes as $theme) {
                            ?>
                            <tr>
                                <td>
                                    <a href="themes/<?php echo $theme['path']; ?>/upload/screenshot.jpg"
                                       data-toggle="lightbox" data-title="<?php echo $theme['title']; ?>"
                                       data-gallery="gallery">
                                        <?php echo $theme['title']; ?>
                                    </a>
                                </td>
                                <td><?php echo $theme['path']; ?></td>
                                <td>
                                    <label class="badge badge-<?php echo $theme['status'] == 'active' ? 'success' : 'danger'; ?>"><?php echo $theme_status[$theme['status']]; ?></label>
                                </td>
                                <td><?php echo $theme['createtime']; ?></td>
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