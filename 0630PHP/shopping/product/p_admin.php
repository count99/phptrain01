<?php require_once('../Connections/shopping.php'); 
		require('../login/admin_head.php');
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
log_test();
$maxRows_Recordset1 = 20;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_shopping, $shopping);
$query_Recordset1 = "SELECT a.* , b.f_name FROM product a, firm b WHERE a.a_firm = b.f_seq ORDER BY a.a_seq DESC";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $shopping) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
<p><?php echo $_SESSION["name"];?></p>
<table width="1886" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td width="138" align="center" valign="middle">編號</td>
    <td width="138" align="center" valign="middle">商品名</td>
    <td width="148" align="center" valign="middle">商品敘述</td>
    <td width="148" align="center" valign="middle">產品編號</td>
    <td width="148" align="center" valign="middle">價格</td>
    <td colspan="2" align="center" valign="middle">產品圖</td>
    <td colspan="2" align="center" valign="middle">來源廠商</td>
    <td width="142" align="center" valign="middle">建立時間</td>
    <td width="158" align="center" valign="middle">ip</td>
    <td width="160" align="center" valign="middle">建立者</td>
    <td colspan="2" align="center" valign="middle">操作</td>
  </tr>
  <?php do { ?>
    <tr>
      <td align="center" valign="middle"><?php echo $row_Recordset1['a_seq']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['a_title']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['a_story']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['a_pn']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['a_price']; ?></td>
      <td width="135" align="center" valign="middle"><?php echo $row_Recordset1['a_pic']; ?></td>
      <td width="138" align="center" valign="middle"><img src="../images/<?php echo $row_Recordset1['a_pic']; ?>" width="100" /></td>
      <td width="127" align="center" valign="middle"><?php echo $row_Recordset1['a_firm']; ?></td>
      <td width="141" align="center" valign="middle"><?php
	echo $row_Recordset1['f_name']; 
	  ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['a_time']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['a_ip']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['a_builder']; ?></td>
      <td width="59" align="center" valign="middle"><a href="p_update.php?a_seq=<?php echo $row_Recordset1['a_seq']; ?>">修改</a></td>
      <td width="76" align="center" valign="middle"><a href="p_del.php?a_seq=<?php echo $row_Recordset1['a_seq']; ?>">刪除</a></td>
    </tr>
    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
  <tr>
    <td align="center" valign="middle"><a href="p_add.php">新增</a></td>
    <td align="center" valign="middle">&nbsp;</td>
    <td align="center" valign="middle">&nbsp;</td>
    <td align="center" valign="middle">&nbsp;</td>
    <td align="center" valign="middle">&nbsp;</td>
    <td align="center" valign="middle">&nbsp;</td>
    <td align="center" valign="middle">&nbsp;</td>
    <td colspan="2" align="center" valign="middle">&nbsp;</td>
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
