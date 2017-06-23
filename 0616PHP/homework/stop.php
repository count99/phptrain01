<?php require_once('Connections/shopping.php'); 
//include_once('login/admin_head.php');
?>
<?php
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

mysql_select_db($database_shopping, $shopping);
$query_Recordset1 = "SELECT * FROM maintain";
$Recordset1 = mysql_query($query_Recordset1, $shopping) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>


</head>

<body>

<table width="624" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="250" align="center" valign="middle"><?php if ($row_Recordset1['status']==1){
			echo "<h1 style='color:red; font-size:4em'>目前系統維護中</h1>";
			}
	?>
    </td>
  </tr>
  <tr>
    <td height="398" align="center" valign="middle">
      <?php if ($row_Recordset1['status']==1){
					echo nl2br($row_Recordset1['title']);
					}
					?>
	</td>
  </tr>
</table>
<h1>&nbsp;</h1>
</body>
</html><?php
mysql_free_result($Recordset1);
?>