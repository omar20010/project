<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page or display a message
    header("Location: login.php");
    exit();
}

$conn = mysqli_connect("localhost", "root", "", "users");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch the user's information from the session
$username = $_SESSION['username'];

// Fetch appointments for the logged-in user from the database
$sql = "SELECT * FROM appointments INNER JOIN users ON appointments.user_id = users.id WHERE users.username = '$username'";

$result = mysqli_query($conn, $sql);

// Check if appointments exist
if ($result) {
    $appointments = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $appointments = [];
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Appointments</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Include your custom stylesheet -->
</head>

<body>
    <!-- Include the common header on all pages -->
    <div id="header-container">
        <!-- Include the header content here -->
        <?php include "navbar.php"; ?>
    </div>

    <!-- Main content of the page goes here -->
    <div class="container mt-5">
        <h2>Appointments</h2>
        <?php if (!empty($appointments)) : ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Car Type</th>
                        <th>Car Model</th>
                        <th>What to Do</th>
                        <th>Date and Time</th>
                        <th>Customer Problem</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($appointments as $appointment) : ?>
                        <tr>
                            <td><?php echo $appointment['id']; ?></td>
                            <td><?php echo $appointment['car_type'] ?? ''; ?></td>
                            <td><?php echo $appointment['car_model'] ?? ''; ?></td>
                            <td><?php echo $appointment['what_to_do'] ?? ''; ?></td>
                            <td><?php echo $appointment['date_time'] ?? ''; ?></td>
                            <td><?php echo $appointment['customer_problem'] ?? ''; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p>No appointments found.</p>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
