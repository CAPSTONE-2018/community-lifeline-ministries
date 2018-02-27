<link rel="stylesheet" type="text/css" href="../../css/clm.css"/>

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Community Lifeline Ministries</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Stylesheet -->
    <link rel="stylesheet" type="text/css" href="../../css/clm.css"/>
</head>
<body>



<div class="wrapper">
    <!-- Sidebar Holder -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Community Lifeline Ministries</h3>
            <strong>CLM</strong>
        </div>


        <ul class="list-unstyled components">
            <li class"navbar-header">
            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                <i class="glyphicon glyphicon-align-left"></i>
            </button>
            </li>


            <li class="active">
                <a href="../index-login/menu.php">
                    <i class="glyphicon glyphicon-home"></i>
                    Home
                </a>
            </li>
            <li>
                <a href="#studentSubmenu" data-toggle="collapse" aria-expanded="false">
                    <i class="glyphicon glyphicon-user"></i>
                    Students
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
                    <i class="glyphicon glyphicon-user"></i>
                    Contacts
                </a>
                <ul class="collapse list-unstyled" id="contactSubmenu">
                    <li><a href="../new/NewContact.php">Add</a></li>
                    <li><a href="../edit/EditContact.php">Update</a></li>
                    <li><a href="../show/ShowContacts.php">Display All</a></li>
                </ul>
            </li>
            <li>
                <a href="#volunteerSubmenu" data-toggle="collapse" aria-expanded="false">
                    <i class="glyphicon glyphicon-user"></i>
                    Volunteers
                </a>
                <ul class="collapse list-unstyled" id="volunteerSubmenu">
                    <li><a href="../new/NewVolunteerEmployee.php">Add</a></li>
                    <li><a href="../edit/EditVolunteerEmployee.php">Update</a></li>
                </ul>
            </li>
            <li>
                <a href="#classSubmenu" data-toggle="collapse" aria-expanded="false">
                    <i class="glyphicon glyphicon-user"></i>
                    Classes & Programs
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
                    <i class="glyphicon glyphicon-duplicate"></i>
                    Reports
                </a>
                <ul class="collapse list-unstyled" id="reportsSubmenu">
                    <li><a href="#">Page 1</a></li>
                    <li><a href="#">Page 2</a></li>
                    <li><a href="#">Page 3</a></li>
                </ul>
            </li>
            <li>
                <a href="#searchSubmenu" data-toggle="collapse" aria-expanded="false">
                    <i class="glyphicon glyphicon-duplicate"></i>
                    Search
                </a>
                <ul class="collapse list-unstyled" id="searchSubmenu">
                    <li><a href="../find/FindStudentInfo.php">Student Info</a></li>
                    <li><a href="../find/FindVolunteerEmployee.php">Volunteer Info</a></li>
                    <li><a href="../find/FindSchedule.php">Schedules</a></li>
                </ul>
            </li>
            <li>
                <a href="#adminSubmenu" data-toggle="collapse" aria-expanded="false">
                    <i class="glyphicon glyphicon-duplicate"></i>
                    Admin
                </a>
                <ul class="collapse list-unstyled" id="adminSubmenu">
                    <li><a href="../add/AddUser.php">New User</a></li>
                </ul>
            </li>
            <li>
                <a href="../../UserDocumentation.php">
                    <i class="glyphicon glyphicon-home"></i>
                    Help
                </a>
            </li>
            <li>
                <a href="../index-login/logout.php">
                    <i class="glyphicon glyphicon-home"></i>
                    Logout
                </a>
            </li>
    </nav>




    <div id="content">

        <div class="text-center">
            <a href="../index-login/menu.php" title="Homepage"><img src="../../images/Lifeline.png" alt="Community Lifeline"></a>
        </div>




<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<!-- Bootstrap Js CDN -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
</script>
</body>
</html>