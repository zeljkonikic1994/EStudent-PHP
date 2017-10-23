<?php
 if (isset($_POST['name'])) {
     include_once('conn.php');
     global $mysqli;
     $sql = sprintf('UPDATE exam SET name="%s" WHERE id=%s', $_POST['name'], $_POST['id']);
     if($mysqli->query($sql) === false){
         echo "Error";
         exit();
     }
     header("Location: allExams.php");
 }