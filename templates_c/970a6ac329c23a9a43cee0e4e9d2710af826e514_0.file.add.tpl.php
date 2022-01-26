<?php
/* Smarty version 3.1.42, created on 2022-01-14 14:50:25
  from 'C:\xampp\htdocs\Zend\application\layouts\scripts\training\add.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.42',
  'unifunc' => 'content_61e12b41b084d7_56204382',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '970a6ac329c23a9a43cee0e4e9d2710af826e514' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Zend\\application\\layouts\\scripts\\training\\add.tpl',
      1 => 1642146620,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61e12b41b084d7_56204382 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="panel">
    <header class="panel-heading">
        Thêm học sinh
    </header>
    <div class="panel-body">
        <form class="form-horizontal bucket-form" method="post" action="" enctype="multipart/form-data">
            <div class="form-group">
                <label class="col-sm-3 control-label">Tên học sinh</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Tuổi</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="age" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Địa chỉ</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control round-input" name="address" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Trạng thái</label>
                <div><input type="radio" value="1" name="status">Hoạt động</div>
                <div><input type="radio" value="0" name="status">Không hoạt động</div>
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
