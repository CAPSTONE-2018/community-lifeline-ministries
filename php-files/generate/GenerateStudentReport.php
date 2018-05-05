<?php

//connect to database
include("../../db/config.php");

$searchFilters = $_POST['searchFilters'];

$studentsResults = mysqli_query($db, "SELECT * FROM Students " . $searchFilters);

?>
<div id="print_div">
    <div class="card-body">
        <div class="card-content">
            <form method="POST" action="#" name="allStudentsTable"
                  id="allStudentsTable">
                <div class="table-responsive">
                    <table id="search-table" class="table table-striped table-condensed table-hover">
                        <thead>


                    <table class="table">
                        <thead class="thead-dark">

                        <tr>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">City</th>
                            <th scope="col">State</th>
                            <th scope="col">Zip</th>
                            <th scope="col">Ethnicity</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Birth Date</th>
                            <th scope="col">School</th>
                            <th scope="col">Permission Slip</th>
                            <th scope="col">Birth Certificate</th>
                            <th scope="col">Reduced Lunch Eligible</th>
                            <th scope="col">IEP</th>

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
                            echo $row['Address_One'];
                            echo "</br> " . $row['Address_Two'];
                            echo "</td><td>";
                            echo $row['City'];
                            echo "</td><td>";
                            echo $row['State'];
                            echo "</td><td>";
                            echo $row['Zip'];
                            echo "</td><td>";
                            echo $row['Ethnicity'];
                            echo "</td><td>";
                            echo $row['Gender'];
                            echo "</td><td>";
                            echo $row['Birth_Date'];
                            echo "</td><td>";
                            echo $row['School'];
                            echo "</td><td>";
                            echo $row['Permission_Slip'];
                            echo "</td><td>";
                            echo $row['Birth_Certificate'];
                            echo "</td><td>";
                            echo $row['Reduced_Lunch_Eligible'];
                            echo "</td><td>";
                            echo $row['IEP'];
                            echo "</td></tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
        <input type="button" class="btn btn-primary pull-right" onclick="printReport('print_div')" value="Print"/>
        <script src="../../scripts/print.js"></script>
        <div class="card-footer">

        </div>
    </div>
</div>
</div>

</div>
