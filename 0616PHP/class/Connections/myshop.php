<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_myshop = "localhost";
$database_myshop = "shop";
$username_myshop = "root";
$password_myshop = "12345";
$myshop = mysql_pconnect($hostname_myshop, $username_myshop, $password_myshop) or trigger_error(mysql_error(),E_USER_ERROR); 
?>