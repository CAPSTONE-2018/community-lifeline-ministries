<?php

//connect to database
include("../../db/config.php");

$searchFilters = $_POST['searchFilters'];

$studentsResults = mysqli_query($db, "SELECT * FROM Students ".$searchFilters);

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
                                <th class="col-sm-1 text-center">Active/Inactive</th>
                                <th class="col-sm-1 text-center">First Name</th>
                                <th class="col-sm-1 text-center">Last Name</th>
                                <th class="col-sm-2 text-center">Address One</th>
                                <th class="col-sm-2 text-center">Address Two</th>
                                <th class="col-sm-2 text-center">City</th>
                                <th class="col-sm-2 text-center">State</th>
                                <th class="col-sm-2 text-center">Zip</th>
                                <th class="col-sm-2 text-center">Ethnicity</th>
                                <th class="col-sm-2 text-center">Gender</th>
                                <th class="col-sm-2 text-center">Birth date</th>
                                <th class="col-sm-2 text-center">School</th>
                                <th class="col-sm-2 text-center">Permission Slip</th>
                                <th class="col-sm-2 text-center">Birth Certificate</th>
                                <th class="col-sm-2 text-center">Reduced Lunch</th>
                                <th class="col-sm-2 text-center">IEP</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            while($row = mysqli_fetch_array($studentsResults, MYSQLI_ASSOC)) {
                                echo "<tr class=\"row\"><td class=\"col-sm-2 text-center\">";
                                echo $row['Active_Student'];
                                echo "</td><td class=\"col-sm-2 text-center\">";
                                echo $row['First_Name'];
                                echo "</td><td class=\"col-sm-2 text-center\">";
                                echo $row['Last_Name'];
                                echo "</td><td class=\"col-sm-2 text-center\">";
                                echo $row['Address_One'];
                                echo "</td><td class=\"col-sm-2 text-center\">";
                                echo $row['Address_Two'];
                                echo "</td><td class=\"col-sm-2 text-center\">";
                                echo $row['City'];
                                echo "</td><td class=\"col-sm-2 text-center\">";
                                echo $row['State'];
                                echo "</td><td class=\"col-sm-2 text-center\">";
                                echo $row['Zip'];
                                echo "</td><td class=\"col-sm-2 text-center\">";
                                echo $row['Ethnicity'];
                                echo "</td><td class=\"col-sm-2 text-center\">";
                                echo $row['Gender'];
                                echo "</td><td class=\"col-sm-2 text-center\">";
                                echo $row['Birth_Date'];
                                echo "</td><td class=\"col-sm-2 text-center\">";
                                echo $row['School'];
                                echo "</td><td class=\"col-sm-2 text-center\">";
                                echo $row['Permission_Slip'];
                                echo "</td><td class=\"col-sm-2 text-center\">";
                                echo $row['Birth_Certificate'];
                                echo "</td><td class=\"col-sm-2 text-center\">";
                                echo $row['Reduced_Lunch_Eligible'];
                                echo "</td><td class=\"col-sm-2 text-center\">";
                                echo $row['IEP'];
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
