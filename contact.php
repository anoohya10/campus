<?php session_start(); ?>
<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="contact.css" />
  <!-- Fontawesome CDN Link -->
  <!-- <link rel="stylesheet" href="home.css" /> -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Us</title>

  <style>
    a {
      text-decoration: none;
    }

    .contact_container {
      width: 100vw;
      min-height: 100vh;
      display: inline-block;
    }

    .about_container {
      width: 100%;
      min-height: 22vh;
      margin: 22px auto;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      border-radius: 6px;
      padding: 15px;
      box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 2px,
        rgba(0, 0, 0, 0.07) 0px 2px 4px, rgba(0, 0, 0, 0.07) 0px 4px 8px,
        rgba(0, 0, 0, 0.07) 0px 8px 16px, rgba(0, 0, 0, 0.07) 0px 16px 32px,
        rgba(0, 0, 0, 0.07) 0px 32px 64px;
    }

    .about_container:hover {
      background-color: #fff;
      padding: 2px;
    }

    .contact_box {
      width: 85vw;
      min-height: 35vh;
      margin: 22px auto;
      display: flex;
      flex-direction: row;
      align-items: center;
      justify-content: center;
      gap: 10px;
    }

    .left-side {
      width: 50%;
      padding: 10px;
    }

    .right-side {
      width: 50%;
      padding: 10px;
    }

    /* responsive */
    @media only screen and (max-width: 600px) {
      .about_container {
        display: block;
        width: 95%;
      }

      h1 {
        font-size: 19px;
        text-align: center;
      }

      h3 {
        font-size: 14px;
        text-align: center;
        text-align: center;
      }

      .contact_box {
        width: 100%;
        display: block;
      }

      .left-side {
        width: 100%;
        display: block;
      }

      .right-side {
        width: 100%;
        display: block;
      }
    }

    #home-footer-stu {
      @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
      font-family: "Poppins", sans-serif;
    }

    a {
      text-decoration: none !important;
    }

    a:hover {
      text-decoration: none !important;
      color: #7c4dff !important;
    }
  </style>
</head>

<body>
  <div class="contact_container">
    <div class="about_container">
      <h1>We’d love to hear from you</h1>

      <p>
        Have questions about our site, features, trials, or pricing? Need a
        demo? Our teams will help you.
      </p>
    </div>

    <div class="contact_box">
      <div class="left-side">
        <div class="address details">
          <i class="fas fa-map-marker-alt"></i>
          <div class="fs-1">Address</div>
          <div class="text-one">Surkhet, NP12</div>
          <div class="text-two">Birendranagar 06</div>
        </div>
        <div class="phone details">
          <i class="fas fa-phone-alt"></i>
          <div class="fs-1">Phone</div>
          <div class="text-one">+0098 9893 5647</div>
          <div class="text-two">+0096 3434 5678</div>
        </div>
        <div class="email details">
          <i class="fas fa-envelope"></i>
          <div class="fs-1">Email</div>
          <div class="text-one">codinglab@gmail.com</div>
          <div class="text-two">info.codinglab@gmail.com</div>
        </div>
      </div>

      <div class="right-side">
        <div class="topic-text fs-1">Get In Touch</div>
        <!-- <p>If you have any work from me or any types of quries related to my tutorial, you can send me message from here. It's my pleasure to help you.</p> -->
        <form action="contact_response.php" method="post">
          <div class="input-box">
            <input type="text" placeholder="Enter your name" name="name" required />
          </div>
          <div class="input-box">
            <input type="email" placeholder="Enter your email" name="email" required />
          </div>
          <div class="input-box message-box">
            <input type="text" placeholder="Enter your message" name="message" required />
          </div>
          <div class="button">
            <input type="submit" class="btn btn-primary" value="Send Now" name="send-feedback" />
          </div>
        </form>
      </div>
    </div>

    <!-- footer start -->
    <footer id="home-footer-stu" class="text-center text-lg-start" style="background-color: #3b3b3b">
      <!-- Section: Links  -->
      <section class="p-4">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold text-white">
              CAMPUS RECRUITMENT SYSTEM
            </h6>
            <hr class="mb-4 mt-0 d-inline-block mx-auto" />
            <p class="text-white">
              CRS enables colleges to automate end-to-end campus
              placements,helps employers hire young talent from across
              colleges in the country and enpowers students to access
              opportunities democratically
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold text-white">Useful links</h6>
            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
            <p>
              <a href="home.html" class="text-white">Home</a>
            </p>
            <p>
              <a href="Student/login.php" class="text-white">Student</a>
            </p>
            <p>
              <a href="Company/signin.php" class="text-white">Company</a>
            </p>
            <p>
              <a href="about-us.php" class="text-white">About us</a>
            </p>
            <p>
              <a href="contact.php" class="text-white">Contact us</a>
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold text-white">Contact</h6>
            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
            <p class="text-white">
              <i class="text-white fas fa-home mr-3"></i> New York, NY 10012,
              US
            </p>
            <p class="text-white">
              <i class="text-white fas fa-envelope mr-3"></i> info@example.com
            </p>
            <p class="text-white">
              <i class="text-white fas fa-phone mr-3"></i> + 01 234 567 88
            </p>
            <p class="text-white">
              <i class="text-white fas fa-print mr-3"></i> + 01 234 567 89
            </p>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </section>
      <!-- Section: Links  -->

      <!-- Copyright -->
      <div class="text-center p-3 text-white" style="background-color: rgba(0, 0, 0, 0.2)">
        © 2023 Copyright: CRS
      </div>
      <!-- Copyright -->
    </footer>
    <!-- footer  end-->
  </div>
  <!-- Section: Social media -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>

  <?php
  // if (isset($_GET['sent'])) {
  //   $sent = $_GET['sent'];
  //   if ($sent == 'success') {
  //     echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  //     Message sent successfully!
  //     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  //   </div>';
  //   } else if ($sent == 'error') {
  //     echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  //     Message failed to send!
  //     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  //   </div>';
  //   }
  // }

  if (isset($_SESSION['msg'])) {
    echo "<script>
  Toastify({
    text: '" . $_SESSION['msg'] . "',
    duration: 3000,
    newWindow: true,
    gravity: 'top',
    position: 'right',
    backgroundColor: '" . ($_SESSION['msg_type'] == 'success' ? '#33cc33' : '#cc0000') . "'
  }).showToast();
</script>";
    unset($_SESSION['msg']);
    unset($_SESSION['msg_type']);
  }

  // $_SESSION['msg_type']; // or 'danger' if email failed to send
  // $_SESSION['msg'] = 'Message sent successfully!'; // or 'Message failed to send.'


  ?>
</body>

</html>