<?php
/* Smarty version 3.1.42, created on 2022-01-14 16:21:49
  from 'C:\xampp\htdocs\Zend\application\layouts\scripts\training\list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.42',
  'unifunc' => 'content_61e140ad6ad120_75018917',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9d958c1d261fe78d2349fe97d6d61c69571289fb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Zend\\application\\layouts\\scripts\\training\\list.tpl',
      1 => 1642151989,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61e140ad6ad120_75018917 (Smarty_Internal_Template $_smarty_tpl) {
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
    <header class="panel-heading">
        <div class="col-sm-1">
            <a href="/training/add" class="btn btn-danger"><i class="fa fa-plus" aria-hidden="true"></i> Thêm</a>
        </div>
        <div class="col-sm-2"></div>
        <div class="col-sm-6">
            Danh sách học sinh
        </div>
        <div class="col-sm-3">
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="input-sm form-control" name="key" style="margin-top:14px">
                    <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="submit">Tìm</button>
                    </span>
                </div>
            </form>
        </div>
    </header>
    <?php echo '<?php ';?>
$stt = 1; <?php echo '?>';?>

    <div class="table-agile-info">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered table-sm"  cellspacing="0">
                <thead>
                <tr>
                    <th style="color:black">STT</th>
                    <th style="color:black">Tên</th>
                    <th style="color:black">Tuổi</th>
                    <th style="color:black">Địa chỉ</th>
                    <th style="color:black">Trạng thái</th>
                    <th style="color:black">Cập nhật</th>
                    <th style="color:black">Xóa</th>
                </tr>
                </thead>
                <tbody>

                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_student']->value, 'value', false, 'key');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>

                    <tr>
                        <td style="color:black"><?php echo $_smarty_tpl->tpl_vars['stt']->value++;?>
</td>
                        <td style="color:black"><?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
</td>
                        <td style="color:black"><?php echo $_smarty_tpl->tpl_vars['value']->value['age'];?>
</td>
                        <td style="color:black"><?php echo $_smarty_tpl->tpl_vars['value']->value['address'];?>
</td>
                        <td style="color:black"><?php echo $_smarty_tpl->tpl_vars['value']->value['status'];?>
</td>
                        <td>
                            <a href="/training/update/id/<?php echo $_smarty_tpl->tpl_vars['value']->value['student_id'];?>
"><i class="fas fa-pen"></i></a>
                        </td>
                        <td>
                            <a href="/training/delete/id/<?php echo $_smarty_tpl->tpl_vars['value']->value['student_id'];?>
" onclick="return confirm('Bạn có muốn xóa không?')"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </tbody>

            </table>
        </div>
    </div>
</section>
<?php }
}
