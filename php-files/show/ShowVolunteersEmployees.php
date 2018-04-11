<?php

include("../scripts/header.php");

//connect to database
include("../../db/config.php");

$query = "SELECT * FROM Volunteer_Employees;";
$result = mysqli_query($db, $query);
?>
<h1>Displaying All Volunteer/Employee:</h1>
<div class="col-lg">

    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input id="searchInput" class="mdl-textfield__input" name="searchInput" onkeyup="return FilterFields();" type="text"/>
        <label class="mdl-textfield__label" for="searchInput">Search Volunteers/Employees</label>
    </div>
</div>
<br/>

<div id="print_div">
    <!--<link rel="stylesheet" type="text/css" href="DisplayAll.css"/>-->
    <table id ="searchTable" class="table table-condensed table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Prefix</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Middle Name</th>
            <th>Suffix</th>
            <th>Primary Phone</th>
            <th>Secondary Phone</th>
            <th>Address One</th>
            <th>Address Two</th>
            <th>City</th>
            <th>State</th>
            <th>Zip</th>
            <th>Email</th>
            <th>Type</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo "<tr><td>";
            echo $row['Id'];
            echo "</td><td>";
            echo $row['Prefix'];
            echo "</td><td>";
            echo $row['First_Name'];
            echo "</td><td>";
            echo $row['Last_Name'];
            echo "</td><td>";
            echo $row['Middle_Name'];
            echo "</td><td>";
            echo $row['Suffix'];
            echo "</td><td>";
            echo $row['Primary_Phone'];
            echo "</td><td>";
            echo $row['Secondary_Phone'];
            echo "</td><td>";
            echo $row['Address_One'];
            echo "</td><td>";
            echo $row['Address_Two'];
            echo "</td><td>";
            echo $row['City'];
            echo "</td><td>";
            echo $row['State'];
            echo "</td><td>";
            echo $row['Zip'];
            echo "</td><td>";
            echo $row['Email'];
            echo "</td><td>";
            echo $row['TYPE'];
            echo "</td><td>";
        }
        ?>
        </tbody>
    </table>
</div>
<input type="button" class="btn btn-primary pull-right" onclick="printReport('print_div')" value="Print"/>
<script src="../../scripts/print.js"></script>
<?php
include("../scripts/footer.php");
?>
