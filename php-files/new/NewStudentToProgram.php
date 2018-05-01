<?php
include("../app-shell/Header.php");
include("../app-shell/Sidebar.php");
include("../../db/config.php");
$queryForAllActiveStudents = "SELECT * FROM Students WHERE Active_Student = 1 ORDER BY Last_Name, First_Name;";
$allActiveStudentsResults = mysqli_query($db, $queryForAllActiveStudents);
$queryForAllActivePrograms = "SELECT * FROM Programs WHERE Active_Program = 1 ORDER BY Program_Name";
$allActiveProgramsResults = mysqli_query($db, $queryForAllActivePrograms);
?>
<div class="container-fluid col-sm-10">
    <div class="card text-center">
        <div class="card-header">
            <h1><i class="fa fa-pencil"></i> Register Student to Program</h1>
        </div>

        <div class="card-body">
            <form action="../mysql-statements/add/AddStudentToProgram.php" method="post" id="newStudentToProgramForm">
                <div class="row">
                    <div class="col-sm-6 ">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                            <input type="text" class="mdl-textfield__input" readonly>
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

                    <div class="col-sm-6">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                            <input type="text" class="mdl-textfield__input" readonly>
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
                    <input id="submitButton" class="btn large-action-buttons edit-button"
                           form="newStudentToProgramForm" type="submit" value="Enter"><br><br>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include("../app-shell/Footer.php"); ?>
