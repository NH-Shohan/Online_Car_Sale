<?php
// Database connection information
$servername = "localhost";
$username = "sqluser";
$password = "password";
$dbname = "CarSalesDatabase";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize car details variables
$carModel = "";
$carLocation = "";

// Check if the "id" parameter exists in the URL
if (isset($_GET["id"])) {
    $carID = $_GET["id"];

    // Perform a database query to get car details based on $carID
    $query = "SELECT * FROM Cars WHERE ID = $carID";
    $result = $conn->query($query);

    // Check if the query was successful and fetch car details
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $carModel = $row["Model"];
        $carLocation = $row["Location"];
        $price = $row["Price"];
        $year = $row["Year"];
        $mileage = $row["Mileage"];
        $make = $row["Make"];
    } else {
        echo "Car not found.";
    }
} else {
    echo "Car ID not provided.";
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Search Car</title>
    <link rel="shortcut icon" href="./assets/favicon.png" type="image/x-icon" />

    <!-- CSS links -->
    <link rel="stylesheet" href="./styles/style.css" />
    <link rel="stylesheet" href="./styles/searchCar.css" />

    <!-- Google font link -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
</head>

<body>
    <nav class="navbar">
        <a href="index.php">
            <div class="logo">
                <img src="./assets/logo.png" alt="Logo">
            </div>
        </a>
        <ul class="nav_list">
            <li><a href="index.php">Home</a></li>
            <li><a href="aboutUs.php">About Us</a></li>
            <li><a href="addCar.php">Add Car</a></li>
            <li><a href="searchCar.php" class="active">Search Car</a></li>
            <li><a href="registration.php">Registration</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav>

    <div class="car_details_container">
        <h2>Car Details</h2>
        <div class="car_details">
            <p><strong>Model:</strong>
                <?php echo $carModel; ?>
            </p>
            <hr>
            <p><strong>Location:</strong>
                <?php echo $carLocation; ?>
            </p>
            <hr>
            <p><strong>Price:</strong> $
                <?php echo $price; ?>
            </p>
            <hr>
            <p><strong>Year:</strong>
                <?php echo $year; ?>
            </p>
            <hr>
            <p><strong>Mileage:</strong>
                <?php echo $mileage; ?> miles
            </p>
            <hr>
            <p><strong>Made:</strong>
                <?php echo $make; ?>
            </p>

        </div>
    </div>

    <!-- JS links -->
    <script src="./scripts/app.js"></script>
</body>

</html>