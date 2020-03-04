<?php
/**
 * Create By Da4er.
 */
require "../lib/init.php";
header("Content-type:text/html;charset=utf-8");
if(!isset($_COOKIE['admin'])){
    header("Location:login.php");
}
else {
    if ($_COOKIE['admin'] == 'admin') {
        $sql = "select * from user order by id";
        $UserSQL = new Mysql();
        $userData=$UserSQL->getAll($sql);
        require "../view/admin_user_edit.html";
    }
    else{
        setcookie("admin","",time()-600);
        header("Location:login.php");
    }
}