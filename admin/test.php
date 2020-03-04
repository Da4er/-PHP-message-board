<?php
/**
 * Create By Da4er.
 */
require "../lib/init.php";
header("Content-type:text/html;charset=utf-8");
if(isset($_GET['username'])&&isset($_GET['password'])){
    $username = $_GET['username'];
    $password = md5($_GET['password']);
    $sql = "select * from admin where username='$username' and password='$password'";
    $testConnect = new Mysql();
    $testData = $testConnect->getRow($sql);
    if(!empty($testConnect)){
        echo $testData['username'];
    }
    else{
        echo "2222";
    }
}
