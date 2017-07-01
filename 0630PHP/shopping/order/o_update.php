<?php require_once('../Connections/shopping.php'); ?>
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
$record_ip = $_SERVER['REMOTE_ADDR'];
$get_time = strtotime("+6hours");
$time_now = date("Y-m-d H:i:s", $get_time);
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE order_list SET payment_number=%s, product_number=%s, o_amount=%s WHERE o_seq=%s",
                       GetSQLValueString($_POST['payment_number'], "text"),
                       GetSQLValueString($_POST['product_number'], "text"),
                       GetSQLValueString($_POST['o_amount'], "int"),
                       GetSQLValueString($_POST['o_seq'], "int"),
					   GetSQLValueString($record_ip, "text"),
					   GetSQLValueString($time_now, "date")
					   );

  mysql_select_db($database_shopping, $shopping);
  $Result1 = mysql_query($updateSQL, $shopping) or die(mysql_error());

  $updateGoTo = "o_admin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_GET['o_seq'])) {
  $colname_Recordset1 = $_GET['o_seq'];
}
mysql_select_db($database_shopping, $shopping);
$query_Recordset1 = sprintf("SELECT * FROM order_list WHERE o_seq = %s", GetSQLValueString($colname_Recordset1, "int"));
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
  <table width="601" border="3" cellspacing="1" cellpadding="0">
    <tr>
      <td width="168" align="center" valign="middle">帳單號碼</td>
      <td width="168" align="center" valign="middle">產品編號</td>
      <td width="168" align="center" valign="middle">數量</td>
      <td width="78" align="center" valign="middle">操作</td>
    </tr>
    <tr>
      <td align="center" valign="middle"><label for="payment_number"></label>
        <input name="payment_number" type="text" id="payment_number" value="<?php echo $row_Recordset1['payment_number']; ?>" /></td>
      <td align="center" valign="middle"><label for="product_number"></label>
        <input name="product_number" type="text" id="product_number" value="<?php echo $row_Recordset1['product_number']; ?>" /></td>
      <td align="center" valign="middle"><label for="o_amount"></label>
        <input name="o_amount" type="text" id="o_amount" value="<?php echo $row_Recordset1['o_amount']; ?>" /></td>
      <td align="center" valign="middle"><input type="submit" name="submit" id="submit" value="送出" /></td>
    </tr>
    <tr>
      <td align="center" valign="middle"><input name="o_seq" type="hidden" id="hiddenField" value="<?php echo $row_Recordset1['o_seq']; ?>" /></td>
      <td align="center" valign="middle">&nbsp;</td>
      <td align="center" valign="middle">&nbsp;</td>
      <td align="center" valign="middle">&nbsp;</td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
</form>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
