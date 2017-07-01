<?php require_once('../Connections/shopping.php'); ?>
<?php
session_start();

if(!empty($_POST['name'])&&!empty($_POST['password'])){
	$pws = md5($_POST['password']);
	mysql_select_db($database_shopping, $shopping);
	$query_Recordset1 = "SELECT count(*) as ls FROM member WHERE name = '".$_POST['name']."' and password='".$pws."'";
	$Recordset1 = mysql_query($query_Recordset1, $shopping) or die(mysql_error());	
	$row_Recordset1 = mysql_fetch_assoc($Recordset1);
	
	if($row_Recordset1['ls']==1){
		$query_Recordset2 = "SELECT * FROM member WHERE name = '".$_POST['name']."'";
		$Recordset2 = mysql_query($query_Recordset2, $shopping) or die(mysql_error());
		$row_Recordset2 = mysql_fetch_assoc($Recordset2);
		$_SESSION['name']=$_POST['name'];
		$_SESSION['level']=$row_Recordset2['level'];
		header("Location:/shopping/index.php");
	}
	else{
		header("Location:login.php?0");
	}
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
  <table width="410" border="1" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="224" align="center" valign="middle">帳號</td>
      <td width="180" align="center" valign="middle"><label for="name"></label>
      <input type="text" name="name" id="name" /></td>
    </tr>
    <tr>
      <td align="center" valign="middle">密碼</td>
      <td align="center" valign="middle"><label for="password"></label>
      <input type="text" name="password" id="password" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center" valign="middle"><input type="submit" name="submit" id="submit" value="送出" /></td>
    </tr>
  </table>
</form>
<P><?php if(isset($_SESSION)){print_r($_SESSION);}?></P>
</body>
</html>
