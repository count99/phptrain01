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

mysql_select_db($database_shopping, $shopping);
$query_Recordset1 = "SELECT * FROM firm";
$Recordset1 = mysql_query($query_Recordset1, $shopping) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
$del = $row_Recordset1['f_pic'];
$url ="../images/firm/";

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
	$pic_last = strrchr($_FILES['f_pic']['name'], ".");
	$get_time =strtotime("+6hours");
	$pic_first = date("Ymd-His", $get_time);
	$pic_name = $pic_first.$pic_last;

	
	
  $updateSQL = sprintf("UPDATE firm SET f_name=%s, f_story=%s  WHERE f_seq=%s",
                       GetSQLValueString($_POST['f_name'], "text"),
                       GetSQLValueString($_POST['f_story'], "text"),
                   
                       GetSQLValueString($_POST['f_seq'], "int"));

  mysql_select_db($database_shopping, $shopping);
  $Result1 = mysql_query($updateSQL, $shopping) or die(mysql_error());
  
  if(!empty($_FILES['f_pic']['tmp_name'])){
		if (strtolower($pic_last)==".jpg" || strtolower($pic_last)==".png"){
		unlink($url.$del);
		copy($_FILES['f_pic']['tmp_name'], $url.$del);}}

  $updateGoTo = "f_admin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
<form action="<?php echo $editFormAction; ?>" method="POST" enctype="multipart/form-data" name="form1" id="form1">
  <table width="648" border="3" cellspacing="1" cellpadding="0">
    <tr>
      <td width="168">廠商編號</td>
      <td width="168">廠商名稱</td>
      <td width="168">廠商介紹</td>
      <td width="16">廠商圖片</td>
      <td width="106">操作</td>
    </tr>
    <tr>
      <td><label for="f_seq"></label>
      <input name="f_seq" type="text" id="f_seq" value="<?php echo $row_Recordset1['f_seq']; ?>" /></td>
      <td><label for="f_name"></label>
      <input name="f_name" type="text" id="f_name" value="<?php echo $row_Recordset1['f_name']; ?>" /></td>
      <td><label for="f_seq"></label>
      <input name="f_story" type="text" id="f_story" value="<?php echo $row_Recordset1['f_story']; ?>" /></td>
      <td><label for="f_pic"></label>
      <input name="f_pic" type="file" id="f_pic" value="<?php echo $row_Recordset1['f_pic']; ?>" /></td>
      <td><input type="submit" name="submit" id="submit" value="送出" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><img src="../images/firm/<?php echo $row_Recordset1['f_pic'];?>" width="100" /> </td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
</form>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
