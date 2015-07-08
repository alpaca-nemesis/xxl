<?php
require_once('../func.php');
session_begin();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>批阅主观题</title>
<link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
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
	}
?>

<h1><center>信息论课程在线答题系统管理后台</center></h1>
<div align="right" style="margin-right:20px;"><a href="logout.php">注销	</a></div>
<hr>
<br>
<h2><center>主观题</center></h2>
<form action='reply_upload.php' method='post'>
<table class="table table-striped" width="60%" align="center" border='1'>
<tr>
<td align="left" width="80px">
章节
</td>
<td align="left" width="80px">
学号
</td>
<td align="left" width="100px">
题目编号
</td>
<td align="left" width="800px">
题目
</td>
<td align="left" width="400px">
标准答案
</td>
<td align="left" width="400px">
学生答案
</td>
<td align="left" width="250px">
对错
</td>
</tr>
<?php
for ($i=2;$i<=9;$i++)
{
	$destination = "../uploadimg/".$i;
?>
<tr>            
<?php
	$sql = "SELECT * FROM fill_answer_".$i." WHERE correct='3'";
	$ret = runquery($sql,$link);
	$j=1;
	while($row = mysql_fetch_array($ret))
	{
		?>
		<td>            
		<?php
		echo $i;
		?>
        </td><td>            
		<?php
		echo $row[2];
		?>
        </td><td>            
		<?php
		echo $row[1];
		?>
        </td><td>            
		<?php
		$query2 = "SELECT * FROM fill_".$i." WHERE fill_no='".$row[1]."'";
		$ret2 = runquery($query2,$link);
		$row2 = mysql_fetch_array($ret2);
		if ($row2[4]==1)
		{
			echo $row2[2];
		}
		else
		{
			echo "<img width=100% src=\"".$destination."/".$row2[2]."\">";  	
		}
		?>
        </td><td>            
		<?php
		echo $row2[3];
		?>
        </td><td>   
        <?php
		echo $row[4];
		?>
        </td>
  	 	 <td align='center' width="200px">
		<input type="radio" name="key[<?php echo $j ?>]" value="1" /> 对
		<input type="radio" name="key[<?php echo $j ?>]" value="0" /> 错
		</td>
        <input type='hidden' name='aid[<?php echo $j ?>]' value='<?php echo $row[0];?>'>
		<input type="hidden" name='qid[<?php echo $j ?>]' value='<?php echo $row[1];?>'>
		<input type="hidden" name='uid[<?php echo $j ?>]' value='<?php echo $row[2];?>'>
  		<input type="hidden" name='chapter[<?php echo $j ?>]' value='<?php echo $i;?>'>
   		<input type="hidden" name='ty' value='2'>        
   		<input type="hidden" name='fin_time' value='<?php echo $row[5];?>'>
        <?php
		?>
        </tr>
        <?php
		$j=$j+1;
		if ($j==6)
		break;
	}

?>
</tr>            
<?php
}
?>

</table>
    <table align="center">
    <td align='center'><input type='submit' value='提交'></td>
	<td align='center'><input type="reset" value="重置"></td>
    </table>
    </form>



<div align='center' style="margin-top:30px;"><a href='admin.php'>返回首页</a></div>
</body>
</html>