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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO member (m_id, m_name, m_password, m_lv) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['id'], "text"),
                       GetSQLValueString($_POST['name'], "text"),
                       GetSQLValueString(md5($_POST['password']), "text"),
                       GetSQLValueString($_POST['level'], "int"));

  mysql_select_db($database_myshop, $myshop);
  $Result1 = mysql_query($insertSQL, $myshop) or die(mysql_error());

  $insertGoTo = "admin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<?php include_once('title.php'); ?>


<form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
  <table width="800" border="1" align="center" cellpadding="0" cellspacing="0">
    <tr align="center">
      <td width="220">帳號</td>
      <td width="220">密碼</td>
      <td width="284">持有人</td>
      <td width="103">權限</td>
    </tr>
    <tr align="center">
      <td width="220"><label for="id"></label>
      <input type="text" name="id" id="id" /></td>
      <td width="220"><input name="password" type="password" id="password" value="" /></td>
      <td width="284"><label for="name"></label>
      <input type="text" name="name" id="name" /></td>
      <td width="103"><label for="level"></label>
        <select name="level" id="level">
          <option value="1">一般使者</option>
          <option value="3">主管</option>
          <option value="5">經理</option>
          <option value="0">封閉</option>
      </select></td>
    </tr>
    <tr>
      <td colspan="4" align="center"><input type="submit" name="button" id="button" value="送出" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
</body>
</html>