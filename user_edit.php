<?php
/**
 * Create By Da4er.
 */
require "./lib/init.php";
header("Content-type:text/html;charset=utf-8");
session_start();
if(!$_SESSION['user']){
    echo "无权操作本界面";
    header("Refresh:3;url=login.php");
}
else{
    $username = $_SESSION["user"];
    $sql = "select * from user where username = '$username'";
    $UserSql = new Mysql();
    $userData = $UserSql->getRow($sql);
    require  "./view/user_edit.html";
}