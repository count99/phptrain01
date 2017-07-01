<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_shopping = "127.0.0.1";
$database_shopping = "shopping";
$username_shopping = "root";
$password_shopping = "12345678";
$shopping = mysql_pconnect($hostname_shopping, $username_shopping, $password_shopping) or trigger_error(mysql_error(),E_USER_ERROR);

function log_test(){
	if(empty($_SESSION['name'])){
		session_start();
		header("Location:login/login.php");
		}
	else{
	    return $_SESSION['name'];
 	    }
    }
	
class Time{
	// operate the time
	public function get_time(){
		return strtotime("+6hours");
		}
	public static function time_now(){
		return date("Y-m-d H:i:s", Time::get_time());
		}
	public static function short_time(){
		return date("Ymd-His", Time::get_time());
		}
	}

class Pic
{
    public static $img = "../images/";

    public function __construct($files){
        $this->files = $files;
    }

    public function file_last_name(){
        $last = strrchr($this->files["name"], ".");
        return strtolower($last);
    }

    public function pick_name(){
        $first = Time::short_time();
        $last = $this->file_last_name();
        return $first.$last;
    }

    public function add_pic(){
        $last = $this->file_last_name();
        if($last ==".jpg" or $last == ".png"){
            copy($this->files["tmp_name"], pic::$img.$this->pick_name());
        }
    }
}
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
</body>
</html>