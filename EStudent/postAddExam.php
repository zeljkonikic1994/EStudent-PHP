<?php
include_once 'examClass.php';
if(!isset($_SESSION))
{
    session_start();
}
if(isset($_POST['name'])){
    if(isset($_SESSION['logedin'])){
        $pieces = explode("|", $_SESSION['logedin']);
        $professorId = $pieces[1];
        $exam = new Exam($_POST['name'], $professorId);
        $success = $exam->insertInDb();
        if($success == 1) {
            $_SESSION['addExam'] = "You have successfully added a new exam";
            header("Location: addExam.php ");
        } else {
            $_SESSION['addExam'] = $success;
            header("Location: addExam.php ");
        }
    } else {
        echo "No access";
    }
}
