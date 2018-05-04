<?php

//connect to database
include("../../db/config.php");

$searchFilters = $_POST['searchFilters'];
$studentsResults = mysqli_query($db, "SELECT  Students.First_Name, Students.Last_Name,Attendance.DATE, Attendance.Attendance_value,Programs.Program_Name FROM Students JOIN Attendance join Programs ".$searchFilters);
?>

<div id="print_div">
    <div class="card-body">
        <div class="card-content">
            <form method="POST" action="#" name="allStudentsTable"
                  id="allStudentsTable">
                <div class="table-responsive">
                    <table id="search-table" class="table table-striped table-condensed table-hover">
                        <thead>
                        <tr class='row'>
                            <th class="col-sm-3 text-center">First Name</th>
                            <th class="col-sm-3 text-center">Last Name</th>
                            <th class="col-sm-3 text-center">Date</th>
                            <th class="col-sm-3 text-center">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($studentsResults, MYSQLI_ASSOC)) {

                            echo "<tr class='row'><td class=\"col-sm-3 text-center\">";
                            echo $row['First_Name'];
                            echo "</td><td class=\"col-sm-3 text-center\">";
                            echo $row['Last_Name'];
                            echo "</td><td class=\"col-sm-3 text-center\">";
                            echo $row['DATE'];
                            echo "</td><td class=\"col-sm-3 text-center\">";
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
