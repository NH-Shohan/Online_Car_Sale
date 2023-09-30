<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["username"])) {
  header("Location: login.php"); // Redirect to the login page if not logged in
  exit();
}

// Initialize variables for error messages and success message
$errorMessage = "";
$successMessage = "";

// Handle form submission to add a car
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve car details from the form
  $make = $_POST["make"];
  $model = $_POST["model"];
  $year = $_POST["year"];
  $mileage = $_POST["mileage"];
  $location = $_POST["location"];
  $price = $_POST["price"];

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

  // Get the seller's username from the session
  $sellerUsername = $_SESSION["username"];

  // Retrieve the seller's ID from the database
  $getSellerIDSQL = "SELECT ID FROM Sellers WHERE Username = '$sellerUsername'";
  $result = $conn->query($getSellerIDSQL);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $sellerID = $row["ID"];

    // Insert car details into the database, associated with the logged-in seller
    $insertCarSQL = "INSERT INTO Cars (Make, Model, Year, Mileage, Location, Price, SellerID)
                    VALUES ('$make', '$model', '$year', '$mileage', '$location', '$price', '$sellerID')";

    if ($conn->query($insertCarSQL) === TRUE) {
      // Display a success message
      $successMessage = "Car added successfully!";
    } else {
      // Display an error message
      $errorMessage = "Error: " . $insertCarSQL . "<br>" . $conn->error;
    }
  } else {
    // Seller not found, handle this error
    $errorMessage = "Seller not found!";
  }

  // Close the database connection
  $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Add Car</title>
  <link rel="shortcut icon" href="./assets/favicon.png" type="image/x-icon" />

  <!-- CSS links -->
  <link rel="stylesheet" href="./styles/style.css" />
  <link rel="stylesheet" href="./styles/form.css" />

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
      <li><a href="addCar.php" class="active">Add Car</a></li>
      <li><a href="searchCar.php">Search Car</a></li>
      <li><a href="registration.php">Registration</a></li>
      <li><a href="login.php">Login</a></li>
    </ul>
  </nav>

  <section class="container">
    <img class="registration_image" src="./assets/addCar.png" alt="registration image" />
    <fieldset>
      <legend>Add Car</legend>
      <form method="POST">
        <label for="make">Make:</label>
        <input type="text" id="make" name="make" required />

        <label for="model">Model:</label>
        <input type="text" id="model" name="model" required />

        <label for="year">Year:</label>
        <input type="number" id="year" name="year" required />

        <label for="mileage">Mileage:</label>
        <input type="number" id="mileage" name="mileage" required />

        <label for="location">Location:</label>
        <input type="text" id="location" name="location" required />

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" required />

        <button type="submit">Add Car</button>
      </form>

      <!-- Display success or error messages -->
      <?php if (!empty($successMessage)): ?>
        <p style="text-align: center; margin-top: 20px; color: green;">
          <?php echo $successMessage; ?>
        </p>
      <?php endif; ?>

      <?php if (!empty($errorMessage)): ?>
        <p style="text-align: center; margin-top: 20px; color: red;">
          <?php echo $errorMessage; ?>
        </p>
      <?php endif; ?>
    </fieldset>
  </section>

  <footer class="footer">
    <p>Copyright ©️ 2023 | Online Car Sale</p>
  </footer>

  <!-- JS links -->
  <script src="./scripts/app.js"></script>
</body>

</html>