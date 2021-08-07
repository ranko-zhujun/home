<?php
$this->title = '用户';

$user_status = Yii::$app->params['select']['user_status'];
?>
<input type="hidden" name="location" value="index.php?r=backend/user/index"/>

<div class="page-header">
    <h3 class="page-title"> 用户 </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">功能列表</li>
            <li class="breadcrumb-item active" aria-current="page">用户</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-12 mb-3 stretch-card">
        <div class="card">
            <div class="card-body ">
                <form class="form-inline float-right">
                    <a href="index.php?r=backend/user/edit&userId=0" class="btn btn-primary">添加用户</a>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <?php
        echo app\widgets\Message::widget();
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
                            <th>登录名</th>
                            <th>创建时间</th>
                            <th>状 态</th>
                            <th>操 作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($users as $user) {
                            ?>
                            <tr>
                                <td><?php echo $user['loginname']; ?></td>
                                <td><?php echo $user['createtime']; ?></td>
                                <td>
                                    <label class="badge badge-<?php echo $user['status'] == 'active' ? 'success' : 'danger'; ?>">
                                        <?php echo $user_status[$user['status']]; ?></label>
                                </td>
                                <td>

                                    <?php
                                    if($user['status']=='active'){
                                        ?>
                                        <a href="index.php?r=backend/user/edit&userId=<?php echo $user['id']; ?>" class="btn btn-primary btn-sm mr-2">编辑</a>
                                        <a href="javascript:disabledUser(<?php echo $user['id']; ?>);"
                                           class="btn btn-danger btn-sm">禁用
                                        </a>
                                        <?php
                                    }
                                    ?>

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
    function disabledUser(userId) {
        doConfirm('禁用用户？', function () {
            window.location.href = 'index.php?r=backend/user/disable&userId='+userId;
        });
    }
</script>