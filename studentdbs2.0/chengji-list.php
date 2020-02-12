<?php include("head.php"); 	
	  include("conn.php");
    header("content-type:text/html;charset=utf-8");
    ?>
		<div class="sui-layout">
		  <div class="sidebar">
<?php  include("leftmenu.php");?>	  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">课程列表</p>
			<table class="sui-table table-primary">
				<tr>
					<th>序号</th>
					<th>学号</th>
					<th>课程号</th>
					<th>成绩</th>
					<th>操作</th>
				</tr>
				<!-- <tr>
					<td>1</td>
					<td>B01</td>
					<td>HTML+CSS基础</td>
					<td><a class="sui-btn btn-small btn-warning">编辑</a>&nbsp;<a class="sui-btn btn-small btn-danger">修改</a></td>
				</tr> -->
<?php 
	$sql = "select * from 成绩";
	
	$result = mysqli_query($conn,$sql);
	if( mysqli_num_rows($result)>0){
	while($a = mysqli_fetch_assoc($result)){
		$sql2 = "select 课程编号 from 课程 where 课程编号=".$a["课程号"];
		$result2 = mysqli_query($conn,$sql2);
		$c = mysqli_fetch_assoc($result2);
		// echo $c;
		// echo $c['班主任姓名'];
		
		//$b数组中临时添加一个键“班主任姓名”，赋值为上一部查询得到的姓名
		// $a['课程号'] = $c['课程名'];
		$arrClass[] = $a;
		// print_r($arrClass);
	}
}
	//根据结果生成表格页面
	foreach ($arrClass as $key => $value){
		echo "<tr><td>".($value['id'])."</td><td>{$value['学号']}</td><td>{$value['课程号']}</td><td>{$value['成绩']}</td><td><a href='chengji-edit.php?kid={$value['id']}' class='sui-btn btn-small btn-warning'>编辑</a>&nbsp;<a href='chengji-del.php?kid={$value['id']}' class='sui-btn btn-small btn-danger'>删除</a></td></tr>";
	}


	?>

			</table>
		  </div>
		</div>		
	</div>
<?php
include("foot.php");
?>