<?php
include("../scripts/header.php");

//connect to database
include("../../db/config.php");

//Getting the query to search if the username and password are correct in the database
//Do not need prepared statements because there is NO user input for this query so there can be no sql injection attack
$query = "SELECT * FROM Contacts;";
$result = mysqli_query($db, $query);
?>

<h1>Displaying All Contacts:</h1>
<br />

<div id="print_div">
    <table class="table table-condensed table-striped">
        <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>City</th>
            <th>State</th>
            <th>Zip</th>
            <th>Email</th>
        </tr>
        </thead>

        <tbody>
        <?php
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo "<tr><td>";
            echo $row['First_Name'];
            echo "</td><td>";
            echo $row['Last_Name'];
            echo "</td><td>";
            echo $row['Address'];
            echo "</td><td>";
            echo $row['City'];
            echo "</td><td>";
            echo $row['State'];
            echo "</td><td>";
            echo $row['Zip'];
            echo "</td><td>";
            echo $row['Email'];
            echo "</td></tr>";

        }
        ?>
        </tbody>
    </table>
</div>

<input type="button" class="btn btn-primary pull-right" onclick="printReport('print_div')" value="Print" />
<script src="../../scripts/print.js"></script>
<?php
include("../scripts/footer.php");
?>
