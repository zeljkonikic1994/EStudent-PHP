<?php
if(!isset($_SESSION))
{
	session_start();
}
if(isset($_SESSION['logedin'])) {
unset($_SESSION['logedin']);
}
header("Location: index.php");
?>