<?php

function conn_db($hostname, $username, $password, $database) {
	$link = mysql_connect($hostname,$username,$password);
	if (!$link) {
		//echo "Mysql Connect Error".mysql_error();
		return false;
	}
	$ret = mysql_select_db($database);
	if (!$ret) {
		closedb($link);
		return false;
	}
	set_encode($link);
	return $link;
}

function conn_db_error(){
}

function runquery($sql, $link = NULL) {
	/*提交查询语句前，检查语句的合法性，若safe=0，则不合法*/
	$ret = @mysql_query($sql, $link);
	if (!$ret) {
		return false;
	}
	else{
		return $ret;
	}
}
/*获得一条记录，用作身份验证时返回一条记录*/
function getaline($sql, $link) {
	$ret = runquery($sql, $link);
	$row = @mysql_fetch_array($ret, MYSQL_ASSOC);
	if (!$row){
		return false;
	}else return $row;
}
/*获得结果集中的一行，用作查询用 */
function getresult($ret){
	$row = @mysql_fetch_array($ret,MYSQL_ASSOC);
	if (!$row){
		return false;
	} else {
		return $row;
	}
}

function closedb($link){
	if($link){
		mysql_close($link);
	}
}

function set_encode($link){
	runquery("SET NAMES 'utf8'",$link);
}

/*=================================================*/
function encrypt($str){
	$str = base64_encode($str);
	$md = md5($str);
	return substr($md,0,17);
}
function jump($url){
	echo "<script>location.href='".$url."';</script>";
}
function alert($str){
	echo "<script>alert('".$str."');</script>";
}
function goback(){
	echo "<script>history.go(-1);</script>";
}

function xss($str){
	//$str = str_replace(":","：",trim($str));
	return htmlspecialchars($str);
}
/*=================================================*/
function session_begin() {
	//session_save_path($CONFIG['session_dir']); 
	session_start();
}

function create_session($val) {
	 if (!is_array($val)) {
		 return false;
	 }
	 foreach ($val as $key => $val) {
		 $_SESSION[$key] = $val;
	 }
	 return true;
 }

 function destory_session() {
	 session_start();
	 $_SESSION = array();
	 if (isset($_COOKIE[session_name()])) {
		 setcookie(session_name(), '', time()-42000, '/');
	 }
	 session_destroy();
 }
 
 //生成随机数，利用随机数随机生成题目
 function chose($one,$max) {
	$a=array(); 
	while(count($a)<$one) $a[rand(1,$max)]=null; 
	$a=array_keys($a);
	return $a;
 }
 function isNumber($val)
	{
		if (ereg("^[0-9]+$", $val))
			return true;
		return false;
	}
	
	function isEmail($val,$domain="")
	{
		if(!$domain)
		{
			if( preg_match("/^[a-z0-9-_.]+@[\da-z][\.\w-]+\.[a-z]{2,4}$/i", $val) )
			{
				return true;
			}
			else
				return false;
		}
		else
		{
			if( preg_match("/^[a-z0-9-_.]+@".$domain."$/i", $val) )
			{
				return true;
			}
			else
				return false;
		}
	}
function isEngLength($val, $min, $max)
	{
		$theelement = trim($val);
		if (ereg("^[\x80-\xffa-zA-Z0-9]{".$min.",".$max."}$",$val))
			return true;
		return false;
	}
function existno($val){
	$hostname = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'xxl';
	$ret = mysql_select_db($database);
	$link = mysql_connect($hostname,$username,$password);
	$query = "SELECT * FROM users WHERE usr_stuno=".$val;
	$tt = mysql_query($query,$link);
	if($tt)
	{return true;}
	else
	{return false;}
}

		 
?>
