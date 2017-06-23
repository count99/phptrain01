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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE member SET m_lv=%s WHERE m_no=%s",
                       GetSQLValueString($_POST['level'], "int"),
                       GetSQLValueString($_POST['who'], "int"));

  mysql_select_db($database_myshop, $myshop);
  $Result1 = mysql_query($updateSQL, $myshop) or die(mysql_error());

  $updateGoTo = "admin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_GET['del'])) {
  $colname_Recordset1 = $_GET['del'];
}
mysql_select_db($database_myshop, $myshop);
$query_Recordset1 = sprintf("SELECT * FROM member WHERE a_seq = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $myshop) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<?php include_once('title.php'); ?>

<form action="<?php echo $editFormAction; ?>" id="form1" name="form1" method="POST">
  <table width="800" border="1" align="center" cellpadding="0" cellspacing="0">
    <tr align="center">
      <td width="220">帳號</td>
      <td width="220">密碼重置</td>
      <td width="284">持有人</td>
      <td width="103">權限</td>
    </tr>
    <tr align="center">
      <td width="220"><label for="id"><?php echo $row_Recordset1['m_id']; ?></label></td>
      <td width="220"><input name="radio" type="radio" id="password" value="password" />
        是
      <input name="radio" type="radio" id="password2" value="password" checked="checked" />
      否<label for="password"></label></td>
      <td width="284"><label for="name"><?php echo $row_Recordset1['m_name']; ?></label></td>
      <td width="103"><label for="level"></label>
        <select name="level" id="level">
          <option value="1" <?php if($row_Recordset1['m_lv']==1){ ?>selected="selected"<?php }?>>一般使者</option>
          <option value="3" <?php if($row_Recordset1['m_lv']==3){ ?>selected="selected"<?php }?>>主管</option>
          <option value="5" <?php if($row_Recordset1['m_lv']==5){ ?>selected="selected"<?php }?>>經理</option>
          <option value="0" <?php if($row_Recordset1['m_lv']==0){ ?>selected="selected"<?php }?>>封閉</option>
      </select></td>
    </tr>
    <tr>
      <td colspan="4" align="center"><input name="who" type="hidden" id="who" value="<?php echo $row_Recordset1['m_no']; ?>" />        <input type="submit" name="button" id="button" value="送出" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
</form>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
