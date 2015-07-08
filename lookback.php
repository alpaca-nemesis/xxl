<?php
require_once('func.php');
//$chapter = xss($_POST['c']);
session_begin();
if (!isset($_SESSION['user'])|| !isset($_SESSION['pass'])){
	jump('unit.php');
}
require_once('config.php');
$link = conn_db($hostname, $username, $password, $database);
if(!$link){
	echo "Mysql conncet ERROR";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>错题回顾</title>
<link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
</head>

<body>
<h1><center>信息论课程在线答题系统</center></h1>

<div align="right">
<table width="20%" style="margin-right:20px;margin_top:0px" border='0'>
<tr align="right">
<td>
ID:<a>
<?php
echo $_SESSION['user'];
?>
</a>
&nbsp;&nbsp;<a href="logout.php">注销</a>
</td>

</table>
<hr>
<h2 align="center">客观题成绩</h2>

<table class="table table-striped" width="62%" border='1' align="center">
        <tr>
        <td align="center">
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
        <tr>
        <td align="center">
        <?php
		echo $_SESSION['user'];
		?>
        </td>
        <td align="center">
        <?php 
		$query = "SELECT * FROM score WHERE usr_name='".$_SESSION['user']."'";
		$ret = mysql_query($query,$link);
		$row = getresult($ret);
        echo $row['score_2_1'];
		?>
		</td>
		<td align="center">
        <?php
		echo $row['score_3_1'];
		?>
        </td>
		<td align="center">
        <?php
		echo $row['score_4_1'];
		?>
        </td>
		<td align="center">
        <?php
		echo $row['score_5_1'];
		?>
        </td>
		<td align="center">
        <?php
		echo $row['score_6_1'];
		?>
        </td>
		<td align="center">
        <?php
		echo $row['score_7_1'];
		?>
        </td>
		<td align="center">
        <?php
		echo $row['score_8_1'];
		?>
        </td>
		<td align="center">
        <?php
		echo $row['score_9_1'];
		?>
        </td>
        </tr>
        </table>
<h2 align="center">主观题成绩</h2>

<table class="table table-striped" width="62%" border='1' align="center">
        <tr>
        <td align="center">
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
        <tr>
        <td align="center">
        <?php
		echo $_SESSION['user'];
		?>
        </td>
        <td align="center">
        <?php 
		$query = "SELECT * FROM score WHERE usr_name='".$_SESSION['user']."'";
		$ret = mysql_query($query,$link);
		$row = getresult($ret);
        echo $row['score_2_2'];
		?>
		</td>
		<td align="center">
        <?php
		echo $row['score_3_2'];
		?>
        </td>
		<td align="center">
        <?php
		echo $row['score_4_2'];
		?>
        </td>
		<td align="center">
        <?php
		echo $row['score_5_2'];
		?>
        </td>
		<td align="center">
        <?php
		echo $row['score_6_2'];
		?>
        </td>
		<td align="center">
        <?php
		echo $row['score_7_2'];
		?>
        </td>
		<td align="center">
        <?php
		echo $row['score_8_2'];
		?>
        </td>
		<td align="center">
        <?php
		echo $row['score_9_2'];
		?>
        </td>
        </tr>
        </table>
<h2 align="center">错题回顾</h2>
<?php

$query = "SELECT DISTINCT chapter,type,no FROM wrong_answer WHERE usr_name='".$_SESSION['user']."' ORDER BY chapter,type,no";
$ret = mysql_query($query,$link);
if(!$ret){
	echo "query ERROR";
	closedb($link);
	exit;
}
$i=0;
?>
<table class="table table-striped" width="62%" border='1' align="center">
        <tr>
        <td align="center">
        章节
        </td>
        <td align="center" width="600px">
        题目
        </td>
        <td align="center" width="200px">
        答案
        </td>
        </tr>
<?php
while($row = mysql_fetch_array($ret))
{
	$i = $i + 1;
	if ($row['type']==1)
	{
		$type = "judgement";
	}
	elseif ($row['type']==2)
	{
		$type = "fill";
	}
	else
	{
		$type = "choice";
	}
	$query1 = "SELECT * FROM ".$type."_".$row['chapter']." WHERE ".$type."_no=".$row['no'];
	$ret1 = mysql_query($query1,$link);
	if(!$ret1){
		echo "query ERROR";
		closedb($link);
		exit;
	}
	$row1 = mysql_fetch_row($ret1);
	?>
    
	
	<tr>
    <td align="center">
    <?php echo $row1[1];
	?>
    </td>
	<td align="center" width="600px">
    <?php
	echo $row1[2];
	?>
    </td>
    <td align="center" width="200px">
    <?php echo $row1[3];
	?>
    </td>
    </tr>

<?php
}?>
</table>

<div align='center' style="margin-top:30px;"><a href='unit.php'>返回首页</a></div>
</body>
</html>