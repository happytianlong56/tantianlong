<?php include("head.php"); 	
	  include("conn.php");
    header("content-type:text/html;charset=utf-8");
    ?>
		<div class="sui-layout">
		  <div class="sidebar">
<?php  include("leftmenu.php");?>	  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">学生查询结果</p>
			<table class="sui-table table-primary">
				<tr>
					<th>序号</th>
					<th>学号</th>
					<th>班号</th>
					<th>性别</th>
					<th>出生日期</th>
					<th>手机号</th>
					<th>照片</th>
					<th>姓名</th>
					<th>操作</th>
				</tr>
				<!-- <tr>
					<td>1</td>
					<td>B01</td>
					<td>HTML+CSS基础</td>
					<td><a class="sui-btn btn-small btn-warning">编辑</a>&nbsp;<a class="sui-btn btn-small btn-danger">修改</a></td>
				</tr> -->
<?php 
	$student_name = $_GET['student_name'];
	$student_xuehao = $_GET['student_xuehao'];
	$sql = "select
			学号,
			班号,
			性别,
			出生日期,
			手机号,
			姓名,
			照片
		FROM
			学生
		WHERE
			`姓名` = '{$student_name}'
		OR `学号` = '{$student_xuehao}'";
	
	$result = mysqli_query($conn,$sql);
	if( mysqli_num_rows($result)>0){
	while($a = mysqli_fetch_assoc($result)){
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
		echo "<tr><td>".($key+1)."</td><td>{$value['学号']}</td><td>{$value['班号']}</td>";
		// <td>{$value['性别']}</td>
		if( $value['性别'] == 0 ){
			echo "<td>女</td>";
		}else{
			echo "<td>男</td>";
		}
		echo "<td>{$value['出生日期']}</td><td>{$value['手机号']}</td><td>{$value['照片']}</td><td>
		{$value['姓名']}</td><td><a href='student-edit.php?kid={$value['学号']}' class='sui-btn btn-small btn-warning'>编辑</a>&nbsp;
		<a href='student-del.php?kid={$value['学号']}' class='sui-btn btn-small btn-danger'>删除</a></td></tr>";
	}


	?>

			</table>
		  </div>
		</div>		
	</div>
<?php
include("foot.php");
?>