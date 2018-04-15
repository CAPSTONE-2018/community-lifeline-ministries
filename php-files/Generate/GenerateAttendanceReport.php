<?php

//connect to database
include("../../db/config.php");

$searchFilters = $_POST['searchFilters'];
$studentsResults = mysqli_query($db, "SELECT DISTINCT attendance.DATE,attendance.Program_Id, programs.Program_Name FROM attendance JOIN programs ".$searchFilters);
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
                            <th class="col-sm-2 text-center">Attendance Date</th>
                            <th class="col-sm-3">Program Name</th>
                            <th class="col-sm-3">Present Count</th>
                            <th class="col-sm-3">Absent Count</th>
                            <th class="col-sm-3">Tardy Count</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($studentsResults, MYSQLI_ASSOC)) {
                            $present = mysqli_query($db, "SELECT COUNT(Id) FROM attendance WHERE attendance.Attendance_Value = 1 AND attendance.Program_Id = ".$row['Program_Id']);
                            $present2 = mysqli_fetch_array($present);
                            $absent = mysqli_query($db, "SELECT COUNT(Id) FROM attendance WHERE attendance.Attendance_Value = 2 AND attendance.Program_Id = ".$row['Program_Id']);
                            $absent2 = mysqli_fetch_array($absent);
                            $tardy = mysqli_query($db, "SELECT COUNT(Id) FROM attendance WHERE attendance.Attendance_Value = 3 AND attendance.Program_Id = ".$row['Program_Id']);
                            $tardy2 = mysqli_fetch_array($tardy);

                            echo "<tr><td>";
                            echo $row['DATE'];
                            echo "</td><td>";
                            echo $row['Program_Name'];
                            echo "</td><td>";
                            echo $present2[0];
                            echo "</td><td>";
                            echo $absent2[0];
                            echo "</td><td>";
                            echo $tardy2[0];
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
