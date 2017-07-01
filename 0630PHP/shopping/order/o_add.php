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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO order_list (payment_number, product_number, o_amount, o_ip, o_datetime) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['payment_number'], "text"),
                       GetSQLValueString($_POST['product_number'], "text"),
                       GetSQLValueString($_POST['o_amount'], "int"),
					   GetSQLValueString($record_ip, "text"),
					   GetSQLValueString($time_now, "date")
					   );

  mysql_select_db($database_shopping, $shopping);
  $Result1 = mysql_query($insertSQL, $shopping) or die(mysql_error());

  $insertGoTo = "o_admin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
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
      <input type="text" name="payment_number" id="payment_number" /></td>
      <td align="center" valign="middle"><label for="product_number"></label>
      <input type="text" name="product_number" id="product_number" /></td>
      <td align="center" valign="middle"><label for="o_amount"></label>
      <input type="text" name="o_amount" id="o_amount" /></td>
      <td align="center" valign="middle"><input type="submit" name="submit" id="submit" value="送出" /></td>
    </tr>
    <tr>
      <td align="center" valign="middle">&nbsp;</td>
      <td align="center" valign="middle">&nbsp;</td>
      <td align="center" valign="middle">&nbsp;</td>
      <td align="center" valign="middle">&nbsp;</td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
</body>
</html>