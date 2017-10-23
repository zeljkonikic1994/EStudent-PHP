<?php
include_once 'examClass.php';
if(!isset($_SESSION))
{
    session_start();
}
if(isset($_GET['id'])) {
    Exam::deleteExam($_GET['id']);
    header("Location: allExams.php");
}