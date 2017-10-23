<?php

include_once 'header.php';
include_once 'examClass.php';
include_once 'examPeriodClass.php';

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['addExamsForPeriod'])) {
    ?>
    <h2 class="form-signin-heading loginError"><?php echo  $_SESSION['addExamsForPeriod']?></h2>
<?php } unset($_SESSION['addExamsForPeriod']); ?>


<div class="container" xmlns="http://www.w3.org/1999/html">

    <form class="form-signin" action="postAddExamToPeriod.php" method="POST">
        <h2 class="form-signin-heading">Apply for exams</h2>
        <br>
        <h3 class="form-signin-heading">The current exam period is: <?php
            global $exam;
            $exam = ExamPeriod::getCurrentExamPeriod();
            echo $exam->name;
            echo '<input type="hidden" name="examPeriod" value="'. $exam->id .'">';
            ?></h3>
        <input type="hidden" name="date" value="<?php echo date("m.d.Y"); ?>">
        <br>

        <?php
        $exams = Exam::getExamsICanApplyFor($exam->id);
        global $exams;
        echo '  <select name="exam" class="form-control">';
        foreach ($exams as $exam1) {
            ?>

            <option value="<?php echo $exam1->id ?>"> <?php echo $exam1->name ?> </option>

        <?php } ?>
        </select>

        <br>
        
        <button class="btn btn-primary">Add exams for exams period</button>

    </form>

</div> <!-- /container -->

</body>
</html>
