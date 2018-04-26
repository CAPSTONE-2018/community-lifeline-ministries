<?php
session_start();
if (!isset($_SESSION['loggedIn'])) {
    header("Location: ../../index.html");
}
$account = $_SESSION['account'];


$userMakingChanges = $_SESSION['loggedIn'];
include("../widgets/TimeZoneFormat.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Community Lifeline Ministries</title>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="../../css/pretty-dropdowns.css"/>
    <link rel="stylesheet" href="../../css/slide-out-modal.css"/>
    <link rel="stylesheet" href="../../css/mdl-input-styles.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Local Bootstrap -->
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css"/>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Stylesheet -->
    <link rel="stylesheet" type="text/css" href="../../css/clm.css"/>
    <link rel="stylesheet" href="../../css/mdl-input-styles.css"/>
    <link rel="stylesheet" href="../../css/search-bar-styles.css"/>
    <link rel="stylesheet" href="../../css/show-all-table-styles.css"/>
    <link rel="stylesheet" href="../../css/form-styles.css"/>
    <link rel="stylesheet" href="../../css/toggle-switch.css"/>
    <link rel="stylesheet" href="../../css/table-styles.css"/>
    <link rel="stylesheet" href="../../css/radio-styles.css"/>
    <link rel="stylesheet" href="../../css/attendance-page-styles.css"/>

</head>


<body>
<!-- Top Nav -->
<nav class="navbar-default navbar-fixed-top">
    <div class="navbar-user">
        Signed In As: <?php echo $userMakingChanges ?>
        <div id="timer"></div>
    </div>

    <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-left">
            <li>
                <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                    <i class="fa fa-bars"></i>
                </button>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="../index-login/menu.php"><img src="../../images/new-logo.png" alt="CLM Logo" height="25px"></a>
            </li>
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
                        <i class="fa fa-home"></i> Home
                    </a>
                </li>
                <li>
                    <a href="#attendanceSubmenu">
                        <i class="fa fa-calendar-check-o"></i> Attendance
                    </a>
                    <!--                    <ul class="collapse list-unstyled" id="attendanceSubmenu">-->
                    <!--                        <li><a href="../new/NewProgram.php">Take Attendance</a></li>-->
                    <!--                        <li><a href="../show/ShowPrograms.php">View All</a></li>-->
                    <!--                        <li><a href="#">Attendance</a></li>-->
                    <!--                    </ul>-->
                </li>
                <li>
                    <a href="#studentSubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="fa fa-graduation-cap"></i> Students
                    </a>
                    <ul class="collapse list-unstyled" id="studentSubmenu">
                        <li><a href="../new/NewStudent.php">Add New</a></li>
                        <li><a href="../show/ShowStudents.php">View All</a></li>
                        <li><a href="../new/NewStudentToProgram.php">Register To Program</a></li>
<!--                        <li><a href="../new/NewTestScores.php">Test Scores</a></li>-->
<!--                        <li><a href="#">Medical Concerns</a></li>-->
                    </ul>
                </li>
                <li>
                    <a href="#contactSubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="fa fa-address-book-o"></i> Contacts
                    </a>
                    <ul class="collapse list-unstyled" id="contactSubmenu">
                        <li><a href="../new/NewContact.php">Add New</a></li>
                        <li><a href="../show/ShowContacts.php">View All</a></li>
                        <li><a href="#">Student Contact</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#volunteerSubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="fa fa-star"></i> Volunteers
                    </a>
                    <ul class="collapse list-unstyled" id="volunteerSubmenu">
                        <li><a href="../new/NewVolunteerEmployee.php">Add New</a></li>
                        <li><a href="../edit/EditVolunteerEmployee.php">View All</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#programSubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="fa fa-pencil"></i> Programs
                    </a>
                    <ul class="collapse list-unstyled" id="programSubmenu">
                        <li><a href="../new/NewProgram.php">Add New</a></li>
                        <li><a href="../show/ShowPrograms.php">View All</a></li>
                        <li><a href="#">Attendance</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#allergySubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="fa fa-warning"></i> Medical Concerns
                    </a>
                    <ul class="collapse list-unstyled" id="allergySubmenu">
                        <li><a href="#">Add Student Allergy</a></li>
                        <li><a href="../new/NewMedicalConcern.php">Add New</a></li>
                        <li><a href="../edit/EditMedicalConcern.php">Update</a></li>
                        <li><a href="../show/ShowMedicalConcerns.php">Display All</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#reportsSubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="fa fa-line-chart"></i> Reports
                    </a>
                    <ul class="collapse list-unstyled" id="reportsSubmenu">
                        <li><a href="../create/createstudentreport.php">Students Report</a></li>
                        <li><a href="../create/createContactreport.php">Contacts Report</a></li>
                        <li><a href="../create/createVolunteerReport.php">Volunteer Report</a></li>
                        <li><a href="../create/createMedicalReport.php">Medical Report</a></li>
                        <li><a href="../create/createStudentMedicalReport.php">Student Medical Report</a></li>
                        <li><a href="../create/createStudentToProgramReport.php">Programs Report</a></li>
                        <li><a href="../create/createAttendanceReport.php">Attendance Report</a></li>
                        <li><a href="../create/createStudentAttendanceReport.php">Student Attendance Report</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#adminSubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="fa fa-cogs"></i> Admin
                    </a>
                    <ul class="collapse list-unstyled" id="adminSubmenu">
                        <li><a href="../new/NewUser.php">New User</a></li>
                    </ul>
                </li>
                <li>
                    <a href="../index-login/UserDocumentation.php">
                        <i class="fa fa-question-circle"></i> Help
                    </a>
                </li>
                <li>
                    <a href="../index-login/logout.php">
                        <i class="fa fa-power-off"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Content goes after here - closed by footer -->
    <div class="col-sm-9" id="content">

        <div class="container">
            <!-- Modal -->
            <div class="modal" id="custom-modal" tabindex="-1" role="dialog">
                <div class="modal-dialog" id="custom-size" role="document">
                    <div class="modal-content">
                        <div id="custom-title" class="modal-header">
                            <div class="col-1">

                            </div>
                            <div class="row modal-title m-auto text-center">
                                <div class="d-inline col-2">
                                    <i id="custom-icon"></i>
                                </div>
                                <div id="title-wrapper" class="col-10">
                                    <h4 id="dynamic-title" class="d-inline align-middle"></h4>
                                </div>
                            </div>
                            <div class="col-1 align-middle">
                                <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-window-close modal-close-button"></i>

                                </button>
                            </div>
                        </div>

                        <div class="modal-body">

                        </div>

                        <div class="modal-footer">

                        </div>
                    </div>
                </div>
            </div>
        </div>