<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />

<?php
require_once('../func.php');
if ($_FILES["file"]["error"] > 0)
{
    echo "Error: " . $_FILES["file"]["error"] . "<br />";
}
else
{
$destination_folder="../uploadimg/";

$chapter = xss($_POST['chapter']);
$ty   = xss($_POST['ty']);
$answer = xss($_POST['answer']);

$type = $_FILES["file"]["type"];
$size = $_FILES['file']['size'];
$filename=$_FILES["file"]["tmp_name"];
$pinfo=pathinfo($_FILES["file"]["name"]); 
$ftype=$pinfo['extension'];  
$name=time();
$destination = $destination_folder.$chapter."/".$name.".".$ftype;  
$save=$name.".".$ftype;

if(!move_uploaded_file ($filename, $destination))  
{  
    echo "移动文件出错";  
    exit;  
} 

require_once('../config.php');

$link = conn_db($hostname, $username, $password, $database);
if (!$link){
	echo "Mysql Connect ERROR";
}
if ($ty == "judgement")
{
$query = "INSERT INTO judgement_".$chapter." (chapter,stem,answer,type) values ('".$chapter."','".$save."','".$answer."','2')";
}
elseif($ty == "blank")
{
$query = "INSERT INTO fill_".$chapter." (chapter,stem,answer,type) values ('".$chapter."','".$save."','".$answer."','2')";
}
elseif($ty = "choice")
{
$query = "INSERT INTO choice_".$chapter." (chapter,stem,answer,type) values ('".$chapter."','".$save."','".$answer."','2')";
}
if(mysql_query($query,$link)){
	echo "yes";
	jump('picsub.php');
}
else
{
	echo "no";
	jump('picsub.php');
	}
}
?>