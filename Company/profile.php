<?php include_once("includes/_header.php"); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Company Profile</h1>

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
      include_once "../config.php";
      $id = $_SESSION["id"];
      $sql_profile = "SELECT * from cmp_login WHERE id='$id'";
      $res = $conn->query($sql_profile);
      if ($res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
      ?>

          <form action="profile_update.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="cmp_name" class="form-label">Company Name</label>
              <input type="text" class="form-control" name="cmp_name" value="<?php echo $row['cmp_name']; ?>" required />
            </div>
            <div class="mb-3">
              <label for="contact_person" class="form-label">Contact Person Name</label>
              <input type="text" class="form-control" name="contact_person" value="<?php echo $row['p_name']; ?>" required />
            </div>
            <div class="mb-3">
              <label for="cmp_url" class="form-label">Company URL</label>
              <input type="url" class="form-control" name="cmp_url" value="<?php echo $row['cmp_url']; ?>" required />
            </div>
            <div class="mb-3">
              <label for="cmp_address" class="form-label">Company Address</label>
              <input type="text" class="form-control" name="cmp_address" value="<?php $val = ($row['cmp_address'] != null or $row['cmp_address'] != '') ? $row['cmp_address'] : null;
                                                                                echo $val; ?>" required />
            </div>
            <div class="mb-3">
              <label for="mobile_num" class="form-label">Mobile Number</label>
              <input type="text" class="form-control" name="mobile_num" value="<?php echo $row['mobile']; ?>" readonly />
            </div>
            <div class="mb-3">
              <label for="cmp_email" class="form-label">Email address</label>
              <input type="email" class="form-control" name="cmp_email" value="<?php echo $row['cemail']; ?>" readonly />
            </div>
            <div class="mb-3">
              <label for="student_age" class="form-label">Company Logo</label>
              <input type="file" class="form-control" name="cmp_logo" required /><br>
              <img class="rounded-circle" style="width: 150px; height: 150px; object-fit: cover;" src="<?php echo getCmpImage($row['cmp_logo']); ?>" />
            </div>
            <div class="mb-3">
              <label for="cmp_reg_date" class="form-label">Company Registration Date</label>
              <input type="text" id="cmp_reg_date" class="form-control" name="cmp_reg_date" value="<?php echo $row['cmp_reg_date']; ?>" required placeholder="mm/dd/yyyy" />
            </div>
            <button type="submit" name="update_cmp" class="btn btn-primary">Update</button>
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
<?php include_once("includes/_footer.php"); ?>