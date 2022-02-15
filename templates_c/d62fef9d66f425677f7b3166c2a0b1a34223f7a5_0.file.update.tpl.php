<?php
/* Smarty version 3.1.42, created on 2022-02-08 14:00:12
  from 'C:\laragon\www\Zend\application\layouts\scripts\user\update.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.42',
  'unifunc' => 'content_620214fc361e20_21492759',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd62fef9d66f425677f7b3166c2a0b1a34223f7a5' => 
    array (
      0 => 'C:\\laragon\\www\\Zend\\application\\layouts\\scripts\\user\\update.tpl',
      1 => 1644303610,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_620214fc361e20_21492759 (Smarty_Internal_Template $_smarty_tpl) {
?><style>

</style>
<section>
    <header class="panel-heading">
        <div class="col-sm-12">
            Cập nhật người dùng
        </div>
    </header>
    <div class="table-agile-info">

        <form class="form-horizontal bucket-form" method="POST" action="/user/update/id/<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
" enctype="multipart/form-data">
            <div class="form-group">
                <label class="col-sm-3 control-label required-label">Họ tên</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['name'];?>
">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label required-label">Số điện thoại</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="phone" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['phone'];?>
">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label required-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
">
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
" <?php echo $_smarty_tpl->tpl_vars['value']->value['role_id'] == $_smarty_tpl->tpl_vars['user']->value['role_id'] ? 'selected="selected"' : '';?>
 ><?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
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
                    <span id="image-area">
                        <img src="/images/user_images/<?php echo $_smarty_tpl->tpl_vars['user']->value['image'];?>
" id="blah" height="120px">
                        <div id="remove-image-btn"><i class="fas fa-times"></i></div>
                    </span
                </div>
            </div>
            <button type="submit" class="btn btn-success" style="margin-left: 46%">Cập nhật</button>
        </form>
    </div>

</section>

<?php echo '<script'; ?>
>
    $(document).ready(function() {

        function RemoveImageClick(){
            $('#remove-image-btn').click(function() {
                $('#image-area img').remove();
                $('#remove-image-btn').remove();
                $('#imgInp').val('');
            });
        }

        RemoveImageClick();

        $('#imgInp').change(function(){
            $('.err_input').remove();
            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#image-area img').remove();
                    $('#remove-image-btn').remove();
                    $('#image-area').append('<img src="' + e.target.result +'" id="blah" width="150px" height="120px">' + '<div href="" id="remove-image-btn"><i class="fas fa-times"></i></div>');
                    RemoveImageClick()
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
