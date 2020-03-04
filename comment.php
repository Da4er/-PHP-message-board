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
    if(empty($_POST)){
        echo "输入为空,请重新输入";
        header("Refresh:2;url=pub_commnent.php");
    }
    else{
        if(isset($_POST['username'])&&isset($_POST['comment_text'])){
            $username = trim($_POST["username"]);
            $text = trim($_POST["comment_text"]);
            $sql = "insert into comment(username,comment,pub_date) values('$username','$text ',now())";
            $pubSQL = new MySql();
            $pubSQL->Exec($sql);
            $rows = $pubSQL->affectRows();
            if($rows==1){
                //header("Location: user.php");
                echo "<script>alert('评论成功!');</script>";
                header("Location: user.php");
            }else{
                echo "评论失败,操作失败";
                header("Refresh:2;url=pub_comment.php");
            }
        }
    }
}