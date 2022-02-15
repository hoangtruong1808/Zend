<?php
/* Smarty version 3.1.42, created on 2022-02-11 13:53:28
  from 'C:\laragon\www\Zend\application\layouts\scripts\asset\detail.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.42',
  'unifunc' => 'content_620607e81568d0_27214623',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8b2f0e475511376224a289e5c6d83a9071f5a149' => 
    array (
      0 => 'C:\\laragon\\www\\Zend\\application\\layouts\\scripts\\asset\\detail.tpl',
      1 => 1644561942,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_620607e81568d0_27214623 (Smarty_Internal_Template $_smarty_tpl) {
?><section>
    <header class="panel-heading">
        <div class="col-sm-9" style="text-align: left">
            <?php echo $_smarty_tpl->tpl_vars['asset']->value['name'];?>

        </div>
        <div class="col-sm-3">
            <span><a href="/asset/update/id/<?php echo $_smarty_tpl->tpl_vars['asset']->value['asset_id'];?>
" class="btn btn-primary" style="" class="card-title" data-toggle="modal">Sửa</a></span>
            <span><a href="" class="btn btn-danger" data-toggle="modal" data-target="#delete-data">Xóa</a></span>
            <span><a href="" class="btn btn-success" data-toggle="modal" data-target="#export-user">Xuất cho Người dùng</a></span>
        </div>
    </header>
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
                    <a href="/asset/delete/id/<?php echo $_smarty_tpl->tpl_vars['asset']->value['asset_id'];?>
" class="btn btn-primary delete">Xóa</a>
                </div>
            </div>
        </div>
        <div class="card bg-success text-white shadow" style="display: none; position: fixed; bottom: 10px; left: 10px; border: none" id="xoahs_thanhcong">
            <div class="card-body" style="align-items: center; display: flex; padding: 1rem">
                <i class="fas fa-check-circle fa-2x" style="color: white; margin-right: 5px"></i>
            </div>
        </div>
    </div>
        <div class="modal fade xoa-modal" id="export-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 100px">
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
                        <a class="btn btn-primary" id="btn-borrow-user">Chọn</a>
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
        <div id="message">
            <?php if ((isset($_smarty_tpl->tpl_vars['message']->value))) {?>
                <div class="alert alert-success"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</div>
            <?php }?>
        </div>
        <div class="row">
            <div class="col-sm-4 gallery-grids-left">
                <div class="gallery-grid">
                    <img src="/images/asset_images/<?php echo $_smarty_tpl->tpl_vars['asset']->value['image'];?>
" alt="" />
                </div>
            </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-7 stats-info margin-box" >
                <div class="stats-info-agileits">
                    <div>
                        <ul class="list-unstyled">
                            <li>
                                <div class="form-group has-success">
                                    <label class="col-lg-5 control-label">Tên tài sản</label>
                                    <div class="col-lg-7 input-summary-info">
                                        <div class="form-control"><?php echo $_smarty_tpl->tpl_vars['asset']->value['name'];?>
</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form-group has-success">
                                    <label class="col-lg-5 control-label">Mã tài sản</label>
                                    <div class="col-lg-7 input-summary-info">
                                        <div class="form-control"><?php echo $_smarty_tpl->tpl_vars['asset']->value['code'];?>
</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form-group has-success">
                                    <label class="col-lg-5 control-label">Nhóm tài sản</label>
                                    <div class="col-lg-7 input-summary-info">
                                        <div class="form-control"><?php echo $_smarty_tpl->tpl_vars['asset']->value['group_name'];?>
</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form-group has-success">
                                    <label class="col-lg-5 control-label">Cấu hình</label>
                                    <div class="col-lg-7 input-summary-info">
                                        <div class="form-control"><?php echo $_smarty_tpl->tpl_vars['asset']->value['configuration'];?>
</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form-group has-success">
                                    <label class="col-lg-5 control-label">Tình trạng</label>
                                    <div class="col-lg-7 input-summary-info">
                                        <div class="form-control"><?php echo $_smarty_tpl->tpl_vars['asset']->value['status_name'];?>
</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form-group has-success">
                                    <label class="col-lg-5 control-label">Trạng thái</label>
                                    <div class="col-lg-7 input-summary-info">
                                        <div class="form-control"><?php echo $_smarty_tpl->tpl_vars['asset']->value['state_name'];?>
</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form-group has-success">
                                    <label class="col-lg-5 control-label">Người dùng đang sử dụng</label>
                                    <div class="col-lg-7 input-summary-info">
                                        <div class="form-control">
                                            <?php if (($_smarty_tpl->tpl_vars['asset']->value['state'] == 1)) {?>
                                                <?php echo $_smarty_tpl->tpl_vars['current_borrow']->value['borrow_user_name'];?>

                                            <?php }?>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <table class="table stats-table tbl-detail">
                    <thead>
                    <tr>
                        <th colspan='4' style="text-align: center; font-size: 18px; color:#696969">Lịch sử sử dụng</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th style="text-align:center">Người sử dụng</th>
                        <th style="text-align:center">Ngày mượn</th>
                        <th style="text-align:center">Ngày trả</th>

                    </tr>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['all_borrow']->value, 'value', false, 'key');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
                    <tr>
                        <td style="text-align:center"><?php echo $_smarty_tpl->tpl_vars['value']->value['borrow_user_name'];?>
</td>
                        <td style="text-align:center"><?php echo $_smarty_tpl->tpl_vars['value']->value['borrow_date'];?>
</td>
                        <td style="text-align:center"><?php echo $_smarty_tpl->tpl_vars['value']->value['return_date'];?>
</td>
                    </tr>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
</section>
<?php echo '<script'; ?>
>
    //xuất cho người dùng
    $("#btn-borrow-user").click(function(){
        <?php if (($_smarty_tpl->tpl_vars['asset']->value['state'] == 1)) {?>
            $("#fail-alert").remove();
            $("#export-user").modal('hide');
            $("#message").append('<div class="alert alert-danger" id="fail-alert">Tài sản đang sử dụng, không thể xuất cho người dùng!</div>');
        <?php } else { ?>
        var borrow_user_id = $("#borrow_user_id").val();
        var borrow_date = $("#borrow_date").val();

        $.ajax({
            method: "POST",
            url: "/asset/borrow-user",
            data:{
                'asset_id': <?php echo $_smarty_tpl->tpl_vars['asset']->value['asset_id'];?>
,
                'borrow_user_id':borrow_user_id,
                'borrow_date': borrow_date,
            },
            success:function(data) {
                if (typeof(data.error_input) != "undefined" && data.error_input !== null)
                {
                    $("#alert").html(data.error_input);
                }
                else{
                    location.reload();
                }

            }
        });
        <?php }?>
    });

<?php echo '</script'; ?>
><?php }
}
