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
        <script src="print.js"></script>
    </head>
    
    <body>
        
        <br><label><h3>Search Student/Parent/Emergency Contact Information:</h3></label><br>
        
        <?php
        //if there is no information to display, the print button will not be displayed either
        $print = false;
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
        $lname = $_POST['name'];
        $id = $_POST['child_id'];
        // Brings up student information
        echo '<div id="print_div">';
        echo '<link rel="stylesheet" type="text/css" href="add.css"/>';
        if ($stmt = $db->prepare("SELECT * FROM Student WHERE Last_Name = ? AND Id = ?")) {
        
            $stmt->bind_param("si", $lname, $id);
        
            $stmt->execute();

            //old
           // $stmt->bind_result($studentID, $lastName, $firstName, $age, $gender, $birthdate, $address, $zipCode, $city, $school, $program, $ethnicity, $permission, $birth);

            $stmt->bind_result($studentID, $firstName, $lastName, $gender, $birthdate, $address, $city, $state, $zipCode, $ethnicity, $school, $program, $permission, $birth, $RLE, $IEP);

            $stmt->fetch();
            if ($studentID == null or $lastName == null or $firstName == null) {
                echo "<h2>Student could not be located in the database, please try again.</h2>";
            } else {
                $print = true;
				echo "<h3> Student Information: </h3><br>";
                echo "<h2>ID Number: $studentID<br> First Name: $firstName<br> Last Name: $lastName<br> Gender: $gender<br> Birthdate: $birthdate<br>Address: $address<br>City: $city<br>State: $state<br>Zip: $zipCode<br>Ethnicity: $ethnicity<br>School: $school<br>Program: $program<br>Permission Slip: $permission<br>Birth Certificate: $birth<br>Reduced Lunch Eligible: $RLE<br>Emotional Problem: $IEP</h2>";

            }
            $stmt->close();
        }
		// Brings up parent information
		// if ($stmt2 = $db->prepare("SELECT * FROM  WHERE l_Name = ? AND student_id = ?"))
		
            //$stmt2->bind_param("ss", $lname, $id);
			if ($stmt2 = $db->prepare("SELECT * FROM Contact WHERE Student_Id = ?")) {
			$stmt2->bind_param("i", $id);
        
            $stmt2->execute();

            //Again, Where are these variables coming from???
            $stmt2->bind_result($contactId, $child_id, $cfname, $clname, $cphone, $hphone, $caddress, $ccity, $cstate, $czip, $cemail, $crelationship);
            $stmt2->fetch();
            //if ($studentID == null or $lastName == null or $firstName == null) {
			if ($child_id == null) {
                echo "<h2>Contact could not be located in the database, please try again.</h2>";
            } else {
                $print = true;
				echo "<br><h3>Contact Information: </h3><br>";
                echo "<h2> First Name: $cfname<br> Last Name: $clname<br> Cell Phone: $cphone<br>Home Phone: $hphone<br> Email: $cemail<br>Relationship: $crelationship </h2>";
            }
            $stmt2->close();
			}
		

		/*Not needed anymore since all info in Contact

		// Brings up Emergency Information
		if ($stmt3 = $db->prepare("SELECT * FROM Emergency_Info WHERE student_reference_id = ?")) {
        
            //$stmt->bind_param("ss", $lname, $id);
			$stmt3->bind_param("s", $id);
        
            $stmt3->execute();
            
            $stmt3->bind_result($student_reference_id, $cfname, $clname, $first, $last, $rel, $pnum);
            $stmt3->fetch();
			
			if ($student_reference_id == null) {
                echo "<h2>Emergency Contact Information could not be located in the database, please try again.</h2>";
            } else {
				echo "<br><h3>Emergency Contact Information: </h3>";
                echo "<h2> Contact First name: $first<br> Contact Last Name: $last<br> Relationship: $rel<br>Phone Number: $pnum </h2>";
            }
            $stmt3->close();
			}

		*/
		echo '</div>';
		if($print == true){
            echo '<input type="button" onclick="printReport(\'print_div\')" value="Print" />';
        }
        ?>
    </body>
</html>
