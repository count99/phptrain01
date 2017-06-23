<?php  require_once('Connections/shopping.php'); 
		//include_once('login/admin_head.php');
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
$query_Recordset1 = "SELECT * FROM maintain";
$Recordset1 = mysql_query($query_Recordset1, $shopping) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<?php 
if ($row_Recordset1['status']==1){
	header("Location:stop.php");}
if(empty($_SESSION['id'])){
	$aaa ="";
	while (strlen($aaa) < 4){
		$get_word= rand(48, 122);
		if (($get_word < 97 and $get_word > 90) or ($get_word < 65 and $get_word > 57)){
			}
		else{
			$ww = chr($get_word);
			$aaa= $aaa.$ww;
			}
	}
	$time1 = strtotime("+6hours");
	$local = date("Ymd-His", $time1);
    $finalword = $local.$aaa;
	$_SESSION['id'] = $finalword;
}

// echo $_SESSION['id'];
?>
<?php
mysql_free_result($Recordset1);
?>
