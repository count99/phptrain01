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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
    $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_shopping, $shopping);
//以帳單編號做不重複的排序
$query_Recordset1 = "SELECT * FROM bill GROUP BY b_bill_number DESC";
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
        <td align="center" valign="middle">&nbsp;</td>
        <td align="center" valign="middle">&nbsp;</td>
    </tr>
    <?php do { ?>
      <tr>
        <td width="175" align="center" valign="middle" bgcolor="#FFCC00">帳單編號</td>
        <td align="center" valign="middle" bgcolor="#FFCC00">電話</td>
        <td align="center" valign="middle" bgcolor="#FFCC00">地址</td>
        <td align="center" valign="middle" bgcolor="#FFCC00">聯絡人</td>
        <td align="center" valign="middle" bgcolor="#FFCC00">統編</td>
        <td align="center" valign="middle" bgcolor="#FFCC00">IP</td>
        <td width="139" align="center" valign="middle" bgcolor="#FFCC00">時間</td>
        <td width="139" align="center" valign="middle" bgcolor="#FFCC00">總金額</td>
        <td width="131" align="center" valign="middle" bgcolor="#FFCC00">狀態</td>
        <td width="131" align="center" valign="middle" bgcolor="#FFCC00">&nbsp;</td>
      </tr>
        <form id="form1" name="xxx" method="POST"><label for="status"></label>
      <tr>
        <td align="center" valign="middle"><?php echo $row_Recordset1['b_bill_number']; ?></td>
        <td align="center" valign="middle"><?php echo $row_Recordset1['b_tel']; ?></td>
        <td align="center" valign="middle"><?php echo $row_Recordset1['b_addr']; ?></td>
        <td align="center" valign="middle"><?php echo $row_Recordset1['b_contector']; ?></td>
        <td align="center" valign="middle"><?php echo $row_Recordset1['b_receipt']; ?></td>
        <td align="center" valign="middle"><?php echo $row_Recordset1['b_ip']; ?></td>
        <td align="center" valign="middle"><?php echo $row_Recordset1['b_time']; ?></td>
        <td align="center" valign="middle"><?php echo $row_Recordset1['b_note1']; ?></td>
        <td align="center" valign="middle">
                  <select name="status" id="status">
                  	<option value="0" <?php if($row_Recordset1['b_type']==0){echo "selected='selected'";}?> >契丹</option>
                    <option value="1" <?php if($row_Recordset1['b_type']==1){echo "selected='selected'";}?> >暫停訂單</option>
                    <option value="2" <?php if($row_Recordset1['b_type']==2){echo "selected='selected'";}?> >未付款</option>
                    <option value="3" <?php if($row_Recordset1['b_type']==3){echo "selected='selected'";}?> >已收款處理中</option>
                    <option value="4" <?php if($row_Recordset1['b_type']==4){echo "selected='selected'";}?> >配送中</option>
                    <option value="5" <?php if($row_Recordset1['b_type']==5){echo "selected='selected'";}?>>已結案</option>
                </select>
               
        <input type="submit" name="submit" id="submit" value="送出" /></td>
        <td align="center" valign="middle"><a href="b_admin2.php?xxx=<?php echo $row_Recordset1['b_bill_number'];?>">查看資料</a></td>
        </tr>
        </form>
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
      <td align="center" valign="middle">&nbsp;</td>
      <td align="center" valign="middle">&nbsp;</td>
    </tr>

</table>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
