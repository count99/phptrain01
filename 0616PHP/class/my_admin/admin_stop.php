<?php require_once('../Connections/myshop.php'); ?>
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
  $updateSQL = sprintf("UPDATE stop SET stop_now=%s, stop_word=%s",
                       GetSQLValueString($_POST['select'], "int"),
                       GetSQLValueString($_POST['textfield'], "text"));

  mysql_select_db($database_myshop, $myshop);
  $Result1 = mysql_query($updateSQL, $myshop) or die(mysql_error());

  $updateGoTo = "admin_stop.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

mysql_select_db($database_myshop, $myshop);
$query_Recordset1 = "SELECT * FROM stop";
$Recordset1 = mysql_query($query_Recordset1, $myshop) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body><form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
<table width="800" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="113" align="center">目前是否維護中</td>
    <td width="623" align="center">維護公告</td>
    <td width="56" align="center">操作</td>
  </tr>
  <tr>
    <td align="center"><label for="select"></label>
      <select name="select" id="select">
        <option value="1" <?php if($row_Recordset1['stop_now']==1){?>selected="selected"<?php }?>>是</option>
        <option value="0" <?php if($row_Recordset1['stop_now']==0){?>selected="selected"<?php }?>>否</option>
      </select></td>
    <td align="center"><label for="textfield"></label>
      <textarea name="textfield" cols="80" rows="5" id="textfield"><?php echo $row_Recordset1['stop_word']; ?></textarea></td>
    <td align="center">
      <input type="submit" name="button" id="button" value="送出" />
</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
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
