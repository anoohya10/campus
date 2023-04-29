<?php include_once "includes/_header.php"; ?>

<?php
function ageCal($dob)
{
  if (!empty($dob)) {
    $bday = new DateTime($dob);
    $today = new DateTime('today');
    $age = $bday->diff($today)->y;
    return $age;
  } else {
    return 0;
  }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Student Profile</h1>

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
      include_once "../../config.php";
      $id = $_SESSION["id"];
      $sql_profile = "select * from student_login WHERE id='$id'";
      $res = $conn->query($sql_profile);
      if ($res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
          ?>

          <form action="update_stu.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="full_name" class="form-label">Full Name</label>
              <input type="text" class="form-control" id="full_name" name="full_name" readonly
                value="<?php echo $row['sname']; ?>" />
            </div>
            <div class="mb-3">
              <label for="email_id" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email_id" name="email_id" readonly
                value="<?php echo $row['semail']; ?>" />
            </div>
            <div class="mb-3">
              <label for="mobile_number" class="form-label">Mobile Number</label>
              <input type="text" class="form-control" id="mobile_number" name="mobile_number" readonly
                value="<?php echo $row['smobile']; ?>" />
            </div>
            <div class="mb-3">
              <label for="student_id" class="form-label">Student ID</label>
              <input type="text" class="form-control" id="student_id" name="student_id" readonly
                value="<?php echo $row['sroll']; ?>" />
            </div>
            <div class="mb-3">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" id="address" name="address" required
                value="<?php echo $row['address']; ?>" />
            </div>
            <div class="mb-3">
              <label for="photo" class="form-label">Photo</label>
              <input type="file" class="form-control" id="photo" name="profile_photo" required /> <br />
              <img class="rounded-circle" style="width: 150px; height: 150px; object-fit: cover;"
                src="<?php echo getImage($row['profile_img']); ?>" />
            </div>
            <div class="mb-3">
              <label for="student_age" class="form-label">Age</label>
              <input type="text" class="form-control" id="student_age" readonly
                value="<?php echo ageCal($row['stu_dob']); ?>" />
            </div>
            <div class="mb-3">
              <label for="datepicker" class="form-label">Date Of Birth</label>
              <input type="text" class="form-control" id="datepicker" name="student_dob" required
                value="<?php echo $row['stu_dob']; ?>" placeholder="mm/dd/yyyy" />
            </div>
            <div class="mb-3">
              <label for="reg_date" class="form-label">Registration Date</label>
              <input type="datetime-local" class="form-control" id="reg_date" name="reg_date" readonly
                value="<?php echo $row['created_at']; ?>" />
            </div>
            <button type="submit" name="update_student" class="btn btn-primary">Update</button>
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