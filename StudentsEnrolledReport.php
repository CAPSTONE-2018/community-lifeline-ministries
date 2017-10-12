<?php
    session_start();
    if(!isset($_SESSION['loggedIn'])){
        header("Location: login.html");
    }
    include("Header.php");
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="reports.css"/>
	</head>
	
	<body>
		
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
			
			$schoolYear = $_POST['schoolYear'];
			
			$stmt = "SELECT * FROM Students WHERE school_year=$schoolYear";
			$result = mysqli_query($db, $stmt);
			
			if(mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					echo $row["studentID"] . "<br />"; 
				}
			}
			
			mysqli_close($db); 		
		?>
	</body>

</html>
