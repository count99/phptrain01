<!doctype html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<input type="text" name="file" id="file" value="">
<input type="submit" name="submit" value="送出">
</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: eli
 * Date: 2017/7/26
 * Time: 下午 01:15
 */

$servername="localhost";
$username="root";
$password="12345678";
$dbname="shopping_cart";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
    die("Connection failed:".mysqli_connect_error());
}
$sql = "SELECT * FROM picture";
$result = mysqli_query($conn, $sql);
$result_all = mysqli_fetch_all($result);
for($i=0; $i<count($result_all);$i++){
    echo "<img src='images/".$result_all[$i][1]."' id='aa' value='".$result_all[$i][1]."' width='50' height='50' />";
}
?>