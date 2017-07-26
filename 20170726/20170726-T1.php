<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
<script>
function ccc(){
	var word = document.getElementById("a1").value;//設變數抓文字欄位輸出的值
	var a01	 = document.getElementById("a2").innerHTML;//設變數抓ID當前顯示的值
	word = a01+word+'<br>';
	document.getElementById("a2").innerHTML=word;

}
</script>
<div id="a2"></div>

<input type="text" name="name" id="a1" value=""/>  
<input type="button" value="送出" onclick="ccc()">
</body>
</html>