<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
<script>
/*
var aaa,bbb="2",word;

if(aaa===bbb){//兩者內容相同+資料型態相同
	alert("1");
}else if(aaa!==bbb){//兩者內容或資料型態有一個以上不一相同
	alert("2");
}

if(aaa==bbb){//兩者內容相同
	alert("a");
}else if(aaa!=bbb){//兩者內容不相同
	alert("b");
}

function aaaa(aaaaa){
	switch (aaaaa){
		case 4:word="一";
		break;
		case 3:word="二";
		break;
		case 2:word="三";
		break;
		case 1:word="四";
		break;
		default:word="X";
	}
	document.getElementById("b01").innerHTML=word;
}
*/
function bb(){
//	var word = document.getElementById("b02").value.replace( /^(\s|\u00A0)+|(\s|\u00A0)+$/g, "" );//消去空格
/*
	var word_long=document.getElementById("b02").value.replace( /^(\s|\u00A0)+|(\s|\u00A0)+$/g, "" ).length;//消去空格+確認是否輸入
	if (word_long <=0){alert ("請輸入文字");}
*/
	var word = document.getElementById("b02").value.replace( /<[\/\!]*[^<>]*>/ig, "" );
	document.getElementById("b01").innerHTML=word;
//	location.href="20170724.php"+word;
}

</script>
<input type="text" name="name" id="b02" value="" pattern=[0-9]/>  
<input type="text" name="name" id="b03" value="禁止輸入" disabled/>
<input type="text" name="name" id="b03" value="禁止輸入" disabled=disabled/>
<input type="text" name="name" id="b03" value="禁止輸入" readonly/>  <br />
<input type="text" name="b04" id="b04" value="" maxlength="5" placeholder="只能輸入五個字"/>

<script>
    var b04 = document.getElementById("b04");
    b04.oncopy = function(){		//禁止複製事件
        return false;
    }

    b04.onpaste = function(){		//禁止貼上
        return false;
    }
</script>
<div id="b01"></div><br />
<!--<button type='button' onclick='aaaa(1)'>按鈕</button><br />-->
<button type='button' onclick='bb()'>按鈕</button><br />

</body>
</html>