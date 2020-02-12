<?php include("head.php"); 	
	  include("conn.php");
    header("content-type:text/html;charset=utf-8");
    ?>
		<div class="sui-layout">
		  <div class="sidebar">
<?php  include("leftmenu.php");?>	  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">班级列表</p>
			<table class="sui-table table-primary">
				<tr>
					<th>序号</th>
					<th>班号</th>
					<th>教室</th>
					<th>班主任</th>
					<th>班长</th>
					<th>操作</th>
				</tr>
				<!-- <tr>
					<td>1</td>
					<td>B01</td>
					<td>HTML+CSS基础</td>
					<td><a class="sui-btn btn-small btn-warning">编辑</a>&nbsp;<a class="sui-btn btn-small btn-danger">修改</a></td>
				</tr> -->
<?php 
	$sql = "select 班号,教室,班主任,班长 from 班级";
	
	$result = mysqli_query($conn,$sql);
	if( mysqli_num_rows($result)>0){
		while($a = mysqli_fetch_assoc($result)){
			$sql2 = "select * from 班主任 where 班主任ID=".$a["班主任"];
			$result2 = mysqli_query($conn,$sql2);
			$c = mysqli_fetch_assoc($result2);
			// echo $c['班主任姓名'];

			//$b数组中临时添加一个键“班主任姓名”，赋值为上一部查询得到的姓名
			$a["班主任姓名"] = $c["班主任姓名"];
			$arrClass[] = $a;
		}
	}
// print_r($arrClass);
	/*
	array(
		0 = array(
			"课程编号" => "B01",
			"课程名" => "HTML+css基础"
		),

	)
	 */
	//根据结果生成表格页面
	foreach ($arrClass as $key => $value){
		echo "<tr><td>".($key+1)."</td><td>{$value['班号']}</td><td>{$value['教室']}</td><td>{$value['班主任姓名']}</td><td>{$value['班长']}</td><td><a href='class-edit.php?kid={$value['班号']}' class='sui-btn btn-small btn-warning'>编辑</a>&nbsp;<a href='class-del.php?kid={$value['班号']}' class='sui-btn btn-small btn-danger'>删除</a></td></tr>";
	}


	?>

			</table>
		  </div>
		</div>		
	</div>
<?php
include("foot.php");
?>