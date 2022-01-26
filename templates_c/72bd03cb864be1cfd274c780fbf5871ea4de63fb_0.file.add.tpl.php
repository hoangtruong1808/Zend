<?php
/* Smarty version 3.1.42, created on 2022-01-26 15:38:41
  from 'C:\laragon\www\Zend\application\layouts\scripts\asset\add.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.42',
  'unifunc' => 'content_61f1089187be34_78518534',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '72bd03cb864be1cfd274c780fbf5871ea4de63fb' => 
    array (
      0 => 'C:\\laragon\\www\\Zend\\application\\layouts\\scripts\\asset\\add.tpl',
      1 => 1643186320,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61f1089187be34_78518534 (Smarty_Internal_Template $_smarty_tpl) {
?><section>
    <header class="panel-heading">
        <div class="col-sm-12">
            Thêm tài sản
        </div>
    </header>
    <div class="table-agile-info">

        <form class="form-horizontal bucket-form" method="POST" action="/asset/add">
            <div class="form-group">
                <label class="col-sm-3 control-label">Tên</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Mã</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="code">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Nhóm tài sản</label>
                <div class="col-sm-6">
                    <select class="form-control m-bot15" name="asset_group_id">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menu_list']->value, 'value', false, 'key');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['value']->value['group_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value['description'];?>
</option>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Cấu hình</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="configuration">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Tình trạng</label>
                <div class="col-sm-6">
                    <select class="form-control m-bot15" name="status">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['status_list']->value, 'value', false, 'key');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['value']->value['status_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value['status_name'];?>
</option>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Trạng thái</label>
                <div class="col-sm-6">
                    <select class="form-control m-bot15" name="state">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['state_list']->value, 'value', false, 'key');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['value']->value['state_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value['state_name'];?>
</option>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-success" style="margin-left: 48%">Thêm</button>
        </form>
    </div>

</section>

<?php echo '<script'; ?>
>
    $(document).ready(function() {
        <?php if ((isset($_smarty_tpl->tpl_vars['error_input']->value))) {?>
        var err_input = <?php echo json_encode($_smarty_tpl->tpl_vars['error_input']->value);?>
;
        console.log(err_input);
        $.each( err_input, function(key, value) {
            $('.form-control').each(function () {
                if ($(this).prop('name') == key) {
                    if (value.isEmpty){
                        $(this).parent().append('<div class="err_input">'+value.isEmpty+'</div>');
                    }
                    if (value.stringLengthTooLong) {
                        $(this).parent().append('<div class="err_input">' + value.stringLengthTooLong + '</div>')
                    }
                    if (value.stringLengthTooShort) {
                        $(this).parent().append('<div class="err_input">' + value.stringLengthTooShort + '</div>')
                    }
                    if (value.recordFound) {
                        $(this).parent().append('<div class="err_input">' + value.recordFound + '</div>')
                    }
                }
            });
        });
        <?php }?>
    });
<?php echo '</script'; ?>
><?php }
}
