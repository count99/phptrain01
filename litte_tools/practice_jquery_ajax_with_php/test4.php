<?php
/**
 * Created by PhpStorm.
 * User: pc_gh
 * Date: 2017/9/28
 * Time: 上午12:52
 */
?>
<script src="jquery-1.8.3.js"><</script>
<script>
    $(document).on("click", "#tt", function () {
        var data = new Object();
        var name = $("input[name=name]").val();
        var pass = $("input[name=password]").val();
        data['name']=name;
        data['id']=pass;
        $.post("test2.php", data, function(t){
           alert(t);
        });
    })
</script>
<input type="text" name="name" id="name">
<input type="text" name="password" id="password">
<button id="tt">test</button>
