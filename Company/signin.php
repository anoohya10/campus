<?php
session_start();

// checking if user already logged in
if (isset($_SESSION["cmplogged"]) && $_SESSION["cmplogged"] === true) {
  header("location: index.php");
  exit;
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Company Login</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="signin.css" />
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet" />
</head>

<body>
  <div style="margin: 20px 0;">
    <?php
    if (isset($_SESSION['status_cmp'])) {
      echo '<div class="alert">
    <span class="closebtn">&times;</span>  
    ' . $_SESSION['status_cmp'] . '
    </div>';

      // echo $_SESSION['status_cmp'];
      unset($_SESSION['status_cmp']);
    }
    ?>

    <div class="cont">
      <div class="form sign-in">
        <h2>Sign In</h2>
        <form action="cmp_login.php" method="post">
          <label>
            <span>Email Address</span>
            <input type="email" name="cemail" required />
          </label>
          <label>
            <span>Password</span>
            <input type="password" name="cpassword" required />
          </label>
          <button type="submit" class="submit" name="login_cmp">Sign In</button>
        </form>

        <!-- <div class="social-media">
        <ul>
          <li><img src="images/linkedin-logo-png-2037.png"></li>
          <li><img src="images/7123025_logo_google_g_icon.png"></li>
          <li><img src="images/linkedin.png"></li>
          <li><img src="images/instagram.png"></li> -->
        <!-- </ul>
      </div> -->
      </div>

      <div class="sub-cont">
        <div class="img">
          <div class="img-text m-up">
            <h1>New here?</h1>
            <p>sign up and discover</p>
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
        <div class="form sign-up" overflow:scroll>
          <h2>Sign Up</h2>
          <form action="cmp_register.php" method="post">
            <label>
              <span> Company Name</span>
              <input type="text" name="cmp_name" required />
            </label>
            <label>
              <span>Company Email</span>
              <input type="email" name="cmp_email" required />
            </label>
            <label>
              <span>Person Name</span>
              <input type="text" name="p_name" required />
            </label>
            <label>
              <span>Phone number</span>
              <input type="tel" name="mobile" required />
            </label>
            <label>
              <span>Company Url</span>
              <input type="url" name="cmp_url" required />
            </label>
            <label>
              <span>Password</span>
              <input type="password" name="pass" required />
            </label>
            <label>
              <span>Confirm Password</span>
              <input type="password" name="cnf_pass" required />
            </label>
            <button type="submit" name="cbutton" class="submit">Sign Up Now</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="signin.js"></script>
</body>

</html>