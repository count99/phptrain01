<?php

function add_log($act){
    $hostname_localhost = "localhost";
    $database_localhost = "test";
    $username_localhost = "root";
    $password_localhost = "12345";
    $localhost = mysql_pconnect($hostname_localhost, $username_localhost, $password_localhost) or trigger_error(mysql_error(),E_USER_ERROR);

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