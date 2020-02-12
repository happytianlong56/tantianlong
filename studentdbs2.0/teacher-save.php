<?php
//接收teacher-input.php提交的数据，保存到数据库中
include("conn.php");
$teacher_ID = $_REQUEST['teacher_ID'];
$teacher = $_REQUEST['teacher'];
$phone = $_REQUEST['phone'];




$sql = "insert into 班主任(班主任ID,班主任姓名,手机) values ('".$teacher_ID."','".$teacher."','".$phone."')";
$result  = mysqli_query($conn,$sql);
if($result){
	echo "<script>alert('班主任添加成功!');</script>";
	echo "<script>window.history.go(-1);</script>";
	//Refresh:暂停时间
	// hearder("Refresh:1;url=kecheng-input.php");
}else{
	echo "数据添加失败！".mysqli_error($conn);
}
mysqli_close($conn);

?>