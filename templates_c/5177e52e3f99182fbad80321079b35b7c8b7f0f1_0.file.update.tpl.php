<?php
/* Smarty version 3.1.42, created on 2022-01-26 14:56:55
  from 'C:\laragon\www\Zend\application\layouts\scripts\asset\update.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.42',
  'unifunc' => 'content_61f0fec76f2a59_24258876',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5177e52e3f99182fbad80321079b35b7c8b7f0f1' => 
    array (
      0 => 'C:\\laragon\\www\\Zend\\application\\layouts\\scripts\\asset\\update.tpl',
      1 => 1643183814,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61f0fec76f2a59_24258876 (Smarty_Internal_Template $_smarty_tpl) {
?><section>
    <header class="panel-heading">
        <div class="col-sm-12">
            Cập nhật tài sản
        </div>
    </header>
    <div class="table-agile-info">

        <form class="form-horizontal bucket-form" method="POST" action="/asset/update/id/<?php ob_start();
echo $_smarty_tpl->tpl_vars['asset']->value['asset_id'];
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
">
            <div class="form-group">
                <label class="col-sm-3 control-label">Tên123</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['asset']->value['name'];
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Mã</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="code" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['asset']->value['code'];
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>
">
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
"  <?php echo $_smarty_tpl->tpl_vars['value']->value['group_id'] == $_smarty_tpl->tpl_vars['asset']->value['asset_group_id'] ? 'selected="selected"' : '';?>
><?php echo $_smarty_tpl->tpl_vars['value']->value['description'];?>
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
                    <input type="text" class="form-control" name="configuration" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['asset']->value['configuration'];
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>
">
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
" <?php echo $_smarty_tpl->tpl_vars['value']->value['status_id'] == $_smarty_tpl->tpl_vars['asset']->value['status'] ? 'selected="selected"' : '';?>
><?php echo $_smarty_tpl->tpl_vars['value']->value['status_name'];?>
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
"  <?php echo $_smarty_tpl->tpl_vars['value']->value['state_id'] == $_smarty_tpl->tpl_vars['asset']->value['state'] ? 'selected="selected"' : '';?>
><?php echo $_smarty_tpl->tpl_vars['value']->value['state_name'];?>
</option>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-success" style="margin-left: 47%">Cập nhật</button>
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
                }
            });
        });
        <?php }?>
    });
<?php echo '</script'; ?>
><?php }
}
