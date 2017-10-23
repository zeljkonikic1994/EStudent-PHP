<?php
  class Student
  {
    public $id;
    public $name;
    public $pass;
    function __construct($name,$pass)
    {
      $this->name = $name;
      $this->pass = $pass; 
    }
    public function insertInDb()
  {
    require_once('conn.php');
    global $mysqli;

      $query = sprintf('INSERT INTO student (name,pass) VALUES ("%s","%s")', $this->name, $this->pass);

      if ($mysqli->query($query)) {
        return "student|" . $mysqli->insert_id;

      } else {
          return "error";
      }
  }
      public static function logIn($name, $pass)
      {
          include_once ('conn.php');
          global $mysqli;
          $query = sprintf('SELECT * FROM student WHERE  name = "%s"', $name);
          if ( ! $result = $mysqli->query( $query ) ) {
              return "There was an db error, try again". $mysqli->error;
          }
           if ( $result->num_rows == 1 ) {
          $resultObj = $result->fetch_object();
          if ( $resultObj->pass == $pass ) {
              return 1 . $resultObj->ID;
          } else {
              return 0;
          }
        }
        return 0;
      }
      public static function getAllStudents()
        {
        include_once 'conn.php';
        global $mysqli;
        $sql = "SELECT * FROM student";
        if(!$result = $mysqli->query($sql)) {
            echo "ERROR".$mysqli->errno;
            exit();
           }
        $arrayResult = array();
        while($row = $result->fetch_object()) {
            $student = new Student($row->name, $row->pass);
            $student->id = $row->ID;
            array_push($arrayResult, $student);
            }
        return $arrayResult;
        }
      public static function getNameById($id)
      {
          include_once 'conn.php';
         global $mysqli;
          $sql = sprintf("SELECT name FROM student WHERE ID=%s",$id);
          $result = $mysqli->query($sql);
          if(!$result) {
              echo "ERROR".$mysqli->errno;
              exit();
          }
          $ret = $result->fetch_assoc();
          return $ret['name'];
          }
  }


  


 ?>
