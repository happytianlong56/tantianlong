<?php
    session_start();
    unset($_SESSION['email']);
	header("Refresh:0;url=login.html");
?>