<?php
/**
 * Create By Da4er.
 */
require "./lib/init.php";
header("Content-type:text/html;charset=utf-8");
if(empty($_POST)){
    echo "输入信息为空，请重新输入";
    header("Refresh:3;url=forget_password.php");
}
{
    if(isset($_POST['username'])&&isset($_POST['email'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $sql = "select * from user where username='$username' and email='$email'";
        $SqlObject = new Mysql();
        $UserData = $SqlObject->getRow($sql);
        if($UserData==""){
            echo "无此用户信息，请重新输入";
            header("Refresh:3;url=forget_password.php");
        }
        else{
            session_start();
            $_SESSION['update_user'] = $_POST['username'];
            header("Location:set_newpassword.php");
        }
    }
}