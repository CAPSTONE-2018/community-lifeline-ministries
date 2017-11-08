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
        <script src="print.js"></script>
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
			
			//need to confirm where this is coming from
			$volunteerId = $_POST['id'];
		
			$stmt = "SELECT Volunteer_Employee.First_Name, Volunteer_Employee.Last_Name, Class.Class_Name, Schedule.Room_Number, Schedule.Start_Time, Schedule.End_Time, Schedule.Day
                FROM Volunteer_Employee
                JOIN Class ON
                Volunteer_Employee.Id = Class.Volunteer_Id
                JOIN Schedule ON
                Class.Id = Schedule.Class_Id
                WHERE Volunteer_Employee.Id ='$volunteerId'";
			
			$result = mysqli_query($db, $newstmt);
			$records = array();
						
			if (mysqli_num_rows($result) > 0) {
                echo "<div id=\"print_div\">";
				while($row = mysqli_fetch_assoc($result)) {
					echo "Class Name: " . $row["Class_Name"] . "<br />";
				}
				echo "</div>";
				echo "<br />";
				echo '<input type="button" onclick="printReport(\'print_div\')" value="Print" />';
			}
			else {
				echo "0 results";
			}
			
			$csv = fopen("classroom_students_report.csv","w");
			
			//Write records to CSV file
			foreach ($records as $record)
			{
				fputcsv($csv, $record);
			}
			
			mysqli_close($db); 		
		?>
	</body>

</html>
