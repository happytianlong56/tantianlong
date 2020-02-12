<?php
//接收kecheng-input.php提交的数据，保存到数据库中
include("conn.php");
$lanmu_name = $_REQUEST['lanmu_name'];


$sql = "insert into 栏目(栏目名称) values ('".$lanmu_name."') ";

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