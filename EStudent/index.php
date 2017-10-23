<?php
	include_once 'header.php';
    if (!isset($_SESSION)) {
        session_start();
    }
if(isset($_SESSION['logedin']) &&  strpos($_SESSION['logedin'], 'professor') !== false) {
  ?>
  <div class="col-4 col-sm-4"></div>
    <div class="col-4 col-sm-4">
       <a href="allGrades.php" class="btn btn-primary" style="width:100%; padding: 10px; margin:10px" >See all grades</a>

       <a href="allExams.php" class="btn btn-primary" style="width:100%; padding: 10px; margin:10px">See all exams</a>
    </div>
  <div class="col-4 col-sm-4"></div>
<?php }
if(isset($_SESSION['logedin']) && strpos($_SESSION['logedin'], 'student') !== false) { ?>
    <div class="col-4 col-sm-4"></div>
        <div class="col-4 col-sm-4">
            <a href="allStudentGrades.php" class="btn btn-primary" style="width:100%; padding: 10px;">See all grades</a>
        </div>
      <div class="col-4 col-sm-4"></div>
<?php } if(!isset($_SESSION['logedin'])  ||  (strpos($_SESSION['logedin'], 'professor') === false && strpos($_SESSION['logedin'], 'student') === false )) { ?>
    <div class="col-4 col-sm-4"></div>
    <div class="col-4 col-sm-4">
        <b>You must log in or sign up to access this site</b>
    </div>
    <div class="col-4 col-sm-4"></div>
<?php }