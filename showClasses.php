<?php

include("scripts/header.php");

//connect to database
include("db/config.php");


$query = "SELECT * FROM Class LEFT OUTER JOIN Schedule ON Class.Id = Schedule.Class_Id;";
$result = mysqli_query($db, $query);
?>



            <h1>Displaying All Classes:</h1>
            <br />

            <div id="print_div">
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Class Name</th>
                            <th>Volunteer/Employee ID</th>
                            <th>Room Number</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Day</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                            echo "<tr><td>";
                            echo $row['Class_Id']; //coming from Schedule table
                            echo "</td><td>";
                            echo $row['Class_Name']; //coming from Class table
                            echo "</td><td>";
                            echo $row['Volunteer_Id']; //coming from Class table
                            echo "</td><td>";
                            echo $row['Room_Number']; //coming from Schedule table
                            echo "</td><td>";
                            echo $row['Start_Time']; //coming from Schedule table
                            echo "</td><td>";
                            echo $row['End_Time']; //coming from Schedule table
                            echo "</td><td>";
                            echo $row['Day']; //coming from Schedule table
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
