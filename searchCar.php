<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["username"])) {
  // Redirect to the login page if not logged in
  header("Location: login.php");
  exit();
}

// Initialize variables for error messages
$errorMessage = "";

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

// Query the database to search for cars based on model and location
$searchSQL = "SELECT ID, Model, Location FROM Cars";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve model and location criteria from the form
  $model = $_POST["model"];
  $location = $_POST["location"];

  // Add WHERE conditions to the query if model and location are provided
  if (!empty($model)) {
    $searchSQL .= " WHERE Model LIKE '%$model%'";
    if (!empty($location)) {
      $searchSQL .= " AND Location LIKE '%$location%'";
    }
  } elseif (!empty($location)) {
    $searchSQL .= " WHERE Location LIKE '%$location%'";
  }
}

// Execute the query
$result = $conn->query($searchSQL);

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
        <img src="./assets/logo.png" alt="Logo" />
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

  <form method="POST" action="searchCar.php">
    <div class="search_container">
      <input type="text" id="model" name="model" placeholder="Enter car model" />

      <input type="text" id="location" name="location" placeholder="Enter location" />

      <button>
        <img src="./assets/search.png" alt="icon" />
      </button>
    </div>
  </form>

  <?php if ($result->num_rows > 0): ?>
    <div class="card_container">
      <div id="carList">
        <?php while ($row = $result->fetch_assoc()): ?>
          <a href="carDetails.php?id=<?php echo $row["ID"]; ?>">
            <div class="car_card">
              <h3>
                <?php echo $row["Model"]; ?>
              </h3>
              <p>
                <?php echo $row["Location"]; ?>
              </p>
            </div>
          </a>
        <?php endwhile; ?>
      </div>
    </div>
  <?php elseif ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
    <div class="card_container">
      <p>No cars matching the criteria found.</p>
    </div>
  <?php endif; ?>

  <!-- JS links -->
  <script src="./scripts/app.js"></script>
</body>

</html>