<?php
$dirsPath = array(
    'config',
    'runtime',
    'web/assets'
);
?>
<style>
    body {
        font-size: 13px;
    }

    #license {
        line-height: 30px;
    }
</style>
<div class="container mt-5 mb-5">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title ">环境检测</h5>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <td>名称</td>
                    <td>必须</td>
                    <td>状态</td>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($installRequire['requirements'] as $require) {
                    ?>
                    <tr>
                        <td><?php echo $require['name']; ?></td>
                        <td><?php echo $require['mandatory'] == 1 ? "<span class='text-danger'>是</span>" : "否"; ?></td>
                        <td><?php echo empty($require['error']) ? "<span class='text-success'>通过</span>" : "<span class='danger'>错误</span>"; ?></td>
                    </tr>
                    <?php
                }
                $writeable = true;
                foreach ($dirsPath as $path) {
                    $configPath = \yii\helpers\FileHelper::normalizePath(Yii::$app->basePath . '/config');
                    if (is_writable($configPath)) {
                        ?>
                        <tr>
                            <td><?php echo $path; ?>目录</td>
                            <td><span class="text-danger">可读写</span></td>
                            <td><span class='text-success'>通过</span></td>
                        </tr>
                        <?php
                    } else {
                        ?>
                        <tr>
                            <td><?php echo $path; ?>目录</td>
                            <td><span class="text-danger">可读写</span></td>
                            <td><span class='danger'>错误</span></td>
                        </tr>
                        <?php
                        $writeable = false;
                    }
                }
                ?>
                </tbody>
            </table>

            <?php
            if ($installRequire['summary']['errors'] == 0 && $writeable) {
                ?>
                <div class="alert alert-success" role="alert">
                    太棒了！目前配置满足安装要求！请阅读安装协议，如果您同意安装协议，就可以进行安装了。
                </div>
                <?php
            } else {
                ?>
                <div class="alert alert-danger" role="alert">
                    很遗憾，您目前的环境配置不满足安装要求，请尝试配置您的环境，以满足要求。
                </div>
                <?php
            }
            ?>
            <h5 class="card-title ">安装协议</h5>
            <div id="license">
                <p>
                    企业网站标准模板。<br>
                    <strong>你可以做的：</strong><br>
                    个人和企业都可以将本软件用于商业或者非商业用途,而不必支付任何费用。<br>
                    <strong>你不可以做的：</strong><br>
                    你在使用本软件时候，不允许修改后和衍生的代码做为闭源的商业软件发布和销售。<br>
                    <span class="text-danger">严禁使用本软件从事任何非法活动。</span><br>
                    <strong>GPL协议地址：</strong><a target="_blank" href="http://www.gnu.org/licenses/gpl-3.0.html">http://www.gnu.org/licenses/gpl-3.0.html</a><br>
                </p>
            </div>
            <?php
            if ($installRequire['summary']['errors'] == 0) {
                ?>
                <h5 class="card-title ">安装配置</h5>
                <form method="post" id="formInstall" action="index.php?r=install/default/install" >
                    <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>数据库IP</label>
                                <input name="host" class="form-control"  value="127.0.0.1">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>端口</label>
                                <input name="port" class="form-control" value="3306">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>数据库</label>
                                <input name="db" class="form-control" value="test">
                            </div>
                        </div>
                        <div class="col"></div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>用户名</label>
                                <input name="user" class="form-control" value="root">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>密码</label>
                                <input name="pwd" class="form-control" value="root">
                            </div>
                        </div>
                    </div>
                    <div id="db-message" style="display: none;" class="alert alert-danger" role="alert">
                        数据库配置错误！
                    </div>
                    <button type="button"  id="submitBtn" class="btn btn-primary btn-block" onclick="formSubmit()">同意安装协议并安装</button>
                </form>
                <?php
            }
            ?>
        </div>

    </div>
</div>
<script>
    function formSubmit() {
        $("#submitBtn").attr("disabled","disabled");
        var data = {
            host: $("#formInstall").find("input[name=host]").val(),
            port: $("#formInstall").find("input[name=port]").val(),
            db: $("#formInstall").find("input[name=db]").val(),
            user: $("#formInstall").find("input[name=user]").val(),
            pwd: $("#formInstall").find("input[name=pwd]").val(),
            _csrf: '<?= Yii::$app->request->csrfToken ?>'
        };
        $.post('index.php?r=install/default/dbtest', data, function (res) {
            if (res != 'ok') {
                $("#db-message").show();
            }else{
                $("#formInstall").submit();
            }
            $("#submitBtn").removeAttr("disabled");
        });
    }
</script>