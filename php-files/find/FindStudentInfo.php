<?php
  include("../scripts/header.php");
?>

            <h1>Student/Parent/Emergency Contact Information:</h1>
            <br />

            <?php

            //connect to database
            include("../../db/config.php");
            $id = $_POST['child_id'];

            if ($stmt = $db->prepare("SELECT * FROM Students WHERE Id = ?")) {
                $stmt->bind_param("i", $id);

                $stmt->execute();
                $stmt->bind_result($studentID, $firstName, $lastName, $mname, $suffix, $gender, $birthdate, $address, $city, $state, $zipCode, $ethnicity, $school, $permission, $birth, $RLE, $IEP);

                $stmt->fetch();
                if ($studentID == null or $lastName == null or $firstName == null) {
                    echo "<h4>Student could not be located in the database, please try again.</h4>";
                } else {
                    echo "<h2> Student Information: </h2><br>";


                    echo "<table class=\"table table-condensed table-striped\">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Middle Name</th>
                        <th>Suffix</th>
                        <th>Gender</th>
                        <th>Birthdate</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Zip</th>
                        <th>Ethnicity</th>
                        <th>School</th>
                        <th>Permission Slip</th>
                        <th>Birth Certificate</th>
                        <th>Reduced Lunch Eligible</th>
                        <th>Emotional Problem</th>
                    </tr>
                    </thead>
                    <tbody>";
                    echo "<tr><td>";
                    echo $id;
                    echo "</td><td>";
                    echo $firstName;
                    echo "</td><td>";
                    echo $lastName;
                    echo "</td><td>";
                    echo $mname;
                    echo "</td><td>";
                    echo $suffix;
                    echo "</td><td>";
                    echo $gender;
                    echo "</td><td>";
                    echo $birthdate;
                    echo "</td><td>";
                    echo $address;
                    echo "</td><td>";
                    echo $city;
                    echo "</td><td>";
                    echo $state;
                    echo "</td><td>";
                    echo $zipCode;
                    echo "</td><td>";
                    echo $ethnicity;
                    echo "</td><td>";
                    echo $school;
                    echo "</td><td>";

                    if ($permission == 1){
                        echo "Yes";
                    }else if ($permission == 0){
                        echo "No";
                    }
                    echo "</td><td>";

                    if ($birth == 1){
                        echo "Yes";
                    }else if ($birth == 0){
                        echo "No";
                    }

                    echo "</td><td>";

                    if ($RLE == 1){
                        echo "Yes";
                    }else if ($RLE == 0){
                        echo "No";
                    }

                    echo "</td><td>";

                    if ($IEP == 1){
                        echo "Yes";
                    }else if ($IEP == 0){
                        echo "No";
                    }

                    echo "</td></tr>";
                    echo "</tbody>";
                    echo "</table>";




                }
                $stmt->close();
            }
            // Brings up parent information

                if ($stmt2 = $db->prepare("SELECT * FROM Contact WHERE Student_Id = ?")) {
                $stmt2->bind_param("i", $id);

                $stmt2->execute();


                $stmt2->bind_result($contactId, $child_id, $cprefix,$cfname, $clname, $cmname, $csuffix, $cphone, $hphone, $caddress, $ccity, $cstate, $czip, $cemail);
                $stmt2->fetch();

                if ($child_id == null) {

                    echo "<div class='alert alert-danger'>
                            <strong>Failure! </strong>Contact could not be located in the database, please try again.
                          </div>";
                } else {
                    echo "<br><h2>Contact Information: </h2><br>";

                    echo "<table class=\"table table-condensed table-striped\">
                    <thead>
                    <tr>
                        <th>Prefix</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Middle Name</th>
                        <th>Suffix</th>
                        <th>Cell Phone</th>
                        <th>Home Phone</th>
                        <th>Email</th>
                    </tr>
                    </thead>
                    <tbody>";
                    echo "<tr><td>";
                    echo $cprefix;
                    echo "</td><td>";
                    echo $cfname;
                    echo "</td><td>";
                    echo $clname;
                    echo "</td><td>";
                    echo $cmname;
                    echo "</td><td>";
                    echo $csuffix;
                    echo "</td><td>";
                    echo $cphone;
                    echo "</td><td>";
                    echo $hphone;
                    echo "</td><td>";
                    echo $cemail;
                    echo "</td></tr>";
                    echo "</tbody>";
                    echo "</table>";


                }
                $stmt2->close();
                }
                include("../scripts/footer.php");
            ?>
