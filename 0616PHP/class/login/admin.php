<?php include_once('admin_head.php'); ?>
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

mysql_select_db($database_myshop, $myshop);
$query_Recordset1 = "SELECT * FROM member ORDER BY m_no DESC";
$Recordset1 = mysql_query($query_Recordset1, $myshop) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<?php include_once('title.php'); ?>

<form id="form1" name="form1" method="post" action="">
  <table width="800" border="1" align="center" cellpadding="0" cellspacing="0">
    <tr align="center">
      <td width="267">帳號</td>
      <td width="169">持有者</td>
      <td width="190">等級</td>
      <td width="164" colspan="2">操作</td>
    </tr>
    <?php do { ?>
      <tr align="center">
        <td><?php echo $row_Recordset1['m_id']; ?></td>
        <td><?php echo $row_Recordset1['m_name']; ?></td>
        <td><?php echo $row_Recordset1['m_lv']; ?></td>
        <td><a href="update.php?del=<?php echo $row_Recordset1['m_no']; ?>">修改</a></td>
        <td><a href="del.php?update=<?php echo $row_Recordset1['m_no']; ?>">刪除</a></td>
      </tr>
      <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
    <tr>
      <td colspan="5">&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
