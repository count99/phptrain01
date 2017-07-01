<?php
require_once('../Connections/shopping.php');
require_once('../login/admin_head.php');

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
$colname_Recordset1 = "-1";
if (isset($_GET['a_seq'])) {
  $colname_Recordset1 = $_GET['a_seq'];
}
mysql_select_db($database_shopping, $shopping);
$query_Recordset1 = sprintf("SELECT * FROM product WHERE a_seq = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $shopping) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$del="../images/".$row_Recordset1['a_pic'];

mysql_free_result($Recordset1);

if ((isset($_GET['a_seq'])) && ($_GET['a_seq'] != "")) {
  $deleteSQL = sprintf("DELETE FROM product WHERE a_seq=%s",
                       GetSQLValueString($_GET['a_seq'], "int"));
  mysql_select_db($database_shopping, $shopping);
  $Result1 = mysql_query($deleteSQL, $shopping) or die(mysql_error());
	unlink($del);
  $deleteGoTo = "p_admin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}




?>
