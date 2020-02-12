<?php
//接收kecheng-input.php提交的数据，保存到数据库中
include("conn.php");
$kc_name = $_REQUEST['kc_name'];
$kc_sn = $_REQUEST['kc_sn'];

$sql = "insert into 课程(课程编号,课程名) values ('".$kc_sn."','".$kc_name."') ";

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