<?php
include("../../../db/config.php");
$programId = $_POST['programId'];
$queryProgramInfo = "SELECT * FROM Programs WHERE Id = '$programId';";
$queryForVolunteerInfo = "SELECT Volunteer_Employees.Id, Volunteer_Employees.First_Name, Volunteer_Employees.Last_Name FROM
  Volunteer_Employees JOIN Volunteer_To_Programs ON Volunteer_Employees.Id = Volunteer_To_Programs.Volunteer_Id
 WHERE Volunteer_To_Programs.Program_Id = '$programId';";
$programInfoResults = mysqli_query($db, $queryProgramInfo);
$volunteerInfoResults = mysqli_query($db, $queryForVolunteerInfo);
$numberOfStudentsInProgram = "SELECT COUNT(Student_Id) as Students_Enrolled FROM Student_To_Programs WHERE Program_Id = '$programId';";
$numberOfStudentsResults = mysqli_query($db, $numberOfStudentsInProgram);
$dynamicRowId = 0;

while ($programInfoRow = mysqli_fetch_assoc($programInfoResults)) {
    $dynamicRowId++;
    $programName = $programInfoRow['Program_Name'];
    ?>
    <div class="card">
        <form name="programForm" id="programForm" method="POST" action="../edit/EditProgram.php">
            <input type="hidden" value="<?php echo $programId; ?>" name="programId"/>
            <div class="card-body">
                <div class="row col-sm-12">
                    <div class="col-6 d-inline">
                        <h4 class="heading "><i class="fa fa-pencil"></i> Program Info</h4>
                        <div class="edit-blue-line-color"></div>
                    </div>

                    <div class="col-6 d-inline">
                        <div id="floatingProgramName"
                             class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input id="programName" class="mdl-textfield__input"
                                   value="<?php echo $programName; ?>" name="name" type="text" readonly/>
                            <label class="mdl-textfield__label" for="programName">Program Name</label>
                        </div>

                        <div id="floatingStudentsEnrolledInProgram"
                             class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input id="studentsEnrolledInProgram" class="mdl-textfield__input"
                                   value="<?php while ($enrolledStudents = mysqli_fetch_assoc($numberOfStudentsResults)) {
                                       echo $enrolledStudents['Students_Enrolled'];
                                   } ?>" name="enrolledStudents" type="text" readonly/>
                            <label class="mdl-textfield__label" for="studentsEnrolledInProgram"># of Students
                                Enrolled</label>
                        </div>
                    </div>
                </div>

                <div class="row col-12">
                    <div class="col-6 d-inline">
                        <h4 class="heading "><i class="fa fa-star"></i> Volunteers</h4>
                        <div class="edit-blue-line-color"></div>
                    </div>
                    <div class="col-6 d-inline">
                        <?php while ($volunteerRow = mysqli_fetch_assoc($volunteerInfoResults)) {
                            $volunteerName = $volunteerRow['First_Name'] . ' ' . $volunteerRow['Last_Name'];
                            ?>

                            <div id="floatingVolunteerName"
                                 class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input id="volunteerName" class="mdl-textfield__input"
                                       value="<?php echo $volunteerName; ?>" name="volunteerName" type="text"
                                       readonly/>
                                <label class="mdl-textfield__label" for="volunteerName">Volunteer</label>
                            </div>

                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <input type="submit" form="programForm" value="Edit Program Info" class="btn btn-primary btn-lg btn-block"/>
            </div>

        </form>
    </div>
<?php } ?>