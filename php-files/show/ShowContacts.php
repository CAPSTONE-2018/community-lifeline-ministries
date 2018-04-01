<?php
include("../scripts/header.php");

//connect to database
include("../../db/config.php");

//Getting the query to search if the username and password are correct in the database
//Do not need prepared statements because there is NO user input for this query so there can be no sql injection attack
$query = "SELECT * FROM Contacts;";
$result = mysqli_query($db, $query);
?>
<script>
    function FilterFields() {
// Declare variables
        var input, filter, table, tr, td, i, show = false;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("contacts_table");
        tr = table.getElementsByTagName("tr");

// Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            show = false;
            for (j = 0; j < 14; j++) {
                td = tr[i].getElementsByTagName("td")[j];
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                        show = true;
                    }
                }
            }
            if(!show){
                tr[i].style.display = "none";
            }
        }
    }
</script>
<link rel="stylesheet" href="../../css/form-styles.css"/>
<link rel="stylesheet" href="../../css/toggle-switch.css"/>
<link rel="stylesheet" href="../../css/input-stylings.css"/>
<link rel="stylesheet" href="../../css/new-toggle.css"/>
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<h1>Displaying All Contacts:</h1>
<div class="col-lg">

    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input id="searchInput" class="mdl-textfield__input" name="searchInput" onkeyup="return FilterFields();" type="text"/>
        <label class="mdl-textfield__label" for="searchInput">Search Contacts</label>
    </div>
</div>
<br />

<div id="print_div">
    <table id="contacts_table" class="table table-condensed table-striped">
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
            echo $row['Address_One'];
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
