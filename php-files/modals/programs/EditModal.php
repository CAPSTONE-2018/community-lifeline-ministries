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
$response = '';

while ($programInfoRow = mysqli_fetch_assoc($programInfoResults)) {
    $dynamicRowId++;
    $programName = $programInfoRow['Program_Name'];
    $response = '
<div class="card">'; ?>
    <div class="card-body">
        <div class="form-content">
            <div class="tab-content">
                <div class="tab-pane active " id="studentInfo">
                    <div class="form-group col-sm-12">
                        <h4 class="heading "><i class="fa fa-pencil"></i> Program Info</h4>
                        <div class="edit-student-blue-line-color"></div>
                        <div class="col-sm-6 m-auto">
                            <div id="floatingProgramName"
                                 class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input id="programName" class="mdl-textfield__input"
                                       onblur="checkForInputs()" onfocus="addProgramNameFocus()"
                                       value="<?php echo $programName; ?>" name="name" type="text" readonly/>
                                <label class="mdl-textfield__label" for="programName">Program Name</label>
                            </div>
                        </div>

                        <div class="col-sm-6 m-auto">
                            <div id="floatingStudentsEnrolledInProgram"
                                 class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input id="studentsEnrolledInProgram" class="mdl-textfield__input"
                                       onblur="checkForInputs()" onfocus="addStudentsEnrolledFocus()"
                                       value="<?php while ($enrolledStudents = mysqli_fetch_assoc($numberOfStudentsResults)) {
                                           echo $enrolledStudents['Students_Enrolled'];
                                       } ?>" name="enrolledStudents" type="text" readonly/>
                                <label class="mdl-textfield__label" for="studentsEnrolledInProgram">Students
                                    Enrolled</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <h4 class="heading "><i class="fa fa-star"></i> Volunteers</h4>
                        <div class="edit-student-blue-line-color"></div>
                        <?php while ($volunteerRow = mysqli_fetch_assoc($volunteerInfoResults)) {
                            $volunteerName = $volunteerRow['First_Name'] . ' ' . $volunteerRow['Last_Name'];
                            ?>
                            <div class="col-sm-6 m-auto">
                                <div id="floatingVolunteerName"
                                     class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input id="volunteerName" class="mdl-textfield__input"
                                           onblur="checkForInputs()" onfocus="addVolunteerNameFocus()"
                                           value="<?php echo $volunteerName; ?>" name="volunteerName" type="text"
                                           readonly/>
                                    <label class="mdl-textfield__label" for="volunteerName">Volunteer</label>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var footer = "<div class='form-group'>" +
            "<button type='button' onclick='routeToHomePage()' class='btn btn-secondary' data-dismiss='modal'>Home Page</button>" +
            "<button type='button' onclick='routeToEditProgram(<?php echo $programId; ?>)'>Edit Program</button>" +
            "</div>";

        $('.modal-footer').html(footer);

        function routeToEditProgram(programId) {
            window.location = '../../php-files/edit/EditProgram.php?programId=' + programId;
        }
    </script>
    </div>

<?php } ?>