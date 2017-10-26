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
			
			$roomNumber = $_POST['roomNumber'];
			$startTime = $_POST['startTime'];
		
			$stmtSchedule = "SELECT * FROM Schedule Where Room_Number=$roomNumber AND Start_Time=$startTime";
			$resultSchedule = mysqli_query($db, $stmt);
			$classId = NULL; 
			if (mysqli_num_rows($resultSchedule) > 0) {
				while($row = mysqli_fetch_assoc($resultSchedule)) {
					$classId = $row["Class_Id"]; 
				}	
			}
			else {
				echo "0 results";
			}
			
			$stmtEnrolled = "SELECT Student_Id FROM Enrolled WHERE Class_Id = $classId";
			$resultEnrolled = mysqli_query($db, $stmtEnrolled);
			$records = array(); 	
			
			if (mysqli_num_rows($resultClass) > 0) {
				while($row = mysqli_fetch_assoc($resultEnrolled)) {
					$line = $row["Student_Id"];
					array_push($records, $line); 
				}	
			}
			
			$csv = fopen("classroom_students_report.csv","w");
			
			//Write records to CSV file
			foreach ($records as $record)
			{
				fputcsv($csv, explode(',',$record));
			}
			
			mysqli_close($db); 		
		?>
	</body>

</html>