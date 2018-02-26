<?php
session_start();
if (!isset($_SESSION['loggedIn'])) {
    header("Location: index.html");
}
$account = $_SESSION['account'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CLM</title>

    <!-- Stylesheet -->
    <link rel="stylesheet" type="text/css" href="../../css/clm.css"/>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


</head>

<body>
<div class="container">
    <nav class="navbar ">
        <div class="container-fluid">

            <div id="navbar" class="navbar-collapse collapse">

                <ul class="nav navbar-nav navbar-right">

                    <li><a href="../index-login/logout.php">Logout</a></li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
        <!--/.container-fluid -->
    </nav>


    <div class="text-center">
        <a href="../index-login/menu.php" title="Homepage"><img src="../../images/Lifeline.png" alt="Community Lifeline"></a>
    </div>

    <!--menubar-########################################-->
    <div id="menubar">
        <div class="dropdwn">
            <button class="dropdwn_btn">New</button>
            <div class="dropdwn_list">

                <form action="../new/NewStudent.php" method="POST">
                    <input type="submit" value="Student"/>
                </form>

                <form action="../new/NewContact.php" method="POST">
                    <input type="submit" value="Contact"/>
                </form>

                <form action="../new/NewVolunteerEmployee.php" method="POST">
                    <input type="submit" value="Volunteer/Employee"/>
                </form>

                <form action="../new/NewProgram.php" method="POST">
                    <input type="submit" value="Program"/>
                </form>

                <form action="../new/NewClass.php" method="POST">
                    <input type="submit" value="Class"/>
                </form>

                <form action="../new/NewTestScores.php" method="POST">
                    <input type="submit" value="Student Test Scores"/>
                </form>
            </div>
        </div>

        <div class="dropdwn">
            <button class="dropdwn_btn">Update</button>
            <div class="dropdwn_list">

                <form action="../edit/EditStudent.php" method="POST">
                    <input type="submit" value="Student"/>
                </form>

                <form action="../edit/EditContact.php" method="POST">
                    <input type="submit" value="Contact"/>
                </form>

                <form action="../edit/EditVolunteerEmployee.php" method="POST">
                    <input type="submit" value="Volunteer/Employee"/>
                </form>

                <form action="../edit/EditProgram.php" method="POST">
                    <input type="submit" value="Program"/>
                </form>

                <form action="../edit/EditClass.php" method="POST">
                    <input type="submit" value="Class"/>
                </form>

                <form action="../edit/EditTestScores.php" method="POST">
                    <input type="submit" value="Student Test Scores"/>
                </form>
            </div>
        </div>


        <div class="dropdwn">
            <button class="dropdwn_btn">Register</button>
            <div class="dropdwn_list">

                <form action="../new/NewStudentToProgram.php" method="POST">
                    <input type="submit" value="Students to Programs"/>
                </form>

                <form action="../new/NewStudentToClass.php" method="POST">
                    <input type="submit" value="Students to Classes"/>
                </form>

                <form action="../new/NewVolunteerEmployeeToProgram.php" method="POST">
                    <input type="submit" value="Volunteers to Programs"/>
                </form>
            </div>
        </div>


        <div class="dropdwn">
            <button class="dropdwn_btn">Reports</button>
            <div class="dropdwn_list">

                <form action="reports.php" method="POST">
                    <input type="submit" value="Generate Reports"/>
                </form>
            </div>
        </div>

        <div class="dropdwn">
            <button class="dropdwn_btn">Search</button>
            <div class="dropdwn_list">

                <form action="../search/SearchStudentInfo.php" method="POST">
                    <input type="submit" value="Information"/>
                </form>

                <form action="../search/SearchVolunteerEmployee.php" method="POST">
                    <input type="submit" value="Volunteer/Employee"/>
                </form>

                <form action="searchSchedule.php" method="POST">
                    <input type="submit" value="Schedule"/>
                </form>
            </div>
        </div>

        <div class="dropdwn">
            <button class="dropdwn_btn">Display All</button>
            <div class="dropdwn_list">

                <form action="../show/ShowStudents.php" method="POST">
                    <input type="submit" value="Students"/>
                </form>

                <form action="../show/ShowVolunteersEmployees.php" method="POST">
                    <input type="submit" value="Volunteers/Employees"/>
                </form>

                <form action="../show/ShowPrograms.php" method="POST">
                    <input type="submit" value="Programs"/>
                </form>

                <form action="../show/ShowClasses.php" method="POST">
                    <input type="submit" value="Classes"/>
                </form>

                <form action="../show/ShowContacts.php" method="POST">
                    <input type="submit" value="Contacts"/>
                </form>

                <form action="../show/ShowTestScores.php" method="POST">
                    <input type="submit" value="Test Scores"/>
                </form>
            </div>
        </div>

        <?php
        if ($account == "administrator") {
            echo '<div class="dropdwn">
                           <button class="dropdwn_btn">Administrative Tools</button>
                               <div class="dropdwn_list">
                                   <form action="../new/NewUser.php" method="POST">
                                       <input type="submit" value="Register new user" />
                                   </form>
                               </div>
                       </div>';
        }
        ?>

        <div class="dropdwn">
            <button class="dropdwn_btn">Help</button>
            <div class="dropdwn_list">

                <form action="../../UserDocumentation.php" method="POST">
                    <input type="submit" value="User Documentation"/>
                </form>
            </div>
        </div>

    </div>
    <br/>
