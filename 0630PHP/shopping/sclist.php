<?php require_once('Connections/shopping.php');
	include_once('main.php');
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
if (isset($_SESSION['sell'])) {
  $colname_Recordset1 = $_SESSION['sell'];
}
mysql_select_db($database_shopping, $shopping);
$query_Recordset1 = sprintf("SELECT a.*, b.*, (SELECT f_name FROM firm WHERE a_firm=f_seq) as f_name FROM order_list a, product b WHERE a.payment_number = %s and b.a_pn=a.product_number", GetSQLValueString($colname_Recordset1, "text"));
$Recordset1 = mysql_query($query_Recordset1, $shopping) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$firm_number = $row_Recordset1['a_firm'];
$totalprice = 0;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>

  <table width="1303" border="3" cellspacing="1" cellpadding="0" align="center">
    <tr>
      <td width="189" align="center" bgcolor="#66FFFF">產品編號</td>
      <td width="125" align="center" bgcolor="#66FFFF">標題</td>
      <td width="134" align="center" bgcolor="#66FFFF">內容</td>
      <td colspan="2" align="center" bgcolor="#66FFFF">圖片</td>
      
      <td width="134" align="center" bgcolor="#66FFFF">價錢</td>
      <td width="149" align="center" bgcolor="#66FFFF">數量</td>
      <td width="133" align="center" bgcolor="#66FFFF">來源廠商</td>
      <td width="133" align="center" bgcolor="#66FFFF">操作</td>
    </tr>
    <?php do { ?>
      <tr>
        <td align="center"><?php echo $row_Recordset1['product_number']; ?></td>
        <td align="center"><?php echo $row_Recordset1['a_title']; ?></td>
        <td align="center"><?php echo $row_Recordset1['a_story']; ?></td>
        <td width="122" align="center"><?php echo $row_Recordset1['a_pic']; ?></td>
        <td width="150" align="center"><img src="images/<?php echo $row_Recordset1['a_pic'];?>" alt="" width="150"/></td>
        <td align="center"><?php 
		$totalprice = $totalprice + ($row_Recordset1['a_price']*$row_Recordset1['o_amount']);
		echo $row_Recordset1['a_price']; ?></td>
        <td align="center"><?php echo $row_Recordset1['o_amount']; ?></td>
        <td align="center"><?php 
		
		echo $row_Recordset1['f_name'];
		
		
		?></td>
        <td align="center">
        <form id="form1" name="form1" method="post" action="index.php?get=8">
        <input type="hidden" name="xxx" id="hiddenField" value="<?php echo $row_Recordset1['o_seq']?>"/>
        <input type="submit" name="del" id="del" value="刪除" />
        </form>
        </td>
      </tr>
      <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
    <tr>
        <td colspan="3" align="center" bgcolor="#66FF99"><a href="index.php">結帳</a></td>
        <td colspan="3" align="center" bgcolor="#66FF99"><a href="index.php">回上一頁</a></td>
        <td colspan="3" align="center" bgcolor="#FFCC00">總金額：<?php echo $totalprice;?></td>
    </tr>
  </table>
  

</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
