<?php
session_start();
if(!isset($_SESSION['loggedIn'])){
    header("Location: login.html");
}
include("Header.php");
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="adding.css"/>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>

<div id="form_wrapper">
    <form action="NewVolunteerEmployeeAdded.php" method="POST" id="form2">
        <br>
        <label><h2>Add Volunteer/Employee Information:</h2></label><br>
        <label><h4>Volunteer/Employee Name:</h4>
            <input placeholder="First" type="text" name="fname">
            <input placeholder="Last" type="text" name="lname">
        </label>
        <br><br>

        <label><h4>Volunteer/Employee Id:</h4><input type="text" name="id"></label>

        <label><h4>Cell Phone:</h4><input type="text" name="cellphone"></label>
        <label><h4>Home Phone:</h4><input type="text" name="homephone"></label>
        <br><br>

        <label><h4>Address:</h4><input type="text" name="address"></label>
        <label><h4>City:</h4><input type="text" name="city"></label>
        <label><h4>State:</h4>

            <select name="state">
                <option value="AL">Alabama</option>
                <option value="AK">Alaska</option>
                <option value="AZ">Arizona</option>
                <option value="AR">Arkansas</option>
                <option value="CA">California</option>
                <option value="CO">Colorado</option>
                <option value="CT">Connecticut</option>
                <option value="DE">Delaware</option>
                <option value="FL">Florida</option>
                <option value="GA">Georgia</option>
                <option value="HI">Hawaii</option>
                <option value="ID">Idaho</option>
                <option value="IL">Illinois</option>
                <option value="IN">Indiana</option>
                <option value="IA">Iowa</option>
                <option value="KS">Kansas</option>
                <option value="KY">Kentucky</option>
                <option value="LA">Louisiana</option>
                <option value="ME">Maine</option>
                <option value="MD">Maryland</option>
                <option value="MA">Massachusetts</option>
                <option value="MI">Michigan</option>
                <option value="MN">Minnesota</option>
                <option value="MS">Mississippi</option>
                <option value="MO">Missouri</option>
                <option value="MT">Montana</option>
                <option value="NE">Nebraska</option>
                <option value="NV">Nevada</option>
                <option value="NH">New Hampshire</option>
                <option value="NJ">New Jersey</option>
                <option value="NM">New Mexico</option>
                <option value="NY">New York</option>
                <option value="NC">North Carolina</option>
                <option value="ND">North Dakota</option>
                <option value="OH">Ohio</option>
                <option value="OK">Oklahoma</option>
                <option value="OR">Oregon</option>
                <option value="PA">Pennsylvania</option>
                <option value="RI">Rhode Island</option>
                <option value="SC">South Carolina</option>
                <option value="SD">South Dakota</option>
                <option value="TN">Tennessee</option>
                <option value="TX">Texas</option>
                <option value="UT">Utah</option>
                <option value="VT">Vermont</option>
                <option value="VA">Virginia</option>
                <option value="WA">Washington</option>
                <option value="WV">West Virginia</option>
                <option value="WI">Wisconsin</option>
                <option value="WY">WYoming</option>
            </select>

        </label>
        <label><h4>Zip:</h4><input type="text" name="zip"></label>
        <br><br>


        <label><h4>Email:</h4><input type="text" name="email"></label>
        <br><br>

        <label><h4>Type:</h4>

            <select name="type">
                <option value="Volunteer">Volunteer</option>
                <option value="Employee">Employee</option>
            </select>

        </label>
        <br><br>

        <label><h4>Program:</h4>

            <select name="program">
                <option value="G.E.M.S">G.E.M.S</option>
                <option value="Sons of Thunder">Sons of Thunder</option>
            </select>

        </label>
        <br><br>

        <input id="submit" type="submit" value="Submit"><br><br>
    </form>
</div>

</body>
</html>
