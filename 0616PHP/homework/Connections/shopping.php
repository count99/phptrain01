<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_shopping = "localhost";
$database_shopping = "shopping";
$username_shopping = "root";
$password_shopping = "12345678";
$shopping = mysql_pconnect($hostname_shopping, $username_shopping, $password_shopping) or trigger_error(mysql_error(),E_USER_ERROR); 
?>