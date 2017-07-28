<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
<link href="20170728-1.css" rel="stylesheet" type="text/css" /></head>

<body>
<div id="aa1">
	<div id="ab1"></div>
	<div id="ab2">
    	<b01 id="a1"><img src="images/c/c1.jpg" width="300" height="200" /></b01>
    	<b01 id="a2"><img src="images/c/c2.jpg" width="300" height="200" /></b01>
    	<b01 id="a3"><img src="images/c/c3.jpg" width="300" height="200" /></b01>
    	<b01 id="a4"><img src="images/c/c4.jpg" width="300" height="200" /></b01>
    	<b01 id="a5"><img src="images/c/c5.jpg" width="300" height="200" /></b01>
    	<b01 id="a6"><img src="images/c/c6.jpg" width="300" height="200" /></b01>
    	<b01 id="a7"><img src="images/c/c7.jpg" width="300" height="200" /></b01>
    	<b01 id="a8"><img src="images/c/c8.jpg" width="300" height="200" /></b01>
    	<b01 id="a9"><img src="images/c/c9.jpg" width="300" height="200" /></b01>
    	<b01 id="a10"><img src="images/c/c10.jpg" width="300" height="200" /></b01>
    	<b01 id="a11"><img src="images/c/c11.jpg" width="300" height="200" /></b01>
    </div>
</div>


<div id="c1"></div>
<div id="c2"></div>

<div id="d1"></div>
<div id="d2"></div>

<script>
document.getElementById("c1").onclick=function(){ccc1()}

document.getElementById("a1").onclick=function(){aaa1(1)}
document.getElementById("a2").onclick=function(){aaa1(2)}
document.getElementById("a3").onclick=function(){aaa1(3)}
document.getElementById("a4").onclick=function(){aaa1(4)}
document.getElementById("a5").onclick=function(){aaa1(5)}
document.getElementById("a6").onclick=function(){aaa1(6)}
document.getElementById("a7").onclick=function(){aaa1(7)}
document.getElementById("a8").onclick=function(){aaa1(8)}
document.getElementById("a9").onclick=function(){aaa1(9)}
document.getElementById("a10").onclick=function(){aaa1(10)}
document.getElementById("a11").onclick=function(){aaa1(11)}
	function ccc1(){
      		document.getElementById("c1").style.display = "none";
      		document.getElementById("c2").style.display = "none";
      		document.getElementById("d1").style.display = "none";
      		document.getElementById("d2").style.display = "none";
	}
	function aaa(){
     		document.getElementById("c1").style.display = "block";
      		document.getElementById("c2").style.display = "block";
     		document.getElementById("d1").style.display = "block";
      		document.getElementById("d2").style.display = "block";

	}
	function aaa1(aaaa){
//			if(aaaa == 1){var word = '<img src="images/c/c1.jpg" width="600" height="400" />';}
			var word = '<img src="images/c/c'+aaaa+'.jpg" width="600" height="400" />';
	      	document.getElementById("c2").innerHTML = word;
			document.getElementById("d1").onclick=function(){ddd1(aaaa)}
			document.getElementById("d2").onclick=function(){ddd2(aaaa)}
			aaa();
	}
	function ddd1(d11){
alert(d11);
	}
	function ddd2(d22){
alert(d22);
	}
</script>
</body>
</html>