<?php require_once('../Connections/localhost.php'); ?>
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
$error = 0;
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
    //	===============================================
    mysql_select_db($database_localhost, $localhost);
    $query_Rs1= "SELECT count(*) as a_namesum FROM member where a_name = '".$_POST['a_name']."'";
    $recordset1 = mysql_query($query_Rs1, $localhost);
    $row_recordset1 = mysql_fetch_assoc($recordset1);
    if($row_recordset1["a_namesum"]>0){
        $error=1;
    }
    else{
        mysql_free_result($recordset1);
//	===============================================
    $get_time = $_POST['year']."-".$_POST['month']."-".$_POST['day'];

    $insertSQL = "INSERT INTO member(a_name, a_password, a_level, a_no, a_born, a_tel) VALUES ( '".$_POST['a_name']."', '".$_POST['a_password']."', '".$_POST['a_level']."', '".$_POST['a_no']."', '".$get_time."','".$_POST['a_tel']."')";


  mysql_select_db($database_localhost, $localhost);
  $Result1 = mysql_query($insertSQL, $localhost) or die(mysql_error());
    }
//  $insertGoTo = "l_list.php";
//  if (isset($_SERVER['QUERY_STRING'])) {
//    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
//    $insertGoTo .= $_SERVER['QUERY_STRING'];
//  }
//  header(sprintf("Location: %s", $insertGoTo));

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>practice</title>
</head>

<body><form action="<?php echo $editFormAction; ?>" method="POST" name="form1" id="form1">
  <table width="656" border="1" cellspacing="0" cellpadding="0">
    <tr>
        <td width="160" align="center">帳號</td>
        <td width="429" align="center"><label for="a_name"></label>
      <input type="text" name="a_name" id="a_name"/></td>
    </tr>
    <tr>
      <td align="center">密碼</td>
      <td align="center"><label for="a_password"></label>
      <input type="password" name="a_password" id="a_password"/></td>
    </tr>
      <tr>
          <td align="center">身分證字號</td>
          <td align="center"><label for="a_no"></label>
              <input type="text" name="a_no" id="a_id" value="<?php if($error==1){echo $_POST['a_tel'];}?>"/></td>
      </tr>
      <tr>
        <td align="center">生日</td>
        <td align="center" valign="middle">西元
          <label for="year"></label>
        <input type="text" name="year" id="year" value="<?php if($error==1){echo $_POST['year'];}?>"/>
        <label for="month"></label>
        <select name="month" id="month">
            <?php
            $month_arrary = ["1"=>"一月", "2"=>"二月", "3"=>"三月", "4"=>"四月", "5"=>"五月", "6"=>"六月", "7"=>"七月", "8"=>"八月", "9"=>"九月", "10"=>"十月", "11"=>"十一月", "12"=>"十二月"];
            if($error==1){
                echo "<option value=".$_POST['month'].">".$month_arrary[$_POST['month']]."</option>";}
            for($i=1; $i<13; $i++) {
                if (empty($_POST['month']) || $_POST['month']!=$i) {
                    echo "<option value=".$i.">$month_arrary[$i]</option>";}
                else{if($_POST['month']==$i){continue;}}
            }
            ?>
        </select>
            月
        <label for="day"></label>
        <select name="day" id="day">
            <?php
            if(!empty($_POST['day'])){
                echo "<option value=".$_POST['day'].">".$_POST['day']."</option>";}
            for($i=1; $i<32; $i++){
                if(!empty($_POST['day']) && $_POST['day']==$i){continue;}
                else{echo "<option value=".$i.">$i</option>";}
            }
            ?>
        </select>
        日</td>
      </tr>
      <tr>
          <td align="center">電話</td>
          <td align="center"><label for="a_tel"></label>
              <input type="text" name="a_tel" id="a_tel" value="<?php if($error==1){echo $_POST['a_tel'];}?>"/></td>
      </tr>
    <tr>
      <td align="center">權限</td>
      <td align="center"><label for="a_level"></label>
      <input type="text" name="a_level" id="a_level" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="button" id="button" value="送出" />
      <input type="reset" name="button2" id="button2" value="重設" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
</body>
</html>