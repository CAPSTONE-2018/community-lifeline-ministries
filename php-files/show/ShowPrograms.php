<?php

include("../scripts/header.php");

//connect to database
include("../../db/config.php");


$query = "SELECT * FROM Programs;";
$result = mysqli_query($db, $query);
?>



<h1>Displaying All Programs:</h1>
<br />

<div id="print_div">
    <table class="table table-condensed table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Program Name</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo "<tr><td>";
            echo $row['Id']; //coming from Schedule table
            echo "</td><td>";
            echo $row['Program_Name']; //coming from Class table
            echo "</td><td>";
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
