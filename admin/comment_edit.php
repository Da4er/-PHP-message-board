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
        $sql = "select * from comment order by id desc";
        $commentSQL = new Mysql();
        $commentData = $commentSQL->getAll($sql);
//        var_dump($commentData);
        require "../view/admin_message_edit.html";
    }
    else{
        setcookie("admin","",time()-600);
        header("Location:login.php");
    }
}