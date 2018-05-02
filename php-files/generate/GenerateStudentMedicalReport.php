<?php

//connect to database
include("../../db/config.php");

$searchFilters = $_POST['searchFilters'];

$queryForStudentAllergies = "SELECT students.First_Name,students.Last_Name, Medical_Concern_Types.Type_Name, medical_concern_types.Note
                              FROM medical_concern_types JOIN students WHERE medical_concern_types.Id = students.Id ";
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
                            <th class="col-sm-2 text-left">First Name</th>
                            <th class="col-sm-2 text-left" >Last Name</th>
                            <th class="col-sm-3">Name</th>
                            <th class="col-sm-3 text-left">Note</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($studentMedicalConcernResults, MYSQLI_ASSOC)) {
                            echo "<tr><td>";
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
        </div>    <input type="button" class="btn btn-primary pull-right" onclick="printReport('print_div')" value="Print" />
        <script src="../../scripts/print.js"></script>
        <div class="card-footer">

        </div>
    </div>
</div>
</div>

</div>
