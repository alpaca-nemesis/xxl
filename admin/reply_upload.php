<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<?php
require_once('../func.php');
session_begin();
if (!isset($_SESSION['user'])|| !isset($_SESSION['pass'])){
	jump('../unit.php');
}
$one = count($_POST['key']);
require_once('../config.php');
$link = conn_db($hostname, $username, $password, $database);
$score = 0;
for ($i=1;$i<=$one;$i++)
{
	
	$aid[$i] = (int)xss($_POST['aid'][$i]);
	$qid[$i] = (int)xss($_POST['qid'][$i]);
	$uid[$i] = (int)xss($_POST['uid'][$i]);
	$key[$i] = xss($_POST['key'][$i]);
	$type = (int)xss($_POST['ty']);
	$time = date("Y-m-d h:i:s",time());
	$chapter = (int)xss($_POST['chapter'][$i]);
	$query = "SELECT usr_name FROM users WHERE usr_stuno='".$uid[$i]."'";
	$ret = runquery($query,$link);
	$row = mysql_fetch_row($ret);
	$name = $row[0];	
	$key[$i] = xss($_POST['key'][$i]);
	if($key[$i]=='1')
	{
		$score = $score + 5;
	$query = "UPDATE fill_answer_".$chapter." SET correct='".$key[$i]."' WHERE fill_answer_no='".$aid[$i]."'";
	$ret = runquery($query,$link);
	}
	else
	{
	$query1 = "UPDATE fill_answer_".$chapter." SET correct='".$key[$i]."' WHERE fill_answer_no='".$aid[$i]."'";
	$query2 = "INSERT INTO wrong_answer (chapter,type,stuno,no,fin_time,usr_name) VALUES ('".$chapter."','2','".$uid[$i]."','".$qid[$i]."','".$time."','".$name."')";
	echo $query2;
	$ret1 = runquery($query1,$link);
	$ret2 = runquery($query2,$link);
	}
}
$query = "UPDATE score SET score_".$chapter."_2='".$score."' WHERE usr_stuno='".$uid[1]."'";
runquery($query,$link);
jump("reply.php");
	
	