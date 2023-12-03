<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "users");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle form submission and database interaction here

if ($_SERVER["REQUEST_METHOD"] == "Login") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = MD5(mysqli_real_escape_string($conn, $_POST['password']));

    // Use prepared statements to prevent SQL injection
    $sql = "SELECT * FROM Users WHERE username = ? AND password = ?";
    $stmt = mysqli_prepare($conn, $sql);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Get the result
    $result = mysqli_stmt_get_result($stmt);

    // Check if a row is returned (valid login)
    if ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['username'] = $username;
        header("Location:C:\xampp\htdocs\welcome.php"); // Redirect to welcome page after successful login
        exit(); // Stop script execution after the redirect
    } else {
        echo "Invalid username or password";
    }
    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>


$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>


    <div id="header-container">
        <?php include "./parts/navbar.php"; ?>
    </div>


    <div class="container mt-5 ">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="Login">
            <label class="ll" for="username">Username:</label><br>
            <input class="ll" type="text" id="username" name="username" required> <br>

            <label class="ii" for="password">Password:</label><br>
            <input class="ii" type="password" id="password" name="password" required><br>

            <input class="login" type="submit" value="Login">
            <p>Don't have an account? <a href="signup.html">Register</a></p>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>