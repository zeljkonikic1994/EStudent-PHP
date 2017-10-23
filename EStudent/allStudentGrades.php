<?php
include_once 'header.php';
include_once 'gradeClass.php';
if (!isset($_SESSION)) {
    session_start();
}
?>
<div class="container">
    <div class="form-group">
        <select class="form-control" id="gradeFilter">
            <option value="2">All</option>
            <option value="1">Passed</option>
            <option value="0">Failed</option>
        </select>
        <button onclick="applyFilter()" class="btn btn-primary">Filter</button>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Exam name</th>
            <th>Professor name</th>
            <th>Grade</th>
        </tr>
        </thead>
        <tbody id="gradeTable">
        <?php
        if(isset($_SESSION['logedin'])) {
            global $student;
            $pieces = explode("|", $_SESSION['logedin']);
            $student = $pieces[1];
            $gradeArray = Grade::getAllGradesForStudent($student);
        } else {
            echo "djes poso";
            die();
        }
        foreach ($gradeArray as $grade) {
            ?>
            <tr class="myClass">

                <td class="exam"><?php echo $grade->examId?></td>
                <td><?php echo $grade->professorId?></td>
                <td><?php echo $grade->grade?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<script>
    function applyFilter() {
        var opt = $('#gradeFilter').val();
        var filter = "";
        if(opt == 1) {
            filter = "AND grade > 5";
        }
        if(opt == 0) {
            filter = "AND grade = 5";
        }
        var studentId = <?php echo $student; ?>;
        $.ajax({
            method: "POST",
            url: "postFilterAllGrades.php",
            data:'student_id=' + studentId + '&filter=' + filter,
            success: function(result){
            $("#gradeTable").html(result);
        }});
    }
</script>
</body>
</html>