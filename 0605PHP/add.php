<?php require_once('../Connections/localhost.php'); ?>
<?php
//直接session_start
session_start();
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
//設定ip跟時間變數，與error
$ip = $_SERVER['REMOTE_ADDR'];
$time = strtotime('+6hours');
$time2 = date('Y-m-d H:i:s', $time);
$error = 0;

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
//連DB
    mysql_select_db($database_localhost, $localhost);
    $query_Recordset1 = "SELECT count(*) as a_namesum FROM player where p_id = '".$_POST['p_id']."'";
    $Recordset1 = mysql_query($query_Recordset1, $localhost) or die(mysql_error());
    $row_Recordset1 = mysql_fetch_assoc($Recordset1);

//看是否帳號已存在
    if($row_Recordset1["a_namesum"]>0){
        $error = 1;
    }else{
        mysql_free_result($Recordset1);
        $birthday = $_POST['year']."-".$_POST['month']."-".$_POST['day'];
        $insertSQL = "INSERT INTO player (p_seq, p_id , p_nid, p_password, p_no ,p_mf ,p_born, p_con, p_ip, p_time, p_tel) VALUES (NULL, '".$_POST['p_id']."', '".$_POST['p_nid']."', '".$_POST['p_password']."', '".$_POST['p_no']."', '".$_POST['p_mf']."', '".$birthday."', '".$_POST['address']."', '".$ip."', '".$time2."', '".$_POST['telephone']."')";
        $result1 = mysql_query(@$insertSQL, @$localhost) or die(mysql_error());
    }

//  $insertGoTo = "admin.php";
//  if (isset($_SERVER['QUERY_STRING'])) {
//    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
//    $insertGoTo .= $_SERVER['QUERY_STRING'];
//  }
//  header(sprintf("Location: %s", $insertGoTo));
}

//mysql_select_db($database_localhost, $localhost);
//$query_Recordset1 = "SELECT * FROM player";
//$Recordset1 = mysql_query($query_Recordset1, $localhost) or die(mysql_error());
//$row_Recordset1 = mysql_fetch_assoc($Recordset1);
//$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>

<form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
  <table width="673" border="1" cellspacing="0" cellpadding="0">
    <tr>
      <td width="190" align="center">帳號</td>
      <td width="387"><label for="name"></label>
      <input type="text" name="p_id" id="p_id" />
          <?php
          if($error==1){echo "帳號重複";}
          ?>
      </td>
    </tr>
    <tr>
      <td align="center">密碼</td>
      <td><label for="p_password"></label>
      <input type="password" name="p_password" id="p_password" /></td>
    </tr>
    <tr>
      <td align="center">暱稱</td>
      <td><label for="p_nid"></label>
      <input type="text" name="p_nid" id="p_nid" /></td>
    </tr>
    <tr>
      <td align="center">身分證</td>
      <td><label for="p_no"></label>
      <input type="text" name="p_no" id="p_no" /></td>
    </tr>
    <tr>
      <td align="center">性別</td>
      <td><label for="p_mf"></label>
        <label for="p_mf"></label>
        <select name="p_mf" id="p_mf">
          <option value="1">男</option>
          <option value="0">女</option>
      </select></td>
    </tr>
    <tr>
      <td align="center">出生年月日</td>
      <td><label for="year"></label>
      <input type="text" name="year" id="year"/>
      年
      <label for="month"></label>
      <select name="month" id="month">
          <?php
          $month_arrary = ["1"=>"一月", "2"=>"二月", "3"=>"三月", "4"=>"四月", "5"=>"五月", "6"=>"六月", "7"=>"七月", "8"=>"八月", "9"=>"九月", "10"=>"十月", "11"=>"十一月", "12"=>"十二月"];
          for($i=1; $i<13; $i++){
              echo "<option value=".$i.">$month_arrary[$i]</option>";
          }
            ?>
      </select>
      月
      <label for="day"></label>
      <select name="day" id="day">
          <?php
            for($i=1; $i<32; $i++){
                echo "<option value=".$i.">$i</option>";
            }
          ?>
      </select>
      </td>
    </tr>
    <tr>
      <td align="center">地址</td>
      <td><label for="address"></label>
      <input type="text" name="address" id="address" /></td>
    </tr>
    <tr>
      <td align="center">電話</td>
      <td><label for="telephone"></label>
      <input type="text" name="telephone" id="telephone" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="送出" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
    <p></p>
</form>
</body>
</html>
