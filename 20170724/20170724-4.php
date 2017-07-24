<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>3.3節,滑鼠移入移出，改變圖片樣式</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script type="text/javascript" src="../../extend/animateManage.js"></script>
</head>
<body>
    <h2>滑鼠移入移出，改變圖片樣式</h2>
    <img src='images/007_c.png' id='a01' />
<script type="text/javascript">
    window.onload = function(){
        var imgChangeStyle = document.getElementById("a01"),
            setCss = function(_this, cssOption){//設定元素樣式
                //判斷節點類型
                if ( !_this || _this.nodeType === 3 || _this.nodeType === 8 || !_this.style ) {
                    return;
                }
                for(var cs in cssOption){//走訪設定所有樣式
                    _this.style[cs] = cssOption[cs];
                }
                return _this;
            };

        a01.onmouseover = function(){//滑鼠移入事件
            setCss(this, {
                border:"2px solid red"
            })
        }

        a01.onmouseout = function(){//滑鼠移出事件
            setCss(this, {
                border:"0px"
            })
        }
    };
</script>
</body>
</html> 
