<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>初始化</title>
</head>

<body>

<?php

require_once('config.php');
$lable = 1;

$link = mysql_connect($hostname, $username, $password);
if (!$link)
  {
  die('Could not connect: ' . mysql_error());
  }
else{
	if (mysql_query("CREATE DATABASE xxl",$link))
 	{
  	echo "Database created";
  	}
else{
	echo "Error creating database: ". mysql_error() ;
	$lable = 0;
	}
}

mysql_select_db($database,$link);

//创建判断题题目数据库
$sql_quest = "CREATE TABLE judgement_2
(
judgement_no int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(judgement_no),
chapter int,
stem text,
answer char(2),
type int
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table judgement created successfully";
}
else
{
	echo "</br>failed to CREATE table judgement". mysql_error();
	$lable = 0;
}
$sql_quest = "CREATE TABLE judgement_3
(
judgement_no int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(judgement_no),
chapter int,
stem text,
answer char(2),
type int
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table judgement created successfully";
}
else
{
	echo "</br>failed to CREATE table judgement". mysql_error();
	$lable = 0;
}
$sql_quest = "CREATE TABLE judgement_4
(
judgement_no int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(judgement_no),
chapter int,
stem text,
answer char(2),
type int
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table judgement created successfully";
}
else
{
	echo "</br>failed to CREATE table judgement". mysql_error();
	$lable = 0;
}
$sql_quest = "CREATE TABLE judgement_5
(
judgement_no int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(judgement_no),
chapter int,
stem text,
answer char(2),
type int
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table judgement created successfully";
}
else
{
	echo "</br>failed to CREATE table judgement". mysql_error();
	$lable = 0;
}
$sql_quest = "CREATE TABLE judgement_6
(
judgement_no int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(judgement_no),
chapter int,
stem text,
answer char(2),
type int
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table judgement created successfully";
}
else
{
	echo "</br>failed to CREATE table judgement". mysql_error();
	$lable = 0;
}
$sql_quest = "CREATE TABLE judgement_7
(
judgement_no int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(judgement_no),
chapter int,
stem text,
answer char(2),
type int
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table judgement created successfully";
}
else
{
	echo "</br>failed to CREATE table judgement". mysql_error();
	$lable = 0;
}
$sql_quest = "CREATE TABLE judgement_8
(
judgement_no int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(judgement_no),
chapter int,
stem text,
answer char(2),
type int
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table judgement created successfully";
}
else
{
	echo "</br>failed to CREATE table judgement". mysql_error();
	$lable = 0;
}
$sql_quest = "CREATE TABLE judgement_9
(
judgement_no int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(judgement_no),
chapter int,
stem text,
answer char(2),
type int
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table judgement created successfully";
}
else
{
	echo "</br>failed to CREATE table judgement". mysql_error();
	$lable = 0;
}


//创建填空题题目数据库
$sql_quest = "CREATE TABLE fill_2
(
fill_no int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(fill_no),
chapter int,
stem text,
answer text,
type int
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table fill created successfully";
}
else
{
	echo "</br>failed to CREATE table judgement". mysql_error();
	$lable = 0;
}

$sql_quest = "CREATE TABLE fill_3
(
fill_no int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(fill_no),
chapter int,
stem text,
answer text,
type int
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table fill created successfully";
}
else
{
	echo "</br>failed to CREATE table judgement". mysql_error();
	$lable = 0;
}

$sql_quest = "CREATE TABLE fill_4
(
fill_no int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(fill_no),
chapter int,
stem text,
answer text,
type int
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table fill created successfully";
}
else
{
	echo "</br>failed to CREATE table judgement". mysql_error();
	$lable = 0;
}

$sql_quest = "CREATE TABLE fill_5
(
fill_no int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(fill_no),
chapter int,
stem text,
answer text,
type int
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table fill created successfully";
}
else
{
	echo "</br>failed to CREATE table judgement". mysql_error();
	$lable = 0;
}

$sql_quest = "CREATE TABLE fill_6
(
fill_no int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(fill_no),
chapter int,
stem text,
answer text,
type int
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table fill created successfully";
}
else
{
	echo "</br>failed to CREATE table judgement". mysql_error();
	$lable = 0;
}

$sql_quest = "CREATE TABLE fill_7
(
fill_no int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(fill_no),
chapter int,
stem text,
answer text,
type int
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table fill created successfully";
}
else
{
	echo "</br>failed to CREATE table judgement". mysql_error();
	$lable = 0;
}

$sql_quest = "CREATE TABLE fill_8
(
fill_no int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(fill_no),
chapter int,
stem text,
answer text,
type int
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table fill created successfully";
}
else
{
	echo "</br>failed to CREATE table judgement". mysql_error();
	$lable = 0;
}

