<?php
session_start();

$servername = "localhost";
$username = "sqluser";
$password = "password";
$dbname = "CarSalesDatabase";
$message = "";
$messageColor = "";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];

  // Check if the username and password match an entry in the database
  $sql = "SELECT * FROM Sellers WHERE Username = '$username'";
  $result = $conn->query($sql);

  if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $hashedPassword = $row["Password"];

    // Verify the password
    if (password_verify($password, $hashedPassword)) {
      // Login successful, set a session variable to remember the user
      $_SESSION["username"] = $username;
      header("Location: addCar.php"); // Redirect to the Add Car page
      exit(); // Make sure to exit to prevent further execution
    } else {
      $message = "Login failed. Incorrect password.";
      $messageColor = "red";
    }
  } else {
    $message = "Login failed. Username not found.";
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
  <title>Login</title>
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
      <li><a href="registration.php">Registration</a></li>
      <li><a href="login.php" class="active">Login</a></li>
    </ul>
  </nav>

  <section class="container">
    <fieldset>
      <legend>Login</legend>
      <form method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required />

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required />

        <button type="submit">Login</button>
      </form>

      <!-- Display the message with the appropriate color -->
      <p style="text-align: center; margin-top: 20px; color: <?php echo $messageColor; ?>;">
        <?php
        if (!empty($message)) {
          echo $message;
        }
        ?>
      </p>
    </fieldset>
    <img class="registration_image" src="./assets/login.png" alt="login image" />
  </section>

  <footer class="footer">
    <p>Copyright ©️ 2023 | Online Car Sale</p>
  </footer>

  <!-- JS links -->
  <script src="./scripts/app.js"></script>
</body>

</html>