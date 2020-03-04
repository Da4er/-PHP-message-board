<?php
/**
 * Create By Da4er.
 */
require "./lib/init.php";
header("Content-type:text/html;charset=utf-8");
session_start();
if(!isset($_SESSION['user'])){
    echo "无权操作";
    header("Refresh:2;url=login.php");
}
else{
    if(empty($_GET)){
        echo "参数为空";
        header("Refresh:2;url=user.php");
    }
    else{
        if(isset($_GET['id'])){
            $id = trim($_GET['id']);
            $sql = "delete from comment where id='$id'";
            $deleteSQL = new MySql();
            $deleteSQL->Exec($sql);

            $rows = $deleteSQL->affectRows();
            if($rows==1){

                //header("Location: user.php");
                echo "<script>alert('删除成功!');</script>";
                header("Refresh:1;url=user.php");

            }else{
                echo "删除失败,操作失败";
                header("Refresh:2;url=user.php");
            }
        }
    }
}