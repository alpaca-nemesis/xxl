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
	jump('index.html');
}else{
	require_once('../config.php');
	$link = conn_db($hostname, $username, $password, $database);
	if(!$link){
		echo "Mysql conncet ERROR";
	}
}
?>
<h1><center>信息论课程在线答题系统管理后台</center></h1>
<div align="right" style="margin-right:20px;"><a href="logout.php">注销	</a></div>
<hr>
<br>

<form action='reply_upload.php' method='post'>
<table width="60%" align="center" border='1'>

    <tr>
    <td align="center" width="10%">学号</td>
    <td align="center" width="30%">问题</td>
    <td align="center" width="30%">回答</td>
    <td align="center" width="30%">新回答</td>
    </tr>



<?php
	$sql = "SELECT * FROM message";
	$ret = runquery($sql,$link);
	$i=0;
	while($row = mysql_fetch_array($ret))
	{
?>
<tr>
<td width="10%" align="center">       
<?php
		echo $row['usr_no'];
?>
</td>
<td width="30%"	align="center">
<?php
		echo $row['question'];
?>
</td>
<td width="30%"	align="center">
<?php
		echo $row['answer'];
?>
</td>
<td width="30%" aligh="center">
<input type="text" name="key[<?php echo $i ?>]" size="auto">
<input type="hidden" name='no[<?php echo $i ?>]' value='<?php echo $row['message_no'];?>'>
</td>
</tr>
<?php
$i=$i+1;
	}
	
?>
</table>
    <table align="center">
    <td align='center'><input type='submit' value='提交'></td>
	<td align='center'><input type="reset" value="重置"></td>
    </table>
    </form>



</body>
</html>