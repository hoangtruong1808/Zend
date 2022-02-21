<?php
/* Smarty version 3.1.42, created on 2022-02-16 09:16:43
  from 'C:\laragon\www\Zend\application\layouts\scripts\asset\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.42',
  'unifunc' => 'content_620c5e8b3a7fe9_02745235',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e17aafa28c9fac0fdadc7e90b1c80d601f02bb19' => 
    array (
      0 => 'C:\\laragon\\www\\Zend\\application\\layouts\\scripts\\asset\\index.tpl',
      1 => 1644975394,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_620c5e8b3a7fe9_02745235 (Smarty_Internal_Template $_smarty_tpl) {
?><style>
    th {
        text-align: center;
    }
    td {
        text-align: center;
    }
    .delete-button{
        color: #337ab7;
        background: none;
        border: none;
    }
    .update-button{
        color: #337ab7;
        background: none;
        border: none;
    }
</style>
<section>
    <?php $_smarty_tpl->_assignInScope('stt', 1);?>
    <header class="panel-heading">
        <div class="col-sm-8">
            Quản lý tài sản
        </div>
        <div class="col-sm-4">
            <div class="add-data">
                <a class="btn btn-success" class="card-title" data-toggle="modal" data-target="#multi-export-user"> Xuất cho người dùng</a>
                <span><a style="margin-left: 10px;" href="/asset/inventory" class="btn btn-primary">Kiểm kê</a></span>
                <a style="margin-left: 10px;" href="/asset/add" class="btn btn-success" class="card-title" data-toggle="modal"> Thêm</a>
                <span style="margin-left: 10px;"><a class="btn btn-danger" data-toggle="modal" data-target="#multi-delete-data" >Xóa</a></span>
            </div>
        </div>
    </header>
    <div class="modal fade xoa-modal" id="multi-export-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 100px">
        <div class="modal-dialog" role="document">
            <form class="form-horizontal bucket-form" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <b style="font-size: 17px">Chọn người dùng</b>
                    </div>
                    <div class="modal-body" style="font-size: 17px; margin-top: 15px; text-align: center">
                        <div style="margin-bottom: 10px">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Họ tên</label>
                                <div class="col-sm-7">
                                    <select class="form-control" name="borrow_user_id" id="borrow_user_id">
                                        <option disabled selected value>Nhập người dùng</option>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['user_list']->value, 'value', false, 'key');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['value']->value['user_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
</option>
                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Ngày mượn</label>
                                <div class="col-sm-7">
                                    <input class="form-control" type="date" name="borrow_date" id="borrow_date">
                                    <div id="alert" style="color: #ff0000; font-size: 13px; margin:10px; text-align: left"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                        <a class="btn btn-primary"  id="btn_multi_export_user">Chọn</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="card bg-success text-white shadow" style="display: none; position: fixed; bottom: 10px; left: 10px; border: none" id="xoahs_thanhcong">
            <div class="card-body" style="align-items: center; display: flex; padding: 1rem">
                abc
                <i class="fas fa-check-circle fa-2x" style="color: white; margin-right: 5px"></i>
            </div>
        </div>
    </div>
    <div class="table-agile-info">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th style="width:60px;" class="no-sort">
                        <input type="checkbox" class="check-control" id="all-checked">
                    </th>
                    <th style="color:black">Tên</th>
                    <th style="color:black">Mã</th>
                    <th style="color:black">Cấu hình</th>
                    <th style="color:black">Tình trạng</th>
                    <th style="color:black">Trạng thái</th>
                    <th style="color:black" class="no-sort">Thao tác</th>
                </tr>
                </thead>
                <tbody>
                <div id="message">
                    <?php if ((isset($_smarty_tpl->tpl_vars['message']->value))) {?>
                    <div class="alert alert-success"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</div>
                    <?php }?>
                </div>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['asset_list']->value, 'value', false, 'key');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
                    <tr id="row<?php echo $_smarty_tpl->tpl_vars['value']->value['asset_id'];?>
">
                        <td><label class="i-checks m-b-none"><input type="checkbox" class="delete_item_check" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['asset_id'];?>
"><i></i></label></td>
                        <td style="color:black" ><?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
</td>
                        <td style="color:black" ><?php echo $_smarty_tpl->tpl_vars['value']->value['code'];?>
</td>
                        <td style="color:black" ><?php echo $_smarty_tpl->tpl_vars['value']->value['configuration'];?>
</td>
                        <td style="color:black" >
                            <span class="badge badge-<?php echo $_smarty_tpl->tpl_vars['value']->value['status_id'] == 1 ? 'success' : ($_smarty_tpl->tpl_vars['value']->value['status_id'] == 2 ? 'warning' : 'danger');?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value['status_name'];?>
</span>

                        </td>
                        <td style="color:black" >
                            <span class="badge badge-<?php echo $_smarty_tpl->tpl_vars['value']->value['state_id'] == 2 ? 'success' : 'warning';?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value['state_name'];?>
</span>
                        </td>
                        <td>
                            <a href="/asset/detail/id/<?php echo $_smarty_tpl->tpl_vars['value']->value['asset_id'];?>
" style="margin-right: 20px"><i class="fas fa-eye"></i></a>
                            <a href="/asset/update/id/<?php echo $_smarty_tpl->tpl_vars['value']->value['asset_id'];?>
"  style="margin-right: 20px"><i class="fas fa-pen"></i></a>
                            <button class="delete-button" data-toggle="modal" data-target="#delete-data" data-id="<?php echo $_smarty_tpl->tpl_vars['value']->value['asset_id'];?>
"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </tbody>

                
                <div class="modal fade xoa-modal" id="multi-delete-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 100px">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <b style="font-size: 17px">Xác nhận</b>
                            </div>
                            <div class="modal-body" style="font-size: 17px; margin-top: 15px; margin-bottom: 30px; text-align: center">
                                <div>Bạn có chắc muốn xóa những tài sản này?</div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                                <a class="btn btn-primary" id="btn_multi_delete">Xóa</a>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-success text-white shadow" style="display: none; position: fixed; bottom: 10px; left: 10px; border: none" id="xoahs_thanhcong">
                        <div class="card-body" style="align-items: center; display: flex; padding: 1rem">
                            <i class="fas fa-check-circle fa-2x" style="color: white; margin-right: 5px"></i>
                        </div>
                    </div>
                </div>
                                <div class="modal fade xoa-modal" id="delete-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 100px">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <b style="font-size: 17px">Xác nhận</b>
                            </div>
                            <div class="modal-body" style="font-size: 17px; margin-top: 15px; margin-bottom: 30px; text-align: center">
                                <div style="margin-bottom: 10px"><i class="fas fa-exclamation-triangle" ></i> Bạn có chắc muốn xóa tài sản này?</div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                                <a class="btn btn-primary delete">Xóa</a>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-success text-white shadow" style="display: none; position: fixed; bottom: 10px; left: 10px; border: none" id="xoahs_thanhcong">
                        <div class="card-body" style="align-items: center; display: flex; padding: 1rem">
                            <i class="fas fa-check-circle fa-2x" style="color: white; margin-right: 5px"></i>
                        </div>
                    </div>
                </div>

            </table>
        </div>
    </div>
</section>
<?php echo '<script'; ?>
>
    //xóa dữ liệu
    let delete_select_id;
    $(".delete-button").click(function(){
        delete_select_id = $(this).data("id");
        console.log(delete_select_id);
    });
    $(".delete").click(function(){
        var delete_id = delete_select_id;
        console.log(delete_id);
        $.ajax({
            method: "POST",
            url: "/asset/delete",
            data:{
                "id":delete_id
            },
            success:function(data) {
                $(".xoa-modal").modal('hide');
                $("#row"+delete_id).remove();
                $(".alert").remove();
                $("#message").append('<div class="alert alert-success">Xóa tài sản thành công!</div>');
            }
        });
    });
    //xóa nhiều dữ liệu
    $("#btn_multi_delete").click(function(){
        var id =[];
        $('.delete_item_check:checkbox:checked').each(function(i){
            id[i] = $(this).val();
            console.log(id[i]);
        });
        if(id.length === 0)
        {
            $(".alert").remove();
            $("#message").append('<div class="alert alert-danger">Chọn tối thiểu một dòng!</div>');
            $("#multi-delete-data").modal('hide');
        }
        else{
            $.ajax({
                method: "POST",
                url: "/asset/multidelete",
                data:{
                    "id":id
                },
                success:function(data) {
                    for(var i=0; i<id.length; i++) {
                        $("#row"+id[i]).remove();
                    }
                    $(".alert").remove();
                    $("#message").append('<div class="alert alert-success">Xóa tài sản thành công!</div>');
                    $("#multi-delete-data").modal('hide');
                }
            });
        }
    });
    //xuất người dùng nhiều tài sản
    $("#btn_multi_export_user").click(function(){
        var borrow_user_id = $("#borrow_user_id").val();
        var borrow_date = $("#borrow_date").val();
        var id =[];
        $('.delete_item_check:checkbox:checked').each(function(i){
            id[i] = $(this).val();
            console.log(id[i]);
        });
        if(id.length === 0)
        {
            $(".alert").remove();
            $("#message").append('<div class="alert alert-danger">Chọn tối thiểu một dòng!</div>');
            $("#multi-export-user").modal('hide');
        }
        else{
            $.ajax({
                method: "POST",
                url: "/asset/borrow",
                data:{
                    "id":id,
                    'borrow_user_id':borrow_user_id,
                    'borrow_date': borrow_date,
                },
                success:function(data) {
                    console.log(data.error_input);
                    if (typeof(data.error_input) != "undefined" && data.error_input_export !== null)
                    {
                        console.log(data.error_input);
                        $("#alert").html(data.error_input);
                    }
                    else {
                        $(".alert").remove();
                        $("#message").append('<div class="alert alert-success">Xuất tài sản cho người dùng thành công!</div>');
                        $("#multi-delete-data").modal('hide');
                    }
                }
            });
        }

    });
    $('#example').DataTable({
        "columnDefs": [ {
            "targets": 'no-sort',
            "orderable": false,
        } ],
        order: [[ 5, 'asc' ]],
        "bDestroy": true,
    });
<?php echo '</script'; ?>
>
<?php }
}
