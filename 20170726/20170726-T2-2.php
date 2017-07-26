<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
<script>
var i = 0;
function ccc(cc){
	var word = document.getElementById("a1").value;
	var a01	 = document.getElementById("a2").innerHTML;
	i = i+1;
	if (cc != 0){
<?php do { ?>
  if(cc ==<?php  echo $row1['p_seq']; ?>){
  ccc2='<?php echo $row1['p_pic']; ?>'
 }
 <?php } while($row1 = mysql_fetch_assoc($re1));
 	word = a01+'<br>'+i+"."+word;
	document.getElementById("a2").innerHTML=word;
}
</script>
<div id="a2"></div>

<input type="text" name="name" id="a1" value=""/>
<input type="button" value="送出" onclick="ccc()">
</body>
</html>