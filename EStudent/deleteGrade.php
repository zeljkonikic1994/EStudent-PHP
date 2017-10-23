<?php
include_once 'gradeClass.php';
if(!isset($_SESSION))
{
    session_start();
}
if(isset($_GET['id'])) {
    Grade::deleteGrade($_GET['id']);
    header("Location: allGrades.php");
}