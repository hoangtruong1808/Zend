<?php
/* Smarty version 3.1.42, created on 2022-01-14 11:12:01
  from 'C:\xampp\htdocs\Zend\application\layouts\scripts\layout.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.42',
  'unifunc' => 'content_61e0f811a00906_60953537',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3725de278d8a725e056c7182d65462fe8053205a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Zend\\application\\layouts\\scripts\\layout.tpl',
      1 => 1642133464,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61e0f811a00906_60953537 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
<head>
    <title><?php echo $_smarty_tpl->tpl_vars['this']->value->title;?>
</title>
</head>
<body>
<?php echo ($_smarty_tpl->tpl_vars['this']->value->layout()->content);?>

</body>
</html>
<?php }
}
