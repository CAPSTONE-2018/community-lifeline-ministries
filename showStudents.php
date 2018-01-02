<?php
include("scripts/header.php");

//connect to database
include("db/config.php");

//Getting the query to search if the username and password are correct in the database
//Do not need prepared statements because there is NO user input for this query so there can be no sql injection attack
$query = "SELECT * FROM Student;";
$result = mysqli_query($db, $query);
?>


            <h1>Displaying All Students:</h1>
            <br />

            <div id="print_div">
                  <table class="table table-condensed table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>Birth Date</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Zip</th>
                        <th>Ethnicity</th>
                        <th>School</th>
                        <th>Program</th>
                        <th>Permission Slip</th>
                        <th>Birth Certificate</th>
                        <th>Reduced Lunch Eligible</th>
                        <th>IEP</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        echo "<tr><td>";
                        echo $row['Id'];
                        echo "</td><td>";
                        echo $row['First_Name'];
                        echo "</td><td>";
                        echo $row['Last_Name'];
                        echo "</td><td>";
                        echo $row['Gender'];
                        echo "</td><td>";
                        echo $row['Birth_Date'];
                        echo "</td><td>";
                        echo $row['Address'];
                        echo "</td><td>";
                        echo $row['City'];
                        echo "</td><td>";
                        echo $row['State'];
                        echo "</td><td>";
                        echo $row['Zip'];
                        echo "</td><td>";
                        echo $row['Ethnicity'];
                        echo "</td><td>";
                        echo $row['School'];
                        echo "</td><td>";
                        echo $row['Program'];
                        echo "</td><td>";

                        if ($row['Permission_Slip'] == 1){
                            echo "Yes";
                        }else if ($row['Permission_Slip'] == 0){
                            echo "No";
                        }

                        echo "</td><td>";

                        if ($row['Birth_Certificate'] == 1){
                            echo "Yes";
                        }else if ($row['Birth_Certificate'] == 0){
                            echo "No";
                        }
                        echo "</td><td>";

                        if ($row['Reduced_Lunch_Eligible'] == 1){
                            echo "Yes";
                        }else if ($row['Reduced_Lunch_Eligible'] == 0){
                            echo "No";
                        }

                        echo "</td><td>";

                        if ($row['IEP'] == 1){
                            echo "Yes";
                        }else if ($row['IEP'] == 0){
                            echo "No";
                        }

                        echo "</td></tr>";

                    }
                    ?>
                    </tbody>
                </table>

            </div>

            <input type="button" class="btn btn-primary pull-right" onclick="printReport('print_div')" value="Print" />

      <script src="scripts/print.js"></script>
<?php
  include("scripts/footer.php");
?>
