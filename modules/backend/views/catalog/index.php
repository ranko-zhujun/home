<?php

use app\widgets\Message;

$this->title = '目录设置';
$catalogtype = Yii::$app->params['select']['catalogtype'];
?>

<input type="hidden" name="location" value="index.php?r=backend/catalog/index"/>

<div class="page-header">
    <h3 class="page-title"> 目录 </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">功能列表</li>
            <li class="breadcrumb-item active" aria-current="page">目录</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-12 mb-3 stretch-card">
        <div class="card">
            <div class="card-body ">
                <form class="form-inline float-right">
                    <a href="index.php?r=backend/catalog/edit&id=0" class="btn btn-primary">添加目录</a>
                </form>
            </div>
        </div>
    </div>
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
                            <th>描述</th>
                            <th>名称</th>
                            <th>创建时间</th>
                            <th>操 作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($list as $item) {
                            ?>
                            <tr>
                                <td><?php echo $item['catalogname']; ?></td>
                                <td><?php echo $catalogtype[$item['catalogtype']]; ?></td>
                                <td><?php echo $item['createtime']; ?></td>
                                <td>
                                    <a href="index.php?r=backend/catalog/edit&id=<?php echo $item['id']; ?>"
                                       class="btn btn-primary btn-sm mr-2">编辑</a>
                                    <button type="button" onclick="deleteCatalog(<?php echo $item['id']; ?>)"
                                            class="btn btn-danger btn-sm mr-2">删除
                                    </button>
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
<script>
    function deleteCatalog(catalogId) {
        doConfirm('删除目录？', function () {
            window.location.href = 'index.php?r=backend/catalog/delete&catalogId=' + catalogId;
        });
    }
</script>