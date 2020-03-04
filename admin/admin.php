<?php
/**
 * Create By Da4er.
 */
require "../lib/init.php";
header("Content-type:text/html;charset=utf-8");
if(!isset($_COOKIE['admin'])){
    header("Location:login.php");
}
else{
    if($_COOKIE['admin']=='admin'){
        $username = $_COOKIE['admin'];
        $sql = "select * from admin where username='$username'";
        $adminSQl = new Mysql();
        $adminData = $adminSQl->getRow($sql);
        require "../view/admin_index.html";
    }
    else{
        setcookie("admin","",time()-600);
        header('Location: login.php');
    }
}