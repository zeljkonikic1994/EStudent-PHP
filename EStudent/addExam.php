<?php
 include_once 'header.php';
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['addExam'])) {
    ?>
    <h2 class="form-signin-heading loginError"><?php echo  $_SESSION['addExam']?></h2>
<?php } unset($_SESSION['addExam']); ?>
<div class="container">
    <form class="form-signin" action="postAddExam.php" method="POST">
        <h2 class="form-signin-heading">Add a new exam</h2>
        <label for="inputEmail" class="sr-only">Name</label>
        <input type="text" name="name" id="inputEmail" class="form-control" placeholder="Name" style="margin-top:5px; margin-bottom:5px" required autofocus>
        <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top:5px; margin-bottom:5px">Add exam</button>
    </form>
</div>
</body>
</html>

