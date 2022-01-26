<?php
/* Smarty version 3.1.42, created on 2022-01-26 14:31:06
  from 'C:\laragon\www\Zend\application\layouts\scripts\menu\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.42',
  'unifunc' => 'content_61f0f8bab35131_45220640',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '15fa91c925b9480d645f095743bf8f23c7949c2e' => 
    array (
      0 => 'C:\\laragon\\www\\Zend\\application\\layouts\\scripts\\menu\\index.tpl',
      1 => 1643181759,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61f0f8bab35131_45220640 (Smarty_Internal_Template $_smarty_tpl) {
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
        <div class="col-sm-10">
            <?php echo $_smarty_tpl->tpl_vars['title']->value;?>

        </div>
        <div class="col-sm-2">
            <div class="add-data">
                <a href="" class="btn btn-success" style="" class="card-title" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus" aria-hidden="true"></i> Thêm</a>
                <span style="margin-left: 10px;"><a class="btn btn-danger" data-toggle="modal" data-target="#multi-delete-data" ><i class="fas fa-times"></i> Xóa</a></span>
            </div>
        </div>
    </header>
    <div class="table-agile-info">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th style="width:60px;" >
                            <input type="checkbox" class="check-control" id="all-checked">
                    </th>
                    <th style="color:black">Tên</th>
                    <th style="color:black">Trạng thái</th>
                    <th style="color:black">Thao tác</th>
                </tr>
                </thead>
                <tbody>
                <div id="message">
                </div>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menu_list']->value, 'value', false, 'key');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
                    <tr id="row<?php echo $_smarty_tpl->tpl_vars['value']->value['group_id'];?>
">
                        <td><label class="i-checks m-b-none"><input type="checkbox" class="delete_item_check" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['group_id'];?>
"><i></i></label></td>
                        <td style="color:black" id="row-description<?php echo $_smarty_tpl->tpl_vars['value']->value['group_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value['description'];?>
</td>
                        <td style="color:black" id="row-status<?php echo $_smarty_tpl->tpl_vars['value']->value['group_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value['active'] == 1 ? "Kích hoạt" : "Không kích hoạt";?>
</td>
                        <td>
                            <button class="update-button" type="submit" data-toggle="modal" data-target="#update-data" data-id="<?php echo $_smarty_tpl->tpl_vars['value']->value['group_id'];?>
" data-desription="<?php echo $_smarty_tpl->tpl_vars['value']->value['description'];?>
" data-active="<?php echo $_smarty_tpl->tpl_vars['value']->value['active'];?>
"><i class="fas fa-pen"></i></button>
                            <button class="delete-button" data-toggle="modal" data-target="#delete-data" data-id="<?php echo $_smarty_tpl->tpl_vars['value']->value['group_id'];?>
"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </tbody>
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 100px">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel" style="text-align: center">Thêm dữ liệu</h5>
                            </div>
                            <form action="" method="post" >
                                <div class="modal-body" style="margin: 10px 10px 60px 10px">
                                    <div class="form-group" style="margin-bottom: 60px">
                                        <label class="col-sm-3 add-name" style="font-size: 13px; margin-top: 10px; text-align: right"><b>Tên:</b></label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="description" id="add_description">
                                            <p id="alert" style="color: red; font-size: 13px; margin: 10px"></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3" style="font-size: 13px; margin-top: 10px; text-align: right"><b>Hoạt động:</b></label>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="active" id="add_active">
                                                <option value="1" selected="selected">Kích hoạt</option>
                                                <option value="0">Không kích hoạt</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                    <a type="submit" id="add" class="btn btn-primary">Tiếp tục</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                                <div class="modal fade xoa-modal" id="multi-delete-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 100px">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <b style="font-size: 17px">Xác nhận</b>
                            </div>
                            <div class="modal-body" style="font-size: 17px; margin-top: 15px; margin-bottom: 30px; text-align: center">
                                <div style="margin-bottom: 10px"><i class="fas fa-exclamation-triangle" ></i> Xóa dữ liệu có thể ảnh hưởng tới các tài sản đang sử dụng.</div>
                                <div>Bạn có chắc muốn xóa những dữ liệu này?</div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                                <a class="btn btn-primary" id="btn_multi_delete"">Xóa</a>
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
                                <div style="margin-bottom: 10px"><i class="fas fa-exclamation-triangle" ></i> Xóa dữ liệu có thể ảnh hưởng tới các tài sản đang sử dụng.</div>
                                <div>Bạn có chắc muốn xóa dữ liệu này?</div>
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

                
                <div class="modal fade" id="update-data" tabindex="-1" role="dialog" aria-labelledby="edit-data" aria-hidden="true" style="margin-top: 100px">
                    <div class="modal-dialog" role="document">
                        <form method="POST">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="edit-data"><b>Chỉnh sửa dữ liệu</b></h5>
                                </div>
                                <div class="modal-body" style="margin: 10px 10px 60px 10px">
                                    <div class="form-group" style="margin-bottom: 60px">
                                        <label class="col-sm-3" style="margin-top:5px; text-align: right"><b>Tên:</b></label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="update_description" name="description" required>
                                            <div class="update-alert" style="color: red; font-size: 13px; margin:10px; text-align: left"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3" style="margin-top:5px; text-align: right"><b>Trạng thái:</b></label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="update_active" name="active">
                                                <option value="1">Kích hoạt</option>
                                                <option value="0">Không kích hoạt</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                    <a class="btn btn-primary update">Cập nhật</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </table>
        </div>
    </div>
</section>
<?php echo '<script'; ?>
>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
    //add dữ liệu
    $("#add").click(function(){
        var description = $("#add_description").val();
        var active = $("#add_active").val();
        $.ajax({
            method: "POST",
            url: "/menu/add",
            data:{
                'description':description,
                'active': active,
            },
            success:function(data) {
                if (typeof(data.error_input) != "undefined" && data.error_input !== null)
                {
                    $("#alert").html(data.error_input);
                }
                else{
                    $(".alert").remove();
                    $("#message").append('<div class="alert alert-success">Thêm dữ liệu thành công!</div>');
                    $("#exampleModal").modal('hide');
                    var id = data.id_insert;
                    location.reload();
                }

            }
        });
    });

    //xóa dữ liệu
    let delete_select_id;
    $(".delete-button").click(function(){
        delete_select_id = $(this).data("id");
    });
    $(".delete").click(function(){
        var delete_id = delete_select_id;
        console.log(delete_id);
        $.ajax({
            method: "POST",
            url: "/menu/delete",
            data:{
                "id":delete_id
            },
            success:function(data) {
                $(".xoa-modal").modal('hide');
                $("#row"+delete_id).remove();
                $(".alert").remove();
                $("#message").append('<div class="alert alert-success">Xóa dữ liệu thành công!</div>');
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
                    url: "/menu/multidelete",
                    data:{
                        "id":id
                    },
                    success:function(data) {
                        for(var i=0; i<id.length; i++) {
                            $("#row"+id[i]).remove();
                        }
                        $(".alert").remove();
                        $("#message").append('<div class="alert alert-success">Xóa dữ liệu thành công!</div>');
                        $("#multi-delete-data").modal('hide');
                    }
                });
            }
    });
    //cập nhật dữ liệu
    let update_select_id;
    let update_select_description;
    let update_select_active;
    $(".update-button").click(function(){

        update_select_id = $(this).data("id");
        update_select_description = $(this).data("desription");
        update_select_active = $(this).data("active");
        $("#update_description").val(update_select_description);
        $("#update_active").val(update_select_active);
    });
    $(".update").click(function(){
        var update_id = update_select_id;
        var description = $("#update_description").val();
        var active = $("#update_active").val();

        $.ajax({
            method: "POST",
            url: "/menu/update",
            data:{
                'id':update_id,
                'description':description,
                'active': active,
            },
            success:function(data) {
                if (typeof(data.error_input) != "undefined" && data.error_input !== null)
                {
                    $(".update-alert").html(data.error_input);
                }
                else{
                    $("#update-data").modal('hide');
                    $("#row-description"+update_id).html(description);
                    if(active == 1) {
                        $("#row-description" + update_id).html("Kích hoạt");
                    }
                    else{
                        $("#row-status" + update_id).html("Không kích hoạt");
                    }
                    $(".alert").remove();
                    $("#message").append('<div class="alert alert-success">Cập nhật dữ liệu thành công!</div>');
                }

            }
        });
    });

<?php echo '</script'; ?>
>
<?php }
}
