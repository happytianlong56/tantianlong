<?php
    session_start();
    include('conn.php');
    if( !empty($_REQUEST['uname']) ){
        $uname = $_REQUEST['uname'];
        $password = $_REQUEST['password'];
        $sql = "select * from admin where uname='{$uname}' and password='{$password}'";
        // die("$sql");
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0){
            $_SESSION['uname'] = $uname;
		    header("Refresh:0;url=index.php");            
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/popper.js/1.12.5/umd/popper.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <title>登录页</title>
    <style>
    body{
            background-image:url('../studentdbs2.0/vote-project/images/01.jpg'); 
            background-repeat: no-repeat;
            background-size:cover;
         }
     label{
            color:#fff;
        }
        form{
            position: absolute;
            top:250px;
            left:41%;
            width: 500px;
            height: 200px;
           
            
           }
        .submit_login{
            margin-left: 41px;
        }
</style>
</head>
<body>
    <form action="?" method="post">
        <label for="">账号：</label><input type="text" name="uname" class="form-control" style="display: inline-block; width:200px" autocomplete=""/>
        <br>
        <br>
        <label for="">密码：</label><input type="text" name="password" class="form-control" style="display: inline-block; width:200px" autocomplete=""/>
        <br>
        <br>
        <input type="submit" name="submit" value="登录" class="form-control submit_login" style="display: inline-block; width:200px" autocomplete=""/>
    </form>
</body>
</html>