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

	

	
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
	
	if(!empty($_FILES)){
		$pic_last = strtolower(strrchr($_FILES['f_pic']['name'], "."));
		$get_time =strtotime("+6hours");
		$pic_first = date("Ymd-His", $get_time);
		$pic_name = $pic_first.$pic_last;
		
		if (strtolower($pic_last)==".jpg" || strtolower($pic_last)==".png"){
			copy($_FILES['f_pic']['tmp_name'], "../images/firm/".$pic_name);
		}}
  $insertSQL = sprintf("INSERT INTO firm (f_name, f_story, f_pic) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['f_name'], "text"),
                       GetSQLValueString($_POST['f_story'], "text"),
                       GetSQLValueString($pic_name, "text"));

  mysql_select_db($database_shopping, $shopping);
  $Result1 = mysql_query($insertSQL, $shopping) or die(mysql_error());

  $insertGoTo = "f_admin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
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
  <table width="678" border="1" cellspacing="1" cellpadding="0">
    <tr>
      <td width="178" align="center">廠商名稱</td>
      <td width="178" align="center">廠商介紹</td>
      <td width="223" align="center">廠商圖片</td>
      <td width="84" align="center">操作</td>
    </tr>
    <tr>
      <td align="center"><label for="f_name"></label>
      <input type="text" name="f_name" id="f_name" /></td>
      <td align="center"><label for="f_story"></label>
      <input type="text" name="f_story" id="f_story" /></td>
      <td align="center"><label for="f_pic"></label>
        <label for="f_pic"></label>
      <input type="file" name="f_pic" id="f_pic" /></td>
      <td align="center"><input type="submit" name="submit" id="submit" value="送出" /></td>
    </tr>
    <tr>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
</body>
</html>