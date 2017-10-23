<?php
if(!isset($_SESSION))
{
	session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>E Student</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <link href="css/signin.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">E student</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class=""><a href="index.php">Home</a></li>
        <li class="dropdown">
          <?php 
              if(isset($_SESSION['logedin']) &&  strpos($_SESSION['logedin'], 'professor') !== false) {
           ?>
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Insert <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="addGrade.php">Grade</a></li>
            <li><a href="addExam.php">Exam</a></li>
          </ul>
        </li>
          <li><a href="allGrades.php">See all grades</a></li>
          <li><a href="allExams.php">See all exams</a></li>
          <li><a href="examChart.php">Charts</a></li>
        <?php } ?>
        <?php 
        if(isset($_SESSION['logedin']) && strpos($_SESSION['logedin'], 'student') !== false) {
 ?>
        <?php } ?>
      </ul>
	    <ul class="nav navbar-nav navbar-right">
	      <?php if (isset($_SESSION['logedin']) && (strpos($_SESSION['logedin'], 'professor') !== false   || strpos($_SESSION['logedin'], 'student') !== false)) { ?>
	      <li><a href="signout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
	      <?php } else {?>
        <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="signin.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
	      <?php } ?>
      </ul>
    </div>
  </div>
</nav>
