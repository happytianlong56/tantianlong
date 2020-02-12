<?php
include("conn.php");
$sql = "delete from 成绩 where id='".$_GET['kid']."' ";
$result = mysqli_query($conn,$sql);


if($result){
	echo "<script>alert('删除成功！');</script>";
}else{
	echo "<script>alert('删除失败!')</script>";
}
header("Refresh:1;url=chengji-list.php");


mysqli_close($conn);



?>