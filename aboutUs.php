<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Include your custom stylesheet -->

    <style>
        body {
            margin: 0;
            padding: 0;
            background: url("1000_F_315144799_d8TptPt4dyPpO513My9BTa4oai6Kn0rH.jpg") no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            color: white;
            font-family: 'Arial', sans-serif;
        }

        #content-container {
            text-align: center;
            padding: 50px;
            color: white;
        }

        h1 {
            margin-bottom: 20px;
            color: #007bff;
            /* Bootstrap primary color */
        }

        p {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        h2 {
            color: #007bff;
            margin-bottom: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            text-align: left;
        }

        /* li {
            font-size: 18px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        li::before {
            content: '';
            display: inline-block;
            width: 20px;
            height: 20px;
            margin-right: 10px;
            background-size: cover;
        } */

        .icon-wrench::before {
            background-image: url('wrench-icon.png');
        }

        .icon-oil::before {
            background-image: url('oil-icon.png');
        }

        .icon-car::before {
            background-image: url('car-icon.png');
        }

        .icon-search::before {
            background-image: url('search-icon.png');
        }

        .icon-plug::before {
            background-image: url('plug-icon.png');
        }

        .icon-wheel::before {
            background-image: url('wheel-icon.png');
        }

        .icon-snowflake::before {
            background-image: url('snowflake-icon.png');
        }

        .icon-tools::before {
            background-image: url('tools-icon.png');
        }

        .bottom-right-image {
            max-width: 100%;
            height: auto;
            position: absolute;
            bottom: 0;
            right: 0;
            margin: 20px;
        }

        /* Button styles */
        .btn-container {
            text-align: center;
            margin-top: 20px;
        }

        .btn {
            font-weight: bold;
            background-color: white;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            display: inline-block;
            border-radius: 10px;
            transition: background-color 0.3s ease-in-out;
            
        }
    </style>
</head>

<body>

    <!-- Include the common header on all pages -->
    <div id="header-container">
        <!-- Include the header content here -->
        <?php include "navbar.php"; ?>
    </div>

    <!-- Main content of the page goes here -->
    <div id="content-container">
        <h1>About Our Car Workshop</h1>
        <p>Welcome to our car workshop, where we provide exceptional services for all your automotive needs. With years of
            experience in the industry, our skilled technicians are dedicated to delivering top-notch quality and customer
            satisfaction.</p>

        <h1 style="color:beige">What We Offer</h1>
        <ul style="text ;">
            <li class="icon-wrench"><h4>🔧 Car maintenance and repairs</h4></li>
            <li class="icon-oil"><h4>🛢️ Oil changes</h4></li>
            <li class="icon-car"><h4>🚗 Brake and suspension services</h4></li>
            <li class="icon-search"><h4>🔍 Engine diagnostics and repairs</h4></li>
            <li class="icon-plug"><h4>🔌 Replace spark plugs</h4></li>
            <li class="icon-wheel"><h4>🔧 Wheel alignment and tire services</h4></li>
            <li class="icon-snowflake"><h4>❄️ Replace coolant</h4></li>
            <li class="icon-tools"><h4>🛠️ And much more!</h4></li>
        </ul>

        <!-- Adding the image at the bottom right corner -->

        <!-- Button container -->
        <div class="btn-container">
            <p style="font-size:x-large; ">BOOK NOW</p>
            <a href="newappointment.php" class="btn" style="background-color: silver; color: white; font-weight: bolder; font-size: 25px; text-decoration: none;">New Appointment</a>
        </div>
    </div>

</body>

</html>
