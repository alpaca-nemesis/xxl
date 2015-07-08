<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<?php
require_once('func.php');

$name = xss($_POST['name']);
$pass = encrypt(xss($_POST['pswd']));
$email= xss($_POST['mail']);
$no   = xss($_POST['stuno']);
$major= xss($_POST['major']);
$time = date("Y-m-d h:i:s",time());

if(!isNumber($no))
{
	echo '<script>alert(\'学号必须为纯数字\');</script>';
	jump("reg.html");
	die;
}
if(!isEmail($email))
{
	echo '<script>alert(\'错误的E-mail地址\');</script>';
	jump("reg.html");
	die;
}
if(!isEngLength(xss($_POST['pswd']), 6, 15))
{
	echo '<script>alert(\'密码长度必须在6-15位之间！\');</script>';
	jump("reg.html");
	die;
}

require_once('config.php');

$link = conn_db($hostname, $username, $password, $database);
if (!$link){
	echo "Mysql Connect ERROR";
}

$query = "SELECT * FROM users WHERE usr_name=".'"'.$name.'"';
$res = mysql_query($query,$link);

if(mysql_num_rows($res)){  

        echo '<script type="text/javascript">alert("这个用户名已经存在！")</script>';
		jump("reg.html");
		die;

}


$query = "SELECT * FROM users WHERE usr_stuno=".$no;
$res = mysql_query($query,$link);
if(mysql_num_rows($res)){  

        echo '<script type="text/javascript">alert("这个学号已经存在！")</script>';
		jump("reg.html");
		die;

}

$query = "INSERT INTO users (usr_name,usr_passwd,usr_stuno,usr_major,usr_email,time)values ('".$name."','".$pass."','".$no."','".$major."','".$email."','".$time."')";
$query2 = "INSERT INTO score (usr_name,usr_stuno,score_2_1,score_3_1,score_4_1,score_5_1,score_6_1,score_7_1,score_8_1,score_9_1,score_2_2,score_3_2,score_4_2,score_5_2,score_6_2,score_7_2,score_8_2,score_9_2) values ('".$name."','".$no."',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0)";
if(mysql_query($query,$link)&&mysql_query($query2,$link)){
	echo '<script>alert(\'用户创建成功！\');</script>';
	jump('login.html');
}
else
{
	echo '<script>alert(\'用户创建失败！\');</script>';
	jump("reg.html");
}

?>