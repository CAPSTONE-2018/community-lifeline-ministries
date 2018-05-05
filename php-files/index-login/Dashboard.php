<?php
$queryForStudentsPresent = "SELECT COUNT(*) AS studentsPresentCount 
                            FROM Attendance 
                            WHERE (Attendance_Value = 'Present' OR 
                                  Attendance_Value = 'Tardy') AND
                                  Date = '$dateToSubmit';";
$resultsForStudentsPresent = mysqli_query($db, $queryForStudentsPresent);
$studentsPresent = mysqli_fetch_assoc($resultsForStudentsPresent);

$queryForVolunteersPresent = "SELECT COUNT(*) AS volunteersPresentCount
			      FROM Volunteer_Employees
			      WHERE (Monday_Availability = 1 AND '$dayOfWeek' = 1) OR
                                    (Tuesday_Availability = 1 AND '$dayOfWeek' = 2) OR
                                    (Wednesday_Availability = 1 AND '$dayOfWeek' = 3) OR
                                    (Thursday_Availability = 1 AND '$dayOfWeek' = 4) OR
                                    (Friday_Availability = 1 AND '$dayOfWeek' = 5) OR
                                    (Saturday_Availability = 1 AND '$dayOfWeek' = 6) OR
                                    (Sunday_Availability = 1 AND '$dayOfWeek' = 7);";
$resultsForVolunteersPresent = mysqli_query($db, $queryForVolunteersPresent);
$volunteersPresent = mysqli_fetch_assoc($resultsForVolunteersPresent);
?>

<div class="app-title">
    <div>
        <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    </ul>
</div>


<div class="row">
    <div class="col-md-6 col-lg-3">
        <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
                <h4>Students Present</h4>
                <p><?php echo $studentsPresent['studentsPresentCount']; ?></b></p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="widget-small info coloured-icon"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
            <div class="info">
                <h4>Volunteers Scheduled</h4>
                <p><b><?php echo $volunteersPresent['volunteersPresentCount']; ?></b></p>
            </div>
        </div>
    </div>
</div>


<div class="row form-group">
        <div class="col-5">
            <div class="cal1 cal_2">
                <div class="clndr">
                    <div class="clndr-controls">
                        <div class="clndr-control-button">
                            <i class="fa fa-arrow-circle-left">previous</i>
                        </div>


                        <div class="clndr-control-button">
                            <i class="fa fa-arrow-circle-right">next</i>
                        </div>
                    </div>
                    <table class="clndr-table" border="0" cellspacing="0" cellpadding="0">
                        <thead>
                        <tr class="header-days">
                            <td class="header-day">S</td>
                            <td class="header-day">M</td>
                            <td class="header-day">T</td>
                            <td class="header-day">W</td>
                            <td class="header-day">T</td>
                            <td class="header-day">F</td>
                            <td class="header-day">S</td>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <!----Calender -------->
            <link rel="stylesheet" href="../../css/plugins/calendar/calendar.css" type="text/css"/>
            <script src="../../js/plugins/calendar/underscore-min.js" type="text/javascript"></script>
            <script src="../../js/plugins/calendar/moment-2.2.1.js" type="text/javascript"></script>
            <script src="../../js/plugins/calendar/clndr.js" type="text/javascript"></script>
            <script src="../../js/plugins/calendar/site.js" type="text/javascript"></script>
            <!----End Calender -------->
    </div>
	<?php include("./AttendanceCard.php"); ?>
</div>
