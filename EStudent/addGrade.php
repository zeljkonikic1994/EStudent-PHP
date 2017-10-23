<?php
include_once ('header.php');
include_once 'studentClass.php';
include_once 'examClass.php';
if(!isset($_SESSION))
{
    session_start();
}
if (isset($_SESSION['addGrade'])) {
    ?>
    <h2 class="form-signin-heading loginError"><?php echo  $_SESSION['addGrade']?></h2>
<?php } unset($_SESSION['addGrade']); ?>
<div class="container">
    <form class="form-signin" action="postAddGrade.php" method="POST">
        <h2 class="form-signin-heading">Add a new grades</h2>
                <?php
                $exams = Exam::getAllExmas();
        		global $exams;
                echo '  <select name="exam" class="form-control" style="margin-top:5px; margin-bottom:5px">';
                foreach ($exams as $exam) {
                    ?>
                    <option value="<?php echo $exam->id ?>"> <?php echo $exam->name ?> </option>
                <?php } ?>
                </select>
        <label class="sr-only">Grade</label>
        <?php 
        $students = Student::getAllStudents();
		global $students;
        echo '  <select name="student" class="form-control" style="margin-top:5px; margin-bottom:5px">';
        foreach ($students as $student) {
            ?>

            <option value="<?php echo $student->id ?>" > <?php echo $student->name ?> </option>
        <?php } ?>
        </select>
        <label for="inputEmail" class="sr-only">Grade</label>
        <input type="number" min = "5" max="10" name="grade" id="inputEmail" class="form-control" placeholder="Grade" style="margin-top:5px; margin-bottom:5px" required autofocus>
        <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top:5px; margin-bottom:5px">Add grade</button>
    </form>
</div> <!-- /container -->
</body>
</html>
