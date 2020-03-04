<?php
/**
 * Create By Da4er.
 */

require "./lib/init.php";
header("Content-type:text/html;charset=utf-8");
session_start();
$sql_pageCount = "select count(*) from comment order by id desc";
$curr_page = isset($_GET["page"]) ? trim($_GET["page"]) : 1;
$pageCountSQL = new MySql();
$pageCount = $pageCountSQL->getOne($sql_pageCount);
if ($curr_page <= 0) {
    $curr_page = 1;
}

if ($curr_page >= $pageCount) {
    $curr_page = $pageCount;
}

$pageData = getPage($pageCount, $curr_page);
$start = ($curr_page - 1) * 5;
$len = 5;
$sql_comment = "select * from comment order by id desc limit $start,$len";
$commentSQL = new MySql();
$commentData = $commentSQL->getAll($sql_comment);
require "./view/message.html";






