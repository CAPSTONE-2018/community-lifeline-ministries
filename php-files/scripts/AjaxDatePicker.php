<?php
/**
 * Created by PhpStorm.
 * User: joshuajurss
 * Date: 4/12/18
 * Time: 7:50 PM
 */

include("../../db/config.php");


$dateToSearch = $_POST['dateToSearch'];
$queryForDatePicker = "SELECT DISTINCT Attendance.Program_Id, Programs.Program_Name FROM Attendance JOIN Programs ON Attendance.Program_Id = Programs.Id WHERE Date = '$dateToSearch';";
$datePickerResults = mysqli_query($db, $queryForDatePicker);

$dynamicId = 0;

while ($programsRow = mysqli_fetch_assoc($datePickerResults)){
    $programNameToDisplay = $programsRow['Program_Name'];
    $programId = $programsRow['Program_Id'];

    $dynamicId++;

    ?>

    <form id="attendanceLookupButton<?php echo $dynamicId ?>" action="../edit/EditAttendanceRecord.php" method="POST" >
        <input type="hidden" name="programIdToEdit" value="<?php echo $programId; ?>"  />
        <input type="hidden" name="programDateToSearch" value="<?php echo $dateToSearch; ?>" />
        <button form="attendanceLookupButton<?php echo $dynamicId ?>">
            <?php echo $programNameToDisplay; ?>
        </button>
    </form>

<?php
} ?>