<?php
session_start();
if (!isset($_SESSION['loggedIn'])) {
    header("Location: ../../index.html");
}
$account = $_SESSION['account'];


$userMakingChanges = $_SESSION['loggedIn'];
?>

<!DOCTYPE html>
<html>

<head>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Community Lifeline Ministries</title>

    <link rel="stylesheet" href="../../css/input-styles.css"/>

    <!-- Local Bootstrap -->
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css" />
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Stylesheet -->
    <link rel="stylesheet" type="text/css" href="../../css/clm.css" />
</head>


<body>
<!-- Top Nav -->
<!-- Top Nav -->
<nav class="navbar-default navbar-fixed-top">
    <div class="navbar-user">
        Signed In As:
        <?php
        echo $userMakingChanges
        ?>
    </div>
    <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-left">
            <li>
                <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                    <i class="glyphicon glyphicon-align-left"></i>
                </button>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="../index-login/menu.php"><img src="../../images/new-logo.png" alt="CLM Logo" height="25px"></a></li>
        </ul>
    </div>
</nav>


<div class="wrapper">

    <!-- Sidebar Nav -->
    <nav id="sidebar">
        <div class="navbar-btn sidebar">


            <div class="sidebar-header">
                <h3>Community Lifeline Ministries</h3>
                <strong>CLM</strong>
            </div>
            <ul class="list-unstyled components">

                <li class="Closed">
                    <a href="../index-login/menu.php">
                        <i class="glyphicon glyphicon-home"></i> Home
                    </a>
                </li>
                <li>
                    <a href="#studentSubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="glyphicon glyphicon-user"></i> Students
                    </a>
                    <ul class="collapse list-unstyled" id="studentSubmenu">
                        <li><a href="../new/NewStudent.php">Add</a></li>
                        <li><a href="../edit/EditStudent.php">Update</a></li>
                        <li><a href="../show/ShowStudents.php">Display All</a></li>
                        <li><a href="../new/NewStudentToClass.php">Add To Class</a></li>
                        <li><a href="../new/NewStudentToProgram.php">Add To Program</a></li>
                        <li><a href="../new/NewTestScores.php">New Test Score</a></li>
                        <li><a href="../edit/EditTestScores.php">Update Test Score</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#contactSubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="glyphicon glyphicon-earphone"></i> Contacts
                    </a>
                    <ul class="collapse list-unstyled" id="contactSubmenu">
                        <li><a href="../new/NewContact.php">Add</a></li>
                        <li><a href="../edit/EditContact.php">Update</a></li>
                        <li><a href="../show/ShowContacts.php">Display All</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#volunteerSubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="glyphicon glyphicon-briefcase"></i> Volunteers
                    </a>
                    <ul class="collapse list-unstyled" id="volunteerSubmenu">
                        <li><a href="../new/NewVolunteerEmployee.php">Add</a></li>
                        <li><a href="../edit/EditVolunteerEmployee.php">Update</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#classSubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="glyphicon glyphicon-pencil"></i> Classes & Programs
                    </a>
                    <ul class="collapse list-unstyled" id="classSubmenu">
                        <li><a href="../new/NewClass.php">New Class</a></li>
                        <li><a href="../edit/EditClass.php">Update Class</a></li>
                        <li><a href="../show/ShowClasses.php">Display Classes</a></li>
                        <li><a href="../new/NewProgram.php">New Program</a></li>
                        <li><a href="../edit/EditProgram.php">Update Program</a></li>
                        <li><a href="../show/ShowPrograms.php">Display Programs</a></li>
                        <li><a href="#">Attendance</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#reportsSubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="glyphicon glyphicon-duplicate"></i> Reports
                    </a>
                    <ul class="collapse list-unstyled" id="reportsSubmenu">
                        <li><a href="#">Page 1</a></li>
                        <li><a href="#">Page 2</a></li>
                        <li><a href="#">Page 3</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#allergySubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="glyphicon glyphicon-alert"></i> Allergies
                    </a>
                    <ul class="collapse list-unstyled" id="allergySubmenu">
                        <li><a href="#">Add Student Allergy</a></li>
                        <li><a href="../new/NewMedicalConcern.php">Add</a></li>
                        <li><a href="../edit/EditMedicalConcern.php">Update</a></li>
                        <li><a href="../show/ShowMedicalConcerns.php">Display All</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#searchSubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="glyphicon glyphicon-search"></i> Search
                    </a>
                    <ul class="collapse list-unstyled" id="searchSubmenu">
                        <li><a href="../search/SearchStudentInfo.php">Student Info</a></li>
                        <li><a href="../search/SearchVolunteerEmployee.php">Volunteer Info</a></li>
                        <li><a href="../search/SearchSchedule.php">Schedules</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#adminSubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="glyphicon glyphicon-cog"></i> Admin
                    </a>
                    <ul class="collapse list-unstyled" id="adminSubmenu">
                        <li><a href="../new/NewUser.php">New User</a></li>
                    </ul>
                </li>
                <li>
                    <a href="../index-login/UserDocumentation.php">
                        <i class="glyphicon glyphicon-question-sign"></i> Help
                    </a>
                </li>
                <li>
                    <a href="../index-login/logout.php">
                        <i class="glyphicon glyphicon-off"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Content goes after here - closed by footer -->
    <div class="col-sm-9" id="content">
