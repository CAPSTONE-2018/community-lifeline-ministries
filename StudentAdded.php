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
        
        <label><h3>Add Student Information:</h3></label><br>

        
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
        
        #Adding student records based on the information the user added into the "add" fields
        $stmt = $db->prepare("INSERT INTO Students VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('sssissssssssss', $id, $lname, $fname, $age, $gender, $dob, $address, $zip, $city, $school, $program, $ethnicity, $permission_slip, $birth_certificate, $school_year, $reduced_lunch_eligible, $pre_test, $post_test);
        
        $id = $_POST['id'];
        $lname = $_POST['lname'];
        $fname = $_POST['fname'];
        $age = intval($_POST['age']);
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $address = $_POST['address'];
        $zip = $_POST['zip'];
        $city = $_POST['city'];
        $school = $_POST['school'];
        $program = $_POST['program'];
        $ethnicity = $_POST['ethnicity'];
        $permission_slip = $_POST['permission_slip'];
        $birth_certificate = $_POST['birth_certificate'];
        $school_year = $_POST['school_year'];
        $reduced_lunch_eligible = $_POST['reduced_lunch_eligible'];
        $pre_test = $_POST['pre_test'];
        $post_test = $_POST['post_test'];
        $stmt->execute();
        
        if ($stmt->affected_rows == -1) {
            echo "<h2>Student could not be added to the database, please try again.</h2>";
        }
        else {
            echo "<h2>Student has been successfully added to the database.</h2>"; 
            $stmt->close();
        }
        ?>
    </body>
</html>