<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
<style>
	#a01{
		background-color: #99C;
		height: 100px;
		width: 100px;

	}
	#a03{
		height: 100px;
		width: 100px;
		background-image: url(images/8FCB89D8.jpg);
		background-size:100px 100px;
		background-repeat: no-repeat;
	}
/*寫法3
	#a03:hover{
		height: 100px;
		width: 100px;
		background-image: url(images/015_c.png);
		background-size:100px 100px;
		background-repeat: no-repeat;
	}
*/
</style>
</head>

<body>
<!--寫法1
<div id="a02"><img src="images/003_c.png" width="500" height="500" id="Image1" onmouseover="e1()" onmouseout="e2()" /></div>
-->
<!--寫法2
<img src="images/003_c.png" width="500" height="500" id="Image1" onmouseover="e1()" onmouseout="e2()" />
-->
<div id="a03"></div>

<div id="a01"></div>
<script>
/*寫法1
	function e1(){
		document.getElementById("a02").innerHTML='<img src="images/007_c.png" width="500" height="500" id="Image1" onmouseout="e2()" />';
	}
	function e2(){
		document.getElementById("a02").innerHTML='<img src="images/003_c.png" width="500" height="500" id="Image1" onmouseover="e1()"/>';
	}
*/
/*寫法2
	function e1(){
		document.getElementById("Image1").src='images/007_c.png';
	}
	function e2(){
		document.getElementById("Image1").src='images/003_c.png';
	}
*/
document.getElementById("a03").onmouseover=function(){f1()}
document.getElementById("a03").onmouseout=function(){f2()}
	function f1(){
		document.getElementById("a03").style.backgroundImage= "url(images/015_c.png)";
	}
	function f2(){
		document.getElementById("a03").style.backgroundImage= "url(images/8FCB89D8.jpg)";
	}
</script>
<script>
/*
//	document.getElementById("a01").onmousedown=function(){a11()}//按下滑鼠
//	document.getElementById("a01").onmouseup=function(){a12()}//放開滑鼠
//	document.getElementById("a01").onclick=function(){a13()}//點擊動作必須同時按下滑鼠及放開滑鼠才會執行
	document.getElementById("a01").onmouseover=function(){a12()}//滑鼠移入
	document.getElementById("a01").onmouseout=function(){a13()}//滑鼠移出
	function a11(){
		document.getElementById("a01").style.backgroundColor="#09C";
	}
	function a12(){
		document.getElementById("a01").style.backgroundColor="#00C";
	}
	function a13(){
		document.getElementById("a01").style.backgroundColor="#c0C";
	}
*/
</script>
</body>
</html>