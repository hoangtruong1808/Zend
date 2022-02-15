<?php
/* Smarty version 3.1.42, created on 2022-02-08 14:59:14
  from 'C:\laragon\www\Zend\application\layouts\scripts\user\add.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.42',
  'unifunc' => 'content_620222d2e5bc06_14727940',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '552ff4320b305219482bc779b07029cd00cb5d50' => 
    array (
      0 => 'C:\\laragon\\www\\Zend\\application\\layouts\\scripts\\user\\add.tpl',
      1 => 1644307153,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_620222d2e5bc06_14727940 (Smarty_Internal_Template $_smarty_tpl) {
?><style>

</style>
<section>
    <header class="panel-heading">
        <div class="col-sm-12">
            Thêm người dùng
        </div>
    </header>
    <div class="table-agile-info">

        <form class="form-horizontal bucket-form" method="POST" action="/user/add" enctype="multipart/form-data">
            <div class="form-group">
                <label class="col-sm-3 control-label required-label">Họ tên</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label required-label">Số điện thoại</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="phone">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label required-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label required-label">Mật khẩu</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" name="password">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label required-label" >Vai trò</label>
                <div class="col-sm-6">
                    <select class="form-control m-bot15" name="role">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['role_list']->value, 'value', false, 'key');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['value']->value['role_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
</option>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-3 control-label required-label">Hình ảnh</label>
                    <div class="col-sm-6">
                        <input type="file" class="form-control" id="imgInp" name="image" accept="image/png, image/gif, image/jpeg">
                    </div>
                </div>
                <div class="row">
                    <span id="image-area"></span
                </div>
            </div>
            <button type="submit" class="btn btn-success" style="margin-left: 48%">Thêm</button>
        </form>
    </div>

</section>

<?php echo '<script'; ?>
>
    $(document).ready(function() {

        $('#imgInp').change(function(){
            $('.err_input').remove();
            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#image-area img').remove();
                    $('#remove-image-btn').remove();
                    $('#image-area').append('<img src="' + e.target.result +'" id="blah" height="120px">' + '<div href="" id="remove-image-btn"><i class="fas fa-times"></i></div>');
                    $('#remove-image-btn').click(function() {
                        $('#image-area img').remove();
                        $('#remove-image-btn').remove();
                        $('#imgInp').val('');
                    });
                }

                reader.readAsDataURL(this.files[0]);

            }
        });

        <?php if ((isset($_smarty_tpl->tpl_vars['error_input']->value))) {?>
            var err_input = <?php echo json_encode($_smarty_tpl->tpl_vars['error_input']->value);?>
;
            console.log(err_input);
            $.each( err_input, function(key, value) {
                $('.form-control').each(function () {
                    if ($(this).prop('name') == key) {
                        $(this).parent().append('<div class="err_input">'+Object.values(value)+'</div>');
                    }
                });
            });
        <?php }?>

    });
<?php echo '</script'; ?>
><?php }
}
