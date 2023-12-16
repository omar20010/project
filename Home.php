<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9Tneoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> <!-- Include your custom stylesheet -->

    <style>
        body {
            margin: 0;
            padding: 0;
            background: url("Advantages-of-taking-a-car-service-plan-Cover-13-10.jpg") no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        #header-container {
            /* Add your styles for the header container here */
        }
        .mee {
        font-size: 36px; /* Increase the font size of the h1 tag */
        text-align: center; /* Center the text horizontally */
        color: white; /* Change the text color to white */
        padding-bottom: 15px;

    }
    button{
    text-align: center; /* Center the text horizontally */
    justify-content: center;
    display: flex;

    
    
    }
    p{
        padding: 7%;
     
        /* border: 50%; */
    }
    .btn-container{
        text-align: center;
        font-size: 100px;
        
        
 
    }
    button:hover{
     background-color: aliceblue;
     color: blue;
    }
    </style>
</head>

<body>

    <!-- Include the common header on all pages -->
    <div id="header-container">
        <?php include "navbar.php"; ?>
    </div>


    <!-- Main content of the page goes here -->

    <div >
        <h3>                </h3>
        <p class="mee" style="font-size: 50px; color: white; font-weight: bolder ;    ">PRPFESSIONAL REPAIR
       OF YOUR CAR</p>
    
    <br>
    <
    <div class="btn-container">
<button onclick="location.href='newappointment.php';" class="btn" style=" font-weight: bolder ;background-color:selver; color:white;font-size;  "><h4>Book an Appointment</h4></button>
<button onclick="location.href='contact us.php';" class="btn" style="font-weight: bolder;background-color:selver; color:white;"><h4>Contact Us</h4></button>
</div>

</body>

</html>