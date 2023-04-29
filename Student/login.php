<?php
session_start();

// checking if user already logged in
if (isset($_SESSION["stulogged"]) && $_SESSION["stulogged"] === true) {
  header("location: index.php");
  exit;
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Student Login</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="login.css" />
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet" />
</head>

<body>

  <div class="main-con" style="margin: 20px 0;">

    <?php
    if (isset($_SESSION['status'])) {
      echo '<div class="alert">
    <span class="closebtn">&times;</span>  
    ' . $_SESSION['status'] . '
    </div>';

      // echo $_SESSION['status'];
      unset($_SESSION['status']);
    }
    ?>

    <div class="cont">
      <div class="form sign-in">
        <h2>Sign In</h2>

        <form action="student_login.php" method="post">
          <label>
            <span>Email Address</span>
            <input type="email" name="semail" required />
          </label>
          <label>
            <span>Password</span>
            <input type="password" name="spassword" required />
          </label>
          <button type="submit" name="loginstudent" class="submit">Sign In</button>
        </form>

        <div class="social-media">
          <ul>
            <li><img src="images/google.png" /></li>
            <li><img src="images/linkedin.png" /></li>
            <!-- <li><img src="images/linkedin.png"></li>
          <li><img src="images/instagram.png"></li> -->
          </ul>
        </div>
      </div>

      <div class="sub-cont">
        <div class="img">
          <div class="img-text m-up">
            <h1>New here?</h1>
            <p>Sign Up and Discover</p>
          </div>
          <div class="img-text m-in">
            <h1>One of us?</h1>
            <p>just sign in</p>
          </div>
          <div class="img-btn">
            <span class="m-up">Sign Up</span>
            <span class="m-in">Sign In</span>
          </div>
        </div>
        <div class="form sign-up">
          <h2>Sign Up</h2>
          <form action="studentreg.php" method="post">
            <label>
              <span>Name</span>
              <input type="text" name="name" required />
            </label>
            <label>
              <span>Email</span>
              <input type="email" name="email" required />
            </label>
            <label>
              <span>Phone number</span>
              <input type="tel" name="mobile" required />
            </label>
            <label>
              <span>Student Id</span>
              <input type="text" name="rollnum" required />
            </label>
            <!-- <label>
              <span>Male</span>
              <span>Female</span>
              <input type="radio">
            </label>
            <label>
              <span>Female</span>
              <input type="radio">
            </label> -->
            <label>
              <span>Password</span>
              <input type="password" name="pass" required />
            </label>
            <label>
              <span>Confirm Password</span>
              <input type="password" name="con_pass" required />
            </label>
            <button type="submit" name="save" class="submit">Sign Up Now</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="login.js"></script>
</body>

</html>