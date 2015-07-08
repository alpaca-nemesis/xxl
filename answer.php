<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<?php
require_once('func.php');
session_begin();
if (!isset($_SESSION['user'])|| !isset($_SESSION['pass'])){
	jump('unit.php');
}
$one = count($_POST['qid']);
$score = 75;
for ($i=0;$i<$one;$i++)
{
	
$uid[$i] = (int)xss($_POST['uid'][$i]);
$qid[$i] = (int)xss($_POST['qid'][$i]);
$key[$i] = xss($_POST['key'][$i]);
$type = (int)xss($_POST['type'][$i]);
$time = date("Y-m-d h:i:s",time());
$chapter = ($_POST['ty']);
$name = xss($_POST['uname']);
require_once('config.php');
$link = conn_db($hostname, $username, $password, $database);
if(!$link){
	echo "Mysql conncet ERROR";
}

if ($type==1)
{
	$query = "SELECT answer FROM judgement_".$chapter." WHERE judgement_no='".$qid[$i]."'";
	$ret = runquery($query,$link);
	$row = mysql_fetch_row($ret);
	if ($key[$i]==$row[0])
	{
		$correct = 1;
	}
	else
	{
		$correct = 0;
		$query = "INSERT INTO wrong_answer (chapter,type,stuno,no,fin_time,usr_name) values ('".$chapter."','".$type."','".$uid[$i]."','".$qid[$i]."','".$time."','".$name."')";
		//echo $query;
		$ret=runquery($query,$link);
		$score = $score - 5;
	}
	$query = "INSERT INTO judgement_answer_".$chapter." (judgement_no,stuno,correct,answer_jugg,fin_time) values ('".$qid[$i]."','".$uid[$i]."','".$correct."','".$key[$i]."','".$time."')";
}
elseif ($type==2)
{
	$query = "SELECT answer FROM fill_".$chapter." WHERE fill_no='".$qid[$i]."'";
	$ret = runquery($query,$link);
	$row = mysql_fetch_row($ret);
	if (1)
	{
		$correct = 3;
	}
	else
	{
		$correct = 0;
		$query = "INSERT INTO wrong_answer (chapter,type,stuno,no,fin_time,usr_name) values ('".$chapter."','".$type."','".$uid[$i]."','".$qid[$i]."','".$time."','".$name."')";
		//echo $query;
		$ret=runquery($query,$link);
		$score = $score - 5;
	}
	$query = "INSERT INTO fill_answer_".$chapter." (fill_no,stuno,correct,answer_fill,fin_time) values ('".$qid[$i]."','".$uid[$i]."','".$correct."','".$key[$i]."','".$time."')";
}
elseif ($type==3)
{
	$query = "SELECT answer FROM choice_".$chapter." WHERE choice_no='".$qid[$i]."'";
	$ret = runquery($query,$link);
	$row = mysql_fetch_row($ret);
	if ($key[$i]==$row[0])
	{
		$correct = 1;
	}
	else
	{
		$correct = 0;
		$query = "INSERT INTO wrong_answer (chapter,type,stuno,no,fin_time,usr_name) values ('".$chapter."','".$type."','".$uid[$i]."','".$qid[$i]."','".$time."','".$name."')";
		//echo $query;
		$ret=runquery($query,$link);
		$score = $score - 5;
	}
	$query = "INSERT INTO choice_answer_".$chapter." (choice_no,stuno,correct,answer_choice,fin_time) values ('".$qid[$i]."','".$uid[$i]."','".$correct."','".$key[$i]."','".$time."')";
}
$ret = runquery($query,$link);
}

$query = "SELECT * FROM score WHERE usr_stuno=".$uid[0];
$ret = runquery($query,$link);
$row=getresult($ret);
switch ($chapter)
{
	case 2:
	if ($row['score_2_1']>=$score)
	{
		break;
	}
	else
	{
		$query = "UPDATE score SET score_2_1 = ".$score." WHERE usr_stuno=".$uid[0];
		mysql_query($query,$link);
	}		
	break;  
    case 3:
	if ($row['score_3_1']>=$score)
	{
		break;
	}
	else
	{
		$query = "UPDATE score SET score_3_1 = ".$score." WHERE usr_stuno=".$uid[$i];
		mysql_query($query,$link);
	}		
	break; 
    case 4:
	if ($row['score_4_1']>=$score)
	{
		break;
	}
	else
	{
		$query = "UPDATE score SET score_4_1 = ".$score." WHERE usr_stuno=".$uid[$i];
		mysql_query($query,$link);
	}		
	break; 
    case 5:
	if ($row['score_5_1']>=$score)
	{
		break;
	}
	else
	{
		$query = "UPDATE score SET score_5_1 = ".$score." WHERE usr_stuno=".$uid[$i];
		mysql_query($query,$link);
	}		
	break; 
    case 6:
	if ($row['score_6_1']>=$score)
	{
		break;
	}
	else
	{
		$query = "UPDATE score SET score_6_1 = ".$score." WHERE usr_stuno=".$uid[$i];
		mysql_query($query,$link);
	}		
	break; 
    case 7:
	if ($row['score_7_1']>=$score)
	{
		break;
	}
	else
	{
		$query = "UPDATE score SET score_7_1 = ".$score." WHERE usr_stuno=".$uid[$i];
		mysql_query($query,$link);
	}		
	break; 
    case 8:
	if ($row['score_8_1']>=$score)
	{
		break;
	}
	else
	{
		$query = "UPDATE score SET score_8_1 = ".$score." WHERE usr_stuno=".$uid[$i];
		mysql_query($query,$link);
	}		
	break; 
    case 9:
	if ($row['score_9_1']>=$score)
	{
		break;
	}
	else
	{
		$query = "UPDATE score SET score_9_1 = ".$score." WHERE usr_stuno=".$uid[$i];
		mysql_query($query,$link);
	}		
	break; 
}
echo '<script type="text/javascript"> alert("本次答题客观题成绩为：'.$score.'分");</script>';
jump("unit.php");
?>