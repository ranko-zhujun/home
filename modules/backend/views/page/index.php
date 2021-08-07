<?php $this->title = '页面'; ?>

<div class="page-header d-print-none">
    <div class="row align-items-center">
        <div class="col">
            <h2 class="page-title">
                页面
            </h2>
        </div>
        <!-- Page title actions -->
        <div class="col-auto ms-auto d-print-none">
            <a href="index.php?r=backend/page/add" class="btn btn-primary w-100">添加页面
            </a>
        </div>
    </div>
</div>

<div class="row row-cards">
    <div class="col-sm-12">
        <div class="card">
            <table class="table table-vcenter card-table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>描述</th>
                    <th>路径</th>
                    <th  class="td-tools">操作</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($list as $item) {
                    ?>
                    <tr>
                        <td><?php echo $item['id']; ?></td>
                        <td><?php echo $item['pageName']; ?></td>
                        <td><?php echo $item['pagePath']; ?></td>
                        <td>
                            <a class="text-primary mr-1"
                               href="index.php?r=backend/page/update&id=<?php echo $item['id']; ?>">
                                <i class="fa fa-pencil fa-lg "></i>
                            </a>
                            <a class="text-danger mr-1" onclick="deleteItem(<?php echo $item['id']; ?>)">
                                <i class="fa fa-trash fa-lg "></i>
                            </a>
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


<script>
    function deleteItem(id) {
        doConfirm('删除页面？',function () {
            window.location.href = "index.php?r=backend/page/delete&id="+id;
        });
    }
    function changeType(pageType) {
        window.location.href = 'index.php?r=backend/page/index&pagetype=' + pageType;
    }
</script>
