<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
<script>
	var aaaa="2",bbbb;
	aaaa=aaaa+5;
	bbbb=0;

	function a01(x,y){
		var word = "您購買了產品"+x+"數量"+y;
		alert(word);
		document.getElementById("b01").innerHTML=a01(x,y);
	}
	function a02(){
		document.getElementById("b01").innerHTML=bbbb;
//		alert("123\n456\n\n\n\n\n789");
	}
//=========================================================================================================================================
/*
	var cc=new Array();//定義變數cc為陣列
	cc[0]="aaaa";
	cc[1]=bbbb;
	cc[2]=1+2+3+45;
	for(i=0;i<cc.length;i++){
		document.write(cc[i]+'<br>');
	}
	var dd={
		ad:bbbb,
		bd:"asddsa",
		cd:445456456
	};
	document.write(dd['ad']+'<br>');
	document.write(dd.bd+'<br>');
	document.write(dd["cd"]+'<br>');
*/
//=========================================================================================================================================

</script>
<div id="b01"></div><br />
<button type='button' onclick='a01(1,0)'>按鈕</button><br />
<button type='button' onclick='a01(2,0)'>按鈕</button><br />
<button type='button' onclick='a01(3,5)'>按鈕</button><br />

<a href="JavaScript:a02()">超連結呼叫</a>
</body>
</html>