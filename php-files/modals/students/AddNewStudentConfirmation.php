<?php
$student = $_POST['student'];
$program = $_POST['program'];
$contact = $_POST['contact'];
$studentContact = $_POST['studentContact'];
$studentMessage = '';
if ($student == true) {
    $studentMessage = "New Student Was Added Successfully";
} else {
    $studentMessage = "Error!  There was a problem adding new student";
}
?>
<div class="confirmation-modal">
    <div class="confirmation-message">
        <?php echo $studentMessage; ?>
    </div>

    <script type="text/javascript">

        // homePageButton.onclick = function () {
        //     location.href = "../../../php-files/index-login/menu.php";
        // };

        var homePageButton = '<button onclick=routeToHomePage()>Home Page</button>';

        var newStudentButton = '<button onclick="routeToNewStudent()">Add New Student</button>';

        // newStudentButton.onclick = function () {
        //     location.href = "../../../php-files/new/NewStudent.php";
        // };
        $('#custom-modal').find('#modal-button-footer-row').append(homePageButton, newStudentButton);
    </script>
</div>