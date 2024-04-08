<?php
$servername = "localhost";
$username = "root"; // default username for XAMPP is 'root'
$password = ""; // default password for XAMPP is blank
$dbname = "ukc353_4";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// You can use $conn to interact with the database
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HFESTS</title>
        <style>
        body { font-family: Arial, sans-serif; }
        .header { background-color: #f2f2f2; padding: 10px; text-align: center; }
        .button-container { padding: 20px; display: flex; justify-content: space-around; }
        .custom-button { padding: 10px 20px; cursor: pointer; }
    </style>
    </head>
    <body>
    <div class="header">
        <h1><a href="index.php">HFESTS</a></h1>
    </div>
    <div class="button-container">
        <button class="custom-button" onclick="location.href='facility.php'">Facility</button>
        <button class="custom-button" onclick="location.href='residence.php'">Residence</button>
        <button class="custom-button" onclick="location.href='person.php'">Person</button>
        <button class="custom-button" onclick="location.href='employee.php'">Employee</button>
        <button class="custom-button" onclick="location.href='vaccination.php'">Vaccination</button>
        <button class="custom-button" onclick="location.href='infection.php'">Infection</button>
        <button class="custom-button" onclick="location.href='schedule.php'">Schedule</button>
    </div>
    </body>

</html>