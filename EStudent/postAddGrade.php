<?php
include_once 'gradeClass.php';
if(!isset($_SESSION))
{
	session_start();
}
if(isset($_POST['student']) && isset($_POST['grade']) && isset($_POST['exam'])){
	if(isset($_SESSION['logedin'])){
		$pieces = explode("|", $_SESSION['logedin']);
		$professorId = $pieces[1];
        $grade = new Grade($professorId, $_POST['student'], $_POST['exam'], $_POST['grade']);
        $success = $grade->insertInDb();
        if($success == 1) {
	         $_SESSION['addGrade'] = "You have successfully added a new grade";
	         header("Location: addGrade.php ");
	    	} else {
            $_SESSION['addGrade'] = $success;
	        header("Location: addGrade.php ");
	    	}
		} else {
	    	echo "Error!";
		  }
}