<?php require_once('../Connections/myshop.php'); 
  session_start();  //啟動session
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



$error = 0;

if(!empty($_POST['p_id'])){

	if(!empty($_POST['p_passowrd'])){
		mysql_select_db($database_myshop, $myshop);
		$pw = md5($_POST['p_passowrd']);
		$pw1 = $_POST['p_passowrd'];
		$query_Recordset1 = "SELECT count(*) as mylogin FROM member where m_id ='".$_POST['p_id']."' and m_password ='".$pw1."'";
		$Recordset1 = mysql_query($query_Recordset1, $myshop) or die(mysql_error());
		$row_Recordset1 = mysql_fetch_assoc($Recordset1);
			if($row_Recordset1["mylogin"]==1){
mysql_select_db($database_myshop, $myshop);
$query_login = "SELECT * FROM member WHERE m_id = '".$_POST['p_id']."'";
$login = mysql_query($query_login, $myshop) or die(mysql_error());
$row_login = mysql_fetch_assoc($login);
mysql_free_result($login);
				$_SESSION['myid'] = $row_login['m_id'];//定義SESSION變數的內容
				$_SESSION['mylv'] = $row_login['m_lv'];//定義SESSION變數的內容
			}else{//失敗回傳結果
				$error = 1;
			    header("Location:login.php?error".$error);
			}
		mysql_free_result($Recordset1);//select結尾
	}
}
//本頁設定為登入狀態不能
if(!empty($_SESSION['myid'])){//如果登入狀態存在的話
	header("Location:admin.php");//跳頁語法
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="login.php">
  <table width="800" border="1" align="center" cellpadding="0" cellspacing="0">
    <tr align="center">
      <td width="81">帳號</td>
      <td width="713"><label for="p_id"></label>
      <input name="p_id" type="text" id="p_id" size="80" /></td>
    </tr>
    <tr align="center">
      <td>密碼</td>
      <td><input name="p_passowrd" type="text" id="p_passowrd" size="80" /></td>
    </tr>
    <tr align="center">
      <td colspan="2"><input type="submit" name="button" id="button" value="送出" /></td>
    </tr>
  </table>
</form>
</body>
</html>