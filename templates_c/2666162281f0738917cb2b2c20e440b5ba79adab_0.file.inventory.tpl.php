<?php
/* Smarty version 3.1.42, created on 2022-02-15 13:56:46
  from 'C:\laragon\www\Zend\application\layouts\scripts\asset\inventory.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.42',
  'unifunc' => 'content_620b4eaeee55f6_07390383',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2666162281f0738917cb2b2c20e440b5ba79adab' => 
    array (
      0 => 'C:\\laragon\\www\\Zend\\application\\layouts\\scripts\\asset\\inventory.tpl',
      1 => 1644908204,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_620b4eaeee55f6_07390383 (Smarty_Internal_Template $_smarty_tpl) {
?><section>
    <header class="panel-heading">
        <div class="col-sm-12">
            Kiểm kê tài sản
        </div>
    </header>
    <div class="table-agile-info">

        <form class="form-horizontal bucket-form" method="POST" action="/asset/inventory" enctype="multipart/form-data">
            <div class="form-group">
                <label class="col-sm-3 control-label required-label">Người kiểm kê</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="inventory_person">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label required-label">Ngày kiểm kê</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="inventory_date">
                </div>
            </div>
        </form>
        <div class="table-responsive" style="overflow-y: scroll; max-height:600px; overflow-x:scroll;">
            <table class="table table-striped table-bordered tbl-dgrr-physical" >
                <thead>
                    <tr>
                        <th colspan="7" style="text-align: center">CHI TIẾT KIỂM KÊ</th>
                    </tr>
                    <tr>
                        <th>
                            Tên tài sản
                        </th>
                        <th>
                            Mã tài sản
                        </th>
                        <th>
                            Nhóm tài sản
                        </th>
                        <th>
                            Tình trạng
                        </th>
                        <th>
                            Trạng thái
                        </th>
                        <th>
                            Người đang sử dụng
                        </th>
                        <th>
                            Tình trạng sau khi kiểm kê
                        </th>
                        <th>
                            Ghi chú
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['asset_list']->value, 'value', false, 'key');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
                    <tr id="row<?php echo $_smarty_tpl->tpl_vars['value']->value['asset_id'];?>
">
                        <td style="color:black" ><?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
</td>
                        <td style="color:black" ><?php echo $_smarty_tpl->tpl_vars['value']->value['code'];?>
</td>
                        <td style="color:black" ><?php echo $_smarty_tpl->tpl_vars['value']->value['asset_group'];?>
</td>
                        <td style="color:black" ><?php echo $_smarty_tpl->tpl_vars['value']->value['status_name'];?>
</td>
                        <td style="color:black" ><?php echo $_smarty_tpl->tpl_vars['value']->value['state_name'];?>
</td>
                        <td></td>
                    </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </tbody>
            </table>

        </div>
        <button type="submit" class="btn btn-success" style="margin-left: 48%">Kiểm kê</button>
    </div>
</section>
<?php }
}
