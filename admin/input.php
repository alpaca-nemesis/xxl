<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />

<?php
require_once('../func.php');

$chapter = xss($_POST['chapter']);
$stem = xss($_POST['stem']);
$ty   = xss($_POST['ty']);
$answer = xss($_POST['answer']);

require_once('../config.php');

$link = conn_db($hostname, $username, $password, $database);
if (!$link){
	echo "Mysql Connect ERROR";
}
if ($ty == "judgement")
{
$query = "INSERT INTO judgement_".$chapter." (chapter,stem,answer,type) values ('".$chapter."','".$stem."','".$answer."','1')";
}
elseif($ty == "blank")
{
$query = "INSERT INTO fill_".$chapter." (chapter,stem,answer,type) values ('".$chapter."','".$stem."','".$answer."','1')";
}
elseif($ty = "choice")
{
$query = "INSERT INTO choice_".$chapter." (chapter,stem,answer,type) values ('".$chapter."','".$stem."','".$answer."','1')";
}
if(mysql_query($query,$link)){
	echo "yes";
	jump('subject.php');
}
else
{
	echo "no";
	jump('subject.php');
	}

?>