<?php 
	class Grade
	{
		public $professorId;
		public $studentId;
		public $examId;
		public $grade;
		public $id;
		function __construct($pid,$sid,$eid,$g)
		{
			$this->professorId = $pid;
			$this->studentId = $sid;
			$this->examId = $eid;
			// $this->date = $d;
			$this->grade = $g;
		}
		public function insertInDb()
		    {
		        require_once('conn.php');
		         global $mysqli;
		        $query = sprintf("INSERT INTO grade (professor_id,student_id,exam_id,grade) VALUES (%s, %s, %s, %s)", $this->professorId, $this->studentId, $this->examId, $this->grade);
		        if ($mysqli->query($query)) {
			        return 1;
		        } else {
		            return $mysqli->error;
		        }
		    }
        public static function getAllGrades($sort = "")
        {
            include_once 'conn.php';
            include_once 'studentClass.php';
            include_once 'examClass.php';
            global $mysqli;
            if($sort != "") {
                $sql = sprintf("SELECT * FROM grade ORDER BY grade %s", $sort);
            } else {
                $sql = "SELECT * FROM grade";
            }
            if(!$result = $mysqli->query($sql)) {
                echo "ERROR".$mysqli->errno;
                exit();
            }
            $arrayResult = array();
            while($row = $result->fetch_object()) {
                $studentName = Student::getNameById($row->student_id);
                $examName = Exam::getNameById($row->exam_id);
                if(isset($_SESSION['logedin'])){
                    $pieces = explode("|", $_SESSION['logedin']);
                    $professorId = $pieces[1];
                    $grade = new Grade($professorId,$studentName,$examName, $row->grade);
                    $grade->id = $row->id;
                    array_push($arrayResult, $grade);
                } else {
                    echo "sranje";
                    die();
                }
            }
            return $arrayResult;
        }
        public static function getAllGradesForStudent($id, $filter = "")
        {
            include_once 'conn.php';
            include_once 'studentClass.php';
            include_once 'examClass.php';
            include_once 'professorClass.php';
            global $mysqli;
                $sql = sprintf('SELECT * FROM grade WHERE student_id = %s %s', $id, $filter);
            if(!$result = $mysqli->query($sql)) {
                echo "ERROR".$mysqli->errno;
                exit();
            }
            $arrayResult = array();
            while($row = $result->fetch_object()) {
                $studentName = Student::getNameById($row->student_id);
                $examName = Exam::getNameById($row->exam_id);
                $professorId = Professor::getNameFromId($row->professor_id);
                    $grade = new Grade($professorId,$studentName,$examName, $row->grade);
                    $grade->id = $row->id;
                    array_push($arrayResult, $grade);
            }
            return $arrayResult;
        }
        public static function getOneGrade ($id) {
            include_once ('conn.php');
            global $mysqli;
            $query = sprintf('SELECT * FROM grade WHERE id=%s', $id);
            if(!$result = $mysqli->query($query)) {
                echo "Error getting 1 grade".$result->error;
                exit();
            } if($result == null) {
                echo $mysqli->error;
            }
            $grade = $result->fetch_object();
            $studentName = Student::getNameById($grade->student_id);
            $examName = Exam::getNameById($grade->exam_id);
            $res = new Grade($grade->professor_id, $studentName, $examName, $grade->grade);
            return $res;
        }
        public static function deleteGrade($id)
        {
            include_once ('conn.php');
            $query = sprintf('DELETE FROM grade WHERE id=%s', $id);
            if(!$result = $mysqli->query($query)) {
                echo "Error deleting team".$result->error;
                exit();
            }
        }
        public static function deleteGrades($exam_id)
        {
            include_once ('conn.php');
            global $mysqli;
            $query = sprintf('DELETE FROM grade WHERE exam_id = %s', $exam_id);
            if(!$result = $mysqli->query($query)) {
                echo "Error deleting team".$result->error;
                exit();
            }
        }
	}