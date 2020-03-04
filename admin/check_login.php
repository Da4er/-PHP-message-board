<?php
/**
 * Create By Da4er.
 */
require "../lib/init.php";
header("Content-type:text/html;charset=utf-8");
if(empty($_POST)){
    echo "输入为空请重新输入";
    header("Refresh:2;url=login.php");
}
else{
    if(isset($_POST['username'])&&isset($_POST['password'])){
        $username = trim($_POST['username']);
        $password = md5(trim($_POST['password']));
        $sql = "select * from admin where username='$username' and password='$password'";
        $adminSQL = new Mysql();
        $adminData = $adminSQL->getRow($sql);
        if(empty($adminData)){
            echo "用户名或密码错误";
            header("Refresh:2;url=login.php");
        }
        else{
            setcookie("admin","admin",time()+1800);
            header("Location: admin.php");
        }
    }
    else{
        echo "用户名或密码没有被设置";
        header("Refresh:2;url=login.php");
    }
}