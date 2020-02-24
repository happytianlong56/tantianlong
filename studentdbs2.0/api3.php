<?php
include("conn.php");
include("func.php");
session_start();
$action = $_REQUEST['action'];

//先构造一个基本的code-data-message结构的关联数组 
 $responseArr = array(
 		"code"=> 200,
 		"msg" =>"数据获取成功",
 		"data" =>null
 );
switch ($action) {
	//课程接口
	case 'kecheng':
	$pagenum = empty($_REQUEST['pagenum'])?1:$_REQUEST['pagenum'];
    $pagesize = empty($_REQUEST['pagesize'])?5:$_REQUEST['pagesize'];
    $allnum = allList("课程");//的总记录数
    $pageAmount = ceil(allList("课程")/$pagesize);//最大页数
    $arr = pageList($pagenum,$pagesize,"课程");
    //给resoponsArr数组添加
    $responseArr["allnum"] = $allnum; //总条数
    $responseArr["data"] = $arr ;

	//关闭数据库连接
	mysqli_close($conn);
	//将数组转换成json发送到前端
	die(json_encode($responseArr));
	break;
	//班主任接口
	case 'bzr':
	$pagenum = empty($_REQUEST['pagenum'])?1:$_REQUEST['pagenum'];
    $pagesize = empty($_REQUEST['pagesize'])?5:$_REQUEST['pagesize'];
    $allnum = allList("班主任");//的总记录数
    $pageAmount = ceil(allList("班主任")/$pagesize);//最大页数
    $arr = pageList($pagenum,$pagesize,"班主任");
    //给resoponsArr数组添加
    $responseArr["allnum"] = $allnum; //总条数
    $responseArr["data"] = $arr ;
	//关闭数据库连接
	mysqli_close($conn);
	//将数组转换成json发送到前端
	die(json_encode($responseArr));
	break;
	//班级接口
	case 'class':
	$pagenum = empty($_REQUEST['pagenum'])?1:$_REQUEST['pagenum'];
    $pagesize = empty($_REQUEST['pagesize'])?5:$_REQUEST['pagesize'];
    $allnum = allList("班级");//的总记录数
    $pageAmount = ceil(allList("班级")/$pagesize);//最大页数
    $arr = pageList($pagenum,$pagesize,"班级");
    //给resoponsArr数组添加
    $responseArr["allnum"] = $allnum; //总条数
    $responseArr["data"] = $arr ;
	//关闭数据库连接
	mysqli_close($conn);
	//将数组转换成json发送到前端
	die(json_encode($responseArr));
	break;
	//学生接口
	case "xuesheng" :
    $pagenum = empty($_REQUEST['pagenum'])?1:$_REQUEST['pagenum'];
    $pagesize = empty($_REQUEST['pagesize'])?5:$_REQUEST['pagesize'];
    $allnum = allList("学生");//得到总记录条数
    $pageAmount = ceil(allList("学生")/$pagesize) ;//最大页数=ceil(总页数/每页条数)
    $arrClass = pageList($pagenum,$pagesize,"学生");
    //给resoponsArr数组添加一项

    $responseArr["allnum"] =  $allnum ; //总条数
    $responseArr["data"] = $arrClass;   // 获取的5条数据
    //关闭数据库连接
    mysqli_close($conn);
    //将数组转换成json发送前端
    die(json_encode($responseArr));
    break;
	//成绩接口
	case "chengji" :
    $pagenum = empty($_REQUEST['pagenum'])?1:$_REQUEST['pagenum'];
    $pagesize = empty($_REQUEST['pagesize'])?5:$_REQUEST['pagesize'];
    $allnum = allList("成绩");//得到总记录条数
    $pageAmount = ceil(allList("成绩")/$pagesize) ;//最大页数=ceil(总页数/每页条数)
    $arrClass = pageList($pagenum,$pagesize,"成绩");
    //给resoponsArr数组添加一项

    $responseArr["allnum"] =  $allnum ; //总条数
    $responseArr["data"] = $arrClass;   // 获取的5条数据
    //关闭数据库连接
    mysqli_close($conn);
    //将数组转换成json发送前端
    die(json_encode($responseArr));
    break;
    //学生查询
    case 'student_search' :
    $xuehao = $_REQUEST['xuehao'];
    $name = $_REQUEST['name'];
    $sql = "select * from 学生 where 学号= '$xuehao'";
    // die($sql);
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        $responseArr["data"] = mysqli_fetch_assoc($result);
    }
    //关闭数据库连接
    mysqli_close($conn);
    //将数组转换成json发送前端
    die(json_encode($responseArr));
    break;
    //成绩查询
    case 'chengji_search' :
    $xuehao = $_REQUEST['xuehao'];
    $name = $_REQUEST['name1'];
     $kc_name = $_REQUEST['kc_name'];
    $sql = "select `学生`.`学号`, `学生`.`姓名`, `课程`.`课程名`, `成绩`.`id`,  `成绩`.`成绩`FROM `成绩`
           LEFT JOIN `学生` ON `成绩`.`学号` = `学生`.`学号`
           LEFT JOIN `课程` ON `成绩`.`课程编号` = `课程`.`课程编号`
           WHERE`学生`.`姓名` = '{$name}' AND `课程`.`课程名` = '{$kc_name}' and `学生`.`学号` = '{$xuehao}'";
    // die($sql);
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        $responseArr["data"] = mysqli_fetch_assoc($result);
    }
    //关闭数据库连接
    mysqli_close($conn);
    //将数组转换成json发送前端
    die(json_encode($responseArr));
    break;
    //栏目接口
    case 'lanmu':
    $pagenum = empty($_REQUEST['pagenum'])?1:$_REQUEST['pagenum'];
    $pagesize = empty($_REQUEST['pagesize'])?5:$_REQUEST['pagesize'];
    $allnum = allList("栏目");//的总记录数
    $pageAmount = ceil(allList("栏目")/$pagesize);//最大页数
    $arr = pageList($pagenum,$pagesize,"栏目");
    //给resoponsArr数组添加
    $responseArr["allnum"] = $allnum; //总条数
    $responseArr["data"] = $arr ;
    //关闭数据库连接
    mysqli_close($conn);
    //将数组转换成json发送到前端
    die(json_encode($responseArr));
    break;
    //新闻接口
    case 'news':
    $pagenum = empty($_REQUEST['pagenum'])?1:$_REQUEST['pagenum'];
    $pagesize = empty($_REQUEST['pagesize'])?5:$_REQUEST['pagesize'];
    $allnum = allList("新闻");//的总记录数
    $pageAmount = ceil(allList("新闻")/$pagesize);//最大页数
    $arr = pageList($pagenum,$pagesize,"新闻");
    //给resoponsArr数组添加
    $responseArr["allnum"] = $allnum; //总条数
    $responseArr["data"] = $arr ;
    //关闭数据库连接
    mysqli_close($conn);
    //将数组转换成json发送到前端
    die(json_encode($responseArr));
    break;
    //会员接口
    case 'huiyuan':
    $pagenum = empty($_REQUEST['pagenum'])?1:$_REQUEST['pagenum'];
    $pagesize = empty($_REQUEST['pagesize'])?5:$_REQUEST['pagesize'];
    $allnum = allList("user");//的总记录数
    $pageAmount = ceil(allList("user")/$pagesize);//最大页数
    $arr = pageList($pagenum,$pagesize,"user");
    //给resoponsArr数组添加
    $responseArr["allnum"] = $allnum; //总条数
    $responseArr["data"] = $arr ;
    //关闭数据库连接
    mysqli_close($conn);
    //将数组转换成json发送到前端
    die(json_encode($responseArr));
    break;

}






?>