$sql_quest = "CREATE TABLE fill_9
(
fill_no int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(fill_no),
chapter int,
stem text,
answer text,
type int
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table fill created successfully";
}
else
{
	echo "</br>failed to CREATE table judgement". mysql_error();
	$lable = 0;
}

$sql_quest = "CREATE TABLE choice_2
(
choice_no int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(choice_no),
chapter int,
stem text,
answer text,
type int
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table fill created successfully";
}
else
{
	echo "</br>failed to CREATE table judgement". mysql_error();
	$lable = 0;
}

$sql_quest = "CREATE TABLE choice_3
(
choice_no int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(choice_no),
chapter int,
stem text,
answer text,
type int
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table fill created successfully";
}
else
{
	echo "</br>failed to CREATE table judgement". mysql_error();
	$lable = 0;
}
$sql_quest = "CREATE TABLE choice_4
(
choice_no int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(choice_no),
chapter int,
stem text,
answer text,
type int
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table fill created successfully";
}
else
{
	echo "</br>failed to CREATE table judgement". mysql_error();
	$lable = 0;
}
$sql_quest = "CREATE TABLE choice_4
(
choice_no int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(choice_no),
chapter int,
stem text,
answer text,
type int
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table fill created successfully";
}
else
{
	echo "</br>failed to CREATE table judgement". mysql_error();
	$lable = 0;
}
$sql_quest = "CREATE TABLE choice_5
(
choice_no int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(choice_no),
chapter int,
stem text,
answer text,
type int
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table fill created successfully";
}
else
{
	echo "</br>failed to CREATE table judgement". mysql_error();
	$lable = 0;
}
$sql_quest = "CREATE TABLE choice_6
(
choice_no int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(choice_no),
chapter int,
stem text,
answer text,
type int
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table fill created successfully";
}
else
{
	echo "</br>failed to CREATE table judgement". mysql_error();
	$lable = 0;
}
$sql_quest = "CREATE TABLE choice_7
(
choice_no int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(choice_no),
chapter int,
stem text,
answer text,
type int
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table fill created successfully";
}
else
{
	echo "</br>failed to CREATE table judgement". mysql_error();
	$lable = 0;
}
$sql_quest = "CREATE TABLE choice_8
(
choice_no int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(choice_no),
chapter int,
stem text,
answer text,
type int
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table fill created successfully";
}
else
{
	echo "</br>failed to CREATE table judgement". mysql_error();
	$lable = 0;
}
$sql_quest = "CREATE TABLE choice_9
(
choice_no int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(choice_no),
chapter int,
stem text,
answer text,
type int
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table fill created successfully";
}
else
{
	echo "</br>failed to CREATE table judgement". mysql_error();
	$lable = 0;
}


//创建判断题答案数据库
$sql_quest = "CREATE TABLE judgement_answer_2
(
judg_answer_no int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(judg_answer_no),
judgement_no int,
stuno int,
correct int,
answer_jugg char(2),
fin_time datetime
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table judgement_answer created successfully";
}
else
{
	echo "</br>failed to CREATE table judgement_answer". mysql_error();
	$lable = 0;
	}
	//创建判断题答案数据库
$sql_quest = "CREATE TABLE judgement_answer_3
(
judg_answer_no int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(judg_answer_no),
judgement_no int,
stuno int,
correct int,
answer_jugg char(2),
fin_time datetime
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table judgement_answer created successfully";
}
else
{
	echo "</br>failed to CREATE table judgement_answer". mysql_error();
	$lable = 0;
	}
$sql_quest = "CREATE TABLE judgement_answer_4
(
judg_answer_no int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(judg_answer_no),
judgement_no int,
stuno int,
correct int,
answer_jugg char(2),
fin_time datetime
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table judgement_answer created successfully";
}
else
{
	echo "</br>failed to CREATE table judgement_answer". mysql_error();
	$lable = 0;
	}
$sql_quest = "CREATE TABLE judgement_answer_5
(
judg_answer_no int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(judg_answer_no),
judgement_no int,
stuno int,
correct int,
answer_jugg char(2),
fin_time datetime
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table judgement_answer created successfully";
}
else
{
	echo "</br>failed to CREATE table judgement_answer". mysql_error();
	$lable = 0;
	}
$sql_quest = "CREATE TABLE judgement_answer_6
(
judg_answer_no int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(judg_answer_no),
judgement_no int,
stuno int,
correct int,
answer_jugg char(2),
fin_time datetime
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table judgement_answer created successfully";
}
else
{
	echo "</br>failed to CREATE table judgement_answer". mysql_error();
	$lable = 0;
	}
