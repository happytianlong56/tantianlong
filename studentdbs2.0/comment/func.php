<?php

	 //分页封装函数
	  function pageList($pagenum,$pagesize,$tablename){
		global $conn;
		$sql = "select * from ".$tablename." limit ".($pagenum-1)*$pagesize.",".$pagesize ;
		// die($sql);
		$result = mysqli_query($conn,$sql);
		$arr = array();
		if(mysqli_num_rows($result)>0){
		while($a = mysqli_fetch_assoc($result)){
			$sql2 = "select nickname from user where id=".$a["user_id"];
			$result2 = mysqli_query($conn,$sql2);
			$c = mysqli_fetch_assoc($result2);
			$a["user_id"] = $c["nickname"];
		$arr[] = $a;
			}
		}
	return $arr;
	
	  }
	  //封装获取总记录数的函数
	  function allList($tablename){
	  	global $conn;
	  	$sql = "select count(*) as allnum from ".$tablename;
	  	$result = mysqli_query($conn,$sql);
	  	return mysqli_fetch_assoc($result)["allnum"];

	  }


?>