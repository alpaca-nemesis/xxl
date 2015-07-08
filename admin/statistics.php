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
<h1><center>信息论课程在线答题系统管理后台</center></h1>
<div align="right" style="margin-right:20px;"><a href="logout.php">注销</a></div>
<hr>
<?php

$chapter_num = 8;

if (!isset($_SESSION['user'])||!isset($_SESSION['pass'])||($_SESSION['user']!="admin")){
	jump('../unit.php');
}else{
	require_once('../config.php');
	$link = conn_db($hostname, $username, $password, $database);
	if(!$link){
		echo "Mysql conncet ERROR";
	}
else
{
	for ($i=2;$i<=$chapter_num+1;$i++)
	{?>
    	<h2><center>第<?php echo $i;
		?>章判断题错题统计</center></h2>
		<table class="table table-striped" width="62%" border='1' align="center">
        <tr>
        <td align="center" width="600px">
        题目
        </td>
        <td align="center" width="200px">
        答案
        </td>
        <td align="center">
        出错次数
        </td>
        </tr>
        
		<?php
		$query = "SELECT DISTINCT no FROM wrong_answer WHERE chapter=".$i." AND type=1";
		$ret = runquery($query,$link);
		while($row = mysql_fetch_array($ret))
		{
			$no = $row['no'];
			$count = 0;
			$sql = "SELECT * FROM wrong_answer WHERE chapter=".$i." AND no=".$no;
			//echo $sql."</br>";
			$ret1 = runquery($sql,$link);
			while($row = mysql_fetch_array($ret1))
			{
				$count = $count+1;
			}
			$sql = "SELECT * FROM judgement_".$i." WHERE judgement_no=".$no;
			//echo $sql."</br>";
			$ret1 = runquery($sql,$link);
			$row = mysql_fetch_array($ret1);
			?>
            <tr>
            <td align="left" width="600px">
            <?php
			echo $row['stem'];
			?>
            </td>
            <td align='center' width="200px">
            <?php
			echo $row['answer'];
			?>
            </td>
            <td align="center">
            <?php
			echo $count;
			?>
            </td>
            </tr>
            <?php
			
		}
		?>  
		</table>
        <?php
	}
	for ($i=2;$i<=$chapter_num+1;$i++)
	{?>
    	<h2><center>第<?php echo $i;
		?>章选择题错题统计</center></h2>
		<table class="table table-striped" width="62%" border='1' align="center">
        <tr>
        <td align="center" width="600px">
        题目
        </td>
        <td align="center" width="200px">
        答案
        </td>
        <td align="center">
        出错次数
        </td>
        </tr>
		<?php
		$query = "SELECT DISTINCT no FROM wrong_answer WHERE chapter=".$i." AND type=3";
		$ret = runquery($query,$link);
		while($row = mysql_fetch_array($ret))
		{
			$no = $row['no'];
			$count = 0;
			$sql = "SELECT * FROM wrong_answer WHERE chapter=".$i." AND no=".$no;
			//echo $sql."</br>";
			$ret1 = runquery($sql,$link);
			while($row = mysql_fetch_array($ret1))
			{
				$count = $count+1;
			}
			$sql = "SELECT * FROM choice_".$i." WHERE choice_no=".$no;
			//echo $sql."</br>";
			$ret1 = runquery($sql,$link);
			$row = mysql_fetch_array($ret1);
			?>
            <tr>
            <td align="left" width="600px">
            <?php
			echo $row['stem'];
			?>
            </td>
            <td align='center' width="200px">
            <?php
			echo $row['answer'];
			?>
            </td>
            <td align="center">
            <?php
			echo $count;
			?>
            </td>
            </tr>
            <?php
			
		}
		?>  
		</table>
        <?php
	}
	for ($i=2;$i<=$chapter_num+1;$i++)
	{?>
    	<h2><center>第<?php echo $i;
		?>章填空题错题统计</center></h2>
		<table class="table table-striped" width="62%" border='1' align="center">
        <tr>
        <td align="center" width="600px">
        题目
        </td>
        <td align="center" width="200px">
        答案
        </td>
        <td align="center">
        出错次数
        </td>
        </tr>
		<?php
		$query = "SELECT DISTINCT no FROM wrong_answer WHERE chapter=".$i." AND type=2";
		$ret = runquery($query,$link);
		while($row = mysql_fetch_array($ret))
		{
			$no = $row['no'];
			$count = 0;
			$sql = "SELECT * FROM wrong_answer WHERE chapter=".$i." AND no=".$no;
			//echo $sql."</br>";
			$ret1 = runquery($sql,$link);
			while($row = mysql_fetch_array($ret1))
			{
				$count = $count+1;
			}
			$sql = "SELECT * FROM fill_".$i." WHERE fill_no=".$no;
			//echo $sql."</br>";
			$ret1 = runquery($sql,$link);
			$row = mysql_fetch_array($ret1);
			?>
            <tr>
            <td align="left" width="600px">
            <?php
			echo $row['stem'];
			?>
            </td>
            <td align='center' width="200px">
            <?php
			echo $row['answer'];
			?>
            </td>
            <td align="center">
            <?php
			echo $count;
			?>
            </td>
            </tr>
            <?php
			
		}
		?>  
		</table>
        <?php
	}
}
}
?>

<div align='center' style="margin-top:30px;"><a href='admin.php'>返回首页</a></div>
</body>
</html>