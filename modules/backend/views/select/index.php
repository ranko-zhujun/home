<?php $this->title = '系统选项'; ?>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="card-title">系统选项</h4>
                    </div>
                    <div class="col-lg-6 text-right">
                        <div class="form-inline" style="float: right;">
                            <div class="form-group">
                                <select class="form-control selectpicker table-list"  name="selectType"
                                        onchange="changeSelect(this.value)">
                                    <?php
                                    foreach ($selects as $select) {
                                        if ($selectName == $select['selectName']) {
                                            ?>
                                            <option selected="selected"
                                                    value="<?php echo $select['selectName']; ?>"><?php echo $select['description']; ?></option>
                                            <?php
                                        } else {
                                            ?>
                                            <option value="<?php echo $select['selectName']; ?>"><?php echo $select['description']; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group ">
                                <button class="btn btn-primary btn-xs" onclick="addOption()"><i
                                            class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>描述</th>
                        <th>值</th>
                        <th>序列</th>
                        <th width="20%">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($options as $item) {
                        ?>
                        <tr>
                            <td><?php echo $item['optionDesc']; ?></td>
                            <td><?php echo $item['optionValue']; ?></td>
                            <td><?php echo $item['sequencenumber'];?></td>
                            <td width="20%">
                                <a class="text-primary"
                                   href="index.php?r=backend/select/update&id=<?php echo $item['id']; ?>">
                                    <i class="fa fa-pencil fa-lg mr-1"></i>
                                </a>
                                <a class="text-danger" onclick="deleteItem(<?php echo $item['id']; ?>)">
                                    <i class="fa fa-trash fa-lg mr-1"></i>
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
</div>
<script>
    $(function () {
    });

    function deleteItem(id) {
        doConfirm('删除系统选项？', function () {
            window.location.href = "index.php?r=backend/select/delete&id=" + id;
        });
    }

    function changeSelect(selectname) {
        window.location.href = "index.php?r=backend/select/index&selectname=" + selectname;
    }

    function addOption() {
        var selectName = $("select[name=selectType]").val();
        window.location.href = 'index.php?r=backend/select/add&selectName='+selectName;
    }
</script>
