<?php
/* Smarty version 3.1.42, created on 2022-01-14 15:18:11
  from 'C:\xampp\htdocs\Zend\application\layouts\scripts\layout_admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.42',
  'unifunc' => 'content_61e131c3aa2f69_42461145',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8df032cf9706c0d56880e15ce2258dcb007e7423' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Zend\\application\\layouts\\scripts\\layout_admin.tpl',
      1 => 1642148278,
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
function content_61e131c3aa2f69_42461145 (Smarty_Internal_Template $_smarty_tpl) {
?><!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
    <title><?php echo $_smarty_tpl->tpl_vars['this']->value->Title;?>
</title>
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
    <link href="/css/style-responsive.css" rel="stylesheet"/>
    <!-- font CSS -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="/css/font.css" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />

    <link rel="stylesheet" href="/css/morris.css" type="text/css"/>
    <!-- calendar -->
    <link rel="stylesheet" href="/css/monthly.css">
    <!-- //calendar -->
    <!-- //font-awesome icons -->
    <?php echo '<script'; ?>
 src="/js/jquery2.0.3.min.js"><?php echo '</script'; ?>
>
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
<!--[if lte IE 8]><?php echo '<script'; ?>
 language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"><?php echo '</script'; ?>
><![endif]-->
<?php echo '<script'; ?>
 src="/js/jquery.scrollTo.js"><?php echo '</script'; ?>
>
<!-- morris JavaScript -->

<!-- calendar -->
<?php echo '<script'; ?>
 type="text/javascript" src="js/monthly.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
    $(window).load( function() {

        $('#mycalendar').monthly({
            mode: 'event',

        });

        $('#mycalendar2').monthly({
            mode: 'picker',
            target: '#mytarget',
            setWidth: '250px',
            startHidden: true,
            showTrigger: '#mytarget',
            stylePast: true,
            disablePast: true
        });

        switch(window.location.protocol) {
            case 'http:':
            case 'https:':
                // running on a server, should be good.
                break;
            case 'file:':
                alert('Just a heads-up, events will not work when run locally.');
        }

    });
<?php echo '</script'; ?>
>
<!-- //calendar -->
</body>
</html>
<?php }
}
