<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
<style type="text/css">
#a01 {
	background-color: #000;
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

  overflow: hidden;
}
@keyframes bbb{
	0%{background-color: #000;}
	20%{background-color: #F00;}
	40%{background-color: #ff0;}
  60%{background-color: #fff;}
  80%{background-color: #0ff;}
  100%{background-color: #00f;}
}
</style>
<script>
  var v =0;
	function aaa(){
    if( v == 0){
    	document.getElementById( "a01" ).style.animation = "bbb 10s infinite alternate";
      v = 1;
    }else if( v == 1){

    	document.getElementById( "a01" ).style.animation = "";
      v = 0;
    }
	}

</script>
</head>

<body>

<input type="button" value="送出" onclick="aaa()"><br />

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