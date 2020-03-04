<?php
/**
 * Create By Da4er.
 */
session_start();
if(!isset($_COOKIE['admin'])){
    require "../view/admin_login.html";
}
else{
    if($_SESSION['admin']=='admin'){
        header("Location:admin.php");
    }
    else{
        setcookie("admin","",time()-600);
        header("Location:login.php");
    }
}