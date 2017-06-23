<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <label for="sb"></label>
  <input type="file" name="sb" id="sb" />
</form>
<?php
include("/login/admin_head.php");
$test1 = new Pic($_FILES['sb']);
$tn = $test1->file_last_name();
$tt=$test1->pick_name();
echo $tn;
echo "<br />".$tt."<br />";
print_r($test1->files);

?>
