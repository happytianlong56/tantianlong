
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
    <form id="form1" method="post">
        <label for="">账号：</label><input type="text" id="uname" name="uname" class="form-control" style="display: inline-block; width:200px;text" ><span>  </span>
        <br>
        <br>
        <label for="">密码：</label><input type="text" id="password" name="password" class="form-control" style="display: inline-block; width:200px" ><span> </span>
        <br>
        <br>
        <input type="submit" name="submit" value="登录" class="form-control submit_login" style="display: inline-block; width:200px" >
    </form>
</body>
</html>
<script>
   
    $("#uname").on("focus",function(){
        $(this).next().html("").hide();
    })
    $("#password").on("focus",function(){
        $(this).next().html("").hide();
    })
    $("input[type=submit]").on("click",function(event){
        console.log("ok")
            event.preventDefault();
        $.ajax({
            url:"api.php?action=test_admin",
            type:"get",
            dataType:"json",
            data:$("#form1").serializeArray(),
            success:function(data,textStatus){
                if(data.code == 200){
                console.log(data);
                window.location.href = "index.php";
                var  tt = new Date();
                tt.setTime(tt.getTime()+30*60*1000);//tt为30天后的未来时间
                document.cookie = "uname="+data.data.uname+";expires="+tt.toGMTString();
                document.cookie = "upassword="+data.data.password+";expires="+tt.toGMTString();
                
                }
                if(data.code == 20004){
                    $("#uname").next().html(data.msg).css({"color":"red","background-color":"skyblue","display":"inline-block","width":"100px","height":"35px","text-align":"center","font":"18px/30px '微软雅黑'"});
                }if(data.code == 20001){
                    $("#password").next().html(data.msg).css({"color":"red","background-color":"skyblue","display":"inline-block","width":"100px","height":"35px","text-align":"center","font":"18px/30px '微软雅黑'"});
                }
            }
        })
    })
</script>