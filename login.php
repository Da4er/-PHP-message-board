<?php
/**
 * Create By Da4er.
 */
session_start();
if(isset($_SESSION['user'])){
    header("Location:user.php");
}
else{
    require "./view/login.html";
}