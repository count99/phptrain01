<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
<script>
function ccc(cc){
	var word = document.getElementById("a1").value;
	var a01	 = document.getElementById("a2").innerHTML;
	cc = cc+1;
	word = a01+'<br>'+cc+"."+word;
	document.getElementById("a2").innerHTML=word;

	var a03	 = '<input type="button" value="送出" onclick="ccc('+cc+')">';
	document.getElementById("a3").innerHTML=a03;
}
</script>
<div id="a2"></div>

<input type="text" name="name" id="a1" value=""/>  
<div id="a3"><input type="button" value="送出" onclick="ccc(0)"></div>
</body>
</html>