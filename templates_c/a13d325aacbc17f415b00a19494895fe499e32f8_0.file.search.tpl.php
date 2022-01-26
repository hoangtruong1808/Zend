<?php
/* Smarty version 3.1.42, created on 2022-01-20 14:27:37
  from 'C:\laragon\www\Zend\application\layouts\scripts\menu\search.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.42',
  'unifunc' => 'content_61e90ee9136ab7_70839010',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a13d325aacbc17f415b00a19494895fe499e32f8' => 
    array (
      0 => 'C:\\laragon\\www\\Zend\\application\\layouts\\scripts\\menu\\search.tpl',
      1 => 1642663655,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61e90ee9136ab7_70839010 (Smarty_Internal_Template $_smarty_tpl) {
?><style>
    th {
        text-align: center;
    }
    td {
        text-align: center;
    }
</style>
<section>
    <?php $_smarty_tpl->_assignInScope('stt', 1);?>
    <div id="messegner" style="color: red; margin: 8px; font-size: 14px"></div>
    <header class="panel-heading">
        <div class="col-sm-2"></div>
        <div class="col-sm-7">
            <?php echo $_smarty_tpl->tpl_vars['title']->value;?>

        </div>
        <div class="col-sm-3">
            <form action="/menu/search" method="post">
                <div class="input-group">
                    <input type="text" class="input-sm form-control" name="key" id="search_key" style="margin-top:14px">
                    <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="submit" id="search">Tìm</button>
                    </span>
                </div>
            </form>
        </div>
    </header>
    <div class="table-agile-info">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered table-sm"  cellspacing="0">
                <thead>
                <tr>
                    <th style="color:black">STT</th>
                    <th style="color:black">Mô tả</th>
                    <th style="color:black">Cập nhật</th>
                    <th style="color:black">Xóa</th>
                </tr>
                </thead>
                <tbody>

                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menu_list']->value, 'value', false, 'key');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>

                    <tr id="row<?php echo $_smarty_tpl->tpl_vars['value']->value['infor_grp_id'];?>
">
                        <td style="color:black"><?php echo $_smarty_tpl->tpl_vars['stt']->value++;?>
</td>
                        <td style="color:black"><?php echo $_smarty_tpl->tpl_vars['value']->value['description'];?>
</td>
                        <td>
                            <a href="" type="submit" data-toggle="modal" data-target="#update-data<?php echo $_smarty_tpl->tpl_vars['value']->value['infor_grp_id'];?>
"><i class="fas fa-pen"></i></a>
                            <!-- form update -->
                            <section class="update-data">
                                <div class="modal fade" id="update-data<?php echo $_smarty_tpl->tpl_vars['value']->value['infor_grp_id'];?>
" tabindex="-1" role="dialog" aria-labelledby="edit-data" aria-hidden="true" style="margin-top: 100px">
                                    <div class="modal-dialog" role="document">
                                        <form method="POST">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="edit-data"><b>Chỉnh sửa dữ liệu</b></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="margin: 10px 10px 60px 10px">
                                                    <div class="form-group" style="margin-bottom: 60px">
                                                        <label class="col-sm-3" style="margin-top:5px"><b>Tên/Mô tả:</b></label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="update_description<?php echo $_smarty_tpl->tpl_vars['value']->value['infor_grp_id'];?>
" name="description" required value="<?php echo $_smarty_tpl->tpl_vars['value']->value['description'];?>
">
                                                            <div class="update-alert" style="color: red; font-size: 13px; margin:10px; text-align: left"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3" style="margin-top:5px"><b>Trạng thái:</b></label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" id="update_status<?php echo $_smarty_tpl->tpl_vars['value']->value['infor_grp_id'];?>
" name="status">
                                                                <option value="1" <?php echo $_smarty_tpl->tpl_vars['value']->value['status'] == '1' ? 'selected="selected"' : '';?>
>Kích hoạt</option>
                                                                <option value="0" <?php echo $_smarty_tpl->tpl_vars['value']->value['status'] == '0' ? 'selected="selected"' : '';?>
>Không kích hoạt</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                                    <a class="btn btn-primary update" data-id="<?php echo $_smarty_tpl->tpl_vars['value']->value['infor_grp_id'];?>
">Cập nhật</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </section>
                        </td>
                        <td>
                            <a href="" data-toggle="modal" data-target="#delete-data<?php echo $_smarty_tpl->tpl_vars['value']->value['infor_grp_id'];?>
"><i class="fas fa-trash-alt"></i></a>
                            <!-- form update -->
                            <div class="modal fade xoa-modal" id="delete-data<?php echo $_smarty_tpl->tpl_vars['value']->value['infor_grp_id'];?>
" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 100px">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <b style="font-size: 17px">Xác nhận</b>
                                        </div>
                                        <div class="modal-body" style="font-size: 17px; margin-top: 15px; margin-bottom: 30px">
                                            <div style="margin-bottom: 10px"><i class="fas fa-exclamation-triangle" ></i> Xóa dữ liệu có thể ảnh hưởng tới các tài sản đang sử dụng.</div>
                                            <div>Bạn có chắc muốn xóa dữ liệu này?</div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                                            <a class="btn btn-primary delete" data-id="<?php echo $_smarty_tpl->tpl_vars['value']->value['infor_grp_id'];?>
">Xóa</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card bg-success text-white shadow" style="display: none; position: fixed; bottom: 10px; left: 10px; border: none" id="xoahs_thanhcong">
                                    <div class="card-body" style="align-items: center; display: flex; padding: 1rem">
                                        <i class="fas fa-check-circle fa-2x" style="color: white; margin-right: 5px"></i>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </tbody>

            </table>
            <section class="add-data" style="margin-left: 90%">
                <a href="" class="btn btn-success" style="" class="card-title" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus" aria-hidden="true"></i> Thêm</a>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 100px">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><b>Thêm dữ liệu</b></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="" method="post" >
                                <div class="modal-body" style="margin: 10px 10px 60px 10px">
                                    <div class="form-group" style="margin-bottom: 60px">
                                        <label class="col-sm-3 add-name" style="margin-top:5px"><b>Tên/Mô tả:</b></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="description" id="add_description">
                                            <div id="alert" style="color: red; margin: 10px; font-size: 13px"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3" style="margin-top:5px"><b>Trạng thái:</b></label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="status" id="add_status">
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
            </section>
        </div>
    </div>
</section>
<?php echo '<script'; ?>
>
    $("#add").click(function(){
        var description = $("#add_description").val();
        var status = $("#add_status").val();

        $.ajax({
            method: "POST",
            url: "/menu/add",
            data:{
                'description':description,
                'status': status,
            },
            success:function(data) {
                if (typeof(data.error_input) != "undefined" && data.error_input !== null)
                {
                    $("#alert").html(data.error_input);
                }
                else{
                    location.reload();
                    $("#messegner").html(data.error_input);
                }

            }
        });
    });

    $(".delete").click(function(){
        var id = $(this).data("id");
        $.ajax({
            method: "POST",
            url: "/menu/delete",
            data:{
                "id":id
            },
            success:function(data) {
                location.reload();
                $("#row"+id).remove();
            }
        });
    });

    $(".update").click(function(){
        var id = $(this).data("id");
        var description = $("#update_description"+id).val();
        var status = $("#update_status"+id).val();

        $.ajax({
            method: "POST",
            url: "/menu/update",
            data:{
                'id':id,
                'description':description,
                'status': status,
            },
            success:function(data) {
                if (typeof(data.error_input) != "undefined" && data.error_input !== null)
                {
                    $(".update-alert").html(data.error_input);
                }
                else{
                    location.reload();
                }

            }
        });
    });

    // $(".search").click(function(){
    //     var id = $(this).data("id");
    //     var description = $("#update_description"+id).val();
    //     var status = $("#update_status"+id).val();
    //
    //     $.ajax({
    //         method: "POST",
    //         url: "/menu/update",
    //         data:{
    //             'id':id,
    //             'description':description,
    //             'status': status,
    //         },
    //         success:function(data) {
    //             if (typeof(data.error_input) != "undefined" && data.error_input !== null)
    //             {
    //                 $(".update-alert").html(data.error_input);
    //             }
    //             else{
    //                 location.reload();
    //             }
    //
    //         }
    //     });
    // });
<?php echo '</script'; ?>
>
<?php }
}
