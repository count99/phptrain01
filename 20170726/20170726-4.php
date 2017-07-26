<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div id="a01"></div>
    <input type="button" value="送出" onclick="aaa()"><br /><br /><br />
    <input type="button" value="送出" onclick="bbb()"><br />
<div id="b01"></div>
<script>
function aaa(){
    if(confirm('今天天氣好嗎?')){
        var word = "hao";
    }
    else{
        var word = "bad";
    }
    document.getElementById("a01").innerHTML = word;
}
function bbb(){
    var word=prompt('你今年幾歲');
    if(word === 18){
       console.log(word);
    }
    else{
      '不想說';
    }
    document.getElementById("b01").innerHTML = word;
}
</script>
</body>
</html>