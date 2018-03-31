<?php
include("../scripts/header.php");

//connect to database
include("../../db/config.php");

$queryForAllPrograms = "SELECT * FROM Programs ORDER BY Program_Name;";
$queryDoesAttendanceRecordExist = "SELECT DISTINCT Program_Id FROM Attendance WHERE Date = CURDATE();";

$programResults = mysqli_query($db, $queryForAllPrograms);
$attendanceRecordResult = mysqli_query($db, $queryDoesAttendanceRecordExist);

$programsWithAttendanceRecordArray = [];

while ($attendanceAssociation = mysqli_fetch_assoc($attendanceRecordResult)) {
    array_push($programsWithAttendanceRecordArray, $attendanceAssociation['Program_Id']);
}
?>
<link rel="stylesheet" href="../../node_modules/pretty-dropdowns/dist/css/prettydropdowns.css"/>

<div class="container-fluid col-sm-8">
    <div class="card text-center">
        <div class="card-header">
            Message On If Attendance Was Taken Today
        </div>
        <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        </div>
        <div class="card-footer text-muted align-content-center">
            <div class="nav nav-pills card-header-pills align-content-center">
                <div class="nav-item col-sm-4">
                    <form id="attendanceProgramToSelect" action="../new/NewAttendanceRecord.php" method="POST">
                        <select onchange="this.form.submit()" name="programId">
                            <option data-prefix="<span aria-hidden='true' class='glyphicon glyphicon-plus'></span>"
                                    disabled selected> Start New Record
                            </option>

                            <?php
                            while ($programsRow = mysqli_fetch_assoc($programResults)) {
                                $programId = $programsRow['Id'];
                                $programNameToDisplay = $programsRow['Program_Name'];

                                if (in_array($programId, $programsWithAttendanceRecordArray)) {
                                    echo "<option class='custom-size program-select-buttons' disabled value='$programId'>$programNameToDisplay</option>";
                                } else {
                                    echo "<option class='custom-size program-select-buttons' value='$programId'>$programNameToDisplay</option>";
                                }
                            }
                            ?>
                        </select>
                        <noscript><input type="submit" value="Submit"></noscript>
                    </form>
                </div>

                <div class="nav-item col-sm-4 on-hover">
                    <a class="nav-link" href="#">
                        <i class="glyphicon glyphicon-search"></i> Look Up
                    </a>
                </div>

                <div class="nav-item col-sm-4 on-hover">
                    <a class="nav-link" href="#">
                        <i class="glyphicon glyphicon-pencil"></i> Edit
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("../scripts/footer.php");
?>

<script defer src="../../node_modules/pretty-dropdowns/dist/js/jquery.prettydropdowns.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $dropdown = $('select').prettyDropdown({
            height: 40,
            classic: true,
            customClass: "triangle on-hover"
        });
    });
    // When <select> state changes...
    $dropdown.refresh();
</script>