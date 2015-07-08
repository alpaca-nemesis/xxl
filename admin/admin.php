<?php
require_once('../func.php');
session_begin();
?>
<html>
<head>
<title>信息论课程在线答题系统</title>
<link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
</head>
<body>
<?php

if (!isset($_SESSION['user'])||!isset($_SESSION['pass'])||($_SESSION['user']!="admin")){
	jump('../unit.php');
}else{
	require_once('../config.php');
	$link = conn_db($hostname, $username, $password, $database);
	if(!$link){
		echo "Mysql conncet ERROR";
	}
?>
<h1><center>信息论课程在线答题系统管理后台</center></h1>
<div align="right" style="margin-right:20px;"><a href="logout.php">注销	</a></div>
<hr>
<br>
<div align="center">
<h2><center>题目管理</center></h2>
<a href='subject.php'><center>添加题目</center></a>
<a href='delete.php'><center>删除题目</center></a>
<h2><center>查看</center></h2>
<a href='score.php'><center>成绩统计</center></a>
<a href='statistics.php'><center>错题统计</center></a>
<h2><center>批阅主观题</center></h2>
<a href='reply.php'><center>批阅</center></a>
</div>
<hr>
<div align='center' style="margin-top:30px;"><a href='../unit.php'>返回首页</a></div>
</body>
</html>
<?php }?>