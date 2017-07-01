<?php require_once('../Connections/shopping.php'); 
	require_once('admin_head.php');
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
$aaa ="";
	while (strlen($aaa) < 8){
		$get_word= rand(48, 122);
		if (($get_word < 97 and $get_word > 90) or ($get_word < 65 and $get_word > 57)){
			}
		else{
			$ww = chr($get_word);
			$aaa= $aaa.$ww;
			}
	}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
	if($_POST['radio']== 1){
	$pws = md5($aaa);
	
  $updateSQL = sprintf("UPDATE member SET level=%s, password=%s WHERE a_seq = %s",
                       GetSQLValueString($_POST['level'], "int"),
					   GetSQLValueString($pws, "text"),
                       GetSQLValueString($_POST['who'], "int"));
					   $updateGoTo = "admin.php?who=".$_POST['id']."&pw=".$aaa;
					   }
	else{
		$updateSQL = sprintf("UPDATE member SET level=%s WHERE a_seq = %s",
                       GetSQLValueString($_POST['level'], "int"),
                       GetSQLValueString($_POST['who'], "int"));
					   $updateGoTo = "admin.php";
					   }

  mysql_select_db($database_shopping, $shopping);
  $Result1 = mysql_query($updateSQL, $shopping) or die(mysql_error());

  
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}
$colname_Recordset1 = "-1";
if (isset($_GET['xxx'])) {
    $colname_Recordset1 = $_GET['xxx'];
}
mysql_select_db($database_shopping, $shopping);
$query_Recordset1 = sprintf("SELECT * FROM member WHERE a_seq = %s", GetSQLValueString($colname_Recordset1, "int"));
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
<form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
  <table width="729" border="1" cellspacing="0" cellpadding="0">
    <tr>
      <td width="125" align="center">帳號</td>
      <td width="193" align="center">密碼重置</td>
      <td width="143" align="center">持有人</td>
      <td width="118" align="center">權限</td>
      <td width="138" align="center">操作</td>
    </tr>
    <tr>
      <td align="center"><?php echo $row_Recordset1['name']; ?></td>
      <td align="center"><label for="password"></label>
        <input type="radio" name="radio" id="ss" value="1" />
      <label for="ss">是
        <input type="radio" name="radio" id="ss2" value="0" checked="checked" />
      否</label></td>
      <td width="143" align="center"><?php echo $row_Recordset1['holder']; ?></td>
      <td width="118" align="center"><label for="level"></label>
        <select name="level" id="level">
          <option value="1" <?php if($row_Recordset1['level']==1){ ?>selected="selected"<?php }?>>一般使者</option>
          <option value="3" <?php if($row_Recordset1['level']==3){ ?>selected="selected"<?php }?>>主管</option>
          <option value="5" <?php if($row_Recordset1['level']==5){ ?>selected="selected"<?php }?>>經理</option>
          <option value="0" <?php if($row_Recordset1['level']==0){ ?>selected="selected"<?php }?>>封閉</option>
      </select></td>
      <td align="center"><input type="submit" name="submit" id="submit" value="送出" /></td>
    </tr>
    <tr>
      <td align="center"><input name="who" type="hidden" id="hiddenField" value="<?php echo $_GET['xxx']; ?>" />
      <input name="id" type="hidden" id="id" value="<?php echo $row_Recordset1['name']; ?>" /></td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
</form></a>
</body>
</html>