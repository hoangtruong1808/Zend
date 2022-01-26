<?php
/* Smarty version 3.1.42, created on 2022-01-26 14:39:19
  from 'C:\laragon\www\Zend\application\layouts\scripts\layout_admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.42',
  'unifunc' => 'content_61f0faa7048ac2_05534779',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'af031711e7a9a59cc67e1c1877cdb01ec47896ca' => 
    array (
      0 => 'C:\\laragon\\www\\Zend\\application\\layouts\\scripts\\layout_admin.tpl',
      1 => 1643182757,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout/header.tpl' => 1,
    'file:layout/sidebar.tpl' => 1,
    'file:layout/footer.tpl' => 1,
  ),
),false)) {
function content_61f0faa7048ac2_05534779 (Smarty_Internal_Template $_smarty_tpl) {
?><!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
    <title>Quản lý tài sản</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <?php echo '<script'; ?>
 type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } <?php echo '</script'; ?>
>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="/css/bootstrap.min.css" >
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="/css/style.css" rel='stylesheet' type='text/css' />
    <link href="/css/mystyle.css" rel='stylesheet' type='text/css' />
    <link href="/css/style-responsive.css" rel="stylesheet"/>
    <!-- font CSS -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="/css/font.css" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href=https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css />


    <link rel="stylesheet" href="/css/morris.css" type="text/css"/>
    <!-- calendar -->
    <link rel="stylesheet" href="/css/monthly.css">


    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.5.1.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"><?php echo '</script'; ?>
>

    <!-- //calendar -->
    <!-- //font-awesome icons -->

    <?php echo '<script'; ?>
 src="/js/raphael-min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/js/morris.js"><?php echo '</script'; ?>
>
</head>
<body>
<section id="container">
    <!--header start-->
   <?php $_smarty_tpl->_subTemplateRender("file:layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <!--header end-->
    <!--sidebar start-->
        <?php $_smarty_tpl->_subTemplateRender("file:layout/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <!-- //market-->
            <?php echo $_smarty_tpl->tpl_vars['this']->value->layout()->content;?>

        </section>
        <!-- footer -->
        <?php $_smarty_tpl->_subTemplateRender("file:layout/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <!-- / footer -->
    </section>
    <!--main content end-->

    <?php echo '<script'; ?>
>
        //nút all check được chọn
        $("#all-checked").change(function(){
            if(this.checked) {
                $('.delete_item_check').prop('checked', true);
                $('.delete_item_check').change(function(){
                    $('#all-checked').prop('checked', false);
                })
            }
            else{
                $('.delete_item_check').prop('checked', false);
            }
        })
    <?php echo '</script'; ?>
>
</section>
<?php echo '<script'; ?>
 src="/js/bootstrap.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/js/jquery.dcjqaccordion.2.7.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/js/scripts.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/js/jquery.slimscroll.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/js/jquery.nicescroll.js"><?php echo '</script'; ?>
>
<!--[if lte IE 8]>
<?php echo '<script'; ?>
 language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"><?php echo '</script'; ?>
><![endif]-->
<?php echo '<script'; ?>
 src="/js/jquery.scrollTo.js"><?php echo '</script'; ?>
>
<!-- morris JavaScript -->
<?php echo '<script'; ?>
>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
<?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
