<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<?php
require_once('func.php');
$chapter = xss($_POST['c']);
$destination = "uploadimg/".$chapter;
session_begin();
if (!isset($_SESSION['user'])|| !isset($_SESSION['pass'])){
	jump('unit.php');
}
require_once('config.php');
$link = conn_db($hostname, $username, $password, $database);
if(!$link){
	echo "Mysql conncet ERROR";
}
$sql = "SELECT * FROM users WHERE usr_name='".$_SESSION['user']."'";
$ret = runquery($sql, $link);
$row = getresult($ret);
$uid = $row['usr_stuno'];
?>
<html>
<head>
<title>第<?php echo $chapter?>章</title>
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
<div align="center">
<h2>第<?php echo $chapter?>章判断题</h2>

<?php
//$chapter = 2;
$sql = "SELECT * FROM judgement_".$chapter." WHERE chapter=".$chapter;
$ret = mysql_query($sql,$link);
if(!$ret){
	echo "query ERROR";
	closedb($link);
	exit;
}
$i=0;
while($row = mysql_fetch_array($ret))
{
	$i = $i + 1;
	//echo $i."</br>";
}
$one = 10;
$c = chose($one,$i);
?>
<form action='answer.php' method='post'>
<table class="table table-striped" width="60%" border='1'>
<?php
for ($x=0;$x<$one;$x++){
	$sql = "SELECT * FROM judgement_".$chapter." WHERE judgement_no=".$c[$x];
	$ret = mysql_query($sql,$link);
	if(!$ret){
		echo "query ERROR";
		closedb($link);
		exit;
	}
	$row = mysql_fetch_row($ret);
	?>
    
	
	<tr>
	<td align="left" width="600px">
    <?php
	if ($row[4]==1)
	{
		echo $row[2];
	}
	else
	{
		echo "<img src=\"".$destination."/".$row[2]."\">";  	
	}
	?>
    </td>
    <td align='center' width="200px">
	<input type="radio" name="key[<?php echo $x ?>]" value="1" /> 对
	<input type="radio" name="key[<?php echo $x ?>]" value="0" /> 错
	</td>
    <input type='hidden' name='qid[<?php echo $x ?>]' value='<?php echo $row[0];?>'>
	<input type="hidden" name='uid[<?php echo $x ?>]' value='<?php echo $uid;?>'>
    <input type="hidden" name='uname' value='<?php echo $_SESSION['user'];?>'>
    <input type="hidden" name='type[<?php echo $x ?>]' value='1'>
    <input type="hidden" name='ty' value='<?php echo $chapter;?>'>
    </tr>



    <?php
	
	
}
?>
</table>
</div>


<div align="center">
<h2>第<?php echo $chapter?>章选择题</h2>

<?php
//$chapter = 2;
$sql = "SELECT * FROM choice_".$chapter." WHERE chapter=".$chapter;
$ret = mysql_query($sql,$link);
if(!$ret){
	echo "query ERROR";
	closedb($link);
	exit;
}
$i=0;
while($row = mysql_fetch_array($ret))
{
	$i = $i + 1;
	//echo $i."</br>";
}
$one = 5;
$c = chose($one,$i);
?>
<form action='answer.php' method='post'>
<table class="table table-striped" width="60%" border='1'>
<?php
for ($x=10;$x<10+$one;$x++){
	$x10 = $x - 10;
	$sql = "SELECT * FROM choice_".$chapter." WHERE choice_no=".$c[$x10];
	$ret = mysql_query($sql,$link);
	if(!$ret){
		echo "query ERROR";
		closedb($link);
		exit;
	}
	$row = mysql_fetch_row($ret);
	?>
    
	
	<tr>
	<td align="left" width="600px">
    <?php
	if ($row[4]==1)
	{
		echo $row[2];
	}
	else
	{
		echo "<img src=\"".$destination."/".$row[2]."\">"; 
	}
	?>
    </td>
    <td align="center" valign="middle" width="200px">
	<input type="radio" name="key[<?php echo $x ?>]" value="1" /> A
	<input type="radio" name="key[<?php echo $x ?>]" value="2" /> B
	<input type="radio" name="key[<?php echo $x ?>]" value="3" /> C
	<input type="radio" name="key[<?php echo $x ?>]" value="4" /> D
	</td>
    <input type='hidden' name='qid[<?php echo $x ?>]' value='<?php echo $row[0];?>'>
	<input type="hidden" name='uid[<?php echo $x ?>]' value='<?php echo $uid;?>'>
    <input type="hidden" name='uname' value='<?php echo $_SESSION['user'];?>'>
    <input type="hidden" name='type[<?php echo $x ?>]' value='3'>
    <input type="hidden" name='ty' value='<?php echo $chapter;?>'>
    </tr>



    <?php
	
	
}
?>



        
    </table>
    </div>



<div align="center">
<h2>第<?php echo $chapter?>章填空题</h2>

<?php
//$chapter = 2;
$sql = "SELECT * FROM fill_".$chapter." WHERE chapter=".$chapter;
$ret = mysql_query($sql,$link);
if(!$ret){
	echo "query ERROR";
	closedb($link);
	exit;
}
$i=0;
while($row = mysql_fetch_array($ret))
{
	$i = $i + 1;
	//echo $i."</br>";
}
$one = 5;
$c = chose($one,$i);
?>
<form action='answer.php' method='post'>
<table class="table table-striped" width="60%" border='1'>
<?php
for ($x=15;$x<15+$one;$x++)
{
	$x15 = $x - 15;
	$sql = "SELECT * FROM fill_".$chapter." WHERE fill_no=".$c[$x15];
	$ret = mysql_query($sql,$link);
	if(!$ret){
		echo "query ERROR";
		closedb($link);
		exit;
	}
	$row = mysql_fetch_row($ret);
	?>
    
	
	<tr>
	<td align="left" width="600px">
    <?php
	if ($row[4]==1)
	{
		echo $row[2];
	}
	else
	{
		echo "<img src=\"".$destination."/".$row[2]."\">"; 
	}
	?>
    </td>
    <td align="center" valign="middle" width="200px">
	<input type="text"  class="form-control" name="key[<?php echo $x ?>]" size="auto">
	</td>
    <input type='hidden' name='qid[<?php echo $x ?>]' value='<?php echo $row[0];?>'>
	<input type="hidden" name='uid[<?php echo $x ?>]' value='<?php echo $uid;?>'>
    <input type="hidden" name='uname' value='<?php echo $_SESSION['user'];?>'>
    <input type="hidden" name='type[<?php echo $x ?>]' value='2'>
    <input type="hidden" name='ty' value='<?php echo $chapter;?>'>
    </tr>



    <?php
	
	
}
?>



        
    </table>
    </div>
    
    
    
    
    </br>
    <table align="center">
    <td><button type="submit" class="btn btn-default">提交</button>
	</td><td><button type="reset" class="btn btn-default" >重置</button></td>
    </table>
    </form>





<div align='center' style="margin-top:30px;"><a href='unit.php'>返回首页</a></div>
</body>
</html>
