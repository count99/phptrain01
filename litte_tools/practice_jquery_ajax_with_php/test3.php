<?php
/**
 * Created by PhpStorm.
 * User: pc_gh
 * Date: 2017/9/27
 * Time: 下午8:00
 */
?>
<script src="jquery-1.8.3.js"><</script>
<ul id="aa">

</ul>
<button id="tt">test</button>
<script>
  $(document).on("click", "#tt", function () {
     $.post("test2.php",function(r){
        $("#aa").append(r);
     });
     });
</script>
