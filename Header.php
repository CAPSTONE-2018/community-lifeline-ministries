<?php
            //Setting up variable to use for mysqli function
        include("AdminPermissionsTest.php");
?>


<html>
    <head>
        <link rel="stylesheet" type="text/css" href="menu.css"/>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    
    <body>
        <form align="right" name="form" action="logout.php" method="POST">
            <label class="logout">
            <input name="submit" type="submit" id="logout" class="btn btn-info btn-lg btn-block" value="Logout">
            </label>
        </form>
        
		<a href="menu.php" title="Homepage"><img src="Lifeline.png" alt="Community Lifeline" align="middle"></a>
		
		<!--menubar-########################################-->
		<div id="menubar">
        <div class="dropdwn">
            <button class="dropdwn_btn">New</button>
            <div class="dropdwn_list">
            
                <form action="NewAddingStudent.php" method="POST">
                    <input type="submit" value="Student" />
                </form>
                
                <form action="NewAddingContact.php" method="POST">
                    <input type="submit" value="Contact" />
                </form>
                
                <form action="NewAddingVolunteerEmployee.php" method="POST">
                    <input type="submit" value="Volunteer/Employee" />
                </form>
                
                <form action="NewAddingClass.php" method="POST">
                    <input type="submit" value="Class" />
                </form>

                <form action="NewAddingStudentToClass.php" method="POST">
                    <input type="submit" value="Student To Class" />
                </form>

                <form action="NewAddingTestScores.php" method="POST">
                    <input type="submit" value="Student Test Scores" />
                </form>
            </div>
        </div>

            <div class="dropdwn">
                <button class="dropdwn_btn">Update</button>
                <div class="dropdwn_list">

                    <form action="UpdatingStudent.php" method="POST">
                        <input type="submit" value="Student" />
                    </form>

                    <form action="UpdateContact.php" method="POST">
                        <input type="submit" value="Contact" />
                    </form>

                    <form action="UpdateVolunteerEmployee.php" method="POST">
                        <input type="submit" value="Volunteer/Employee" />
                    </form>
                </div>
            </div>
        
        <div class="dropdwn">
            <button class="dropdwn_btn">Reports</button>
            <div class="dropdwn_list">
            
                <form action="Reports.php" method="POST">
                    <input type="submit" value="Generate Reports" />
                </form>
            </div>
        </div>
        
        <div class="dropdwn">
            <button class="dropdwn_btn">Search</button>
            <div class="dropdwn_list">
                
                <form action="SearchingInfo.php" method="POST">
                    <input type="submit" value="Information" />
                </form>
                
                <form action="SearchingTeacher.php" method="POST">
                    <input type="submit" value="Volunteer/Employee" />
                </form>
                
                <form action="SearchingSchedule.php" method="POST">
                    <input type="submit" value="Schedule" />
                </form> 
            </div>
        </div> 
        
        <div class="dropdwn">
            <button class="dropdwn_btn">Display All</button>
            <div class="dropdwn_list">
                
                <form action="NewDisplayAllStudents.php" method="POST">
                    <input type="submit" value="Students" />
                </form>
                
                <form action="NewDisplayAllVolunteersEmployees.php" method="POST">
                    <input type="submit" value="Volunteers/Employees" />
                </form>
                
                <form action="NewDisplayAllClasses.php" method="POST">
                    <input type="submit" value="Classes" />
                </form> 
            </div>
        </div>
        
        <?php
            if($isAdmin == true){
                echo '<div class="dropdwn">
                            <button class="dropdwn_btn">Administrative Tools</button>
                                <div class="dropdwn_list">
                                    <form action="Register.php" method="POST">
                                        <input type="submit" value="Register new user" />
                                    </form>
                                </div>
                        </div>';
            }
        ?>
            
                
        
        </div>
        <br />
    </body>
</html>
