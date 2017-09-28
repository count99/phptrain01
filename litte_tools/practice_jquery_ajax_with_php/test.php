<?php
$a=new mysqli("localhost",'root','','db04');
$sql="select * from test;";
$r=$a->query($sql);
$rr=$r->fetch_all();
?>
<script src="jquery-1.8.3.js"></script>
<script>
    $(document).on("click", ".xxx", function () {
        var rr= $(this).val();
       if(rr==1){$(this).val("0");}
       else{$(this).val("0");}
    });
</script>
<?php
foreach($rr as $k=>$v){
?>
<input type="checkbox" name="xx" class="xxx" id="a<?=$v[0];?>" <?php if($v[2]==1){echo "value='1'  checked";} else{echo "value='0'";}?>>
<input type="text" name="bb" class="bbb" id="b<?=$v[0];?>" value="<?=$v[1];?>">
<br />
<?php }?>
<br />
<button id="good">test</button>
<div id="show"></div>
<script>
    $(document).ready(function () {
       $("#good").click(function () {
           var aa = {};
           var bb = new Object();
           $(":text").each(function () {
              bb[$(this).attr("id")]=$(this).val();
           });
           $(":checkbox").each(function () {
               aa[$(this).attr("id")]= $(this).val();
           });
           $.post("pp.php", {aa:aa, bb:bb}, function (data) {
                     alert(data);
           });
       });
    });
</script>