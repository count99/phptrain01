<?php include_once('admin_head.php'); 

$_SESSION['myid'] = NULL;//清空SESSOIN變數
unset($_SESSION['myid']);//取消SESSOIN變數
$_SESSION['mylv'] = NULL;//清空SESSOIN變數
unset($_SESSION['mylv']);//取消SESSOIN變數
header("Location: login.php");//跳頁
?>