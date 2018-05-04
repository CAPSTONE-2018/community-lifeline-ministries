<?php
  include("../scripts/header.php");
?>


        <h1>Search Volunteer/Employee Information:</h1>
        <br />

        <?php

        //connect to database
        include("../../db/config.php");

        $id = $_POST['volunteerId'];

        if ($stmt = $db->prepare("SELECT * FROM Volunteer_Employees WHERE Id = ?")){
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->bind_result($id, $prefix,$firstName, $lastName, $middleName, $suffix,$cellPhone, $homePhone, $address, $city, $state, $zip, $email, $type);
            $stmt->fetch();
            if ($id == null) {
                echo "<div class='alert alert-danger'>
                                    <strong>Failure! </strong>Volunteer/Employee could not be located in the database, please try again.
                                  </div>";
            } else {
                echo "<h2> Volunteer/Employee Information: </h2><br>";


                echo "<table class=\"table table-condensed table-striped\">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Prefix</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Middle Name</th>
                        <th>Suffix</th>
                        <th>Cell Phone</th>
                        <th>Home Phone</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Zip</th>
                        <th>Email</th>
                        <th>Type</th>
                    </tr>
                    </thead>
                    <tbody>";
                echo "<tr><td>";
                echo $id;
                echo "</td><td>";
                echo $prefix;
                echo "</td><td>";
                echo $firstName;
                echo "</td><td>";
                echo $lastName;
                echo "</td><td>";
                echo $middleName;
                echo "</td><td>";
                echo $suffix;
                echo "</td><td>";
                echo $cellPhone;
                echo "</td><td>";
                echo $homePhone;
                echo "</td><td>";
                echo $address;
                echo "</td><td>";
                echo $city;
                echo "</td><td>";
                echo $state;
                echo "</td><td>";
                echo $zip;
                echo "</td><td>";
                echo $email;
                echo "</td><td>";
                echo $type;
                echo "</td></tr>";
                echo "</tbody>";
                echo "</table>";

            }
            $stmt->close();
        }
          include("../scripts/footer.php");
        ?>
      
