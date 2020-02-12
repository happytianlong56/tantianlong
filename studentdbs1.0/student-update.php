<?php
include("conn.php");

$sql = "update 学生 set 学号='{$_GET['st_xuehao']}',
班号='{$_GET['st_banhao']}',
性别={$_GET['st_sex']},
出生日期='{$_GET['st_birthday']}',
手机号='{$_GET['st_phone']}',
姓名='{$_GET['st_name']}'
 where 学号 = '{$_GET['st_xuehao']}'";

$result = mysqli_query($conn,$sql);

if($result){
	echo "<script>alert('修改成功！');</script>";
}else{
	
	echo "<script>alert('修改失败！');</script>";
}
header("Refresh:1;url=student-list.php");

mysqli_close($conn);


?>