<?php
include_once 'conn.php';

$start = $_POST["start"];
$length = $_POST["length"];
$order = $_POST["order"];
$searchValue = $_POST["search"]["value"];
$searchParam = $_POST["search"]["value"];

$sql = "SELECT * FROM exam_period ";
if (!$resultTotalSql = $mysqli->query($sql)) {
    exit();
}
$resultTotalCount = 0;
while ($row = $resultTotalSql->fetch_object()) {
    $resultTotalCount++;
}

if ($searchValue != null) {
    $sql = $sql . 'WHERE name LIKE "%' . $searchValue . '%"';

}
if ($length != -1) {
    $sql = $sql . 'LIMIT '.$start.', '.$length;
} else {
    $sql = $sql . 'LIMIT '.$resultTotalCount.', '.$start;

}

if (!$result = $mysqli->query($sql)) {
    exit();
}

$arrayResult = array();
$resultTotal = 0;
while ($row = $result->fetch_object()) {
    $data['name'] = $row->name;
    $data['date_from'] = $row->date_from;
    $data['date_to'] = $row->date_to;
    array_push($arrayResult, $data);
    $resultTotal++;
}
// Postavljanje podataka
$result1['data'] = $arrayResult;
//Postavljanje ispravnih informacija o filtriranju
$result1['recordsFiltered'] = $resultTotal;
$result1['recordsTotal'] = $resultTotalCount;


echo json_encode($result1);

