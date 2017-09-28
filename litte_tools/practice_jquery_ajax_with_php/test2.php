<?php
$a = new mysqli("localhost", "root","","db04");
//$r=$a->query("SELECT * FROM test");
function tr($data, $p=" AND "){
    $tmp=array();
    foreach ($data as $k=>$v){
        $tmp[]=$k."='".$v."'";
    }
    return implode($p, $tmp);
}
//var_dump($_POST['data']);
$data = tr($_POST['data']);
//echo $data;
$sql = "INSERT INTO test SET ".$data;
$t=$a->query($sql);
var_dump($t,$data,$_POST['data']);
//if(isset($t->error)){
//    echo "失敗";
//}else{
//    echo "成功";
//}
//$h=$r->fetch_all();
//echo json_encode($h);
//foreach($h as $k=>$v){
//     echo "<li>".$v[1]."</li>";
//}
?>