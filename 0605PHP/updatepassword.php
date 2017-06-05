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
$word="";
for($i=0;$i<12;$i++){
    $a01=rand(0,35);
    if($a01==0){$word = $word."0";}
    if($a01==1){$word = $word."1";}
    if($a01==2){$word = $word."2";}
    if($a01==3){$word = $word."3";}
    if($a01==4){$word = $word."4";}
    if($a01==5){$word = $word."5";}
    if($a01==6){$word = $word."6";}
    if($a01==7){$word = $word."7";}
    if($a01==8){$word = $word."8";}
    if($a01==9){$word = $word."9";}
    if($a01==10){$word = $word."10";}
    if($a01==11){$word = $word."11";}
    if($a01==12){$word = $word."12";}
    if($a01==13){$word = $word."13";}
    if($a01==14){$word = $word."14";}
    if($a01==15){$word = $word."15";}
    if($a01==16){$word = $word."16";}
    if($a01==17){$word = $word."17";}
    if($a01==18){$word = $word."18";}
    if($a01==19){$word = $word."19";}
    if($a01==20){$word = $word."20";}
    if($a01==21){$word = $word."21";}
    if($a01==22){$word = $word."22";}
    if($a01==23){$word = $word."23";}
    if($a01==24){$word = $word."24";}
    if($a01==25){$word = $word."25";}
    if($a01==26){$word = $word."26";}
    if($a01==27){$word = $word."27";}
    if($a01==28){$word = $word."28";}
    if($a01==29){$word = $word."29";}
    if($a01==30){$word = $word."30";}
    if($a01==31){$word = $word."31";}
    if($a01==32){$word = $word."32";}
    if($a01==33){$word = $word."33";}
    if($a01==34){$word = $word."34";}
    if($a01==35){$word = $word."35";}
}
if ((isset($_GET['update'])) && ($_GET['update'] != "")) {
    $deleteSQL = "UPDATE player SET p_password ='" . $word . "' WHERE p_seq='" . $_GET['update'] . "'";
    mysql_select_db($database_localhost, $localhost);
    $Result1 = mysql_query($deleteSQL, $localhost) or die(mysql_error());
    header("Location: admin.php?id=".$_GET['update']."&password=".$word);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
</body>
</html>