<?php
//接收class-input.php提交的数据，保存到数据库中
include("conn.php");
$class_name = $_REQUEST['class_name'];
$class_position = $_REQUEST['class_position'];
$teacher = $_REQUEST['teacher'];
$monitor = $_REQUEST['monitor'];



$sql = "insert into 班级(班号,教室,班主任,班长) values ('".$class_name."','".$class_position."','".$teacher."','".$monitor."')";
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