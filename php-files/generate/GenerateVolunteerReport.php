<?php

//connect to database
include("../../db/config.php");

$searchFilters = $_POST['searchFilters'];

$volunteerResults = mysqli_query($db, "SELECT * FROM Volunteer_Employees " . $searchFilters);
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
                                <th scope="col">Type</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col" style="width: 15%">Primary Phone</th>
                                <th scope="col" style="width: 15%">Secondary Phone</th>
                                <th scope="col" style="width: 15%">Address</th>
                                <th scope="col">City</th>
                                <th scope="col" style="width: 5%">State</th>
                                <th scope="col">Zip</th>
                                <th scope="col">Email</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            while ($row = mysqli_fetch_array($volunteerResults, MYSQLI_ASSOC)) {
                                echo "<tr scope=\"row\"><td>";
                                echo $row['User_Type'];
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
                                echo "</br> " . $row['Address_Two'];
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
                        <script type="text/javascript">
                            $(document).ready(function () {
                                $('#test').DataTable({
                                    dom: '<lf<t>iBp>',
                                    buttons: [
                                        'copyHtml5',
                                        'excelHtml5',
                                        'csvHtml5',
                                        'pdfHtml5'
                                    ]
                                });
                            });
                        </script>
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
    </div>
</div>