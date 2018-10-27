<?php
include("../app-shell/Header.php");
include("../app-shell/Sidebar.php");
include("../app-shell/EmptyModalShell.php");
include("../../db/config.php");
$queryForAllActiveStudents = "SELECT * FROM Students WHERE Active_Student = 1 ORDER BY Last_Name, First_Name;";
$allActiveStudentsResults = mysqli_query($db, $queryForAllActiveStudents);
$queryForAllActiveContacts = "SELECT * FROM Contacts WHERE Active_Contact = 1 ORDER BY Last_Name, First_Name";
$allActiveContactsResults = mysqli_query($db, $queryForAllActiveContacts);
?>
<div class="app-title">
    <div>
        <h5><i class="fa fa-plus"></i> New Student to Contact</h5>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="../index-login/Main-Menu.php"><i class="fa fa-home fa-lg"></i></a></li>
        <li class="breadcrumb-item"> Student to Contact</li>
    </ul>
</div>
<div class="container-fluid">
    <div class="card text-center">
        <div class="card-header">
            <h1><i class="fa fa-pencil"></i> Add Student to Contact</h1>
        </div>

        <div class="card-body">
            <form method="post" id="newStudentToContactForm">
                <h4 class="heading text-left"><i class="fa fa-graduation-cap"></i> Student to Contact Info</h4>
                <div class="blue-line-color"></div>
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                            <input type="text" id="studentName" class="mdl-textfield__input" readonly>
                            <input type="hidden" id="studentId" name="studentId">
                            <i class="mdl-icon-toggle__label fa fa-angle-down"></i>
                            <label for="studentId" class="mdl-textfield__label">Select Student</label>
                            <ul for="studentId" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                <?php while ($studentRow = mysqli_fetch_assoc($allActiveStudentsResults)) {
                                    $studentName = $studentRow['First_Name'] . ' ' . $studentRow['Last_Name'];
                                    ?>
                                    <li class="mdl-menu__item"
                                        data-val="<?php echo $studentRow['Id']; ?>"><?php echo $studentName; ?></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                            <input autocomplete="off" type="text" id="contactName" class="mdl-textfield__input" readonly>
                            <input autocomplete="off" type="hidden" id="contactId" name="contactId">
                            <i class="mdl-icon-toggle__label fa fa-angle-down"></i>
                            <label for="contactId" class="mdl-textfield__label">Active Contacts</label>
                            <ul for="contactId" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                <?php while ($contactsRow = mysqli_fetch_assoc($allActiveContactsResults)) {
                                    $contactName = $contactsRow['First_Name'] . ' ' . $contactsRow['Last_Name'];
                                    ?>
                                    <li class="mdl-menu__item"
                                        data-val="<?php echo $contactsRow['Id']; ?>"><?php echo $contactName; ?></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-12 col-sm-6 m-auto">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input id="relationship" class="mdl-textfield__input" name="relationship" type="text"/>
                            <label class="mdl-textfield__label" for="relationship">Relationship to Student</label>
                        </div>
                    </div>
                </div>

                <div class="row col-sm-12">
                    <input id="submitButton" class="btn btn-primary btn-lg btn-block" type="button"
                           onclick="validateStudentToContact()" value="Enter"/><br><br>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    function validateStudentToContact() {
        if(ErrorPromptCheck() == true){
            return;
        }
        var studentId = document.getElementById("studentId").value;
        var contactId = document.getElementById("contactId").value;
        var studentName = document.getElementById("studentName").value;
        var contactName = document.getElementById("contactName").value;
        var relationship = document.getElementById("relationship").value;
        var afterModalDisplaysRoute = "NewStudentToContact.php";
        var successModalMessage = "The Student, " + studentName + " and contact, " + contactName + " have been added.";
        var duplicateModalMessage = "the record for " + studentName + ", and " + contactName + " already exist.";
        $.ajax({
            url: "../mysql-statements/add/AddStudentToContact.php",
            method: "POST",
            data: {
                studentId: studentId,
                contactId: contactId,
                relationship: relationship
            },
            success: function (response) {
                if (response === 'entry-exists') {
                    launchGenericDuplicateEntryModal(duplicateModalMessage);
                } else if (response === 'database-error') {
                    launchGenericDatabaseErrorModal();
                } else if (response === 'success') {
                    launchGenericSuccessfulEntryModal(successModalMessage, afterModalDisplaysRoute);
                } else if (response === 'fill-required-inputs') {
                    launchGenericRequiredInputsModal();
                }
            }
        });
    }
</script>

<?php include("../app-shell/Footer.php"); ?>