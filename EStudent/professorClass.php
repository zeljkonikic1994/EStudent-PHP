<?php
    class Professor
    {
      public $id;
      public $name;
      public $pass;
      function __construct($name, $pass)
      {
        $this->name = $name;
        $this->pass = $pass;
      }
      public function insertInDb()
    {
        require_once('conn.php');
         global $mysqli;

        $query = sprintf('INSERT INTO professor (name,pass) VALUES ("%s","%s")', $this->name, $this->pass);

        if ($mysqli->query($query)) {
	        return "professor|" . $mysqli->insert_id;
        } else {
            return "error";
        }
    }
        public static function logIn($name, $pass)
        {
            include_once ('conn.php');
            global $mysqli;
            $query = sprintf('SELECT * FROM professor WHERE  name = "%s"', $name);
            if ( ! $result = $mysqli->query( $query ) ) {
                return "There was an db error, try again". $mysqli->error;
            }
            if ( $result->num_rows == 1 ) {
            $resultObj = $result->fetch_object();
            if ($resultObj->pass  ==$pass ) {
                return 1 . $resultObj->ID;
            } else
                return 0;
          }
          return 0;
        }
        public static function getNameFromId($id)
        {
            include_once ('conn.php');
            global $mysqli;
            $query = sprintf('SELECT name FROM professor WHERE  id = "%s"', $id);
            if ( ! $result = $mysqli->query( $query ) ) {
                return "There was an db error, try again". $mysqli->error;

                //      header( "refresh:5 ;url=signin.php" );
            }
            if ( $result->num_rows == 1 ) {
                return $result->fetch_object()->name;
            }
            return 0;
        }
    }
 ?>
