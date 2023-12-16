<?php
session_start();

// Establish a connection to the database
$conn = mysqli_connect("localhost", "root", "", "users");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$success_message = "";

// Process form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    $phone = mysqli_real_escape_string($conn, $_POST['phoneNumber']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // Insert the form data into the database
    $sql = "INSERT INTO form_submissions (first_name, last_name, phone, subject, message) 
            VALUES ('$firstName', '$lastName', '$phone', '$subject', '$message')";

    if (mysqli_query($conn, $sql)) {
        $success_message = "Form submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Include your custom stylesheet -->
    <link rel="stylesheet" href="style.css"> <!-- Add a custom stylesheet if needed -->

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<style> 
/* Your CSS styles here */
body {
    margin: 0;
    padding: 0;
    background: url("360_F_431198909_DwGgs82ot1BTZ7wu6dnvwpBRTKVDZROd.jpg") no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    color: white;
    font-family: 'Arial', sans-serif;
}

h2, p, label {
    color: white;
}

</style>

<body>

<!-- Include the common header on all pages -->
<div id="header-container">
    <!-- Include the header content here -->
    <?php include "navbar.php"; ?>
</div>

<div class="container mt-5">
    <div class="row">
        <!-- Contact Form -->
        <div class="col-md-6">
    <h2>Contact Us</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="mb-3">
            <label for="firstName" class="form-label">First Name:</label>
            <input type="text" class="form-control" id="firstName" name="firstName" required>
        </div>
        <div class="mb-3">
            <label for="lastName" class="form-label">Last Name:</label>
            <input type="text" class="form-control" id="lastName" name="lastName" required>
        </div>
        <div class="mb-3">
    <label for="phoneNumber" class="form-label">Phone Number:</label>
    <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" required>
        </div>
        <div class="mb-3">
            <label for="subject" class="form-label">Subject:</label>
            <input type="text" class="form-control" id="subject" name="subject" required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Message:</label>
            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>



        <!-- Map -->
        <div class="col-md-6">
            <!-- Replace the iframe src attribute with your actual map embed code -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3722.057680891784!2d39.5659008!3d24.5134836!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15bdb94d372803f7%3A0x2d71f71dc5695268!2s%D9%85%D8%AC%D9%85%D8%B9%20%D8%A7%D9%84%D9%85%D8%AD%D9%85%D8%AF%D9%8A%20%D8%A7%D9%84%D8%B5%D9%86%D8%A7%D8%B9%D9%8A%2C%20Al%20Barakah%2C%20Madinah%2042332%2C%20Saudi%20Arabia%E2%80%AD!5e0!3m2!1sen!2sus!4v1636577938431!5m2!1sen!2sus" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
    
    <div class="container mt-5">
        <!-- Contact Form -->
        <div class="col-md-6">
            <!-- Your form -->
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <!-- Form fields -->
            </form>
            <!-- Success message displayed conditionally -->
            <?php if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($success_message)) : ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $success_message; ?>
                </div>
            <?php endif; ?>
        </div>
        <!-- Remaining content -->
    </div>

    <!-- Icons for Address, Phone, Email, and Website -->
    <div class="row mt-5">
        <div class="col-md-3">
            <p><i class="fas fa-map-marker-alt"></i> 123 Street, City, Country 🏠🌍</p>
        </div>
        <div class="col-md-3">
            <p><i class="fas fa-phone"></i>+1 (555) 123-4567 ☎️</p>
        </div>
        <div class="col-md-3">
            <p><i class="fas fa-envelope"></i> info@example.com 📧</p>
        </div>
        <div class="col-md-3">
            <p><i class="fas fa-globe"></i> www.example.com🌐</p>
        </div>
    </div>
</div>

<!-- Link Bootstrap JS and Font Awesome JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js" integrity="sha384-gBvo02kzcpP8HkQH8EXjDApImi1vM4GL/8M+3d/Du4YMBo8jUe
