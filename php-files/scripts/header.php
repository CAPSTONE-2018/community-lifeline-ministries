<?php
session_start();
if(!isset($_SESSION['loggedIn'])){
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
      integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

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

                <li><a href="../../logout.php">Logout</a></li>
              </ul>
            </div>
            <!--/.nav-collapse -->
          </div>
          <!--/.container-fluid -->
        </nav>


        <div class="text-center">
          <a href="../../menu.php" title="Homepage"><img src="../../images/Lifeline.png" alt="Community Lifeline"></a>
       </div>

        <!--menubar-########################################-->
        <div id="menubar">
          <div class="dropdwn">
            <button class="dropdwn_btn">New</button>
            <div class="dropdwn_list">

              <form action="../new/NewStudent.php" method="POST">
                <input type="submit" value="Student" />
              </form>

              <form action="../new/NewContact.php" method="POST">
                <input type="submit" value="Contact" />
              </form>

              <form action="newVolunteerEmployee.php" method="POST">
                <input type="submit" value="Volunteer/Employee" />
              </form>

              <form action="../new/NewClass.php" method="POST">
                <input type="submit" value="Class" />
              </form>

              <form action="newStudentToClass.php" method="POST">
                <input type="submit" value="Student To Class" />
              </form>

              <form action="newTestScores.php" method="POST">
                <input type="submit" value="Student Test Scores" />
              </form>
            </div>
          </div>

          <div class="dropdwn">
            <button class="dropdwn_btn">Update</button>
            <div class="dropdwn_list">

              <form action="../edit/EditStudent.php" method="POST">
                <input type="submit" value="Student" />
              </form>

              <form action="../edit/EditContact.php" method="POST">
                <input type="submit" value="Contact" />
              </form>

              <form action="editVolunteerEmployee.php" method="POST">
                <input type="submit" value="Volunteer/Employee" />
              </form>

              <form action="../edit/EditClass.php" method="POST">
                <input type="submit" value="Class" />
              </form>

              <form action="editTestScores.php" method="POST">
                <input type="submit" value="Student Test Scores" />
              </form>
            </div>
          </div>

          <div class="dropdwn">
            <button class="dropdwn_btn">Reports</button>
            <div class="dropdwn_list">

              <form action="reports.php" method="POST">
                <input type="submit" value="Generate Reports" />
              </form>
            </div>
          </div>

          <div class="dropdwn">
            <button class="dropdwn_btn">Search</button>
            <div class="dropdwn_list">

              <form action="searchInfo.php" method="POST">
                <input type="submit" value="Information" />
              </form>

              <form action="searchTeacher.php" method="POST">
                <input type="submit" value="Volunteer/Employee" />
              </form>

              <form action="searchSchedule.php" method="POST">
                <input type="submit" value="Schedule" />
              </form>
            </div>
          </div>

          <div class="dropdwn">
            <button class="dropdwn_btn">Display All</button>
            <div class="dropdwn_list">

              <form action="../show/ShowStudents.php" method="POST">
                <input type="submit" value="Students" />
              </form>

              <form action="showVolunteersEmployees.php" method="POST">
                <input type="submit" value="Volunteers/Employees" />
              </form>

              <form action="../show/ShowClasses.php" method="POST">
                <input type="submit" value="Classes" />
              </form>
            </div>
          </div>

          <?php
           if($account == "administrator"){
               echo '<div class="dropdwn">
                           <button class="dropdwn_btn">Administrative Tools</button>
                               <div class="dropdwn_list">
                                   <form action="newUser.php" method="POST">
                                       <input type="submit" value="Register new user" />
                                   </form>
                               </div>
                       </div>';
           }
       ?>

          <div class="dropdwn">
            <button class="dropdwn_btn">Help</button>
            <div class="dropdwn_list">

              <form action="userDocumentation.php" method="POST">
                <input type="submit" value="User Documentation" />
              </form>
            </div>
          </div>

        </div>
        <br />
