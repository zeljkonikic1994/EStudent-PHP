<?php
include_once 'header.php';
include_once 'examClass.php';
if (!isset($_SESSION)) {
    session_start();
}
    ?>
<div class="container">
<div style="display: inline">
<span><h3>Choose exam</h3></span>
<?php
$exams = Exam::getAllExmas();
echo '  <select name="exam" class="form-control" id="chooseExam" onchange="fillChart()">';
foreach ($exams as $exam) {
    ?>
    <option value="<?php echo $exam->id ?>"> <?php echo $exam->name ?> </option>
<?php } ?>
</select>
    </div>
</div>
<div id="piechart_3d" style="width: 900px; height: 500px;"></div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="js/examCharts.js"></script>