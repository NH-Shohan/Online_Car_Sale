<?php
$servername = "localhost";
$username = "sqluser";
$password = "password";
$dbname = "CarSalesDatabase";
$message = "";
$messageColor = "";
$isSuccess = false;

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $address = $_POST["address"];
  $phone = $_POST["phone"];
  $email = $_POST["email"];
  $username = $_POST["username"];
  $password = $_POST["password"];

  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  // Insert seller details into the database
  $sql = "INSERT INTO Sellers (Name, Address, PhoneNumber, Email, Username, Password) 
            VALUES ('$name', '$address', '$phone', '$email', '$username', '$hashedPassword')";

  if ($conn->query($sql) === TRUE) {
    // Display a success message in green
    $isSuccess = true;
    $message = "Seller registration successful. <br> Thank you for registering!";
    $messageColor = "green";
  } else {
    // Display an error message in red
    $message = "Error: " . $sql . "<br>" . $conn->error;
    $messageColor = "red";
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registration</title>
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
      <li><a href="addCar.php">Add Car</a></li>
      <li><a href="searchCar.php">Search Car</a></li>
      <li><a href="registration.php" class="active">Registration</a></li>
      <li><a href="login.php">Login</a></li>
    </ul>
  </nav>

  <section class="container">
    <img class="registration_image" src="./assets/registration.png" alt="registration image" />
    <fieldset>
      <legend>Registration</legend>
      <form method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required />

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required />

        <label for="phone">Phone number:</label>
        <input type="number" id="phone" name="phone" required />

        <label for="email">Email address:</label>
        <input type="email" id="email" name="email" required />

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required />

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required />

        <button type="submit">Register</button>
      </form>

      <!-- Display the message with the appropriate color -->
      <p style="text-align: center; margin-top: 20px; color: <?php echo $messageColor; ?>;">
        <?php
        if ($isSuccess === true) {
          echo $message;
        } else {
          echo '';
        }
        ?>
      </p>
    </fieldset>

  </section>

  <footer class="footer">
    <p>Copyright ©️ 2023 | Online Car Sale</p>
  </footer>

  <!-- JS links -->
  <script src="./scripts/app.js"></script>
</body>

</html>