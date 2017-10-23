<?php
include_once ('header.php');
include ('examClass.php');
if (!isset($_SESSION)) {
    session_start();
}
?>
<div class="container">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Exam name</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $examArray = Exam::getAllExmas();
        foreach ($examArray as $exam) {
            ?>
            <tr>
                <td><?php echo $exam->name?></td>
                <td class="minimal_cell">
                    <a href="javascript:getExamName(<?php echo $exam->id?>); ">
                        <span class="glyphicon glyphicon-edit"></span>
                    </a>
                    &nbsp;
                    <a href="<?php echo 'deleteExam.php?id=' .$exam->id?>">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
<script>
    function getExamName(id) {
        $.ajax({
            type: 'POST',
            url: 'postGetExamName.php',
            data: {id: id},
            success: function(data) {
                myFunction(id, data);
            },
            error: function () {
                console.log("greska");
            }
        });
    }
    function myFunction(id, name) {
        console.log(name);
        var person = prompt("Change the name of the exam to", name);
        if (person != null) {
            $.ajax({
                type: 'POST',
                url: 'postEditExam.php',
                data: {name: person, id: id},
                success: function() {
                    location.reload(true);
                },
                error: function () {
                    console.log("greska");
                }
            });
        }
    }
</script>