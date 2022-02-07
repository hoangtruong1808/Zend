<?php
/* Smarty version 3.1.42, created on 2022-02-07 14:05:18
  from 'C:\laragon\www\Zend\application\layouts\scripts\asset\detail.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.42',
  'unifunc' => 'content_6200c4ae9a0359_13707068',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8b2f0e475511376224a289e5c6d83a9071f5a149' => 
    array (
      0 => 'C:\\laragon\\www\\Zend\\application\\layouts\\scripts\\asset\\detail.tpl',
      1 => 1644217516,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6200c4ae9a0359_13707068 (Smarty_Internal_Template $_smarty_tpl) {
?><section>
    <header class="panel-heading">
        <div class="col-sm-12">
            Chi tiết tài sản
        </div>
    </header>
    <div class="table-agile-info">
        <div class="row">
            <div class="col-sm-4 gallery-grids-left">
                <div class="gallery-grid">
                    <img src="/images/asset_images/<?php echo $_smarty_tpl->tpl_vars['asset']->value['image'];?>
" alt="" />
                </div>
            </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-7 stats-info margin-box" >
                <div class="stats-info-agileits">
                    <div>
                        <ul class="list-unstyled">
                            <li>
                                <div class="form-group has-success">
                                    <label class="col-lg-5 control-label">Tên tài sản</label>
                                    <div class="col-lg-7 input-summary-info">
                                        <div class="form-control"><?php echo $_smarty_tpl->tpl_vars['asset']->value['name'];?>
</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form-group has-success">
                                    <label class="col-lg-5 control-label">Mã tài sản</label>
                                    <div class="col-lg-7 input-summary-info">
                                        <div class="form-control"><?php echo $_smarty_tpl->tpl_vars['asset']->value['code'];?>
</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form-group has-success">
                                    <label class="col-lg-5 control-label">Nhóm tài sản</label>
                                    <div class="col-lg-7 input-summary-info">
                                        <div class="form-control"><?php echo $_smarty_tpl->tpl_vars['asset']->value['group_name'];?>
</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form-group has-success">
                                    <label class="col-lg-5 control-label">Cấu hình</label>
                                    <div class="col-lg-7 input-summary-info">
                                        <div class="form-control"><?php echo $_smarty_tpl->tpl_vars['asset']->value['configuration'];?>
</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form-group has-success">
                                    <label class="col-lg-5 control-label">Tình trạng</label>
                                    <div class="col-lg-7 input-summary-info">
                                        <div class="form-control"><?php echo $_smarty_tpl->tpl_vars['asset']->value['status_name'];?>
</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form-group has-success">
                                    <label class="col-lg-5 control-label">Trạng thái</label>
                                    <div class="col-lg-7 input-summary-info">
                                        <div class="form-control"><?php echo $_smarty_tpl->tpl_vars['asset']->value['state_name'];?>
</div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<?php }
}
