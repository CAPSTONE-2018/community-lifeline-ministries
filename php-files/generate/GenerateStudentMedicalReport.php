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
                    <table id="search-table" class="table table-striped table-condensed table-hover">
                        <thead>
                        <tr class="row">
                            <th class="col-sm-3 text-center">First Name</th>
                            <th class="col-sm-3 text-center">Last Name</th>
                            <th class="col-sm-3 text-center">Name</th>
                            <th class="col-sm-3 text-center">Note</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($studentMedicalConcernResults, MYSQLI_ASSOC)) {
                            echo "<tr class=\"row\"><td class=\"col-sm-3 text-center\">";
                            echo $row['First_Name'];
                            echo "</td><td class=\"col-sm-3 text-center\">";
                            echo $row['Last_Name'];
                            echo "</td><td class=\"col-sm-3 text-center\">";
                            echo $row['Type_Name'];
                            echo "</td><td class=\"col-sm-3 text-center\">";
                            echo $row['Note'];
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
