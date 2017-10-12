<?php
    session_start();
    if(!isset($_SESSION['loggedIn'])){
        header("Location: login.html");
    }
    include("Header.php");
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="add.css"/>
    </head>
    
    <body>
        
        <label><h3>Add Teacher Information:</h3></label><br>

        
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
        #This will get the text from the add a teacher information fields
        
        #Adding teacher information based on the information the user added into the "add" fields
        $stmt = $db->prepare("INSERT INTO Teachers VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
       
        $stmt->bind_param('ssssssss', $teacher_id, $f_name, $l_name, $phone, $address, $city, $zipcode, $email);
		
        $teacher_id = $_POST['teacher_id'];
		$f_name = $_POST['f_name'];
        $l_name = $_POST['l_name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $zipcode = $_POST['zipcode'];
        $email = $_POST['email'];
        
        $stmt->execute();
        
        if ($stmt->affected_rows == -1) {
            echo "<h2>Teacher could not be added to the database, please try again.</h2>";
        } else {
            echo "<h2>Teacher successfully added to the database.</h2>";        
            $stmt->close();
        }
        ?>
    </body>
</html>
