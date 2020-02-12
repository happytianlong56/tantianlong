<?php
include("conn.php");
$kc_name = $_REQUEST['kc_name'];
$kc_sn = $_REQUEST['kc_sn'];
// $sql = "update 课程 set 课程名='".$kc_name."' where 课程编号='".$kc_sn."'";
$sql = "update 课程 set 课程名 ='$kc_name' where 课程编号='$kc_sn'";
die($sql);
$result = mysqli_query($conn,$sql);
if($result){
	echo "<script>alert('修改成功!');</script>";

}else{
	echo "修改失败！".mysqli_error($conn);
}
	header("Refresh:1;url=kecheng-list.php");
mysqli_close($conn);

?>