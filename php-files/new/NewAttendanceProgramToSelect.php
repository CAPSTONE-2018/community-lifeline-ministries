<?php
include("../scripts/header.php");

//connect to database
include("../../db/config.php");

$queryForProgramName = "SELECT * FROM Programs ORDER BY Program_Name;";
$result = mysqli_query($db, $queryForProgramName);

?>
<div class="row">
    <div class="form-group">
        <div class="100%">
            <h1>Select A Program For Attendance:</h1>

            <form action="./NewAttendanceRecord.php" method="POST" id="program-form">
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $buttonTitle = $row['Program_Name'];
                        $buttonValue = $row['Id'];
                        echo "<button type='submit' class='attendance-button' value='$buttonValue' name='programId'>$buttonTitle</button>";
                    }
                }
                ?>
            </form>
        </div>
    </div>
</div>

<div id="showClassInfo"></div>

<?php
include("../scripts/footer.php");
?>