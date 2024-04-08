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

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO Person (SIN, FirstName, LastName, DateOfBirth, Citizenship, MedicareNum, ResidenceID, PhoneNumber, Email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issssiiss", $sin, $firstname, $lastname, $dob, $citizenship, $medicare, $residenceID, $phonenum, $email);

    // Set parameters and execute
    $sin = $_POST['sin'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $dob = $_POST['dob'];
    $citizenship = $_POST['citizenship'];
    $medicare = $_POST['medicare'];
    $residenceID = $_POST['residenceID']; // You should have this field in your form
    $phonenum = $_POST['phonenum'];
    $email = $_POST['email'];

    if ($stmt->execute()) {
        echo "<script>alert('New person created successfully');</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
}

// Check if the search form is submitted
if (isset($_POST['search']) && !empty($_POST['searchSIN'])) {
    $searchSIN = $_POST['searchSIN'];

    // Prepare a select statement to get the person's data
    $stmt = $conn->prepare("SELECT * FROM Person WHERE SIN = ?");
    $stmt->bind_param("i", $searchSIN);
    $stmt->execute();
    $result = $stmt->get_result();
    $personData = $result->fetch_assoc();

    // Check if person data is found
    if ($personData) {
        // Pre-fill the form
        // Since we're outputting this directly in HTML below, we'll just store the data in variables
        $sinValue = $personData['SIN'];
        $firstnameValue = $personData['FirstName'];
        $lastnameValue = $personData['LastName'];
        //... Do this for all fields
    } else {
        $sinValue = $searchSIN; // Keep the searched SIN number in the input field
        echo "<script>alert('No person found with that SIN.');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HFESTS</title>
    <link rel="stylesheet" href="style.css">

    <script>
        function showSection(sectionId) {
            document.getElementById('createContainer').style.display = 'none';
            document.getElementById('searchContainer').style.display = 'none';
            
            document.getElementById(sectionId).style.display = 'block';
        }

        window.onload = function() {
            showSection('createContainer'); // Show the create container by default on page load
        };
    </script>

</head>
<body>
    <div class="header">
        <h1><a href="index.php">HFESTS</a></h1>
    </div>
    <div class="button-container">
        <button class="custom-button" onclick="location.href='facility.php'">Facility</button>
        <button class="custom-button" onclick="location.href='residence.php'">Residence</button>
        <button style="background-color: #555; color: white;" class="custom-button" onclick="location.href='person.php'">Person</button>
        <button class="custom-button" onclick="location.href='employee.php'">Employee</button>
        <button class="custom-button" onclick="location.href='vaccination.php'">Vaccination</button>
        <button class="custom-button" onclick="location.href='infection.php'">Infection</button>
        <button class="custom-button" onclick="location.href='schedule.php'">Schedule</button>
    </div>

    <div class="option-buttons">
        <button onclick="showSection('createContainer')">Create</button>
        <button onclick="showSection('searchContainer')">Search</button>
    </div>

    <div id="createContainer" class="form-container">
        <h2>Create Person</h2>
        <hr>
        <form action="person.php" method="post">
            <label for="sin">Social Insurance Number (SIN):</label>
            <input type="text" id="sin" name="sin" required>
        
            <label for="firstname">First Name:</label>
            <input type="text" id="firstname" name="firstname" required>
        
            <label for="lastname">Last Name:</label>
            <input type="text" id="lastname" name="lastname" required>
        
            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required>
        
            <label for="citizenship">Citizenship:</label>
            <input type="text" id="citizenship" name="citizenship">
        
            <label for="medicare">Medicare Number:</label>
            <input type="text" id="medicare" name="medicare">

            <label for="residenceID">Residence ID:</label>
            <input type="text" id="residenceID" name="residenceID">
        
            <label for="phonenum">Phone Number:</label>
            <input type="tel" id="phonenum" name="phonenum">
        
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        
            <input type="submit" value="Create Person">
        </form>

    </div>

    <div id="searchContainer" class="form-container hidden">
        <h2>Search Person</h2>
        <form>
            <label for="searchSIN">Search by Social Insurance Number (SIN):</label>
            <input type="text" id="searchSIN" name="searchSIN">
            <input type="button" value="Search" onclick="/* Functionality to be added */">
        </form>
        <hr>
        <!-- Example pre-filled data, to be replaced with actual search results in the future -->
        <form id="searchResults" class="hidden">
            <label for="sin">Social Insurance Number (SIN):</label>
            <input type="text" id="sin" name="sin" value="123456789">

            <label for="firstname">First Name:</label>
            <input type="text" id="firstname" name="firstname" value="John">

            <label for="lastname">Last Name:</label>
            <input type="text" id="lastname" name="lastname" value="Doe">

            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" value="1990-01-01">

            <label for="citizenship">Citizenship:</label>
            <input type="text" id="citizenship" name="citizenship" value="Canadian">

            <label for="medicare">Medicare Number:</label>
            <input type="text" id="medicare" name="medicare" value="MED1234567">

            <label for="residenceID">Residence ID:</label>
            <input type="text" id="residenceID" name="residenceID">

            <label for="phonenum">Phone Number:</label>
            <input type="tel" id="phonenum" name="phonenum" value="555-555-5555">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="john.doe@example.com">

            <!-- Buttons for edit and delete functionality; they will be implemented later -->
            <input type="button" class="modifyButton" value="Edit" onclick="/* Functionality to be added */">
            <input type="button" class="modifyButton" value="Delete" onclick="/* Functionality to be added */">
        </form>
    </div>

    <?php

    // SQL query to select all data from Person table
    $query = "SELECT * FROM Person ORDER BY LastName, FirstName";
    $result = $conn->query($query);

    // Check if there are any results
    if ($result->num_rows > 0) {
        // Start the table
        echo "<table border='1'>";
        echo "<tr><th>SIN</th><th>First Name</th><th>Last Name</th><th>Date Of Birth</th><th>Citizenship</th><th>Medicare Number</th><th>Residence ID</th><th>Phone Number</th><th>Email</th></tr>";

        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["SIN"] . "</td>";
            echo "<td>" . $row["FirstName"] . "</td>";
            echo "<td>" . $row["LastName"] . "</td>";
            echo "<td>" . $row["DateOfBirth"] . "</td>";
            echo "<td>" . $row["Citizenship"] . "</td>";
            echo "<td>" . $row["MedicareNum"] . "</td>";
            echo "<td>" . $row["ResidenceID"] . "</td>";
            echo "<td>" . $row["PhoneNumber"] . "</td>";
            echo "<td>" . $row["Email"] . "</td>";
            echo "</tr>";
        }

        // Close the table
        echo "</table>";
    } else {
        echo "0 results";
    }

    // Close the database connection
    $conn->close();
    ?>

    <script>
        // Check if the page was reloaded from a form submit
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );

            // If a new person was created, reload the page to show the updated table
            <?php if (isset($_POST['sin']) && $stmt->affected_rows > 0): ?>
                window.location.reload();
            <?php endif; ?>
        }
    </script>
    
</body>
</html>