<?php

//connect to database
include("../../db/config.php");

$searchFilters = $_POST['searchFilters'];
$studentsResults = mysqli_query($db, "SELECT  Students.First_Name, Students.Last_Name,Student_Test_Scores.School_Year,Student_Test_Scores.Term,Student_Test_Scores.Pre_Test,Student_Test_Scores.Post_Test FROM Students JOIN Student_Test_Scores " . $searchFilters);
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
                            <th scope="col">School Year</th>
                            <th scope="col">Term</th>
                            <th scope="col">Pre-Test</th>
                            <th scope="col">Post-Test</th>
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
                            echo $row['School_Year'];
                            echo "</td><td>";
                            echo $row['Term'];
                            echo "</td><td>";
                            echo $row['Pre_Test'];
                            echo "</td><td>";
                            echo $row['Post_Test'];
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
