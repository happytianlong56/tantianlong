<?php
include("conn.php");

$sql = "update 成绩 set 学号='".$_GET['grade_xuehao']."',课程编号='".$_GET['grade_kechenghao']."',成绩='".$_GET['grade_num']."' where id = '".$_GET['grade_id']."'";

$result = mysqli_query($conn,$sql);

if($result){
	echo "<script>alert('修改成功！');</script>";
}else{
	
	echo "<script>alert('修改失败！');</script>";
}
header("Refresh:1;url=chengji-list.php");

mysqli_close($conn);


?>