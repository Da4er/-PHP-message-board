<?php
/**
 * Create By Da4er.
 */
/**
 * 首先判断是否登录
 * 如果登录了，就进入个人页面
 */
session_start();
if(isset($_SESSION['user'])){
    header("Location:user.php");
}
else{
    require "./view/register.html";
}