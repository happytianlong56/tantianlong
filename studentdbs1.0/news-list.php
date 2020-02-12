<?php include("head.php"); 	
	  include("conn.php");
    header("content-type:text/html;charset=utf-8");
    ?>
		<div class="sui-layout">
		  <div class="sidebar">
<?php  include("leftmenu.php");?>	  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">新闻列表</p>
			<table class="sui-table table-primary">
				<tr>
					<th>序号</th>
					<th>标题</th>
					<th>肩题</th>
					<th>栏目名称</th>
					<th>作者</th>
					<th>时间</th>
					<th>图片</th>
					<th>内容</th>
					<th>操作</th>
				</tr>
				<!-- <tr>
					<td>1</td>
					<td>B01</td>
					<td>HTML+CSS基础</td>
					<td><a class="sui-btn btn-small btn-warning">编辑</a>&nbsp;<a class="sui-btn btn-small btn-danger">修改</a></td>
				</tr> -->
<?php 
	$sql = "select id,标题,肩题,栏目名称,作者,时间,图片,内容 from 新闻";
	$result = mysqli_query($conn,$sql);
	
	if( mysqli_num_rows($result)>0){
	while($a = mysqli_fetch_assoc($result)){
	$sql2 = "select * from 栏目 where id=".$a["栏目名称"];

	$result2 = mysqli_query($conn,$sql2);
	$b = mysqli_fetch_assoc($result2);
	$a["栏目名称"] = $b["栏目名称"];
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
		echo "<tr><td>".($key+1)."</td><td>{$value['标题']}</td><td>{$value['肩题']}</td>";
		
		echo "<td>{$value['栏目名称']}</td><td>{$value['作者']}</td><td>{$value['时间']}</td><td>{$value['图片']}</td><td>
		{$value['内容']}</td><td><a href='news-edit.php?kid={$value['id']}' class='sui-btn btn-small btn-warning'>编辑</a>&nbsp;
		<a href='news-del.php?kid={$value['id']}' class='sui-btn btn-small btn-danger'>删除</a></td></tr>";
	}


	?>

			</table>
		  </div>
		</div>		
	</div>
<?php
include("foot.php");
?>