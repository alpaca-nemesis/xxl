<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />

<?php
require_once('../func.php');

$chapter = xss($_POST['chapter']);
$ty   = xss($_POST['ty']);
$no = xss($_POST['no']);

require_once('../config.php');

$link = conn_db($hostname, $username, $password, $database);
if (!$link){
	echo "Mysql Connect ERROR";
}
if ($ty == "judgement")
{
	$query = "DELETE FROM judgement_".$chapter." WHERE judgement_no=".$no;
}
elseif($ty == "blank")
{
	$query = "DELETE FROM fill_".$chapter." WHERE fill_no=".$no;
}
elseif($ty = "choice")
{
$query = "DELETE FROM choice_".$chapter." WHERE choice_no=".$no;
}
if(mysql_query($query,$link)){
	echo "题目删除成功";
	jump('delete.php');
}
else
{
	echo "题目删除失败";
	jump('delete.php');
	}

?>