<?php require_once('Connections/myshop.php'); ?>
<?php
  session_start();
  
if(empty($_SESSION['sell'])){//判斷SESSION是否不存在
$word = "";
for($i=0;$i<4;$i=$i+1){
	$a01 = rand(0,35);
	if($a01 == 0){$word = $word."0";}
	if($a01 == 1){$word = $word."1";}
	if($a01 == 2){$word = $word."2";}
	if($a01 == 3){$word = $word."3";}
	if($a01 == 4){$word = $word."4";}
	if($a01 == 5){$word = $word."5";}
	if($a01 == 6){$word = $word."6";}
	if($a01 == 7){$word = $word."7";}
	if($a01 == 8){$word = $word."8";}
	if($a01 == 9){$word = $word."9";}
	if($a01 == 10){$word = $word."a";}
	if($a01 == 11){$word = $word."b";}
	if($a01 == 12){$word = $word."c";}
	if($a01 == 13){$word = $word."d";}
	if($a01 == 14){$word = $word."e";}
	if($a01 == 15){$word = $word."f";}
	if($a01 == 16){$word = $word."g";}
	if($a01 == 17){$word = $word."h";}
	if($a01 == 18){$word = $word."i";}
	if($a01 == 19){$word = $word."j";}
	if($a01 == 20){$word = $word."k";}
	if($a01 == 21){$word = $word."l";}
	if($a01 == 22){$word = $word."m";}
	if($a01 == 23){$word = $word."n";}
	if($a01 == 24){$word = $word."o";}
	if($a01 == 25){$word = $word."p";}
	if($a01 == 26){$word = $word."q";}
	if($a01 == 27){$word = $word."r";}
	if($a01 == 28){$word = $word."s";}
	if($a01 == 29){$word = $word."t";}
	if($a01 == 30){$word = $word."u";}
	if($a01 == 31){$word = $word."v";}
	if($a01 == 32){$word = $word."w";}
	if($a01 == 33){$word = $word."x";}
	if($a01 == 34){$word = $word."y";}
	if($a01 == 35){$word = $word."z";}
}
$word =  date("Ymd-His").$word;
$_SESSION['sell'] = $word;
}
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

mysql_select_db($database_myshop, $myshop);
$query_stop = "SELECT * FROM stop";
$stop = mysql_query($query_stop, $myshop) or die(mysql_error());
$row_stop = mysql_fetch_assoc($stop);
if($row_stop['stop_now']== 1){
	header("Location: stop.php");
	exit();
}


echo $_SESSION['sell'];

?>
<?php
mysql_free_result($stop);
?>
