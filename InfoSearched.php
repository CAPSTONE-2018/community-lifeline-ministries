<?php

    /*
     * This class needs work! where are a lot of the variables coming from??
     *
     * ***********************************************************************
     *
     *
     */


    session_start();
    if(!isset($_SESSION['loggedIn'])){
        header("Location: login.html");
    }
    include("Header.php");
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="add.css"/>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    
    <body>
        <div class="container">

            <h1>Search Student/Parent/Emergency Contact Information:</h1>
            <br />

            <?php

            //Setting up variable to use for mysqli function
            $server = "localhost";
            $user = "clm_user";
            $psw = "dbuser";
            $database = "community_lifeline";
            //Connecting to database
            $db = mysqli_connect($server, $user, $psw, $database);
            if (!$db) {
                print "Error - Could not connect to MySQL";
                exit;
            }
            #This will get the text from the add a student fields
            //old
            //$lname = $_POST['name'];
            $id = $_POST['child_id'];
            // Brings up student information
            //old
            //if ($stmt = $db->prepare("SELECT * FROM Student WHERE Last_Name = ? AND Id = ?")) {
            if ($stmt = $db->prepare("SELECT * FROM Student WHERE Id = ?")) {
                $stmt->bind_param("i", $id);

                $stmt->execute();

                //old
               // $stmt->bind_result($studentID, $lastName, $firstName, $age, $gender, $birthdate, $address, $zipCode, $city, $school, $program, $ethnicity, $permission, $birth);

                $stmt->bind_result($studentID, $firstName, $lastName, $gender, $birthdate, $address, $city, $state, $zipCode, $ethnicity, $school, $program, $permission, $birth, $RLE, $IEP);

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
                        <th>Gender</th>
                        <th>Birthdate</th>
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
                    echo $zip;
                    echo "</td><td>";
                    echo $ethnicity;
                    echo "</td><td>";
                    echo $school;
                    echo "</td><td>";
                    echo $program;
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


                $stmt2->bind_result($contactId, $child_id, $cfname, $clname, $cphone, $hphone, $caddress, $ccity, $cstate, $czip, $cemail, $crelationship);
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
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Cell Phone</th>
                        <th>Home Phone</th>
                        <th>Email</th>
                        <th>Relationship</th>
                    </tr>
                    </thead>
                    <tbody>";
                    echo "<tr><td>";
                    echo $cfname;
                    echo "</td><td>";
                    echo $clname;
                    echo "</td><td>";
                    echo $cphone;
                    echo "</td><td>";
                    echo $hphone;
                    echo "</td><td>";
                    echo $cemail;
                    echo "</td><td>";
                    echo $crelationship;
                    echo "</td></tr>";
                    echo "</tbody>";
                    echo "</table>";


                }
                $stmt2->close();
                }

            ?>
        </div>
    <br />
    </body>
</html>
