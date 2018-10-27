<?php
include("../app-shell/Header.php");
include("../app-shell/Sidebar.php");
include("../app-shell/EmptyModalShell.php");
include("../../db/config.php");
$queryForAllActiveStudents = "SELECT * FROM Students WHERE Active_Student = 1 ORDER BY Last_Name, First_Name;";
$allActiveStudentsResults = mysqli_query($db, $queryForAllActiveStudents);
$queryForAllActivePrograms = "SELECT * FROM Programs WHERE Active_Program = 1 ORDER BY Program_Name";
$allActiveProgramsResults = mysqli_query($db, $queryForAllActivePrograms);
?>
<div class="app-title">
    <div>
        <h3><i class="fa fa-plus"></i> Student to Program</h3>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="../index-login/Main-Menu.php"><i class="fa fa-home fa-lg"></i></a></li>
        <li class="breadcrumb-item"> Student to Program</li>
    </ul>
</div>
<div class="container-fluid">
    <div class="card text-center">
        <div class="card-header">
            <h1><i class="fa fa-pencil"></i> Register Student to Program</h1>
        </div>

        <div class="card-body">
            <form method="post" id="newStudentToProgramForm">
                <h4 class="heading text-left"><i class="fa fa-bullhorn"></i> General Info</h4>
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
                            <input type="text" id="programName" class="mdl-textfield__input" readonly>
                            <input type="hidden" id="programId" name="programId">
                            <i class="mdl-icon-toggle__label fa fa-angle-down"></i>
                            <label for="programId" class="mdl-textfield__label">Program to Enroll</label>
                            <ul for="programId" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                <?php while ($programsRow = mysqli_fetch_assoc($allActiveProgramsResults)) {
                                    $programName = $programsRow['Program_Name'];
                                    ?>
                                    <li class="mdl-menu__item"
                                        data-val="<?php echo $programsRow['Id']; ?>"><?php echo $programName; ?></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row col-sm-12">
                    <input id="submitButton" class="btn btn-lg btn-primary btn-block" type="button"
                           onclick="validateStudentToProgram()" value="Enter"/><br><br>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    function validateStudentToProgram() {
        if(ErrorPromptCheck() == true){
            return;
        }
        var studentId = document.getElementById("studentId").value;
        var programId = document.getElementById("programId").value;
        var studentName = document.getElementById("studentName").value;
        var programName = document.getElementById("programName").value;
        var afterModalDisplaysRoute = "NewStudentToProgram.php";
        var successModalMessage = studentName + " has been registered to the Program, " + programName + ".";
        var duplicateModalMessage = "the record for " + studentName + ", and " + programName + " already exist.";
        $.ajax({
            url: "../mysql-statements/add/AddStudentToProgram.php",
            method: "POST",
            data: {
                studentId: studentId,
                programId: programId
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