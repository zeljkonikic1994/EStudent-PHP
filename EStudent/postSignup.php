<?php
include_once 'studentClass.php';
include_once 'professorClass.php';
if(!isset($_SESSION))
{
	session_start();
}
	include_once('conn.php');
	if(isset($_POST['name']) && isset($_POST['pass']) && isset($_POST['passAgain']) && isset($_POST['type'])) {
        if ($_POST['pass'] != $_POST['passAgain']) {
            $_SESSION['signup'] = "Passwords don't match, try again";
            header("Location: signup.php");
            exit();
        }
        if ($_POST['type'] == 'student') {
            $newUser = new Student($_POST['name'], $_POST['pass']);
        } else {
            $newUser = new Professor($_POST['name'], $_POST['pass']);
        }
        $success = $newUser->insertInDb();
        if (strpos($success, 'professor') !== false || strpos($success, 'student') !== false) {
            $_SESSION['logedin'] = $success;
            header("Location: index.php");
            exit();
        }
        if ($success == 0) {
            $_SESSION['signup'] = "Something went wrong when writing in db,try again" . $mysqli->error;
            header("Location: signup.php");
        }
        if ($success == 2) {
            $_SESSION['signup'] = "This username is already taken, try another one";
            header("Location: signup.php");
        }
    }
