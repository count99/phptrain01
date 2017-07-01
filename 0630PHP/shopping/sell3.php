<?php require_once('Connections/shopping.php'); 
		include_once('head.php');
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
$colname_Recordset1 = "-1";
if (isset($_GET['item'])) {
  $colname_Recordset1 = $_GET['item'];
}
mysql_select_db($database_shopping, $shopping);
$query_Recordset1 = sprintf("SELECT a.*, b.f_name FROM product a, firm b WHERE a.a_seq = %s and a.a_firm=b.f_seq" , GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $shopping) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$editFormAction = $_SERVER['PHP_SELF'];

if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
	$get_time= strtotime("+6hours");
	$time_now = date("Y-m-d H:i:s", $get_time);
  $insertSQL = sprintf("INSERT INTO order_list (payment_number, product_number, o_amount, o_ip, o_datetime) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_SESSION['sell'], "text"),
					   GetSQLValueString($row_Recordset1['a_pn'], "int"),
					   GetSQLValueString($_POST['xxx'], "int"),
					   GetSQLValueString($_SERVER['REMOTE_ADDR'], "int"),
					   GetSQLValueString($time_now, "date")
					   );

  mysql_select_db($database_shopping, $shopping);
  $Result1 = mysql_query($insertSQL, $shopping) or die(mysql_error());

  $insertGoTo = "sclist.php";
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
<table width="1539" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="385" align="center" valign="middle">編號</td>
    <td width="125" align="center" valign="middle">商品名</td>
    <td width="141" align="center" valign="middle">商品敘述</td>
    <td width="119" align="center" valign="middle">產品編號</td>
    <td width="134" align="center" valign="middle">價格</td>
    <td colspan="2" align="center" valign="middle">產品圖</td>
    <td colspan="2" align="center" valign="middle">來源廠商</td>
    <td width="129" align="center" valign="middle">建立時間</td>
  </tr>
  <tr>
    <td align="center" valign="middle"><?php echo $row_Recordset1['a_seq']; ?></td>
    <td align="center" valign="middle"><?php echo $row_Recordset1['a_title']; ?></td>
    <td align="center" valign="middle"><?php echo $row_Recordset1['a_story']; ?></td>
    <td align="center" valign="middle"><?php echo $row_Recordset1['a_pn']; ?></td>
    <td align="center" valign="middle"><?php echo $row_Recordset1['a_price']; ?></td>
    <td width="122" align="center" valign="middle"><?php echo $row_Recordset1['a_pic']; ?></td>
    <td width="102" align="center" valign="middle"><img src="images/<?php echo $row_Recordset1['a_pic'];?>" /></td>
    <td width="127" align="center" valign="middle"><?php echo $row_Recordset1['a_firm']; ?></td>
    <td width="133" align="center" valign="middle"><?php echo $row_Recordset1['f_name'];?></td>
    <td align="center" valign="middle"><?php echo $row_Recordset1['a_time']; ?></td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="middle"><form id="form2" name="form2" method="POST" action="<?php echo $editFormAction; ?>">
      <label for="xxx"></label>
      購買數量
      <input type="text" name="xxx" id="xxx" />
      <input type="submit" name="submit" id="submit" value="送出" />
      <input type="hidden" name="MM_insert" value="form2" />
    </form></td>
    <td align="center" valign="middle">&nbsp;</td>
    <td align="center" valign="middle">&nbsp;</td>
    <td align="center" valign="middle">&nbsp;</td>
    <td align="center" valign="middle">&nbsp;</td>
    <td align="center" valign="middle">&nbsp;</td>
    <td align="center" valign="middle">&nbsp;</td>
    <td colspan="2" align="center" valign="middle"><a href="sell.php">回上一頁</a></td>
  </tr>
</table>
<form id="form1" name="form1" method="post" action="">
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
