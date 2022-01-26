<?php
/* Smarty version 3.1.42, created on 2022-01-14 15:37:46
  from 'C:\xampp\htdocs\Zend\application\layouts\scripts\training\update.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.42',
  'unifunc' => 'content_61e1365a922116_40554807',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '911c8f0fdcc1eebfec86191aa6e952476720728c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Zend\\application\\layouts\\scripts\\training\\update.tpl',
      1 => 1642149463,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61e1365a922116_40554807 (Smarty_Internal_Template $_smarty_tpl) {
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
