<?php

//connect to database
include("../../db/config.php");

$searchFilters = $_POST['searchFilters'];
$studentsResults = mysqli_query($db, "SELECT DISTINCT Attendance.DATE,Attendance.Program_Id, Programs.Program_Name FROM Attendance JOIN Programs " . $searchFilters);
?>


<div class="table-responsive">
    <table id="test" class="table">
        <thead class="thead-dark">

        <tr>
            <th scope="col">Attendance Date</th>
            <th scope="col">Program Name</th>
            <th scope="col">Present Count</th>
            <th scope="col">Absent Count</th>
            <th scope="col">Tardy Count</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($row = mysqli_fetch_array($studentsResults, MYSQLI_ASSOC)) {
            $present = mysqli_query($db, "SELECT COUNT(Id) FROM Attendance WHERE Attendance.Attendance_Value = 1 AND Attendance.Program_Id = " . $row['Program_Id']);
            $present2 = mysqli_fetch_array($present);
            $absent = mysqli_query($db, "SELECT COUNT(Id) FROM Attendance WHERE Attendance.Attendance_Value = 2 AND Attendance.Program_Id = " . $row['Program_Id']);
            $absent2 = mysqli_fetch_array($absent);
            $tardy = mysqli_query($db, "SELECT COUNT(Id) FROM Attendance WHERE Attendance.Attendance_Value = 3 AND Attendance.Program_Id = " . $row['Program_Id']);
            $tardy2 = mysqli_fetch_array($tardy);

            echo "<tr scope=\"row\"><td>";
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
