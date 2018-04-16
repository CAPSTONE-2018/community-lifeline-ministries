<?php

//connect to database
include("../../db/config.php");

$searchFilters = $_POST['searchFilters'];
$studentsResults = mysqli_query($db, "SELECT  students.First_Name, students.Last_Name,attendance.DATE, attendance.Attendance_value,programs.Program_Name FROM students JOIN attendance join programs ".$searchFilters);
?>

<div id="print_div">
    <div class="card-body">
        <div class="card-content">
            <form method="POST" action="#" name="allStudentsTable"
                  id="allStudentsTable">
                <div class="table-responsive">
                    <table id="search-table" class="table table-striped table-condensed table-hover">
                        <thead>
                        <tr>
                            <th class="col-sm-3">First Name</th>
                            <th class="col-sm-3">Last Name</th>
                            <th class="col-sm-3">Date</th>
                            <th class="col-sm-3">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($studentsResults, MYSQLI_ASSOC)) {

                            echo "<tr><td>";
                            echo $row['First_Name'];
                            echo "</td><td>";
                            echo $row['Last_Name'];
                            echo "</td><td>";
                            echo $row['DATE'];
                            echo "</td><td>";
                            if($row['Attendance_value'] == 1){
                                echo 'Present';
                            }
                            else if($row['Attendance_value'] == 2){
                                echo 'Absent';
                            }
                            else{
                                echo 'Tardy';
                            }
                            echo "</td></tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>    <input type="button" class="btn btn-primary pull-right" onclick="printReport('print_div')" value="Print" />
        <script src="../../scripts/print.js"></script>
        <div class="card-footer">

        </div>
    </div>
</div>
</div>

</div>
