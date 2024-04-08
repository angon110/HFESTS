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
            showSection('searchContainer'); // Show the create container by default on page load
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
        <button class="custom-button" onclick="location.href='person.php'">Person</button>
        <button style="background-color: #555; color: white;" class="custom-button" onclick="location.href='employee.php'">Employee</button>
        <button class="custom-button" onclick="location.href='vaccination.php'">Vaccination</button>
        <button class="custom-button" onclick="location.href='infection.php'">Infection</button>
        <button class="custom-button" onclick="location.href='schedule.php'">Schedule</button>
    </div>

    <div class="option-buttons">
        <button onclick="showSection('createContainer')">Create</button>
        <button onclick="showSection('searchContainer')">Search</button>
    </div>

    <div id="createContainer" class="form-container">
        <h2>Create Employee</h2>
        <form action="submit_employee.php" method="post">
            <label for="sin">Social Insurance Number (SIN):</label>
            <input type="text" id="sin" name="sin" required>
        
            <label for="role">Role:</label>
            <input type="text" id="role" name="role" required>
        
            <label for="medicareNumber">Medicare Number:</label>
            <input type="text" id="medicareNumber" name="medicareNumber" required>
        
            <input type="submit" value="Create Employee">
        </form>
    </div>

    <div id="searchContainer" class="form-container hidden">
        <h2>Search Employee</h2>
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

            <label for="role">Role:</label>
            <input type="text" id="role" name="role" value="Developer">

            <label for="medicare">Medicare Number:</label>
            <input type="text" id="medicare" name="medicare" value="MED1234567">

            <!-- Buttons for edit and delete functionality; they will be implemented later -->
            <input type="button" class="modifyButton" value="Edit" onclick="/* Functionality to be added */">
            <input type="button" class="modifyButton" value="Delete" onclick="/* Functionality to be added */">
        </form>
    </div>
</body>
</html>