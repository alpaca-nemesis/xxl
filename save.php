<?php
	$sql = "SELECT * FROM usr_ques WHERE uid='".$uid."' AND qid='".$row['qid']."'";
	$ret_2 = runquery($sql, $link);
	$row_2 = getresult($ret_2);
	if ($row['qid'] == $row_2['qid']){
	?>
	<td align='center'><?php echo $row_2['fin_time'];?></td>
	<td align='center'>已完成</td>
	<?php }else{?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
</body>
</html>

<table width="50%" border='1'>
<?php

$sql = "SELECT * FROM judgement";

$ret = runquery($sql,$link);
if(!$ret){
	echo "query ERROR";
	closedb($link);
	exit;
}
while($row = getresult($ret)){
?>
	<form action='answer.php' method='post'>
	<tr>
	<td align='left'>
    <?php
    echo $row['stem'];
	?></td>
	<!--<td align='center'>KEY:<input type="text" name="key"></td>-->
<td align='center'>
<input type="radio" name="key" value="1" /> 对
<input type="radio" name="key" value="0" /> 错
</td>
	<input type='hidden' name='qid' value='<?php echo $row['judgement_no'];?>'>
	<input type="hidden" name='uid' value='<?php echo $uid;?>'>
	
	</tr>
	
<?php }?>
<td align='center'><input type='submit' value='提交'></td>
<td align='center'><input type="reset" value="重置"></td>
</form>
</table>