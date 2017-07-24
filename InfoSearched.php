<?php
    session_start();
    if(!isset($_SESSION['loggedIn'])){
        header("Location: login.html");
    }
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="add.css"/>
    </head>
    
    <body>
        <form align="right" name="form" action="menu.php" method="POST">
            <label class="home">
            <input name="submit" type="submit" id="home" value="Home">
            </label>
        </form>
        
		<img src="Lifeline.png" alt="Community Lifeline" align="middle">
        
        <br><label><h3>Search Student/Parent/Emergency Contact Information:</h3></label><br>
        
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
        $lname = $_POST['name'];
        $id = $_POST['child_id'];
        // Brings up student information
        if ($stmt = $db->prepare("SELECT * FROM Students WHERE l_Name = ? AND student_id = ?")) {
        
            $stmt->bind_param("ss", $lname, $id);
        
            $stmt->execute();
            
            $stmt->bind_result($studentID, $lastName, $firstName, $age, $gender, $birthdate, $address, $zipCode, $city, $school, $program, $ethnicity, $permission, $birth);
            $stmt->fetch();
            if ($studentID == null or $lastName == null or $firstName == null) {
                echo "<h2>Student could not be located in the database, please try again.</h2>";
            } else {
				echo "<h3> Student Information: </h3>";
                echo "<h2>ID Number: $studentID<br> Last Name: $lastName<br> First Name: $firstName<br> Age: $age<br> Gender: $gender<br> Birthdate: $birthdate<br>Address: $address<br>Zipcode: $zipCode<br>City: $city<br>School: $school<br>Program: $program<br>Ethnicity: $ethnicity<br>Permission Slip: $permission<br>Birth Certificate: $birth</h2>";
            }
            $stmt->close();
        }
		// Brings up parent information
		// if ($stmt2 = $db->prepare("SELECT * FROM  WHERE l_Name = ? AND student_id = ?"))
		
            //$stmt2->bind_param("ss", $lname, $id);
			if ($stmt2 = $db->prepare("SELECT * FROM Parents WHERE child_id = ?")) {
			$stmt2->bind_param("s", $id);
        
            $stmt2->execute();
            
            $stmt2->bind_result($child_id, $cfname, $clname, $fName, $lName, $phone, $income);
            $stmt2->fetch();
            //if ($studentID == null or $lastName == null or $firstName == null) {
			if ($child_id == null) {
                echo "<h2>Parent could not be located in the database, please try again.</h2>";
            } else {
				echo "<br><h3>Parent Information: </h3>";
                echo "<h2> First Name: $fName<br> Last Name: $lName<br> Phone number: $phone<br>Income: $income </h2>";
            }
            $stmt2->close();
			}
		
		
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
        ?>
    </body>
</html>