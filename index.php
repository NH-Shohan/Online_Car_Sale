<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Online Car Sale</title>
    <link rel="shortcut icon" href="./assets/favicon.png" type="image/x-icon" />

    <!-- CSS links -->
    <link rel="stylesheet" href="./styles/style.css" />

    <!-- Google font link -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <nav class="navbar">
      <a href="index.php">
        <div class="logo">
          <img src="./assets/logo.png" alt="Logo" />
        </div>
      </a>

      <ul class="nav_list">
        <li><a href="index.php" class="active">Home</a></li>
        <li><a href="aboutUs.php">About Us</a></li>
        <li><a href="addCar.php">Add Car</a></li>
        <li><a href="searchCar.php">Search Car</a></li>
        <li><a href="registration.php">Registration</a></li>
        <li><a href="login.php">Login</a></li>
      </ul>
    </nav>

    <section class="container">
      <h1>Welcome to Online Car Sale</h1>
      <p>
        your ultimate destination for buying and selling cars online. Discover a
        curated selection of vehicles, connect with sellers effortlessly, and
        experience a hassle-free journey in the world of automotive
        transactions. Join us today and revolutionize the way you interact with
        cars!
      </p>
      <img src="./assets/home.png" alt="car image" class="car_image" />
    </section>

    <section class="container home_container">
      <div>
        <h1>Why Choose Us?</h1>
        <div class="details_container">
          <div class="details">
            <h3>Diverse Selection</h3>
            <p>
              Explore a diverse and carefully curated selection of vehicles,
              ranging from stylish sedans to rugged SUVs. Our expansive
              inventory ensures there's something for everyone.
            </p>
          </div>
          <div class="details">
            <h3>Transparent Transactions</h3>
            <p>
              We prioritize transparency and honesty in every transaction.
              Sellers can list their vehicles with confidence, while buyers can
              make informed decisions based on detailed listings.
            </p>
          </div>
          <div class="details">
            <h3>User-Centric Experience</h3>
            <p>
              Our platform is designed with you in mind. We continuously work to
              enhance your experience, making navigation and interaction
              intuitive and user-friendly.
            </p>
          </div>
          <div class="details">
            <h3>Secure Transactions</h3>
            <p>
              Safety is paramount. We provide secure payment options and adhere
              to the highest standards of data protection, ensuring your
              personal information remains confidential.
            </p>
          </div>
        </div>
      </div>
      <img src="./assets/home_more.png" alt="home image" />
    </section>

    <footer class="footer"><p>Copyright ©️ 2023 | Online Car Sale</p></footer>

    <!-- JS links -->
    <script src="./scripts/app.js"></script>
  </body>
</html>
