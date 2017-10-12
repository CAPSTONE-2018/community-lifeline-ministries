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
        
        <br><label><h3>Search Teacher Information:</h3></label><br>

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
        #This will get the text from the add a teacher fields
        $lname = $_POST['name'];
        $id = $_POST['ID'];
        
        if ($stmt = $db->prepare("SELECT * FROM Teachers WHERE l_name=? AND teacher_id=?")) {
        
            $stmt->bind_param('ss', $lname, $id);
            
            $stmt->execute();
            
            $stmt->bind_result($teacherID, $firstName, $lastName, $phone, $address, $city, $zipCode, $email);
            $stmt->fetch();
            if ($lname == null or $id == null) {
                echo "<h2>Teacher could not be located in the database, please try again.</h2>";
            } else {
                echo "<h2>ID Number: $teacherID<br> First Name: $firstName<br> Last Name: $lastName<br> Phone Number: $phone<br> Address: $address<br> City: $city<br>Zipcode: $zipCode<br>Email: $email</h2>";
            }
            $stmt->close();
        }
        ?>
    </body>
</html>
