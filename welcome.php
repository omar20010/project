<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

// Get the username from the session
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Include your custom stylesheet -->
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- Include the common header on all pages -->
    <div id="header-container">
        <!-- Include the header content here -->
        <?php include "navbar.php"; ?>
    </div>

    <!-- Main content of the page goes here -->
    <div class="container mt-5">
        <h1>Welcome, <?php echo htmlspecialchars($username); ?>!</h1>
        <p>This is your personalized welcome page. You are now logged in.</p>
        <a href="logout.php" class="btn btn-primary">Logout</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
