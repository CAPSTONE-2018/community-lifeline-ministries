<?php

//connect to database
include("../../db/config.php");

$searchFilters = $_POST['searchFilters'];

$queryForStudentAllergies = "SELECT Students.First_Name,Students.Last_Name, Medical_Concern_Types.Type_Name, Medical_Concern_Types.Note
                              FROM Medical_Concern_Types JOIN Students WHERE Medical_Concern_Types.Id = Students.Id ";
$studentMedicalConcernResults = mysqli_query($db, $queryForStudentAllergies);
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
                            <th scope="col">Name</th>
                            <th scope="col">Note</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($studentMedicalConcernResults, MYSQLI_ASSOC)) {
                            echo "<tr scope=\"row\"><td>";
                            echo $row['First_Name'];
                            echo "</td><td>";
                            echo $row['Last_Name'];
                            echo "</td><td>";
                            echo $row['Type_Name'];
                            echo "</td><td>";
                            echo $row['Note'];
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
