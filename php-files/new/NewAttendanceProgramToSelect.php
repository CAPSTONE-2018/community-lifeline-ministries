<?php
include("../scripts/header.php");

//connect to database
include("../../db/config.php");

$queryForProgramName = "SELECT * FROM Programs ORDER BY Program_Name;";
$result = mysqli_query($db, $queryForProgramName);

?>
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

    <script type="text/javascript">
        $(document).ready(function() {
            $("label").on("click", function(e) {
                e.preventDefault();
                var $radio = $("#" + $(this).attr("for")),
                    name = $radio.attr("name"),
                    hasRadio = $radio.attr("type") == "radio";
                if (!hasRadio) return;
                if ($radio.checked("is-checked") == true) {
                    $radio.prop("checked", false).change();
                    $radio.data("is-checked", false);
                } else {
                    $radio.data("is-checked", true);
                    $radio.prop("checked", true).change();
                }
                $('input[type="radio"][name="' + name + '"]')
                    .not("#" + $(this).attr("for"))
                    .data("is-checked", false);
            });
        });
    </script>
    <div id="showClassInfo"></div>

<?php
include("../scripts/footer.php");
?>