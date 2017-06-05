<?php require_once('../Connections/localhost.php'); ?>
<?php
session_start();

//新登入系統
$error=0;
if(!empty($_POST['p_id'])){
    if(!empty($_POST['p_password'])){
        mysql_select_db($database_localhost, $localhost);//選擇DB
        $query_recordset1 = "SELECT count(*) as status FROM player WHERE p_id='".$_POST['p_id']."' and p_password ='".$_POST['p_password']."'";//設定sql語法
        $Recordset1 = mysql_query(@$query_recordset1, $localhost) or die(mysql_error());//在DB執行SQL語法
        $row_Recordset1 = mysql_fetch_assoc($Recordset1);//把結果用陣列儲存
            if($row_Recordset1['status']==1){
                $_SESSION['myid'] = $_POST['p_id'];
//                header("Location:admin.php");//跳頁語法，因為本頁設定為登入狀態不能登入，所以不需要
            }else{
                $error=1;
//                header("Location:login.php"); 跳頁語法因現在頁面就是登入頁，所以不跳頁
            }
        mysql_free_result($Recordset1);//select結尾
    }
}
//本頁設定為登入狀態不能
//如果登入狀態存在的話
if(!empty($_SESSION['myid'])){
    header("Location:admin.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
<form id="form1" name="form1" method="POST" action="login.php">
  <table width="500" border="1" cellspacing="0" cellpadding="0">
    <tr>
      <td width="193" align="center">帳號</td>
      <td width="301" align="center"><label for="p_id"></label>
      <input type="text" name="p_id" id="p_id" /></td>
    </tr>
    <tr>
      <td align="center">密碼</td>
      <td align="center"><label for="p_password"></label>
      <input type="text" name="p_password" id="p_password" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="送出" /></td>
    </tr>
  </table>
</form>
</body>
</html>