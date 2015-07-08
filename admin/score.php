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
<h2><center>成绩统计</center></h2>
<table class="table table-striped" width="62%" border='1' align="center">
        <tr>
        <td align="center" >
        学号
        </td>
        <td align="center" >
        用户名
        </td>
        <td align="center">
        第二章
        </td>
        <td align="center">
        第三章
        </td>
        <td align="center">
        第四章
        </td>
        <td align="center">
        第五章
        </td>
        <td align="center">
        第六章
        </td>
        <td align="center">
        第七章
        </td>
        <td align="center">
        第八章
        </td>
        <td align="center">
        第九章
        </td>
        </tr>

<?php
$query = "SELECT * FROM score ORDER BY usr_stuno";
$ret = mysql_query($query,$link);
while($row = getresult($ret))
{
	?>
    <tr>
    <td align="center">
    <?php
	echo $row['usr_stuno'];
	?>
    </td>
    <td align="center">
    <?php
	echo $row['usr_name'];
	?>
    </td>
    <td align="center"> 
    <?php
	echo $row['score_2_1']+$row['score_2_2'];
	?>
    </td>
    <td align="center"> 
    <?php
	echo $row['score_3_1']+$row['score_3_2'];
	?>
    </td>
    <td align="center"> 
    <?php
	echo $row['score_4_1']+$row['score_4_2'];
	?>
    </td>
    <td align="center"> 
    <?php
	echo $row['score_5_1']+$row['score_5_2'];
	?>
    </td>
    <td align="center"> 
    <?php
	echo $row['score_6_1']+$row['score_6_2'];
	?>
    </td>
    <td align="center"> 
    <?php
	echo $row['score_7_1']+$row['score_7_2'];
	?>
    </td>
    <td align="center"> 
    <?php
	echo $row['score_8_1']+$row['score_8_2'];
	?>
    </td>
    <td align="center">
    <?php
	echo $row['score_9_1']+$row['score_9_2'];
}
	?>
    </td>
    </tr>
    </table>

    <div align='center' style="margin-top:30px;"><a href='output.php'>导出成绩</a><a href='admin.php'><p>返回首页</p></a></div>
    
</body>
</html>
<?php }?>