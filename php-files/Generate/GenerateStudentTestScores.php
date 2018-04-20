<?php

//connect to database
include("../../db/config.php");

$searchFilters = $_POST['searchFilters'];
$studentsResults = mysqli_query($db, "SELECT  students.First_Name, students.Last_Name,student_test_scores.School_Year,student_test_scores.Term,student_test_Scores.Pre_Test,student_test_scores.Post_Test FROM students JOIN student_test_scores ".$searchFilters);
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
                            <th class="col-sm-3">School Year</th>
                            <th class="col-sm-3">Term</th>
                            <th class="col-sm-3">Pre-Test</th>
                            <th class="col-sm-3">Post-Test</th>
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
        </div>    <input type="button" class="btn btn-primary pull-right" onclick="printReport('print_div')" value="Print" />
        <script src="../../scripts/print.js"></script>
        <div class="card-footer">

        </div>
    </div>
</div>
</div>

</div>
