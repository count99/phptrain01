<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
<?php
 $html = "<p>test</p><br><br><br>";
 $html2 = strip_tags($html,'<p>');
 echo $html2."aaa";
 echo $html."aaaa";
?>
</body>
</html>