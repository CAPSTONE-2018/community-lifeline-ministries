<?php

include("scripts/header.php");
?>

            <h1>Add Test Score Information:</h1>
            <br />


            <?php

            //connect to database
            include("db/config.php");

            //$id = intval($_POST['id']);
            $className = $_POST['name'];
            $volunteerId = intval($_POST['vid']);
            $roomNum = $_POST['rnum'];
            $srtTime = $_POST['stime'];
            $endTime = $_POST['etime'];
            $day = $_POST['day'];




            $stmt = $db->prepare("INSERT INTO Class (Class_Name, Volunteer_Id) VALUES (?, ?)");
            $stmt->bind_param('si',  $className, $volunteerId);
            $stmt->execute();


            if ($stmt->affected_rows == -1) {
                echo "<div class='alert alert-danger'>
                        <strong>Failure! </strong>Class could not be added to the database, please try again.
                      </div>";
            }
            else {
                echo "<div class='alert alert-success'>
                        <strong>Success! </strong>Class has been successfully added to the database.
                      </div>";
                $stmt->close();
            }


            //query to get id of class just added
            $query = 'SELECT * FROM Class WHERE Class_Name = "' .$className. '";';
            $result = $db->query($query);



            $row = $result->fetch_assoc();
            //$row = mysqli_fetch_assoc($result);

            $stmt = $db->prepare("INSERT INTO Schedule (Class_Id, Room_Number, Start_Time, End_Time, Day) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param('issss', $row['Id'], $roomNum, $srtTime, $endTime, $day);
            $stmt->execute();


            if ($stmt->affected_rows == -1) {
                echo "<div class='alert alert-danger'>
                        <strong>Failure! </strong>Schedule could not be added to the database, please try again.
                      </div>";
            }
            else {
                echo "<div class='alert alert-success'>
                        <strong>Success! </strong>Schedule has been successfully added to the database.
                      </div>";
                $stmt->close();
            }
            include("scripts/footer.php");
            ?>
