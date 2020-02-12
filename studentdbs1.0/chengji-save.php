<?php
//接收chengji-input.php提交的数据，保存到数据库中
include("conn.php");
$student_xuehao = $_REQUEST['student_xuehao'];
$kc_sn = $_REQUEST['kc_sn'];
$student_result = $_REQUEST['student_result'];



$sql = "insert into 成绩(学号,课程编号,成绩) values ('".$student_xuehao."','".$kc_sn."','".$student_result."') ";
$result  = mysqli_query($conn,$sql);
if($result){
	
	echo "<script>alert('数据添加成功!');</script>";
	echo "<script>window.history.go(-1);</script>";
	//Refresh:暂停时间
	// hearder("Refresh:1;url=kecheng-input.php");
}else{
	echo "数据添加失败！".mysqli_error($conn);
}
mysqli_close($conn);

?>