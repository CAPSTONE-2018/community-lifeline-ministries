<?php
include("../app-shell/Header.php");
include("../app-shell/Sidebar.php");
include("../app-shell/EmptyModalShell.php");
include("../../db/config.php");
$queryForAllActiveStudents = "SELECT * FROM Students WHERE Active_Student = 1 ORDER BY Last_Name, First_Name;";
$allActiveStudentsResults = mysqli_query($db, $queryForAllActiveStudents);
$queryForAllActiveMedicalConcernTypes = "SELECT * FROM Medical_Concern_Types WHERE Active_Id = 1;";
$allActiveMedicalConcernResults = mysqli_query($db, $queryForAllActiveMedicalConcernTypes);
?>

<div class="app-title">
    <div>
        <h3><i class="fa fa-plus"></i> Medical Concern Type</h3>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="../index-login/Main-Menu.php"><i class="fa fa-home fa-lg"></i></a></li>
        <li class="breadcrumb-item"> New Concern Type</li>
    </ul>
</div>
<div class="container-fluid">
    <div class="card text-center">
        <div class="card-header">
            <h1><i class="fa fa-pencil"></i> Add Student Medical Concern</h1>
        </div>

        <div class="card-body">
            <form method="post" id="newStudentToProgramForm">
                <div class="row">
                    <div class="col-sm-6 ">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                            <input type="text" id="studentName" class="mdl-textfield__input" readonly>
                            <input type="hidden" id="studentId" name="studentId">
                            <i class="mdl-icon-toggle__label fa fa-angle-down"></i>
                            <label for="studentId" class="mdl-textfield__label">Student</label>
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

                    <div class="col-sm-6">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                            <input type="text" id="medicalTypeIdName" class="mdl-textfield__input" readonly>
                            <input type="hidden" id="medicalTypeId" name="medicalTypeId">
                            <i class="mdl-icon-toggle__label fa fa-angle-down"></i>
                            <label for="programId" class="mdl-textfield__label">Concern Type</label>
                            <ul for="programId" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                <?php while ($medicalConcernsRow = mysqli_fetch_assoc($allActiveMedicalConcernResults)) {
                                    $medicalConcernTypeName = $medicalConcernsRow['Type_Name'];
                                    ?>
                                    <li class="mdl-menu__item"
                                        data-val="<?php echo $medicalConcernsRow['Id']; ?>"><?php echo $medicalConcernTypeName; ?></li>

                                <?php } ?>

                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-8 m-auto">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input id="medicalConcernName" class="mdl-textfield__input"
                                   name="medicalConcernName" type="text"
                                   onkeypress="return suppressEnter()"/>
                            <label class="mdl-textfield__label"
                                   for="medicalConcernName">Concern Name</label>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-10">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <textarea id="medicalConcernNote" class="mdl-textfield__input" name="medicalConcernNote" type="text"></textarea>
                            <label class="mdl-textfield__label" for="medicalConcernNote">Note</label>
                        </div>
                    </div>
                </div>

                <div class="row col-sm-12">
                    <input id="submitButton" class="btn large-action-buttons edit-button"
                           onclick="validateStudentToMedicalConcern()" type="button" value="Enter"><br><br>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    function validateStudentToMedicalConcern() {
        var concernTypeId = document.getElementById("medicalTypeId").value;
        var studentId = document.getElementById("studentId").value;
        var concernTypeName = document.getElementById("medicalTypeIdName").value;
        var concernNote = document.getElementById("medicalConcernNote").value;

        var studentName = document.getElementById("studentName").value;
        var concernName = document.getElementById("medicalConcernName").value;

        var textForModal = concernName + ", and " + studentName;

        var submissionType = "Student to Medical Concern";
        var afterModalDisplaysRoute = "/community-lifeline-ministries/php-files/new/NewStudentToMedicalConcern.php";

        $.ajax({
            url: "/community-lifeline-ministries/php-files/mysql-statements/add/AddStudentToMedicalConcerns.php",
            method: "POST",
            data: {
                studentId: studentId,
                medicalConcernName: concernName,
                medicalConcernTypeId: concernTypeId,
                medicalConcernNote: concernNote
            },
            success: function (response) {
                if (response === 'entry-exists') {
                    launchGenericDuplicateEntryModal(textForModal, submissionType);
                } else if (response === 'database-error') {
                    launchGenericDatabaseErrorModal();
                } else if (response === 'success') {
                    launchGenericSuccessfulEntryModal(textForModal, submissionType, afterModalDisplaysRoute);
                } else if (response === 'fill-required-inputs') {
                    launchGenericRequiredInputsModal();
                }
            }
        });
    }
</script>
<?php include("../app-shell/Footer.php"); ?>
