<?php
include("conn.php");

$sql = "update `栏目` SET `栏目名称`='".$_GET['lanmu_name']."' where id = '".$_GET['kid']."' ";

$result = mysqli_query($conn,$sql);

if($result){
	echo "<script>alert('修改成功！');</script>";
}else{
	
	echo "<script>alert('修改失败！');</script>";
}
header("Refresh:1;url=lanmu-list.php");

mysqli_close($conn);


?>