<?php
include("../../../db/config.php");

$programId = $_POST['programId'];
$queryForStudentsInProgram =  "SELECT DISTINCT Students.Id, Students.First_Name, Students.Last_Name, Students.Address_One, Students.Address_Two, Students.City, Students.State,
 Students.Zip, Student_To_Programs.Program_Id FROM Students JOIN Student_To_Programs ON Students.Id = Student_To_Programs.Student_Id WHERE Program_Id = '$programId' AND Students.Active_Student = 1;";
$studentsInProgramResults = mysqli_query($db, $queryForStudentsInProgram);
$dynamicRowId = 0;

while ($studentRow = mysqli_fetch_assoc($studentsInProgramResults)) {
    $dynamicRowId++;
    $studentName = $studentRow['First_Name'] . " " . $studentRow['Last_Name'];
    $studentAddressOne = $studentRow['Address_One'];
    $studentAddressTwo = $studentRow['Address_Two'];
    $studentCity = $studentRow['City'];
    $studentState = $studentRow['State'];
    $studentZip = $studentRow['Zip'];
    ?>
    <div class="contact-modal">
        <div class="row">
            <div class="col-2 text-center mt-auto mb-auto">
                <i class="fa fa-users"></i>
            </div>
            <div class="col-10">
                <div class="is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input id="volunteerName" class="mdl-textfield__input" readonly
                           value="<?php echo $studentName; ?>"
                           type="text"/>
                    <label class="mdl-textfield__label" for="volunteerName">Contact Name</label>
                </div>
            </div>
        </div>

        <p>
            <button class="btn btn-outline" type="button" data-toggle="collapse"
                    aria-controls="collapseAddress<?php echo $dynamicRowId; ?>"
                    data-target="#collapseAddress<?php echo $dynamicRowId; ?>"
            >
                View Address Info <i class="fa fa-toggle-down"></i>
            </button>
        </p>

        <div class="collapse" id="collapseAddress<?php echo $dynamicRowId; ?>">
            <div class="row form-group">
                <div class="col-2 text-center mt-auto mb-auto">
                    <i class="fa fa-envelope"></i>
                </div>
                <div class="col-10">
                    <div class="is-dirty mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input id="volunteerContactEmail" class="mdl-textfield__input" readonly="readonly"
                               value="<?php echo $volunteerEmail; ?>"
                               type="email"/>
                        <label class="mdl-textfield__label" for="volunteerContactEmail">Contact Email</label>
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-2 text-center mt-auto mb-auto">
                    <i class="fa fa-address-book-o"></i>
                </div>
                <div class="col-10">
                    <div class="">
                        <?php echo $studentAddressOne . " " . $studentAddressTwo; ?>
                    </div>
                    <div class="">
                        <?php echo $studentCity . ", " . $studentState; ?>
                    </div>
                    <div class="">
                        <?php echo $studentZip; ?>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
<?php } ?>