<?php
    session_start();
    if(!isset($_SESSION['loggedIn'])){
        header("Location: login.html");
    }
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="reports.css"/>
	</head>
	
	<body>
		<form align="right" name="form" action="menu.php" method="POST">
			<label class="home">
			<input name="submit" type="submit" id="home" value="Home">
			</label>
		</form>
		
		<img src="Lifeline.png" alt="Community Lifeline" align="middle">
		
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
			$records = array(); 
			
			if(mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					$line = array($row["Student_Id"], $row["Term"], $row["Pre_Test"] . $row["Post_Test"]);
					array_push($records, $line); 
				}
			}
			
			$csv = fopen("students_enrolled_report.csv","w");
			
			//Write records to CSV file
			foreach ($records as $record)
			{
				fputcsv($csv, $record);
			}
			
			mysqli_close($db); 		
		?>
	</body>

</html>