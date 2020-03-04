<?php
/**
 * Create By Da4er.
 */
require "./lib/init.php";
header("Content-type:text/html;charset=utf-8");
session_start();
if(!isset($_SESSION["update_user"])){
    header('Location: forget_pass.php');
}else {
    if (empty($_POST)) {
        echo "密码输入为空，请重新输入";
        header("Refresh:3;url=set_newpassowrd.php");
    } else {
        if (isset($_POST['password']) && isset($_POST['confirm_password'])) {
            $password = trim($_POST['password']);
            $cofirm_password = trim($_POST['confirm_password']);
            if ($password != $cofirm_password) {
                echo "两次输入密码不一致，请重新输入";
                header("Refresh:3;url=set_newpassword.php");
            } else {
                $password = md5($password);
                $username = $_SESSION['update_user'];
                $sql = "update user set password='$password' where username='$username'";
                $UpdateSql = new Mysql();
                $UpdateSql->Exec($sql);
                $rows = $UpdateSql->affectRows();
                if ($rows == 1) {
                    unset($_SESSION['update_user']);
                    echo "密码修改成功";
                    header("Refresh:3;url=login.php");
                } else {
                    echo "密码没有修改，请重试";
                    header("Refresh:3;url=set_newpassword.php");
                }
            }
        }
    }
}