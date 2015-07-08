<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<?php
require_once('func.php');
require_once('config.php');
session_begin();
require_once('config.php');
$link = conn_db($hostname, $username, $password, $database);
if(!$link){
	echo "Mysql conncet ERROR";
}
?>

<head>
<title>信息论课程在线答题系统</title>
<link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
</head>
<body>
<h1><center>信息论课程在线答题系统</center></h1>
<hr>

<?php
if (!isset($_SESSION['user'])||!isset($_SESSION['pass'])){
?>
	<div align="center">
	<table width="20%" style="margin-right:20px;margin_top:0px" border='0'>
	<tr align="center">
	<td width="%20"><a href='login.html'>登录</a>
    <a href='reg.html'>注册</a></td></tr>
	</table>
	</div>
<?php
}
else{
	?>
	<div align="center">
	<table width="20%" style="margin-right:20px;margin_" border='0'>
	<tr align="center">
	<td width="%20">
    <?php echo "欢迎，" . $_SESSION['user'];?>&nbsp;&nbsp;<a href='logout.php'>注销</a>
	<a href='chapter.php'>答题</a>&nbsp;<a href='lookback.php'>错题回顾</a></td>
	</table>
       </br>
    <h2>&nbsp;</h2>
</div>
<?php
}
?>

</body>
</html>