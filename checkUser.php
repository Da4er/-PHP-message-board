<?php
/**
 * Create By Da4er.
 */
require "./lib/init.php";
header("Content-type:text/html;charset=utf-8");
if(isset($_POST)){
    if(isset($_POST['username'])&&isset($_POST['password'])){
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $password = md5($password);
        $sql = "select * from user where username='$username' and password='$password'";
        $SqlObject = new Mysql();
        $UserData = $SqlObject->getRow($sql);
        if($UserData==""){
            echo "用户名或密码错误";
            header("Refresh:3;url=login.php");
        }
        else{
            session_start();
            $_SESSION['user'] = $UserData['username'];
            header("Location:user.php");
        }
    }
}
else{
    echo "登录信息为空";
    header("Refresh:3;url=login.php");
}