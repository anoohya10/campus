<?php
session_start();

// checking if user already logged in
if (isset($_SESSION["adminLogged"]) && $_SESSION["adminLogged"] === true) {
  header("location: index.php");
  exit;
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Admin Login </title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="login.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">

</head>

<body>
  <div style="margin: 20px 0;">

    <?php
    if (isset($_SESSION['status_admin'])) {
      echo '<div class="alert">
    <span class="closebtn">&times;</span>  
    ' . $_SESSION['status_admin'] . '
    </div>';
      unset($_SESSION['status_admin']);
    }
    ?>
    <div class="cont">
      <div class="form sign-in">
        <h2>Sign In</h2>
        <form action="admin_login.php" method="post">
          <label>
            <span>Email Address</span>
            <input type="email" name="email" required>
          </label>
          <label>
            <span>Password</span>
            <input type="password" name="password" required>
          </label>
          <button class="submit" name="submit" type="submit">Sign In</button>
        </form>

      </div>

      <div class="sub-cont">
        <div class="img">
          <div class="img-text m-up">
            <h1>Let's Get</h1>
            <p>Signed in!!</p>
          </div>
        </div>
      </div>
      <script type="text/javascript" src="login.js"></script>
</body>

</html>