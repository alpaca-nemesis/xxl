<?php
require_once('../func.php');

$name = xss($_POST['name']);
$pass = encrypt(xss($_POST['pswd']));

require_once('../config.php');

$link = conn_db($hostname, $username, $password, $database);
if(!$link){
	echo "Mysql conncet ERROR";
}

$query = "SELECT * FROM users WHERE usr_name='".$name."' AND usr_passwd = '".$pass."'";
if (!getaline($query, $link)){
	echo "登陆失败";
	goback();
}else{
	session_begin();
	$ses = array(
		'user' => $name,
		'pass' => $pass,
	);
	create_session($ses);
	jump('admin.php');
}
