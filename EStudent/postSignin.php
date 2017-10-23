<?php
include_once ('conn.php');
include_once ('studentClass.php');
include_once 'professorClass.php';
if(!isset($_SESSION))
{
	session_start();
}
	if(isset($_POST['user']) && isset($_POST['pass'])) {
		$name = $_POST['user'];

       $success = Student::logIn($_POST['user'], $_POST['pass']);
       if($success[0] != 1) {
       	$success = Professor::logIn($_POST['user'], $_POST['pass']);
       } else {
       		$_SESSION['logedin'] = 'student|    '. substr($success, 1);
				header( "Location: index.php" );
                die();
       }
		if ( $success[0] != '1' && $success[0] != '0' ) {
            $_SESSION['loginError'] = "Username or password is wrong. Please try again";
			header( "Location:signin.php" );
            exit();
		}
			if ( $success[0] == '1' ) {
				$_SESSION['logedin'] = 'professor|'. substr($success, 1);
				echo "djes poso soso";
				header( "Location: index.php" );
                exit();
			} else {
				$_SESSION['logedin'] = 0;
				header( "Location: signin.php" );
			}
	}
