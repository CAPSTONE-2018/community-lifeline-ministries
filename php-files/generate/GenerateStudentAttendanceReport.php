<?php

//connect to database
include("../../db/config.php");

$searchFilters = $_POST['searchFilters'];
$studentsResults = mysqli_query($db, "SELECT  Students.First_Name, Students.Last_Name,Attendance.DATE, Attendance.Attendance_value,Programs.Program_Name FROM Students JOIN Attendance join Programs " . $searchFilters);
?>

<div id="print_div">
    <div class="card-body">
        <div class="card-content">
            <form method="POST" action="#" name="allStudentsTable"
                  id="allStudentsTable">
                <div class="table-responsive">
                    <thead>
                    <table id="test" class="table">
                        <thead class="thead-dark">

                        <tr>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($studentsResults, MYSQLI_ASSOC)) {

                            echo "<tr scope=\"row\"><td>";
                            echo $row['First_Name'];
                            echo "</td><td>";
                            echo $row['Last_Name'];
                            echo "</td><td>";
                            echo $row['DATE'];
                            echo "</td><td>";
                            if ($row['Attendance_value'] == 1) {
                                echo 'Present';
                            } else if ($row['Attendance_value'] == 2) {
                                echo 'Absent';
                            } else {
                                echo 'Tardy';
                            }
                            echo "</td></tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
        <div class="card-footer">

        </div>
        <script type="text/javascript">
        $('#test').DataTable({
        dom: '<lf<t>iBp>',
            buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
            ]
            });
        </script>
    </div>
</div>
</div>

</div>
