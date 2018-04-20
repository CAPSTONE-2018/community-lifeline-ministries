<?php

//connect to database
include("../../db/config.php");


$studentsResults = mysqli_query($db, "SELECT students.First_Name,students.Last_Name, student_to_programs.Program_Id FROM students JOIN student_to_programs ON students.Id = student_to_programs.Student_Id");
$volunteerResults = mysqli_query($db, "SELECT volunteer_employees.First_Name,volunteer_employees.Last_Name, volunteer_to_programs.Program_Id FROM volunteer_employees JOIN volunteer_to_programs  ON volunteer_employees.Id = volunteer_to_programs.Volunteer_Id");

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
                            <th class="col-sm-2 text-center">Student First Name</th>
                            <th class="col-sm-3">Student Last Name</th>
                            <th class="col-sm-3">Program</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($studentsResults, MYSQLI_ASSOC)) {
                            $rs = mysqli_query($db, "SELECT programs.Program_NAME from programs WHERE programs.Id = ".$row['Program_Id']);
                            $result2 = mysqli_fetch_array($rs);

                            echo "<tr><td>";
                            echo $row['First_Name'];
                            echo "</td><td>";
                            echo $row['Last_Name'];
                            echo "</td><td>";
                            echo $result2[0];
                            echo "</td></tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                    <table id="search-table" class="table table-striped table-condensed table-hover">
                        <thead>
                        <tr>
                            <th class="col-sm-2 text-center">Volunteer First Name</th>
                            <th class="col-sm-3">Volunteer Last Name</th>
                            <th class="col-sm-3">Program</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($volunteerResults  , MYSQLI_ASSOC)) {
                            $rs = mysqli_query($db, "SELECT Programs.Program_NAME from programs WHERE programs.Id = ".$row['Program_Id']);
                            $result2 = mysqli_fetch_array($rs);

                            echo "<tr><td>";
                            echo $row['First_Name'];
                            echo "</td><td>";
                            echo $row['Last_Name'];
                            echo "</td><td>";
                            echo $result2[0];
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
