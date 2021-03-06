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
                    <thead>
                    <table id="test" class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col" style="width: 25%">Address</th>
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
                            if ($row['Permission_Slip'] == 0) {
                                echo "No";
                            } else {
                                echo "Yes";
                            }
                            echo "</td><td>";
                            if ($row['Birth_Certificate'] == 0) {
                                echo "No";
                            } else {
                                echo "Yes";
                            }
                            echo "</td><td>";
                            if ($row['Reduced_Lunch_Eligible'] == 0) {
                                echo "No";
                            } else {
                                echo "Yes";
                            }
                            echo "</td><td>";
                            if ($row['IEP'] == 0) {
                                echo "No";
                            } else {
                                echo "Yes";
                            }
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
