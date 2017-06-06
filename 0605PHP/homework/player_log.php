<?php
/* Update user's name, operated, time and ip to database
I triped in requiring database's setting. Finally I solved
this problem and learn a lot.
*/

function add_log($act){
    require('../Connections/localhost.php');

    if (!isset($_SESSION)) {
        session_start();
    }
    if(empty($_SESSION['myid'])){
        header("Location: login.php");
    }
    $temp_time = strtotime("+6hours");
    $time_now = date("Y-m-d H:i:s", $temp_time);
    $ip = $_SERVER['REMOTE_ADDR'];
    $sqlsentnce = "INSERT INTO operate_log (a_seq, a_name, a_action, a_time, a_ip) VALUES ('NULL', '%s', '%s', '%s', '%s')";
    $data_set = array($_SESSION['myid'], $act, $time_now, $ip);
    $query_sql = sprintf($sqlsentnce, $data_set[0], $data_set[1], $data_set[2], $data_set[3]);
//    $query_sql = "INSERT INTO operate_log (a_seq, a_name, a_action, a_time, a_ip) VALUES ('NULL', '".$_SESSION['myid']."', '".$act."', '".$time_now."', '".$ip."')";
    mysql_select_db($database_localhost, $localhost);
    $result_query=mysql_query($query_sql, $localhost) or die(mysql_error());
}
?>