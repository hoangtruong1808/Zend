<?php
/* Smarty version 3.1.42, created on 2022-02-15 15:32:31
  from 'C:\laragon\www\Zend\application\layouts\scripts\layout\sidebar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.42',
  'unifunc' => 'content_620b651fb2f7f2_44778120',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ea40cc77475b48b1e6989f0bb8057fcad3a2aa99' => 
    array (
      0 => 'C:\\laragon\\www\\Zend\\application\\layouts\\scripts\\layout\\sidebar.tpl',
      1 => 1644913541,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_620b651fb2f7f2_44778120 (Smarty_Internal_Template $_smarty_tpl) {
?><aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="">
                        <i class="fas fa-home"></i>
                        <span>Trang chủ</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="/menu">
                        <i class="fa fa-book"></i>
                        <span>Quản lý nhóm tài sản</span>
                    </a>
                </li>
                <li>
                    <a href="/asset">
                        <i class="fas fa-cogs"></i>
                        <span>Quản lý tài sản</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="/user">
                        <i class="fa fa-user"></i>
                        <span>Quản lý người dùng</span>
                    </a>
                </li>
                <li>
                    <a href="/account">
                        <i class="fas fa-desktop"></i>
                        <span>Quản lý tài khoản</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="/login/logout">
                        <i class=" fa fa-bar-chart-o"></i>
                        <span>Đăng xuất</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- sidebar menu end-->
    </div>
</aside><?php }
}
