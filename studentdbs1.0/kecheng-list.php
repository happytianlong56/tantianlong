<?php include("head.php"); 	
	  include("conn.php");
	  include("func.php");
	  $pagenum = empty($_REQUEST['pagenum'])?1:$_REQUEST['pagenum'];
	  $pagesize = empty($_REQUEST['pagesize'])?5:$_REQUEST['pagesize'];

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
					<th>课程编号</th>
					<th>课程名</th>
					<th>操作</th>
				</tr>
				<!-- <tr>
					<td>1</td>
					<td>B01</td>
					<td>HTML+CSS基础</td>
					<td><a class="sui-btn btn-small btn-warning">编辑</a>&nbsp;<a class="sui-btn btn-small btn-danger">修改</a></td>
				</tr> -->
<?php 
	$pageAmount = ceil(allList("课程")/$pagesize) ;//最大页数=ceil(总页数/每页条数)
	 $arrClass = pageList($pagenum,$pagesize,"课程");

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
		echo "<tr><td>".($key+1)."</td><td>{$value['课程编号']}</td><td>{$value['课程名']}</td><td><a href='kecheng-edit.php?kid={$value['课程编号']}' class='sui-btn btn-small btn-warning'>编辑</a>&nbsp;<a href='kecheng-del.php?kid={$value['课程编号']}' class='sui-btn btn-small btn-danger'>删除</a></td></tr>";
	}


	?>

			</table>
			<p>总计：条&nbsp;
			 <a href="?pagenum=1">首页</a>&nbsp;
			 <a href="?pagenum=<?php echo $pagenum-1?>">上一页</a>&nbsp;
			 <?php
			 	for ($i=1; $i <= $pageAmount; $i++) { 
			 		echo "<a href='?pagenum={$i}'>{$i}</a>&nbsp";
			 	}
			 ?>
			 <a href="?pagenum=<?php echo ($pagenum+1>$pageAmount)?$pageAmount:$pagenum+1?>">下一页</a> 
			 <a href="?pagenum=<?php echo $pageAmount;?>">尾页</a>
			</p>

		  </div>
		</div>		
	</div>
<?php
include("foot.php");
?>