<?php
/**
 * Create By Da4er.
 */
require "./lib/init.php";
header("Content-type:text/html;charset=utf-8");
if(isset($_POST)){
    if(isset($_POST['password'])&&isset($_POST['confirm_password'])){
        $pass1 = trim($_POST['password']);
        $pass2 = trim($_POST['confirm_password']);
        if($pass1!=$pass2){
            echo "两次密码不一致，请重新注册";
            header("refresh:3;url=register.php");
        }
        else{
            $username = $_POST["username"];
            $base_passowrd = $_POST["password"];
            $email = $_POST["email"];
            $picture = './upload/3.jpg';
            $passowrd = md5($base_passowrd);
            $sql = "insert into user(username,password,email,pic,join_date) values('$username','$passowrd','$email','$picture',DATE_FORMAT(NOW(),'%Y-%m-%d'))";
            $SqlObject = new Mysql();
            $SqlObject->Exec($sql);
            $rows = $SqlObject->affectRows();
            if($rows==1){
                session_start();
                $_SESSION['user']=$username;
                echo "注册成功正在跳转";
                header("Location:user.php");
            }
            else{
                echo $rows;
                echo "用户名或者邮件重复，请重新注册";
                header("Refresh:3;url=register.php");
            }
        }
    }
}
else{
    echo "注册信息为空";
    header("refresh:3;url=register.php");
}