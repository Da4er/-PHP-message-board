<?php
/**
 * Create By Da4er.
 */
session_start();
unset($_SESSION["user"]);
header("Location:login.php");