$sql_quest = "CREATE TABLE judgement_answer_7
(
judg_answer_no int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(judg_answer_no),
judgement_no int,
stuno int,
correct int,
answer_jugg char(2),
fin_time datetime
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table judgement_answer created successfully";
}
else
{
	echo "</br>failed to CREATE table judgement_answer". mysql_error();
	$lable = 0;
	}
$sql_quest = "CREATE TABLE judgement_answer_8
(
judg_answer_no int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(judg_answer_no),
judgement_no int,
stuno int,
correct int,
answer_jugg char(2),
fin_time datetime
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table judgement_answer created successfully";
}
else
{
	echo "</br>failed to CREATE table judgement_answer". mysql_error();
	$lable = 0;
	}
$sql_quest = "CREATE TABLE judgement_answer_9
(
judg_answer_no int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(judg_answer_no),
judgement_no int,
stuno int,
correct int,
answer_jugg char(2),
fin_time datetime
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table judgement_answer created successfully";
}
else
{
	echo "</br>failed to CREATE table judgement_answer". mysql_error();
	$lable = 0;
	}

//创建填空题答案数据库

$sql_quest = "CREATE TABLE fill_answer_2
(
fill_answer_no int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(fill_answer_no),
fill_no int,
stuno int,
correct int,
answer_fill text,
fin_time datetime
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table judgement_answer created successfully";
}
else
{
	echo "</br>failed to CREATE table judgement_answer". mysql_error();
	$lable = 0;
	}

$sql_quest = "CREATE TABLE fill_answer_3
(
fill_answer_no int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(fill_answer_no),
fill_no int,
stuno int,
correct int,
answer_fill text,
fin_time datetime
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table judgement_answer created successfully";
}
else
{
	echo "</br>failed to CREATE table judgement_answer". mysql_error();
	$lable = 0;
	}
	$sql_quest = "CREATE TABLE fill_answer_4
(
fill_answer_no int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(fill_answer_no),
fill_no int,
stuno int,
correct int,
answer_fill text,
fin_time datetime
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table judgement_answer created successfully";
}
else
{
	echo "</br>failed to CREATE table judgement_answer". mysql_error();
	$lable = 0;
	}
	$sql_quest = "CREATE TABLE fill_answer_5
(
fill_answer_no int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(fill_answer_no),
fill_no int,
stuno int,
correct int,
answer_fill text,
fin_time datetime
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table judgement_answer created successfully";
}
else
{
	echo "</br>failed to CREATE table judgement_answer". mysql_error();
	$lable = 0;
	}
	$sql_quest = "CREATE TABLE fill_answer_6
(
fill_answer_no int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(fill_answer_no),
fill_no int,
stuno int,
correct int,
answer_fill text,
fin_time datetime
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table judgement_answer created successfully";
}
else
{
	echo "</br>failed to CREATE table judgement_answer". mysql_error();
	$lable = 0;
	}
	$sql_quest = "CREATE TABLE fill_answer_7
(
fill_answer_no int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(fill_answer_no),
fill_no int,
stuno int,
correct int,
answer_fill text,
fin_time datetime
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table judgement_answer created successfully";
}
else
{
	echo "</br>failed to CREATE table judgement_answer". mysql_error();
	$lable = 0;
	}
	
$sql_quest = "CREATE TABLE fill_answer_8
(
fill_answer_no int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(fill_answer_no),
fill_no int,
stuno int,
correct int,
answer_fill text,
fin_time datetime
)";
if(mysql_query($sql_quest,$link)){
	echo "</br>table judgement_answer created successfully";
}
else
{
	echo "</br>failed to CREATE table judgement_answer". mysql_error();
	$lable = 0;
	}
	

$sql_quest = "CREATE TABLE fill_answer_9
(
fill_answer_no int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(fill_answer_no),
fill_no int,
stuno int,
correct int,
answer_fill text,
fin_time datetime
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table judgement_answer created successfully";
}
else
{
	echo "</br>failed to CREATE table judgement_answer". mysql_error();
	$lable = 0;
	}
	
if(mysql_query($sql_quest,$link)){
	echo "</br>table judgement_answer created successfully";
}
else
{
	echo "</br>failed to CREATE table judgement_answer". mysql_error();
	$lable = 0;
	}
	
	$sql_quest = "CREATE TABLE choice_answer_2
(
choice_answer_no int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(choice_answer_no),
choice_no int,
stuno int,
correct int,
answer_choice text,
fin_time datetime
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table judgement_answer created successfully";
}
else
{
	echo "</br>failed to CREATE table judgement_answer". mysql_error();
	$lable = 0;
	}
	
	
	$sql_quest = "CREATE TABLE choice_answer_3
