<?php
    session_start();
    unset($_SESSION['uname']);
	header("Refresh:0;url=login.php");
?>