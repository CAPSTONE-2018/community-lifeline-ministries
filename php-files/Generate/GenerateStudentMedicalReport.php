<?php

//connect to database
include("../../db/config.php");

$searchFilters = $_POST['searchFilters'];

$queryForStudentAllergies = "SELECT Medical_Concerns.Name, Medical_Concern_Types.Type  
                              FROM (Medical_Concerns JOIN Student_To_Medical_Concerns ON Medical_Concerns.Id = Student_To_Medical_Concerns.Medical_Concern_Id)
                              JOIN Medical_Concern_Types ON Medical_Concern_Types.Id = Student_To_Medical_Concerns.Medical_Type_Id WHERE Student_Id = 1;";
$studentMedicalConcernResults = mysqli_query($db, $queryForStudentAllergies);
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
                            <th class="col-sm-2 text-center">Id</th>
                            <th class="col-sm-3">Name</th>
                            <th class="col-sm-3">Type</th>
                            <th class="col-sm-3 text-center">Note</th>
                            <th class="col-sm-3 text-center">Students Affected</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($studentsResults, MYSQLI_ASSOC)) {

                            $search = $row['Id'];
                            $studentToAllergyQuery = ("SELECT COUNT(Medical_Concern_Id) from Student_To_Medical_Concerns Where Medical_Concern_Id = $search;");
                            $rs = mysqli_query($db, $studentToAllergyQuery);
                            $result2 = mysqli_fetch_array($rs);

                            echo "<tr><td>";
                            echo $row['Id'];
                            echo "</td><td>";
                            echo $row['NAME'];
                            echo "</td><td>";
                            echo $row['TYPE'];
                            echo "</td><td>";
                            echo $row['Note'];
                            echo "</td><td>";
                            echo "$result2[0]";
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
