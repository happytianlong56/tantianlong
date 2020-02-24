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
 switch($action){
 		case "getQuestion":
 		//获取私密问题接口
 		$sql = "select id,question from question";
 		$result = mysqli_query($conn,$sql);//查询结果记录集
 		if(mysqli_num_rows($result)>0){
 			$arr = array();
 			while($a = mysqli_fetch_assoc($result)){
 				$arr[] = $a;//将所有的记录集转为二维关联数组

 			}
 			$responseArr["data"] = $arr;
 		}else{
 			$responseArr["code"] = 207;
 			$responseArr["msg"] = "暂无记录";
 		}
 		//关闭数据库连接
 		mysqli_close($conn);
 		//将数组转换成json发送前端
 		die(json_encode($responseArr));
 		break;
 		//检查email是否可以注册接口
 		case  "checkemail" :
 			$email = $_REQUEST['email'];   
 			$sql = "select email from user where email= '{$email}'";

 			$result = mysqli_query($conn,$sql);
 			if(mysqli_num_rows($result)>0){
 				//说明数据库已有该邮箱，不能重复注册
 				$responseArr["code"] =209;
 				$responseArr["msg"] ="该邮箱已注册";
 			}else{
 			
 				//可以注册
 				$responseArr["msg"] ="该邮箱可以注册";
 			}
 		//关闭数据库连接
 		mysqli_close($conn);
 		//将数组转换成json发送前端
 		die(json_encode($responseArr));
 		break;
    //action = xuesheng 请求学生列
    
    //注册端口
    case "sign":
    //接收客户发过来的请求
    $email = $_REQUEST["email"];
    $user = $_REQUEST['user'];
    $password = $_REQUEST['password'];
    $Prompt = $_REQUEST['Prompt'];
    $key = $_REQUEST["key"];
    $showtime=date("Y-m-d H:i:s");
    $logintime = $showtime;
    // $lasttime = $showtime;
    $sql = "insert into `user`( `email`, `nickname`, `password`, `question`, `answer`, `logintime`, `lasttime`) values('{$email}','{$user}','{$password}','{$Prompt}','{$key}',now(),now()) ";
  // die($sql);
    $result = mysqli_query($conn,$sql);
    if($result){
      $responseArr["code"] = 200;
      $responseArr["msg"] = "注册成功";

    }else{
      $responseArr["code"] = 201;
      $responseArr["msg"] = "注册失败";
    }
      //关闭数据库连接
    mysqli_close($conn);
    die(json_encode($responseArr));
    break;
    //登录接口
    case "login":
      $email = $_REQUEST["email"];
      $password = $_REQUEST["password"];
      //首先根据用户的email查是否至少一条记录
      $sql = "select email,nickname,password from user where email='{$email}'";
      $result = mysqli_query($conn,$sql);
      if(mysqli_num_rows($result)>0){
      //如果邮箱正确，在判断密码是否相等
        $arr = mysqli_fetch_assoc($result);
        if($password == $arr["password"]){
          //邮件密码都对
          $_SESSION["email"] = $arr["email"];
          $_SESSION["nickname"] = $arr["nickname"];
          //假如用户有头像，页创建session保存
          $responseArr["data"] = array(
              "email" =>$arr["email"],
              "nickname" => $arr["nickname"]

          );
        }else{
          //提示邮件不对
        $responseArr["code"] = 20001;
        $responseArr["msg"] = "密码错误";
        }

      }else{
        //提示邮件不对
        $responseArr["code"] = 20004;
        $responseArr["msg"] = "邮件不存在";
      }
      //关闭数据库连接
    mysqli_close($conn);
    //将数组转换成json发送前端
    die(json_encode($responseArr));
    break;
    //忘记密码提示接口
    case "tishi":
      $email = $_REQUEST["email"];
      $Prompt = $_REQUEST["Prompt"];
      $key = $_REQUEST["key"];
   
   
      //首先根据用户的email查是否至少一条记录
      $sql = "select * from user where email='{$email}'";
      $result = mysqli_query($conn,$sql);
      if(mysqli_num_rows($result)>0){
      //如果邮箱正确，在判断密码是否相等
        $arr = mysqli_fetch_assoc($result);
        
        if($Prompt == $arr["question"] && $key == $arr["answer"]){
          //邮件密码都对
          $_SESSION["email"] = $arr["email"];
          $_SESSION["nickname"] = $arr["nickname"];
          //假如用户有头像，页创建session保存
          $responseArr["data"] = array(
              "email" =>$arr["email"],
              "nickname" => $arr["nickname"]

          );
        }else{
          //提示邮件不对
          $responseArr["code"] = 20001;
          $responseArr["msg"] = "答案错误";
        }

      }else{
        //提示邮件不对
        $responseArr["code"] = 20004;
        $responseArr["msg"] = "邮件不存在";
      }
      //关闭数据库连接
    mysqli_close($conn);
    //将数组转换成json发送前端
    die(json_encode($responseArr));
    break;
    
//学生信息修改；
case "student_update":
$xuehao = $_REQUEST["st_xuehao"];
$banhao = $_REQUEST["st_banhao"];
$sex = $_REQUEST["st_sex"];
$age = $_REQUEST["st_birthday"];
$phone = $_REQUEST["st_phone"];
$uname = $_REQUEST["st_name"]; 

$sql = "update 学生 set 学号='{$xuehao}',
班号='{$banhao}',
性别='{$sex}',
出生日期='{$age}',
手机号='{$phone}',
姓名='{$uname}'
 where 学号 = '{$xuehao}'";
$result = mysqli_query($conn,$sql);
if($result){
  $responseArr["code"] = 200;
  $responseArr["msg"] = "修改成功";


}else{
  $responseArr["code"] = 201;
  $responseArr["msg"] = "修改失败";
}

mysqli_close($conn);
die(json_encode($responseArr));
break;






 }













 

    
?>

<?php
?>