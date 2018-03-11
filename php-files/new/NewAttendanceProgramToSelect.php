<?php
include("../scripts/header.php");

//connect to database
include("../../db/config.php");

$queryForProgramName = "SELECT * FROM Programs ORDER BY Program_Name;";
$result = mysqli_query($db, $queryForProgramName);

?>
    <link rel="stylesheet" href="../../css/attendance-program-selection.css">
    <link rel="stylesheet" href="../../css/check-mark-styles.css">
    <link rel="stylesheet" href=" https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">


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

                <div id="checker" class="checkBoxContainer">
                    <label >
                        <input type="checkbox" class="attendanceCheckMark">
                        <span class="customCheckMark"></span>
                    </label>

                    <label>
                        <input type="checkbox" class="attendanceCheckMark">
                        <span class="customCheckMark"></span>
                    </label>

                    <label>
                        <input id="attendanceCheckMark" type="checkbox" class="attendanceCheckMark">
                        <span class="customCheckMark"></span>
                    </label>
                </div>


            </div>
        </div>

    </div>


    <script type="text/javascript">

        $('#attendanceCheckMark').on("click", function () {
            if ($(this).attr('checked')) {
                alert('is checked');
            } else {
                alert('is not checked');
            }
        });


        $(document).ready(function () {
            $("#checker input:checkbox").on("click", function () {
                alert("hello");
                $("#checker input:checkbox").attr("checked", false);
                $(this).attr("checked", true);
            });

        }
    </script>




    <div id="showClassInfo"></div>

<?php
include("../scripts/footer.php");
?>