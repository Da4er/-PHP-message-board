<?php
/**
 * Create By Da4er.
 */
require "./lib/init.php";
if (isset($_GET['username'])) {
    $username = $_GET['username'];
    $password = $_GET['password'];
    header("Content-type:text/html;charset=utf-8");
    $SqlObject = new Mysql();
    $pic = "./upload/3.jpg";
    $sql = "insert into user(username,password,email,pic,join_date) values ('$username','$password','6666','$pic',DATE_FORMAT(NOW(),'%Y-%m-%d'))";
    $SqlObject->Exec($sql);
    $rows = $SqlObject->affectRows();
    if ($rows == 1) {
        echo '1111';
    } else {
        echo '222';
    }
}