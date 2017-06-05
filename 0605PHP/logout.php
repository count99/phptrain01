<?php
//開啟session
session_start();
//清空SESSION變數
$_SESSION['myid'] = NULL;
//取消session變數
unset($_SESSION['MM_Username']);
header("Location: admin";
}
?>
