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
        .custom-button { padding: 10px 20px; cursor: pointer;}
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
        <button style="background-color: #555; color: white;" class="custom-button" onclick="location.href='infection.php'">Infection</button>
        <button class="custom-button" onclick="location.href='schedule.php'">Schedule</button>
    </div>
    </body>

</html>