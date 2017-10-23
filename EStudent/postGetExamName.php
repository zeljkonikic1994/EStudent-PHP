<?php

if (isset($_POST['id'])) {
    include_once('conn.php');
    global $mysqli;
    $sql = sprintf('SELECT * FROM exam WHERE id=%s', $_POST['id']);
    $row = $mysqli->query($sql)->fetch_object();
    if($row === false){
        echo "Error";
        exit();
    }

    echo $row->name;

}