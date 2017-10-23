<?php
include_once 'gradeClass.php';
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_POST['student_id']) && isset($_POST['filter'])) {
    $grades = Grade::getAllGradesForStudent($_POST['student_id'], $_POST['filter']);
    $res = "";
    foreach ($grades as $grade) {
        $res = $res . '<tr class="myClass">';
        $res = $res . '<td class="exam">' . $grade->examId . '</td>';
        $res = $res . '<td>' . $grade->professorId . '</td>';
        $res = $res . '<td>' . $grade->grade . '</td></tr>';
    }
    echo $res;
}