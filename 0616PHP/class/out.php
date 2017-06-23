<?php
session_start();//開啟SESSION
$_SESSION['sell'] = NULL;//清空SESSOIN變數
unset($_SESSION['sell']);//取消SESSOIN變數
//header("Location: index.php");//跳頁
?>