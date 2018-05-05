<?php

//connect to database
include("../../db/config.php");


$searchFilters = $_POST['searchFilters'];

$contactResults = mysqli_query($db, "SELECT * FROM Contacts " . $searchFilters);
?>

<div class="container-fluid">
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
                                <th scope="col">Prefix</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Primary Phone</th>
                                <th scope="col">Secondary Phone</th>
                                <th scope="col">Address</th>
                                <th scope="col">City</th>
                                <th scope="col">State</th>
                                <th scope="col">Zip</th>
                                <th scope="col">Email</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            while ($row = mysqli_fetch_array($contactResults, MYSQLI_ASSOC)) {
                                echo "<tr scope=\"row\"><td>";
                                echo $row['Prefix'];
                                echo "</td><td>";
                                echo $row['First_Name'];
                                echo "</td><td>";
                                echo $row['Last_Name'];
                                echo "</td><td>";
                                echo $row['Primary_Phone'];
                                echo "</td><td>";
                                echo $row['Secondary_Phone'];
                                echo "</td><td>";
                                echo $row['Address_One'];
                                echo "</br" . $row['Address_Two'];
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
                </form>
            </div>
            <input type="button" class="btn btn-primary pull-right" onclick="printReport('print_div')" value="Print"/>
            <script src="../../scripts/print.js"></script>
            <div class="card-footer">

                <script>
                    $(document).ready(function() {
                        $('#test').DataTable();
                    });
                </script>


            </div>
        </div>
    </div>
</div>

