 <?php
 $host="localhost";
 $user="root";
 $password="168168";
 $db="student04";
 $conn = mysqli_connect($host,$user,$password);

mysqli_select_db($conn,$db);
mysqli_query($conn,"set names utf8");

?>