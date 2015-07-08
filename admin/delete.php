<?php
require_once('../func.php');
session_begin();
?>
<html>
<head>
<title>删除题目</title>
<link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
</head>
<body>
<?php

if (!isset($_SESSION['user'])||!isset($_SESSION['pass'])||($_SESSION['user']!="admin")){
	jump('../unithtml');
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
<form action="del_action.php" method="post">
<div align="center">
输入题目&nbsp;&nbsp;&nbsp;&nbsp;<a href='../unit.php'>回首页</a>
<table align='center'>
<tr>
<td>类型</td>
<td>
<input type="radio" name="ty" value="judgement" /> 判断题
<input type="radio" name="ty" value="blank" /> 填空题
<input type="radio" name="ty" value="choice" /> 选择题
</td>
</tr>
<tr><td>章节</td>
<td><input class="form-control" type="text" name="chapter"></td>
</tr>
<tr>
<td>编号</td><td> <input class="form-control" type="text" name="no"></td>
</tr>
<td><button type="submit" class="btn btn-default">提交</button></td>
<td><button type="reset" class="btn btn-default" >重置</button></td>
</table>
</div>
</form>

</body>
</html>
<?php }?>