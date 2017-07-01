<?php 
include_once("head.php");
include_once("login/admin_head.php");




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
<table width="715" border="3" align="center" cellpadding="0" cellspacing="1">
  <tr valign="top">
    <td width="90" align="center"><a href="index.php?get=1">訂購</a></td>
    <td width="83" align="center">&nbsp;</td>
    <td width="65" align="center">&nbsp;</td>
    <td width="41" align="center">&nbsp;</td>
    <td width="43" align="center">&nbsp;</td>
    <td width="116" align="center"><a href="index.php?get=2">交易紀錄</a></td>
    <td width="127" align="center"><a href="index.php?get=4">購物車</td>
    <td width="119" align="center"><a href="index.php?get=3">訂單查詢</td>
  </tr>
</table>
<?php 
if(!empty($_GET['get'])){
//	if($_GET['get']==1){
//		include_once("sell.php");}
switch($_GET['get']){
	case 1:
		include_once("sell.php");
		break;
	case 2:
		echo "交易紀錄";
		break;
	case 3:
		include_once("order/o_admin.php");
		break;
	case 4:
        include_once("sclist.php");
		break;
    case 8:
        include_once ("sclist_del.php");
        break;
    default:
		echo "FUCK OFF";
		break;
	}
}	
?>
<p>&nbsp;</p>
</body>
</html>