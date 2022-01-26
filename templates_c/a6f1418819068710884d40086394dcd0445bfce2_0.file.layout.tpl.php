<?php
/* Smarty version 3.1.42, created on 2022-01-14 10:52:52
  from 'C:\xampp\htdocs\Zend\application\layouts\scripts\layout.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.42',
  'unifunc' => 'content_61e0f3943adfe3_76901990',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a6f1418819068710884d40086394dcd0445bfce2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Zend\\application\\layouts\\scripts\\layout.tpl',
      1 => 1642130766,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61e0f3943adfe3_76901990 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>

<html>
<head>
    <title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_107998266061e0f3943a5dd1_45016492', 'title');
?>
</title>
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_140756265561e0f3943a8aa8_07896076', 'head');
?>

</head>
<body>
<?php echo ($_smarty_tpl->tpl_vars['this']->value->layout()->content);?>

</body>
</html>
<?php }
/* {block 'title'} */
class Block_107998266061e0f3943a5dd1_45016492 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_107998266061e0f3943a5dd1_45016492',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Default Page Title<?php
}
}
/* {/block 'title'} */
/* {block 'head'} */
class Block_140756265561e0f3943a8aa8_07896076 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_140756265561e0f3943a8aa8_07896076',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'head'} */
}
