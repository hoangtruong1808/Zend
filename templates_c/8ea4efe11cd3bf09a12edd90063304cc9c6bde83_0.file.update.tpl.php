<?php
/* Smarty version 3.1.42, created on 2022-01-18 08:50:22
  from 'C:\laragon\www\Zend\application\layouts\scripts\training\update.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.42',
  'unifunc' => 'content_61e61cde08c897_93793366',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8ea4efe11cd3bf09a12edd90063304cc9c6bde83' => 
    array (
      0 => 'C:\\laragon\\www\\Zend\\application\\layouts\\scripts\\training\\update.tpl',
      1 => 1642149463,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61e61cde08c897_93793366 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="panel">
    <header class="panel-heading">
        Thêm học sinh
    </header>
    <div class="panel-body">
        <form class="form-horizontal bucket-form" method="post" action="" enctype="multipart/form-data">
            <div class="form-group">
                <label class="col-sm-3 control-label">Tên học sinh</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $_smarty_tpl->tpl_vars['item_student']->value['name'];?>
" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Tuổi</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="age" value="<?php echo $_smarty_tpl->tpl_vars['item_student']->value['age'];?>
" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Địa chỉ</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control round-input" name="address" value="<?php echo $_smarty_tpl->tpl_vars['item_student']->value['address'];?>
" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Trạng thái</label>
                <div><input type="radio" value="1" name="status" <?php echo $_smarty_tpl->tpl_vars['item_student']->value['status'] == 1 ? 'checked' : '';?>
>Hoạt động</div>
                <div><input type="radio" value="0" name="status" <?php echo $_smarty_tpl->tpl_vars['item_student']->value['status'] == 0 ? 'checked' : '';?>
>Không hoạt động</div>
            </div>
            <div class="form-group">
                <div style="margin-left: 47%">
                    <button class="btn btn-primary" type="submit">Xác nhận</button>
                </div>
            </div>
        </form>
    </div>

</section><?php }
}
