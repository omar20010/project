<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "users");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle form submission and database interaction here

if (isset($_POST["submit"])) {
    $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = password_hash(mysqli_real_escape_string($conn, $_POST['password']), PASSWORD_DEFAULT); // Hashing the password securely
    $phone = mysqli_real_escape_string($conn, $_POST["phone"]);

    // Use prepared statements to prevent SQL injection
    $sql = "INSERT INTO users (first_name, last_name, username, phone, password) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "sssss", $fname, $lname, $username, $phone, $password);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Close the statement
    mysqli_stmt_close($stmt);

    $_SESSION['username'] = $username;

    header("Location: welcome.php");
    exit();
}

// Close the connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="mb-3">
                <label for="fname" class="form-label">First Name:</label>
                <input type="text" class="form-control" id="fname" name="fname" required>
            </div>

            <div class="mb-3">
                <label for="lname" class="form-label">Last Name:</label>
                <input type="text" class="form-control" id="lname" name="lname" required>
            </div>

            <div class="mb-3">
                <label for="username" class="form-label">User Name:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number:</label>
                <input type="tel" class="form-control" id="phone" name="phone" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Sign Up</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
