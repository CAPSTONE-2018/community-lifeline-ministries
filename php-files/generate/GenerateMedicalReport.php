<?php

//connect to database
include("../../db/config.php");

$searchFilters = $_POST['searchFilters'];

echo $searchFilters;

$studentsResults = mysqli_query($db, "SELECT * FROM medical_concern_types ".$searchFilters);
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
                            <th class="col-sm-2 text-left">Id</th>
                            <th class="col-sm-3">Name</th>
                            <th class="col-sm-3 text-left">Note</th>
                            <th class="col-sm-3 text-left">Students Affected</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($studentsResults, MYSQLI_ASSOC)) {

                            $search = $row['Id'];
                            $studentToAllergyQuery = ("SELECT COUNT(Medical_Type_Id) from Student_To_Medical_Concerns Where Medical_Type_Id = $search;");
                            $rs = mysqli_query($db, $studentToAllergyQuery);
                            $result2 = mysqli_fetch_array($rs);

                            echo "<tr><td>";
                            echo $row['Id'];
                            echo "</td><td>";
                            echo $row['Type_Name'];
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
