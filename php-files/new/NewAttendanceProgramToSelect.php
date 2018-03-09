<?php
include("../scripts/header.php");

//connect to database
include("../../db/config.php");

$queryForProgramName = "SELECT * FROM Programs ORDER BY Program_Name;";
$result = mysqli_query($db, $queryForProgramName);

?>

    <link rel="stylesheet" href="../../css/flat-button-styles.css">
    <link rel="stylesheet" href="../../css/attendance-program-selection.css">

    <div class="container-fluid">
        <div class="form-group">

            <div class="card">
                <div class="card-body">
                    <div class="header">
                        <h3 class="card-title">Select A Program For Attendance</h3>
                    </div>


                    <div class="col-10 card-body button-card-background">
                        <form action="./NewAttendanceRecord.php" method="POST" id="program-form">
                            <?php
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $buttonTitle = $row['Program_Name'];
                                    $buttonValue = $row['Id'];
                                    echo "<button type='submit' class='custom-size program-select-buttons' value='$buttonValue' name='programId'>$buttonTitle</button>";
                                }
                            }
                            ?>
                        </form>
                    </div>
                </div>


            </div>
        </div>

    </div>
    </div>


    <div id="showClassInfo"></div>

<?php
include("../scripts/footer.php");
?>