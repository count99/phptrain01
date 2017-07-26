<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
<style type="text/css">
#a01 {
	background-color: #F0F;
	height: 200px;
	width: 100vw;
/*	margin:0 0 0 -480px;*/
	margin:0px;
	padding:0 0 0 10px;
	left:0%;
	top:200px;
	position: absolute;
	z-index: 10;
	font-family: "微軟正黑體 Light";
	font-size: 14px;
	color: #fff;
	display:block;
	transition: height 2s,color 2s,background-color 5s;
  overflow: hidden;
}
</style>
<script>
  var v =1;
	function aaa(){
    if( v == 0){
    	document.getElementById( "a01" ).style.backgroundColor = "#F0F";
      v = 1;
    }else if( v == 1){
    	document.getElementById( "a01" ).style.backgroundColor = "#00F";
      v = 2;
    }else if( v == 2){
    	document.getElementById( "a01" ).style.backgroundColor = "#F00";
      v = 3;
    }else{
		  document.getElementById( "a01" ).style.backgroundColor = "#0F0";
      v = 0;    
    }
	}
  var i =1;
	function aa1(){
    if( i == 0){
  		var a01 = document.getElementById( "a01" ).value;
      	document.getElementById( "a01" ).style.color = "#fff";
	   	document.getElementById( "a01" ).style.height = "200px";
      i = 1;
    }else{
  		var a01 = document.getElementById( "a01" ).value;
      	document.getElementById( "a01" ).style.color = "#333";
	   	document.getElementById( "a01" ).style.height = "0px";
      i = 0;    
    }
	}
</script>
</head>

<body>

<input type="button" value="送出" onclick="aaa()"><br />
<input type="button" value="送出" onclick="aa1()"><br />

<div id="a01">
HI~~~~~~<br />
HI~~~~~~<br />
HI~~~~~~<br />
HI~~~~~~<br />
HI~~~~~~<br />
HI~~~~~~<br />
HI~~~~~~<br />
</div>
</body>
</html>