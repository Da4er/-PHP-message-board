<?php
/**
 * Create By Da4er.
 */
session_start();
if(!$_SESSION['update_user']){
    header("Location:forget_password.php");
}
else{
    require "./view/set_newpassword.html";
}