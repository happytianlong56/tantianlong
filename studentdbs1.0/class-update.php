<?php
include("conn.php");

$sql = "update 班级 set 教室='".$_GET['class_position']."',班主任='".$_GET['teacher']."',班长='".$_GET['monitor']."' where 班号 = '".$_GET['class_name']."'";

$result = mysqli_query($conn,$sql);

if($result){
	echo "<script>alert('修改成功！');</script>";
}else{
	
	echo "<script>alert('修改失败！');</script>";
}
header("Refresh:1;url=class-list.php");

mysqli_close($conn);












?>