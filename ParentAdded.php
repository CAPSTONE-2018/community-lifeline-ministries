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
        
        <label><h3>Add Parent Information:</h3></label><br>

        
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
        #This will get the text from the add a parent information fields
        
        #Adding parent information based on the information the user added into the "add" fields
        $stmt = $db->prepare("INSERT INTO Parents VALUES (?, ?, ?, ?, ?, ?, ?)");
       
        $stmt->bind_param('sssssss', $id, $studentf, $studentl, $fname, $lname, $phone, $income);
        
        $id = $_POST['id'];
		$studentf = $_POST['childf'];
		$studentl = $_POST['childl'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $phone = $_POST['phone'];
		$income = $_POST['income'];
        $stmt->execute();
        
        if ($stmt->affected_rows == -1) {
            echo "<h2>Parent could not be added to the database, please try again.</h2>";
        } else {
            echo "<h2>Parent successfully added to the database.</h2>";        
            $stmt->close();
        }
        ?>
    </body>
</html>
