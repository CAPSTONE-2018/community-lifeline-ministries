<?php

//connect to database
include("../../db/config.php");


$studentsResults = mysqli_query($db, "SELECT DISTINCT Students.First_Name,Students.Last_Name, Student_To_Programs.Program_Id FROM students JOIN Student_To_Programs ON Students.Id = Student_To_Programs.Student_Id");
$volunteerResults = mysqli_query($db, "SELECT DISTINCT Volunteer_Employees.First_Name,Volunteer_Employees.Last_Name, Volunteer_To_Programs.Program_Id FROM Volunteer_Employees JOIN Volunteer_To_Programs  ON Volunteer_Employees.Id = Volunteer_To_Programs.Volunteer_Id");

?>

<div id="print_div">
    <div class="card-body">
        <div class="card-content">
            <form method="POST" action="#" name="allStudentsTable"
                  id="allStudentsTable">
                <div class="table-responsive">
                    <table id="search-table" class="table table-striped table-condensed table-hover">
                        <thead>
                        <table id="test" class="table">
                            <thead class="thead-dark">

                            <tr>
                                <th scope="col">Student First Name</th>
                                <th scope="col">Student Last Name</th>
                                <th scope="col">Program</th>
                            </tr>
                            </thead>
                            <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($studentsResults, MYSQLI_ASSOC)) {
                            $rs = mysqli_query($db, "SELECT Programs.Program_NAME from Programs WHERE Programs.Id = " . $row['Program_Id']);
                            $result2 = mysqli_fetch_array($rs);

                            echo "<tr scope=\"row\"><td>";
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
                        <thead>
                        <table id="test" class="table">
                            <thead class="thead-dark">

                            <tr>
                                <th scope="col">Volunteer First Name</th>
                                <th scope="col">Volunteer Last Name</th>
                                <th scope="col">Program</th>
                            </tr>
                            </thead>
                            <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($volunteerResults, MYSQLI_ASSOC)) {
                            $rs = mysqli_query($db, "SELECT Programs.Program_NAME from Programs WHERE Programs.Id = " . $row['Program_Id']);
                            $result2 = mysqli_fetch_array($rs);

                            echo "<tr scope=\"row\"><td>";
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
        </div>
        <input type="button" class="btn btn-primary pull-right" onclick="printReport('print_div')" value="Print"/>
        <script src="../../scripts/print.js"></script>
        <div class="card-footer">

        </div>
    </div>
</div>