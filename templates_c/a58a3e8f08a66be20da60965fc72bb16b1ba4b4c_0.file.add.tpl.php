<?php
/* Smarty version 3.1.42, created on 2022-01-18 10:38:04
  from 'C:\laragon\www\Zend\application\layouts\scripts\training\add.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.42',
  'unifunc' => 'content_61e6361ce922c5_97328336',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a58a3e8f08a66be20da60965fc72bb16b1ba4b4c' => 
    array (
      0 => 'C:\\laragon\\www\\Zend\\application\\layouts\\scripts\\training\\add.tpl',
      1 => 1642477082,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61e6361ce922c5_97328336 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="panel">
    <header class="panel-heading">
        Thêm học sinh
    </header>
    <div class="panel-body">
        <form class="form-horizontal bucket-form" method="post" action="" enctype="multipart/form-data">
            <div class="form-group">
                <label class="col-sm-3 control-label">Tên học sinh</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Tuổi</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="age">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Địa chỉ</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control round-input" name="address">
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
