<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About Us</title>
    <link rel="shortcut icon" href="./assets/favicon.png" type="image/x-icon" />

    <!-- CSS links -->
    <link rel="stylesheet" href="./styles/style.css" />
    <link rel="stylesheet" href="./styles/aboutUs.css" />

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
        <li><a href="index.php">Home</a></li>
        <li><a href="aboutUs.php" class="active">About Us</a></li>
        <li><a href="addCar.php">Add Car</a></li>
        <li><a href="searchCar.php">Search Car</a></li>
        <li><a href="registration.php">Registration</a></li>
        <li><a href="login.php">Login</a></li>
      </ul>
    </nav>

    <section class="container">
      <div>
        <h1>Online Car Sale</h1>
        <p>
          Welcome to Online Car Sale, your ultimate destination for a seamless
          and innovative car buying and selling experience. At Online Car Sale,
          we're passionate about revolutionizing the way individuals connect
          with automobiles.
        </p>
        <br />
        <p>
          Experience a new era of car shopping where browsing, negotiating, and
          purchasing are simplified. Our user-friendly interface empowers you to
          explore a wide range of vehicles.
        </p>
      </div>
      <img src="./assets/aboutUs.png" alt="about us image" />
    </section>

    <section class="container">
      <img src="./assets/mission.png" alt="Our Mission image" />
      <div>
        <h1>Our Mission</h1>
        <p>
          Our mission is to empower car enthusiasts, buyers, and sellers alike
          through a user-friendly platform that offers transparency,
          convenience, and a wide range of options. We strive to make the
          process of finding your dream car or connecting with eager buyers as
          effortless and enjoyable as possible.
        </p>
      </div>
    </section>

    <section class="contact_container">
      <h3>Address</h3>

      <div class="contact">
        <div class="address">location</div>
        <div class="address">Number</div>
        <div class="address">Email</div>
      </div>
    </section>

    <section class="team_container">
      <h3>Out Team</h3>

      <div class="team">
        <div class="member">
          <img src="./assets/member1.jpg" alt="member Image" />
          <p>Employee Name</p>
        </div>
        <div class="member">
          <img src="./assets/member2.jpg" alt="member Image" />
          <p>Employee Name</p>
        </div>
        <div class="member">
          <img src="./assets/member3.jpg" alt="member Image" />
          <p>Employee Name</p>
        </div>
        <div class="member">
          <img src="./assets/member4.jpg" alt="member Image" />
          <p>Employee Name</p>
        </div>
      </div>
    </section>

    <footer class="footer"><p>Copyright ©️ 2023 | Online Car Sale</p></footer>

    <!-- JS links -->
    <script src="./scripts/app.js"></script>
  </body>
</html>
