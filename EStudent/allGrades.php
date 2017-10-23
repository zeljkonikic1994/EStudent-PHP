<?php
include_once 'header.php';
include_once 'gradeClass.php';
include_once 'examClass.php';
if (!isset($_SESSION)) {
    session_start();
}
?>
<div class="container">
    <div style="display: inline">
        <span><h3>Filter table by exam</h3></span>
        <?php
        $exams = Exam::getAllExmas();
        echo '  <select name="exam" class="form-control" id="myselect" style="margin:5px">';
        foreach ($exams as $exam) {
            ?>
            <option value="<?php echo $exam->name ?>"> <?php echo $exam->name ?> </option>
        <?php } ?>
        </select>
        <button class="btn btn-primary" onclick="filterExams()" style="margin:5px">Filter</button>
        <button class="btn btn-primary" onclick="removeInlineStyle()" style="margin:5px">Remove filter</button>
        <br>
        <br>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Exam name</th>
            <th>Student name</th>
            <th>Grade
            <a class="btn" href="allGrades.php?sort=asc">&#8593;</a>
                        <a class="btn" href="allGrades.php?sort=desc">&#8595;</a>
            </th>
        </tr>
        </thead>
        <tbody>
        <?php
        if(isset($_GET['sort'])) {
            $gradeArray = Grade::getAllGrades($_GET['sort']);
        }else {
            $gradeArray = Grade::getAllGrades();
        }
        foreach ($gradeArray as $grade) {
            ?>
            <tr class="myClass">

                <td class="exam"><?php echo $grade->examId?></td>
                <td><?php echo $grade->studentId?></td>
                <td><?php echo $grade->grade?></td>
                <td class="minimal_cell">
                    <a href="<?php echo 'deleteGrade.php?id=' .$grade->id?>">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<script>
    function removeInlineStyle() {
        $("tr.myClass").each(function(i , b) {
            b.style.display = "";
        });
    }
    function filterExams() {
        name =  $( "#myselect" ).val();
        filterExamsByName(name);
    }
    function filterExamsByName(examName) {
        removeInlineStyle();
        $("tr.myClass").each(function(i , b) {
            $this = $(this);
            a = $this.find("td.exam");
            var value = a.html();
            if(value != examName) {
                b.style.display = "none";
            }
        });
    }
</script>
</body>
</html>


