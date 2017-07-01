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

$colname_Recordset1 = "-1";
if (isset($_GET['b_bill_number'])) {
  $colname_Recordset1 = $_GET['b_bill_number'];
}
mysql_select_db($database_shopping, $shopping);
$query_Recordset1 = sprintf("SELECT * FROM bill WHERE b_bill_number = %s", GetSQLValueString($colname_Recordset1, "text"));
$Recordset1 = mysql_query($query_Recordset1, $shopping) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);$colname_Recordset1 = "-1";
if (isset($_GET['xxx'])) {
  $colname_Recordset1 = $_GET['xxx'];
}
mysql_select_db($database_shopping, $shopping);
$query_Recordset1 = sprintf("SELECT * FROM bill WHERE b_bill_number = %s", GetSQLValueString($colname_Recordset1, "text"));
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
<table align="center" border="1" cellspacing="0" cellpadding="0">
    <tr align="center" valign="middle">
      <td align="center" valign="middle">&nbsp;</td>
        <td align="center" valign="middle">&nbsp;</td>
        <td align="center" valign="middle">&nbsp;</td>
        <td align="center" valign="middle">&nbsp;</td>
        <td align="center" valign="middle">&nbsp;</td>
        <td align="center" valign="middle">&nbsp;</td>
        <td align="center" valign="middle">&nbsp;</td>
        <td align="center" valign="middle">&nbsp;</td>
    </tr>
    <?php do { ?>
      <tr>
        <td width="175" align="center" valign="middle" bgcolor="#FFCC00">編號</td>
        <td width="175" height="34" align="center" valign="middle" bgcolor="#FFCC00">帳單編號</td>
        <td width="205" align="center" valign="middle" bgcolor="#FFCC00">產品編號</td>
        <td width="162" align="center" valign="middle" bgcolor="#FFCC00">數量</td>
        <td width="146" align="center" valign="middle" bgcolor="#FFCC00">單價</td>
        <td width="176" align="center" valign="middle" bgcolor="#FFCC00">總金額</td>
        <td width="139" align="center" valign="middle" bgcolor="#FFCC00">時間</td>
        <td width="131" align="center" valign="middle" bgcolor="#FFCC00">狀態</td>
      </tr>
      <tr>
        <td align="center" valign="middle"><?php echo $row_Recordset1['b_seq']; ?></td>
        <td align="center" valign="middle"><?php echo $row_Recordset1['b_bill_number']; ?></td>
        <td align="center" valign="middle"><?php echo $row_Recordset1['b_product_number']; ?></td>
        <td align="center" valign="middle"><?php echo $row_Recordset1['b_amount']; ?></td>
        <td align="center" valign="middle"><?php echo $row_Recordset1['b_values']; ?></td>
        <td align="center" valign="middle"><?php echo $row_Recordset1['b_total_valuse']; ?></td>
        <td align="center" valign="middle"><?php echo $row_Recordset1['b_time']; ?></td>
        <td align="center" valign="middle"><?php 
		if(!empty($row_Recordset1['b_type'])){
			switch($row_Recordset1['b_type']){
				case 0:
					echo "契丹";
					break;
				case 1:
					echo "暫停訂單";
					break;
				case 2:
					echo "未付款";
					break;
				case 3:
					echo "已收款處理中";
					break;
				case 4:
					echo "配送中";
					break;
				case 5:
					echo "已結案";
					break;
				default:
					break;
			 }}
			?>
            </td>
    </tr>
      <tr>
        <td align="center" valign="middle" bgcolor="#FFCC00">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#FFCC00">電話</td>
        <td align="center" valign="middle" bgcolor="#FFCC00">地址</td>
        <td align="center" valign="middle" bgcolor="#FFCC00">聯絡人</td>
        <td align="center" valign="middle" bgcolor="#FFCC00">統編</td>
        <td align="center" valign="middle" bgcolor="#FFCC00">IP</td>
        <td align="center" valign="middle" bgcolor="#FFCC00">備用欄位1</td>
        <td align="center" valign="middle" bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" valign="middle">&nbsp;</td>
        <td align="center" valign="middle"><?php echo $row_Recordset1['b_tel']; ?></td>
        <td align="center" valign="middle"><?php echo $row_Recordset1['b_addr']; ?></td>
        <td align="center" valign="middle"><?php echo $row_Recordset1['b_contector']; ?></td>
        <td align="center" valign="middle"><?php echo $row_Recordset1['b_receipt']; ?></td>
        <td align="center" valign="middle"><?php echo $row_Recordset1['b_ip']; ?></td>
        <td align="center" valign="middle"><?php echo $row_Recordset1['b_note1']; ?></td>
        <td align="center" valign="middle">&nbsp;</td>
      </tr>
      <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
<tr>
    <td align="center" valign="middle">&nbsp;</td>
      <td align="center" valign="middle">&nbsp;</td>
      <td align="center" valign="middle">&nbsp;</td>
      <td align="center" valign="middle">&nbsp;</td>
      <td align="center" valign="middle">&nbsp;</td>
      <td align="center" valign="middle">&nbsp;</td>
      <td align="center" valign="middle">&nbsp;</td>
      <td align="center" valign="middle">&nbsp;</td>
    </tr>

</table>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>