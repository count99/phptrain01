<?php require_once('../Connections/localhost.php'); ?>
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
$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_localhost, $localhost);
$query_Recordset1 = "SELECT * FROM player";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;

//修改密碼回傳值
if(!empty($_GET['id'])) {
    mysql_select_db($database_localhost, $localhost);
    /** @var TYPE_NAME $query_update_password */
    $query_update_password = "SELECT p_id, p_password FROM player WHERE p_seq='".$_GET['id']."'";
    $update_password = mysql_query($query_update_password, $localhost) or die(mysql_error());
    $row_update_password = mysql_fetch_assoc($update_password);
    mysql_free_result($update_password); //結尾
    ?>
    <script>
        alert("已修改玩家；<?php echo $row_update_password['p_id'];?>的密碼為<?php echo $row_update_password['p_password']; ?>");
    </script>
    <?php
}
    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="731" border="1" cellspacing="0" cellpadding="0">
    <tr>
      <td width="288">使用者：<?php if(!empty($_SESSION['myid'])){echo $_SESSION['myid'];}else{echo "無使用者";} ?></td>
      <td width="228"><a href="add.php">新增</a></td>
      <td width="207" align="center"><a href="logout.php">登出</a></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="1649" border="1" cellspacing="0" cellpadding="0">
    <tr>
      <td width="126" align="center" valign="middle">編號</td>
      <td width="116" align="center" valign="middle">帳號</td>
      <td width="123" align="center" valign="middle">暱稱</td>
      <td width="137" align="center" valign="middle">姓名</td>
      <td width="120" align="center" valign="middle">身分證</td>
      <td width="120" align="center" valign="middle">性別</td>
      <td width="133" align="center" valign="middle">生日</td>
      <td width="127" align="center" valign="middle">地址</td>
      <td width="119" align="center" valign="middle">電話</td>
      <td width="130" align="center" valign="middle">註冊時間</td>
      <td width="116" align="center" valign="middle">註冊IP</td>
      <td width="132" align="center" valign="middle">等級</td>
      <td colspan="2" align="center" valign="middle">操作</td>
    </tr>
    <?php do { ?>
      <tr>
        <td><?php echo $row_Recordset1['p_seq']; ?></td>
        <td><?php echo $row_Recordset1['p_id']; ?></td>
        <td><?php echo $row_Recordset1['p_nid']; ?></td>
        <td><?php echo $row_Recordset1['p_name']; ?></td>
        <td><?php echo $row_Recordset1['p_no']; ?></td>
        <td><?php echo $row_Recordset1['p_mf']; ?></td>
        <td><?php echo $row_Recordset1['p_born']; ?></td>
        <td><?php echo $row_Recordset1['p_con']; ?></td>
        <td><?php echo $row_Recordset1['p_tel']; ?></td>
        <td><?php echo $row_Recordset1['p_time']; ?></td>
        <td><?php echo $row_Recordset1['p_ip']; ?></td>
        <td><?php echo $row_Recordset1['p_level']; ?></td>
        <td width="65" align="center"><a href="updatepassword.php?update=<?php echo $row_Recordset1['p_seq']; ?>">修改</a></td>
        <td width="55" align="center"><a href="del.php">刪除</a></td>
      </tr>
      <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
    <tr>
      <td colspan="14">&nbsp;</td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);


?>
