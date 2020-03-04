<?php
/**
 * Create By Da4er.
 */
require "./lib/init.php";
header("Content-type:text/html;charset=utf-8");
session_start();
if(!isset($_SESSION['user'])){
    echo "无权操作本界面";
    header("Refresh:3;url=login.php");
}
else{
    if(empty($_POST)){
        echo "操作参数不正确";
        header("Refresh:3;url=user_edit.php");
    }
    else{
        if(isset($_POST['user_email'])||isset($_POST['user_password'])||isset($_FILES['user_pic'])){
            if(!empty($_POST["user_email"])){
                $username = $_SESSION['user'];
                $email = $_POST["user_email"];
                $sql = "update user set email='$email' where username='$username'";
                $EmailSQL = new Mysql();
                $EmailSQL->Exec($sql);
                $rows = $EmailSQL->affectRows();
                if($rows==1){
                    echo "<script>alert('邮箱修改成功');</script>";
                    header("Refresh:2;url=user_edit.php");
                }
                else{
                    echo "邮箱修改失败，请重新修改";
                    header("Refresh:2;url=user_edit.php");
                }
            }
            if(!empty($_POST['user_password'])){
                $password = trim($_POST['user_password']);
                $password1 = trim($_POST['user_password2']);
                if($password!=$password1){
                    echo "两次密码不一致";
                    header("Refresh:2;url=user_edit.php");
                }
                else{
                    $username1 = $_SESSION["user"];
                    $password = md5($password);
                    $sql1 = "update user set password='$password' where username='$username1'";
                    $PassSQL = new Mysql();
                    $PassSQL->Exec($sql1);
                    $rows1 = $PassSQL->affectRows();
                    if($rows1==1){
                        echo "<script>alert('修改密码成功')</script>";
                        unset($_SESSION["user"]);
                        header("Refresh:2;url=login.php");
                    }
                    else{
                        echo "密码修改失败，请重新尝试";
                        header("Refresh:2;url=user_edit.php");
                    }
                }
            }
            if(!empty($_FILES['user_pic']['name'])){
                $pic_path = upFile();
                $username2 = $_SESSION['user'];
                $user_pic = $pic_path;
                $PicSQL = "update user set pic='$user_pic' where username='$username2'";
                $PICObject = new Mysql();
                $PICObject->Exec($PicSQL);
                $rows2 = $PICObject->affectRows();
                if($rows2==1){
                    echo "<script>alert('图片修改成功')</script>";
                    header("Refresh:2;url=user_edit.php");
                }
                else{
                    echo "图片修改失败，请重新尝试";
                    header("Refresh:2;url=user_edit.php");
                }
            }
        }
    }
}