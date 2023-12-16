<?php
// Check if a session is not already active
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<header>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/project/Home.php">
                CARWORKSHOP
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/project/Home.php">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/project/aboutUs.php">About Us</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/project/contact us.php">Contact Us</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="/project/appointment.php" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Appointments</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/project/newappointment.php">New Appointment</a></li>
                            <li><a class="dropdown-item" href="/project/showappointment.php">Show Appointment</a></li>
                        </ul>
                    </li>
                    <!-- Show "Welcome" link only if the user is logged in -->
                    <?php
                    if (isset($_SESSION['username'])) {
                        echo '
                            <li class="nav-item">
                                <a class="nav-link" href="/project/welcome.php">Welcome</a>
                            </li>
                        ';
                    }
                    ?>

                    <!-- Show "Log In" and "Register" links only if the user is not logged in -->
                    <?php
                    if (!isset($_SESSION['username'])) {
                        echo '
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/project/login.php">Log In</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/project/signup.php">Register</a>
                            </li>
                        ';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</header>