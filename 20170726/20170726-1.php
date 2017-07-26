<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
<script>
function bb(){

	var word = document.getElementById("b01").innerHTML;//直接抓取指定ID的內容
	alert(word);

}

</script>

<div id="b01">testeteest</div><br />

<button type='button' onclick='bb()'>按鈕</button><br />

</body>
</html>