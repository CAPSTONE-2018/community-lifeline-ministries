<?php
include("../app-shell/Header.php");
include("../app-shell/Sidebar.php");
include("../../db/config.php");
include("../app-shell/TimeZoneFormat.php");
$query = "SELECT DISTINCT * FROM Students WHERE Active_Student = 1 ORDER BY Last_Name, First_Name;";
$studentsResult = mysqli_query($db, $query);
?>
    <div class="container-fluid">
        <div id="FilterReport" class="row">
            <div class="col-lg">
                <div class="card">
                    <div class="card-body">
                        <form class="form-horizontal" method="POST" name="newStudentForm"
                              id="newStudentForm">
                            <div class="form-content">
                                <div class="tab-content">
                                    <button id="show-filters" style="float:right"> Show Filters</button>
                                    <div class="tab-pane active " id="studentInfo">
                                        <div class="header">Attendance Report</div>
                                        <div id="as" class="collapse2">
                                            <h4 class="heading"><i class="glyphicon glyphicon-user"></i> New Report</h4>
                                            <div class="blue-line-color"></div>
                                            <div class="form-group">
                                                <select id="student">
                                                    <option value="0">All Students</option>
                                                    <?php
                                                    while ($studentsRow = mysqli_fetch_assoc($studentsResult)) {
                                                        $studentId = $studentsRow['Id'];
                                                        $studentNameInDropDown = $studentsRow['First_Name'] . ' ' . $studentsRow['Last_Name'];
                                                        echo "<option class='mdl-menu__item' " . " value='" . $studentsRow['Id'] . "'>" . $studentNameInDropDown . "</option>";
                                                    }

                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                        </form>

                        <div class="card-footer">
                            <div class="right-align">
                                <!--   Button trigger modal -->
                                <button id="generateReport" type="button" class="btn btn-right btn-primary">
                                    Generate Report
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="add-new-report">

            </div>
        </div>
    </div>

    <script type="text/javascript">

        $(document).ready(function () {

            $('#show-filters').click(function () {
                $('.collapse2').collapse("show");
            });
        });

        $(document).ready(function () {
            $('#generateReport').click(function () {

                var searchFilters = 'WHERE';
                var studentId = 0;
                if (document.getElementById('student') != null) {
                    studentId = document.getElementById('student').value;
                }

                if (studentId != 0) {
                    searchFilters += " students.Id = " + studentId;
                    searchFilters += " AND ";
                }
                searchFilters += " attendance.Program_Id = programs.Id AND students.id = attendance.Student_Id";
                searchFilters += " ORDER BY students.Last_Name";

                $('#print_div').remove();
                $('.collapse2').collapse("hide");
                $.ajax({
                    url: "../Generate/GenerateStudentAttendanceReport.php",
                    method: "POST",
                    data: {searchFilters: searchFilters},
                    success: function (output) {
                        $('.add-new-report').slideDown().append(output);
                    }
                });
            });
        });

    </script>
<?php include("../app-shell/Footer.php"); ?>