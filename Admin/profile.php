<?php include_once "includes/_header.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Admin Profile</h1>

  <!-- Education Details -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">
        View or Update Profile
      </h6>
    </div>
    <div class="card-body">

      <!-- fetch data from database -->
      <?php
      $id = $_SESSION["id"];
      $sql_profile = "SELECT * from `admin` WHERE id='$id'";
      $res = $conn->query($sql_profile);
      if ($res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
      ?>

          <form action="update_admin_pf.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="full_name" class="form-label">Full Name</label>
              <input type="text" class="form-control" id="full_name" name="full_name" value="<?php echo $row['name']; ?>" required />
            </div>
            <div class="mb-3">
              <label for="email_id" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email_id" name="email_id" value="<?php echo $row['email']; ?>" required />
            </div>
            <div class="mb-3">
              <label for="photo" class="form-label">Photo</label>
              <input type="file" class="form-control pb-2" id="photo" name="profile_photo" /> <br />
              <img class="rounded-circle" style="width: 150px; height: 150px; object-fit: cover;" src="<?php echo getImage($row['profile_img']); ?>" />
            </div>
            <button type="submit" name="update_student" class="btn btn-primary m-3">Update</button>
          </form>

      <?php
        }
      }
      $conn->close();
      ?>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<!-- footer -->
<?php include_once "includes/_footer.php"; ?>