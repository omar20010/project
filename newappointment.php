<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page or display a message
    header("Location: login.php"); // Change "login.php" to the actual login page
    exit();
}

$conn = mysqli_connect("localhost", "root", "", "users");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST["submit"])) {
    $carType = mysqli_real_escape_string($conn, $_POST['carType']);
    $carModel = mysqli_real_escape_string($conn, $_POST['carModel']);
    $whatToDo = mysqli_real_escape_string($conn, $_POST['whatToDo']);
    $dateTime = mysqli_real_escape_string($conn, $_POST['dateTime']);
    $customerProblem = mysqli_real_escape_string($conn, $_POST['customerProblem']);

    // Use prepared statements to prevent SQL injection
    $sql = "INSERT INTO appointments (user_id, car_type, car_model, what_to_do, date_time, customer_problem) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    // Get the user's ID from the session
    // $_SESSION['user_id'] = $userID;// Assuming you have a 'user_id' in your session

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "isssss", $userID, $carType, $carModel, $whatToDo, $dateTime, $customerProblem);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Close the statement
    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Appointment</title>
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> <!-- Include your custom stylesheet -->
</head>

<body>
    <!-- Include the common header on all pages -->
    <div id="header-container">
        <!-- Include the header content here -->
        <?php include "navbar.php"; ?>
    </div>

    <!-- Main content of the page goes here -->
    <div class="container mt-5">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="form-group">
                <label for="carType">Choose Car Type:</label>
                <select class="form-control" id="carType" name="carType" required>
                    <option value="Choose Your Car Type">Choose Your Car Type</option>
                    <option value="audi-a4-allroad">Audi A4 Allroad</option>
                    <option value="audi-a6">Audi A6</option>
                    <option value="audi-a8">Audi A8</option>
                    <option value="audi-e-tron">Audi e-tron</option>
                    <option value="aston-martin-db11">Aston Martin DB11</option>
                    <option value="bmw-5-series">BMW 5 Series</option>
                    <option value="bmw-7-series">BMW 7 Series</option>
                    <option value="bmw-m3">BMW M3</option>
                    <option value="bmw-z4">BMW Z4</option>
                    <option value="bugatti-veyron">Bugatti Veyron</option>
                    <option value="chevrolet-camaro-convertible">Chevrolet Camaro Convertible</option>
                    <option value="chevrolet-silverado">Chevrolet Silverado</option>
                    <option value="chevrolet-spark">Chevrolet Spark</option>
                    <option value="chevrolet-suburban">Chevrolet Suburban</option>
                    <option value="chrysler-pacifica">Chrysler Pacifica</option>
                    <option value="ferrari-gtc4lusso">Ferrari GTC4Lusso</option>
                    <option value="ferrari-laferrari">Ferrari LaFerrari</option>
                    <option value="fiat-500">Fiat 500</option>
                    <option value="ford-escape">Ford Escape</option>
                    <option value="ford-expedition">Ford Expedition</option>
                    <option value="ford-explorer">Ford Explorer</option>
                    <option value="ford-f-150">Ford F-150</option>
                    <option value="ford-fiesta">Ford Fiesta</option>
                    <option value="ford-focus-st">Ford Focus ST</option>
                    <option value="ford-transit">Ford Transit</option>
                    <option value="gmc-yukon">GMC Yukon</option>
                    <option value="honda-civic">Honda Civic</option>
                    <option value="honda-civic-type-r">Honda Civic Type R</option>
                    <option value="honda-clarity">Honda Clarity</option>
                    <option value="honda-cr-v">Honda CR-V</option>
                    <option value="honda-fit">Honda Fit</option>
                    <option value="honda-odyssey">Honda Odyssey</option>
                    <option value="hyundai-i10">Hyundai i10</option>
                    <option value="jaguar-i-pace">Jaguar I-PACE</option>
                    <option value="jeep-grand-cherokee">Jeep Grand Cherokee</option>
                    <option value="jeep-wrangler">Jeep Wrangler</option>
                    <option value="land-rover-defender">Land Rover Defender</option>
                    <option value="lexus-rx-hybrid">Lexus RX Hybrid</option>
                    <option value="mazda-cx-5">Mazda CX-5</option>
                    <option value="mazda-mx-5-miata">Mazda MX-5 Miata</option>
                    <option value="mercedes-benz-e-class">Mercedes-Benz E-Class</option>
                    <option value="mercedes-benz-s-class">Mercedes-Benz S-Class</option>
                    <option value="mercedes-benz-sprinter">Mercedes-Benz Sprinter</option>
                    <option value="nissan-rogue">Nissan Rogue</option>
                    <option value="porsche-911">Porsche 911</option>
                    <option value="ram-1500">Ram 1500</option>
                    <option value="ram-promaster">Ram ProMaster</option>
                    <option value="renault-clio">Renault Clio</option>
                    <option value="smart-fortwo">Smart Fortwo</option>
                    <option value="subaru-crosstrek">Subaru Crosstrek</option>
                    <option value="subaru-outback">Subaru Outback</option>
                    <option value="tesla-model-x">Tesla Model X</option>
                    <option value="toyota-aygo">Toyota Aygo</option>
                    <option value="toyota-corolla">Toyota Corolla</option>
                    <option value="toyota-highlander">Toyota Highlander</option>
                    <option value="toyota-land-cruiser">Toyota Land Cruiser</option>
                    <option value="toyota-mirai">Toyota Mirai</option>
                    <option value="toyota-rav4">Toyota RAV4</option>
                    <option value="toyota-rav4-hybrid">Toyota RAV4 Hybrid</option>
                    <option value="toyota-sienna">Toyota Sienna</option>
                    <option value="volkswagen-golf">Volkswagen Golf</option>
                    <option value="volkswagen-golf-gti">Volkswagen Golf GTI</option>
                    <option value="volkswagen-polo">Volkswagen Polo</option>
                    <option value="volvo-v60">Volvo V60</option>
                    <!-- Add car type options here -->
                </select>
            </div>

            <div class="form-group">
                <label for="carModel">Choose Car Model:</label>
                <select class="form-control" id="carModel" name="carModel" required>
                    <option value="CAR MODEL">CAR MODEL</option>
                    <?php for ($i = 1990; $i < 2024; $i++) : ?>
                        <option value="<?php echo $i ?>"><?php echo $i ?></option>
                    <?php endfor; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="whatToDo">What do you want to do:</label>
                <select class="form-control" id="whatToDo" name="whatToDo" required>
                    <option value="choose what to do">choose what you want to do.</option>
                    <option value="change-oil">Change oil and oil filter routinely.</option>
                    <option value="fluids-filled">Keep all fluids appropriately filled. That may be included with oil changes. </option>
                    <option value="replace-spark-plugs">Replace spark plugs.</option>
                    <option value="replace-coolant">Replace coolant.</option>
                    <option value="check-brake-fluid">Check brake fluid.</option>
                    <option value="others">Others</option>
                    <!-- Add what to do options here -->
                </select>
            </div>

            <div class="form-group">
                <label for="dateTime">Choose the Date and Time:</label>
                <input type="datetime-local" class="form-control" id="dateTime" name="dateTime" required>
            </div>

            <div class="form-group">
                <label for="customerProblem">What do you think the problem is? (optional)</label>
                <textarea class="form-control" id="customerProblem" name="customerProblem"></textarea>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Make an Appointment</button>
        </form>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>