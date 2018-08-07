<?php
$conn=mysqli_connect("localhost","root","","self");
$query="select * from excel";
$result=mysqli_query($conn,$query);
while($colname=mysqli_fetch_field($result))
{
if($colname->name!='id' and $colname->name!='batchid' and $colname->name!='createdateon')
{
$field[]= $colname->name;
}
}

$data=Array();
while($row=mysqli_fetch_assoc($result))
{

    $data[$row['id']] = $row;

}
//print_r($data);

require_once("./Classes/PHPExcel.php");
require_once("./Classes/PHPExcel/IOFactory.php");
@ob_clean();
$oxl = new PHPExcel();
$oxl->setActiveSheetIndex(0);

$oxl->getActiveSheet()->setTitle('sheet1');
$num='A';
foreach($field as $key=>$val)
{
$oxl->getActiveSheet()->setCellValue($num++.'1', $val);
}
$c=2;
foreach($data as $k=>$v)
{
    $num='A';
    foreach($field as $key=>$val)
    {
    $oxl->getActiveSheet()->setCellValue($num++.$c, $v[$val]);
    }
    $c++;
}
$filename='test.xls'; //save our workbook as this file name
header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache

//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
//if you want to save it as .XLSX Excel 2007 format
$objWriter = PHPExcel_IOFactory::createWriter($oxl, 'Excel5');
//force user to download the Excel file without writing it to server's HD
$objWriter->save('php://output');
exit;

?>