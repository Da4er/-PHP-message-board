<?php
/**
 * Create By Da4er.
 */
require "./lib/init.php";
header("Content-type:text/html;charset=utf-8");
    session_start();
    if(!isset($_SESSION['user'])){
        header("Location:login.php");
    }
    else{
        $username = $_SESSION['user'];
        $sql = "select * from user where username='$username'";
        $SqlObject = new Mysql();
        $userData = $SqlObject->getRow($sql);
        $sql_PageCount = "select count(*) from comment where username='$username' order by id desc";
        $page = isset($_GET["page"])?trim($_GET['page']):1;
        $SqlCountObject = new Mysql();
        $MaxCount = $SqlCountObject->getOne($sql_PageCount);
        if($page<=0){
            $page = 1;
        }
        if($page>=$MaxCount){
            $page = $MaxCount;
        }
        $pageData = getPage($MaxCount,$page);
        $start = ($page-1)*5;
        $len = 5;
        $sql_comment = "select * from comment where username='$username' order by id desc limit $start,$len";
        $commentSQL = new MySql();
        $commentData = $commentSQL->getAll($sql_comment);
        require "./view/user.html";
    }
