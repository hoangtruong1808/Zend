<?php
/* Smarty version 3.1.42, created on 2022-02-09 09:48:47
  from 'C:\laragon\www\Zend\application\layouts\scripts\asset\update.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.42',
  'unifunc' => 'content_62032b8f4b3fc1_22835330',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5177e52e3f99182fbad80321079b35b7c8b7f0f1' => 
    array (
      0 => 'C:\\laragon\\www\\Zend\\application\\layouts\\scripts\\asset\\update.tpl',
      1 => 1644374453,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62032b8f4b3fc1_22835330 (Smarty_Internal_Template $_smarty_tpl) {
?><style>
    #image-area {
        position: relative;
        width: 100%;
        height: 100%;
        margin-left: 26%;
    }
    #image-area img{
        margin-top: 10px; ;
    }
    #remove-image-btn{
        position: absolute;
        top: 0%;
        left: 95%;
        transform: translate(-100%, -200%);
        -ms-transform: translate(-50%, -50%);
        background-color: #555;
        color: white;
        font-size: 11px;
        padding: 1px 4px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
    }
</style>
<section>
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
" enctype="multipart/form-data">
            <div class="form-group">
                <label class="col-sm-3 control-label required-label">Tên</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['asset']->value['name'];
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label required-label">Mã</label>
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
" <?php echo $_smarty_tpl->tpl_vars['value']->value['group_id'] == $_smarty_tpl->tpl_vars['asset']->value['asset_group_id'] ? 'selected="selected"' : '';?>
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
                    <input type="text" class="form-control" name="configuration"  value="<?php ob_start();
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
                <div class="row">
                    <label class="col-sm-3 control-label required-label">Hình ảnh</label>
                    <div class="col-sm-6">
                        <input type="file" class="form-control" id="imgInp" name="image" accept="image/png, image/gif, image/jpeg">
                    </div>
                </div>
                <div class="row">
                    <span id="image-area">
                        <img src="/images/asset_images/<?php echo $_smarty_tpl->tpl_vars['asset']->value['image'];?>
" id="blah" width="150px" height="120px">
                        <div id="remove-image-btn"><i class="fas fa-times"></i></div>
                    </span>
                </div>
            </div>
            <button type="submit" class="btn btn-success" style="margin-left: 47%">Cập nhật</button>
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
                    if (value.fileSizeTooBig) {
                        $(this).parent().append('<div class="err_input">' + value.fileSizeTooBig + '</div>')
                    }
                    if (value.fileUploadErrorNoFile) {
                        $(this).parent().append('<div class="err_input">' + value.fileUploadErrorNoFile + '</div>')
                    }
                }
            });
        });
        <?php }?>

    });
<?php echo '</script'; ?>
>

<?php }
}
