<?php
include_once 'examClass.php';
if(isset($_POST['examId'])) {
    $eId = $_POST['examId'];
    $res = Exam::getExamStatistics($eId);
    echo json_encode($res);
}