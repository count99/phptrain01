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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE maintain SET status=%s, title=%s WHERE a_seq=1",
                       GetSQLValueString($_POST['status'], "int"),
                       GetSQLValueString($_POST['textarea'], "text"),
                       GetSQLValueString($_POST['hiddenField'], "int"));

  mysql_select_db($database_shopping, $shopping);
  $Result1 = mysql_query($updateSQL, $shopping) or die(mysql_error());
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
<form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
  <table width="590" border="1" cellspacing="0" cellpadding="0">
    <tr>
      <td width="212" align="center">維護狀態</td>
      <td width="281" align="center">維護公告</td>
      <td width="89" align="center">操作</td>
    </tr>
    <tr>
      <td align="center"><label for="status"></label>
    <select name="status" id="status">
  	<option value="1" <?php if ($row_Recordset1['status']==1){?>selected="selected"<?php }?>>維護中</option>
	<option value="0"  <?php if ($row_Recordset1['status']==0){?>selected="selected"<?php }?>>正常使用</option>
		
      </select></td>
      <td align="center"><textarea name="textarea" id="textarea" cols="45" rows="5"><?php echo $row_Recordset1['title']; ?></textarea></td>
      <td align="center"><input type="submit" name="submit" id="submit" value="送出" /></td>
    </tr>
    <tr>
      <td align="center"><input name="hiddenField" type="hidden" id="hiddenField" value="<?php echo $row_Recordset1['status']; ?>" /></td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
</form>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
