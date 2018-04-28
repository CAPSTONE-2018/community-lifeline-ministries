<?php
$contact = $_POST['contact'];
$studentContact = $_POST['studentContact'];
$contactMessage = '';
if ($contact == true) {
    $contactMessage = "New Contact Was Added Successfully";
} else {
    $contactMessage = "Error!  There was a problem adding new contact";
}
?>
<div class="confirmation-modal">
    <div class="confirmation-message">
        <?php echo $contactMessage; ?>
    </div>

    <script type="text/javascript">

        // homePageButton.onclick = function () {
        //     location.href = "../../../php-files/index-login/menu.php";
        // };

        // var homePageButton = '<button onclick=routeToHomePage()>Home Page</button>';
        //
        // var newStudentButton = '<button onclick="routeToNewContact()">Add New Student</button>';

        // newStudentButton.onclick = function () {
        //     location.href = "../../../php-files/new/NewStudent.php";
        // };
        // $('#custom-modal').find('#modal-button-footer-row').append(homePageButton, newStudentButton);
    </script>
</div>