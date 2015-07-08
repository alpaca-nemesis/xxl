<?php
require_once('../func.php');
session_begin();
?>
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
      
    <?php  
    /****************************************************************************** 
     
    参数说明: 
    $max_file_size  : 上传文件大小限制, 单位BYTE 
    $destination_folder : 上传文件路径 
    $watermark   : 是否附加水印(1为加水印,其他为不加水印); 
     
    使用说明: 
    1. 将PHP.INI文件里面的"extension=php_gd2.dll"一行前面的;号去掉,因为我们要用到GD库; 
    2. 将extension_dir =改为你的php_gd2.dll所在目录; 
    ******************************************************************************/  
      
    //上传文件类型列表  
    $uptypes=array(  
        'image/jpg',  
        'image/jpeg',  
        'image/png',  
        'image/pjpeg',  
        'image/gif',  
        'image/bmp',  
        'image/x-png'  
    );  
      
    $max_file_size=2000000;     //上传文件大小限制, 单位BYTE  
    $destination_folder="uploadimg/"; //上传文件路径  
    $imgpreview=1;      //是否生成预览图(1为生成,其他为不生成);  
    $imgpreviewsize=1;    //缩略图比例  
    ?>  
    <html>  
    <head>  
    <title>添加图片题目</title>  
<link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
</head>  
      
    <body>  
    <h1><center>信息论课程在线答题系统管理后台</center></h1>
<div align="right" style="margin-right:20px;"><a href="logout.php">注销	</a></div>
<hr>
<br>
<div align="center">
输入题目&nbsp;&nbsp;&nbsp;&nbsp;<a href='../unit.php'>回首页</a>
</div>
<form action="picinput.php" method="post" enctype="multipart/form-data">  
<table align="center">
<tr>
<td>类型</td>
<td>
<input type="radio" name="ty" value="judgement" /> 判断题
<input type="radio" name="ty" value="blank" /> 填空题
<input type="radio" name="ty" value="choice" /> 选择题
</td>
</tr>
<tr><td>章节</td>
<td><input class="form-control" type="text" name="chapter"></td>
</tr>
<tr>
<td>题目</td>
<td><input name="file" type="file" id="file"></td>
</tr>
<tr>
<td>答案</td><td> <input class="form-control" type="text" name="answer"></td>
</tr>
      
   
    <tr>
<td><button type="submit" class="btn btn-default">提交</button></td>
<td><button type="reset" class="btn btn-default" >重置</button></td>
</tr>
    </table>
    </form>
    <hr>
<div align='center' style="margin-top:30px;"><a href='./subject.php'>切换输入</a></div>
    </body>  
    </html>  