<?php require_once('../Connections/shopping.php'); 
		require_once('../login/admin_head.php');
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

mysql_select_db($database_shopping, $shopping);
$query_Recordset2 = "SELECT * FROM firm";
$Recordset2 = mysql_query($query_Recordset2, $shopping) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);

$player=log_test();
$colname_Recordset1 = "-1";
if (isset($_GET['a_seq'])) {
  $colname_Recordset1 = $_GET['a_seq'];
}
mysql_select_db($database_shopping, $shopping);
$query_Recordset1 = sprintf("SELECT * FROM product WHERE a_seq = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $shopping) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$del = "../images/".$row_Recordset1['a_pic'];
$time1 = strtotime("+6hours");
$time_now = date("Y-m-d H:i:s", $time1);


$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE product SET a_title=%s, a_story=%s, a_price=%s, a_pic=%s, a_firm=%s, a_time=%s, a_builder=%s, a_pn=%S WHERE a_seq=%s",
                       GetSQLValueString($_POST['a_title'], "text"),
                       GetSQLValueString($_POST['a_story'], "text"),
                       GetSQLValueString($_POST['a_price'], "int"),
                       GetSQLValueString($row_Recordset1['a_pic'], "text"),
                       GetSQLValueString($_POST['f_firm'], "text"),
					   GetSQLValueString($time_now, "date"),
					   GetSQLValueString($player, "text"),
                       GetSQLValueString($_POST['a_seq'], "int"),
					   GetSQLValueString($_POST['a_pn'], "text")
					   );
	
		
  mysql_select_db($database_shopping, $shopping);
  $Result1 = mysql_query($updateSQL, $shopping) or die(mysql_error());
  
  if(!empty($_FILES['a_pic']['tmp_name'])){
		unlink($del);
//		$pic = new Pic($_FILES['pic']);
//		$pic->add_pic();
		copy($_FILES['a_pic']['tmp_name'], $del);
	}
	
  $updateGoTo = "p_admin.php";
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
  <table width="1188" border="1" cellpadding="0" cellspacing="0">
    <tr>
      <td width="126" align="center" valign="middle">編號</td>
      <td width="126" align="center" valign="middle">商品名</td>
      <td width="135" align="center" valign="middle">商品敘述</td>
      <td width="135" align="center" valign="middle">產品編號</td>
      <td width="135" align="center" valign="middle">價格</td>
      <td width="123" align="center" valign="middle">商品圖</td>
      <td width="128" align="center" valign="middle">來源廠商</td>
      <td width="130" align="center" valign="middle">操作</td>
    </tr>
    <tr>
      <td align="center" valign="middle"><label for="a_title"><?php echo $row_Recordset1['a_seq']; ?></label></td>
      <td align="center" valign="middle"><input name="a_title" type="text" id="a_title" value="<?php echo $row_Recordset1['a_title']; ?>" /></td>
      <td align="center" valign="middle"><input name="a_story" type="text" id="a_story" value="<?php echo $row_Recordset1['a_story']; ?>" /></td>
      <td align="center" valign="middle"><label for="a_pn"></label>
      <input type="text" name="a_pn" id="a_pn" value="<?php echo $row_Recordset1['a_pn']; ?>"/></td>
      <td align="center" valign="middle"><input name="a_price" type="text" id="a_price" value="<?php echo $row_Recordset1['a_price']; ?>" /></td>
      <td align="center" valign="middle"><label for="a_pic"></label>
      <input name="a_pic" type="file" id="a_pic" value="<?php echo $row_Recordset1['a_pic']; ?>" /></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['a_firm']; ?></td>
      <td align="center" valign="middle"><input type="submit" name="submit" id="submit" value="送出" /></td>
    </tr>
<tr>
      <td align="center" valign="middle"><input name="a_seq" type="hidden" id="a_seq" value="<?php echo $row_Recordset1['a_seq']; ?>" /></td>
      <td align="center" valign="middle">&nbsp;</td>
      <td align="center" valign="middle">&nbsp;</td>
      <td align="center" valign="middle">&nbsp;</td>
      <td align="center" valign="middle">&nbsp;</td>
      <td align="center" valign="middle"><img src="../images/<?php echo $row_Recordset1['a_pic'];?>" width="150"/></td>
      <td align="center" valign="middle"><label for="f_firm"></label>
        <select name="f_firm" id="f_firm">
        <?php do{?>
          <option value="<?php echo $row_Recordset2['f_seq'];?>" <?php if($row_Recordset2['f_seq']==$row_Recordset1['a_firm']){echo "selected='selected'";}?> > <?php echo $row_Recordset2['f_name'];?></option>
          <?php }while($row_Recordset2 = mysql_fetch_assoc($Recordset2));?>
      </select></td>
      <td align="center" valign="middle">&nbsp;</td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
</form>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
