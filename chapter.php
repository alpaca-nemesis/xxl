<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
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
<html>
<head>
<title>选择章节</title>
<link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
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
</div>
<hr>
<br>
<center>
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
<form action="list.php" method="post">
<div align='center' style="margin-top:70px">
	<input type="radio" name="c" value="2" /> 第二章
	<input type="radio" name="c" value="3" /> 第三章
    <input type="radio" name="c" value="4" /> 第四章
    <input type="radio" name="c" value="5" /> 第五章
    <input type="radio" name="c" value="6" /> 第六章
    <input type="radio" name="c" value="7" /> 第七章
    <input type="radio" name="c" value="8" /> 第八章
    <input type="radio" name="c" value="9" /> 第九章
    
    </br>
    </br>
    </br>
<button type="submit" class="btn btn-default">开始答题</button>


</div>
</form>
<div align='center' style="margin-top:30px;"><a href='unit.php'>返回首页</a></div>

</body>
</html>