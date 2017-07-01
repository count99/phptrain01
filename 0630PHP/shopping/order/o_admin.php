<?php require_once('../login/admin_head.php'); ?>
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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_Recordset1 = 20;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_shopping, $shopping);
$query_Recordset1 = "SELECT a.*, b.a_pic, b.a_title, b.a_story, b.a_price FROM order_list a, product b WHERE a.product_number = b.a_pn";
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

$queryString_Recordset1 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset1") == false && 
        stristr($param, "totalRows_Recordset1") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset1 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset1 = sprintf("&totalRows_Recordset1=%d%s", $totalRows_Recordset1, $queryString_Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
<table width="1761" border="3" cellspacing="1" cellpadding="0">
  <tr>
    <td width="126" align="center" valign="middle">帳單編號</td>
    <td width="193" align="center" valign="middle">帳單號碼</td>
    <td width="189" align="center" valign="middle">產品編號</td>
    <td width="149" align="center" valign="middle">產品名稱</td>
    <td width="149" align="center" valign="middle">產品介紹</td>
    <td colspan="2" align="center" valign="middle">產品圖片</td>
    <td width="134" align="center" valign="middle">產品價格</td>
    <td width="149" align="center" valign="middle">數量</td>
    <td width="116" align="center" valign="middle">IP</td>
    <td width="156" align="center" valign="middle">日期</td>
    <td colspan="2" align="center" valign="middle">操作</td>
  </tr>
  <?php do { ?>
    <tr>
      <td align="center" valign="middle"><?php echo $row_Recordset1['o_seq']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['payment_number']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['product_number']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['a_title']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['a_story']; ?></td>
      <td width="122" align="center" valign="middle"><?php echo $row_Recordset1['a_pic']; ?></td>
      <td width="99" align="center" valign="middle"><img src="<?php echo "../images/".$row_Recordset1['a_pic']; ?>" width="50"/></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['a_price']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['o_amount']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['o_ip']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['o_datetime']; ?></td>
      <td width="67" align="center" valign="middle"><a href="o_del.php?o_seq=<?php echo $row_Recordset1['o_seq']; ?>">修改</a></td>
      <td width="66" align="center" valign="middle"><a href="o_del.php?o_seq=<?php echo $row_Recordset1['o_seq']; ?>">刪除</a></td>
    </tr>
    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
  <tr>
    <td align="center" valign="middle"><p><a href="o_add.php">新增</a></p></td>
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
    <td align="center" valign="middle">&nbsp;</td>
  </tr>
</table>
<table border="0">
  <tr>
    <td><?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, 0, $queryString_Recordset1); ?>">第一頁</a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>">上一頁</a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>">下一頁</a>
        <?php } // Show if not last page ?></td>
    <td><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, $totalPages_Recordset1, $queryString_Recordset1); ?>">最後一頁</a>
        <?php } // Show if not last page ?></td>
  </tr>
</table>
</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
