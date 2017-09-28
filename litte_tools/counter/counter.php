<?php
/**
 * Created by PhpStorm.
 * User: eli
 * Date: 2017/7/20
 * Time: 上午 10:36
 */

function read_counter()
//    讀文件計數器資料
{
    if (!file_exists("counter.txt")) {
        $count = 0;
        $file = fopen("counter.txt", "w");
        fputs($file, $count);
        fclose($file);
    } else {
        $file = fopen("counter.txt", "r+");
        $counters = fread($file, filesize("counter.txt"));
        fclose($file);
        return $counters;
    }

}

function tr_image($n){
//    將數字轉成照片路徑
    $add= "<img src='images/".$n.".jpg' alt='".$n."'/>";
    return $add;
}

if(!session_id()) {
    session_start();
}
if(!isset($_SESSION["Yo"])){
    $_SESSION["Yo"] = read_counter();
    $_SESSION["Yo"]++;
    $file = fopen("counter.txt", "w+");
    fputs($file, $_SESSION["Yo"]);
    fclose($file);
}
$nu = $_SESSION["Yo"];
$adrease = array();
while ($nu>=1){
    $reft = $nu % 10;
    $adrease[] = tr_image($reft);
    $nu = floor($nu / 10);
}
$revers = array_reverse($adrease);
for($i=0; $i<count($revers); $i++){
    echo $revers[$i];
}
