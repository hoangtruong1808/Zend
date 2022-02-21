<?php
/* Smarty version 3.1.42, created on 2022-02-15 14:37:57
  from 'C:\laragon\www\Zend\application\layouts\scripts\account\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.42',
  'unifunc' => 'content_620b58550386c5_51595131',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eaaa44e3332c451127f79fb6270f5b6c051f6e26' => 
    array (
      0 => 'C:\\laragon\\www\\Zend\\application\\layouts\\scripts\\account\\index.tpl',
      1 => 1644905277,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_620b58550386c5_51595131 (Smarty_Internal_Template $_smarty_tpl) {
?><section>
    <header class="panel-heading">
        <div class="col-sm-9">
            Tài khoản cá nhân
        </div>
        <div class="col-sm-3">
            <span><a href="/user/update/id/<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
" class="btn btn-primary" class="card-title" data-toggle="modal">Sửa</a></span>
            <span><a href="" class="btn btn-success" data-toggle="modal" data-target="#change-password">Đổi mật khẩu</a></span>
        </div>
    </header>
        <div class="modal fade xoa-modal" id="change-password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 100px">
        <div class="modal-dialog" role="document">
            <form class="form-horizontal bucket-form" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <b style="font-size: 17px">Đổi mật khẩu</b>
                    </div>
                    <div class="modal-body" style="font-size: 17px; margin-top: 15px; text-align: center">
                        <div style="margin-bottom: 10px">
                            <div class="form-group">

                                <label class="col-sm-4" style="font-size: 14px; margin-top: 10px; text-align: right; font-weight: bold">Mật khẩu cũ</label>
                                <div class="col-sm-7">
                                    <input class="form-control" type="password" name="old_password" id="old_password">
                                </div>
                            </div>
                            <div class="form-group">

                                <label class="col-sm-4" style="font-size: 14px; margin-top: 10px; text-align: right; font-weight: bold">Mật khẩu mới</label>
                                <div class="col-sm-7">
                                    <input class="form-control" type="password" name="new_password" id="new_password">
                                </div>
                            </div>
                            <div class="form-group">

                                <label class="col-sm-4" style="font-size: 14px; margin-top: 10px; text-align: right; font-weight: bold">Nhập lại mật khẩu</label>
                                <div class="col-sm-7">
                                    <input class="form-control" type="password" name="re_password" id="re_password">
                                </div>
                            </div>
                        </div>
                        <p id="alert" style="color: red; font-size: 13px; margin: 10px"></p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                        <a class="btn btn-primary" id="btn-change-password">Chọn</a>
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
            <div class="col-sm-1"></div>
            <div class="col-sm-2 gallery-grids-left">
                <div class="gallery-grid">
                    <img src="/images/user_images/<?php echo $_smarty_tpl->tpl_vars['user']->value['image'];?>
" alt="" />
                </div>
            </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-8 stats-info margin-box" >
                <div class="stats-info-agileits">
                    <div>
                        <ul class="list-unstyled">
                            <li>
                                <div class="form-group has-success">
                                    <label class="col-lg-5 control-label">Họ tên</label>
                                    <div class="col-lg-7 input-summary-info">
                                        <div class="form-control"><?php echo $_smarty_tpl->tpl_vars['user']->value['name'];?>
</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form-group has-success">
                                    <label class="col-lg-5 control-label">Số điện thoại</label>
                                    <div class="col-lg-7 input-summary-info">
                                        <div class="form-control"><?php echo $_smarty_tpl->tpl_vars['user']->value['phone'];?>
</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form-group has-success">
                                    <label class="col-lg-5 control-label">Email</label>
                                    <div class="col-lg-7 input-summary-info">
                                        <div class="form-control"><?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form-group has-success">
                                    <label class="col-lg-5 control-label">Vai trò</label>
                                    <div class="col-lg-7 input-summary-info">
                                        <div class="form-control"><?php echo $_smarty_tpl->tpl_vars['user']->value['user_role'];?>
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
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <table class="table stats-table tbl-detail">
                    <thead>
                    <tr>
                        <th colspan='3' style="text-align: center; font-size: 18px; color:#696969">Tài sản đang sử dụng</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th style="text-align:center">Tài sản</th>
                        <th style="text-align:center">Ngày mượn</th>

                    </tr>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['all_borrow_asset']->value, 'value', false, 'key');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
                        <tr id="row<?php echo $_smarty_tpl->tpl_vars['value']->value['borrow_id'];?>
">
                            <td style="text-align:center"><?php echo $_smarty_tpl->tpl_vars['value']->value['borrow_asset_name'];?>
</td>
                            <td style="text-align:center"><?php echo $_smarty_tpl->tpl_vars['value']->value['borrow_date'];?>
</td>
                        </tr>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
</section>
<?php echo '<script'; ?>
>
    $("#btn-change-password").click(function(){
        var old_password = $("#old_password").val();
        var new_password = $("#new_password").val();
        var re_password = $("#re_password").val();
        var user_id = <?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
;

        $.ajax({
            method: "POST",
            url: "/account/change-password",
            data:{
                'old_password':old_password,
                'new_password':new_password,
                're_password':re_password,
                'user_id':user_id,
            },
            success:function(data) {
                if (typeof(data.error_input) != "undefined" && data.error_input !== null)
                {
                    $(".alert").remove();
                    console.log(data.error_input)
                    $("#alert").html(data.error_input);
                }
                else{
                    $(".alert").remove();
                    $("#message").append('<div class="alert alert-success">Thay đổi mật khẩu thành công!</div>');
                    $("#change-password").modal('hide');
                    $("#old_password").val('');
                    $("#new_password").val('');
                    $("#re_password").val('');
                    $("#alert").html('');
                }

            }
        });
    });
<?php echo '</script'; ?>
><?php }
}