(
choice_answer_no int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(choice_answer_no),
choice_no int,
stuno int,
correct int,
answer_choice text,
fin_time datetime
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table judgement_answer created successfully";
}
else
{
	echo "</br>failed to CREATE table judgement_answer". mysql_error();
	$lable = 0;
	}
		
	$sql_quest = "CREATE TABLE choice_answer_4
(
choice_answer_no int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(choice_answer_no),
choice_no int,
stuno int,
correct int,
answer_choice text,
fin_time datetime
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table judgement_answer created successfully";
}
else
{
	echo "</br>failed to CREATE table judgement_answer". mysql_error();
	$lable = 0;
	}
		
	$sql_quest = "CREATE TABLE choice_answer_5
(
choice_answer_no int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(choice_answer_no),
choice_no int,
stuno int,
correct int,
answer_choice text,
fin_time datetime
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table judgement_answer created successfully";
}
else
{
	echo "</br>failed to CREATE table judgement_answer". mysql_error();
	$lable = 0;
	}
		
	$sql_quest = "CREATE TABLE choice_answer_6
(
choice_answer_no int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(choice_answer_no),
choice_no int,
stuno int,
correct int,
answer_choice text,
fin_time datetime
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table judgement_answer created successfully";
}
else
{
	echo "</br>failed to CREATE table judgement_answer". mysql_error();
	$lable = 0;
	}
		
	$sql_quest = "CREATE TABLE choice_answer_7
(
choice_answer_no int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(choice_answer_no),
choice_no int,
stuno int,
correct int,
answer_choice text,
fin_time datetime
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table judgement_answer created successfully";
}
else
{
	echo "</br>failed to CREATE table judgement_answer". mysql_error();
	$lable = 0;
	}
		
	$sql_quest = "CREATE TABLE choice_answer_8
(
choice_answer_no int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(choice_answer_no),
choice_no int,
stuno int,
correct int,
answer_choice text,
fin_time datetime
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table judgement_answer created successfully";
}
else
{
	echo "</br>failed to CREATE table judgement_answer". mysql_error();
	$lable = 0;
	}
		
	$sql_quest = "CREATE TABLE choice_answer_9
(
choice_answer_no int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(choice_answer_no),
choice_no int,
stuno int,
correct int,
answer_choice text,
fin_time datetime
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table judgement_answer created successfully";
}
else
{
	echo "</br>failed to CREATE table judgement_answer". mysql_error();
	$lable = 0;
	}
	
	
$sql_quest = "CREATE TABLE wrong_answer
(
wrong_answer_no int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(wrong_answer_no),
no int,
type tinytext,
stuno text,
usr_name text,
chapter int,
fin_time datetime
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table judgement_answer created successfully";
}
else
{
	echo "</br>failed to CREATE table judgement_answer". mysql_error();
	$lable = 0;
	}
	
	
//创建用户数据库
$sql_quest = "CREATE TABLE users
(
usr_name varchar(20),
usr_passwd char(17),
usr_email tinytext,
usr_stuno varchar(12) NOT NULL, 
PRIMARY KEY(usr_stuno),
usr_major varchar(20),
time datetime
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table student created successfully";
}
else
{
	echo "</br>failed to CREATE table student". mysql_error();
	$lable = 0;
	}

$sql_quest = "CREATE TABLE score
(
usr_name varchar(20),
usr_stuno varchar(12) NOT NULL, 
PRIMARY KEY(usr_stuno),
score_2_1 int,
score_3_1 int,
score_4_1 int,
score_5_1 int,
score_6_1 int,
score_7_1 int,
score_8_1 int,
score_9_1 int,
score_2_2 int,
score_3_2 int,
score_4_2 int,
score_5_2 int,
score_6_2 int,
score_7_2 int,
score_8_2 int,
score_9_2 int
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table student created successfully";
}
else
{
	echo "</br>failed to CREATE table student". mysql_error();
	$lable = 0;
	}
	
	
$sql_quest = "CREATE TABLE message
(
message_no int AUTO_INCREMENT, 
PRIMARY KEY(message_no),
usr_no varchar(12),
question text,
answer text
)";

if(mysql_query($sql_quest,$link)){
	echo "</br>table message created successfully";
}
else
{
	echo "</br>failed to CREATE table message". mysql_error();
	$lable = 0;
	}
	

mysql_close($link);
$ind = "unit.php";
if ($lable==1)
{
	echo "<script>location.href='".$ind."';</script>";
}

?>

</body>
</html>