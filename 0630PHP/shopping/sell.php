<?php include_once("head.php");
	include_once("main.php");
?>
<?php if(!empty($_GET['item'])){
	include_once("sell3.php");}
	else{
	include_once("sell2.php");}?>