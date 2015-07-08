<?php  
/** PHPExcel */  
require_once 'Classes/PHPExcel.php';  	
  
// Create new PHPExcel object  
$objPHPExcel = new PHPExcel();  
  
// Set properties  
$objPHPExcel->getProperties()->setCreator("BUPT")  
                             ->setLastModifiedBy("BUPT")  
                             ->setTitle("SCORES")  
                             ->setSubject("SCORES")  
                             ->setDescription("EXPORT THE SCORES OF STUDENTS TO EXCEL")  
                             ->setKeywords("SCORES XXL")  
                             ->setCategory("Test result file");  

  
// Add some data  
  
  
$objPHPExcel->setActiveSheetIndex(0)  
            ->setCellValue('A1', '学号')  
            ->setCellValue('B1', '用户名')  
            ->setCellValue('C1', '第二章')  
            ->setCellValue('D1', '第三章')  
            ->setCellValue('E1', '第四章')  
            ->setCellValue('F1', '第五章')  
            ->setCellValue('G1', '第六章')  
            ->setCellValue('H1', '第七章')  
            ->setCellValue('I1', '第八章')  
            ->setCellValue('J1', '第九章');      
  
//数据库连接  
$db = mysql_connect("localhost", "root", "");  
mysql_select_db("xxl",$db);  //选择数据库，这里为"ywcl"。  
mysql_query("SET NAMES UTF8"); //设定编码方式为UTF8  
  
$sql = "SELECT * FROM score ORDER BY usr_stuno";  
$ret = mysql_query($sql);  
    $numrows=mysql_num_rows($ret);  
    if ($numrows>0)  
    {  
        $count=1;  
        while($data=mysql_fetch_array($ret))  
        {  
            $count+=1;  
            $l1="A"."$count";  
            $l2="B"."$count";  
            $l3="C"."$count";  
            $l4="D"."$count";  
			$l5="E"."$count";  
			$l6="F"."$count";  
			$l7="G"."$count";  
			$l8="H"."$count";  
			$l9="I"."$count";  
			$l10="J"."$count";  
			
            $objPHPExcel->setActiveSheetIndex(0)              
                        ->setCellValue($l1, $data['usr_stuno'])  
                        ->setCellValue($l2, $data['usr_name'])  
                        ->setCellValue($l3, $data['score_2_1']+$data['score_2_2'])  
                        ->setCellValue($l4, $data['score_3_1']+$data['score_3_2'])
						->setCellValue($l5, $data['score_4_1']+$data['score_4_2'])
						->setCellValue($l6, $data['score_5_1']+$data['score_5_2'])
						->setCellValue($l7, $data['score_6_1']+$data['score_6_2'])
						->setCellValue($l8, $data['score_7_1']+$data['score_7_2'])
						->setCellValue($l9, $data['score_8_1']+$data['score_8_2'])
						->setCellValue($l10, $data['score_9_1']+$data['score_9_2']);  
        }  
    }          
  
// Rename sheet  
$objPHPExcel->getActiveSheet()->setTitle('成绩');  
  
  
// Set active sheet index to the first sheet, so Excel opens this as the first sheet  
$objPHPExcel->setActiveSheetIndex(0);  
  
  
// Redirect output to a client's web browser (Excel5)  
header('Content-Type: application/vnd.ms-excel');  
header('Content-Disposition: attachment;filename="成绩.xls"');  
header('Cache-Control: max-age=0');  
  
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');  
$objWriter->save('php://output');  
exit;  
?>  