<?php
include_once "includes/_header.php";
?>


<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Education Details</h1>
  <p class="mb-1">Please fill out your education details.</p>
  <button type="button" class="btn btn-primary mb-2" id="add_stu_data">
    Add Details
  </button>

  <!-- Education details added success -->

  <?php if (isset($_SESSION['s_insert_status']) && $_SESSION['s_insert_status'] != '') {
    // echo "<h5>" . $_SESSION['s_insert_status'] . "</h5>";
    echo "<div class='alert alert-info alert-dismissible fade show' role='alert'>
      " . $_SESSION['s_insert_status'] . " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
    unset($_SESSION['s_insert_status']);
  } ?>
  <!-- ! Education details added success -->

  <!-- Education Details -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">
        Education Details
      </h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Education Level</th>
              <th>Board / University</th>
              <th>Passing Year</th>
              <th>Percentage</th>
              <th>CGPA</th>
              <th style="display: none;"></th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>

            <?php
            $stu_id = $_SESSION['id'];
            $query_get = "SELECT * FROM `stu_education` WHERE stu_id = $stu_id";
            $run = $conn->query($query_get);
            if ($run->num_rows > 0) {
              while ($row = $run->fetch_assoc()) { ?>
                <tr>
                  <td>
                    <?php echo $row['edu_level']; ?>
                  </td>
                  <td>
                    <?php echo $row['edu_university']; ?>
                  </td>
                  <td>
                    <?php echo $row['edu_pass']; ?>
                  </td>
                  <td>
                    <?php echo $row['edu_percentage'] . "%"; ?>
                  </td>
                  <td>
                    <?php echo $row['edu_cgpa']; ?>
                  </td>
                  <td class="ed_id" style="display: none;">
                    <?php echo $row['ed_id']; ?>
                  </td>
                  <td>
                    <button type="button" class="btn btn-info mx-2 edit_edu" id="edit_edu">Edit</button> |
                    <button type="button" class="btn btn-danger mx-2 delete_btn" name="btnDelete">Delete</button>
                  </td>
                </tr>

              <?php }
            }
            ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<!-- Add Details Modal -->
<div class="modal fade" id="stuEduModal" tabindex="-1" aria-labelledby="stuEduModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="stuEduModalLabel"> </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="edu_form" action="action.php" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="education_level" class="col-form-label">Education Level:</label>
            <input type="text" class="form-control" id="education_level" name="education_level"
              placeholder="E.g., B.Tech" required />
          </div>
          <div class="form-group">
            <label for="board_name" class="col-form-label">Board / University:</label>
            <input type="text" class="form-control" id="board_name" name="board_name" placeholder="University Name"
              required />
          </div>
          <div class="form-group">
            <label for="passing_year" class="col-form-label">Passing Year:</label>
            <input type="text" class="form-control" id="passing_year" name="passing_year" placeholder="yyyy" required />
          </div>
          <div class="form-group">
            <label for="percentage" class="col-form-label">Percentage:</label>
            <input type="text" class="form-control" id="percentage" name="percentage" placeholder="100" required />
          </div>
          <div class="form-group">
            <label for="cgpa" class="col-form-label">CGPA:</label>
            <input type="text" class="form-control" id="cgpa" name="cgpa" placeholder="10.0" required />
          </div>

        </div>
        <div class="modal-footer">
          <input type="hidden" name="stu_id" id="stu_id">
          <input type="hidden" name="action" id="action">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            Close
          </button>
          <button type="submit" class="btn btn-primary" id="action_btn">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End Add Details Modal -->


<!-- Delete Modal -->

<div class="modal fade" id="delEduModal" tabindex="-1" aria-labelledby="delEduModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="delEduModalLabel">Delete Education Data</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="action.php" method="post">
        <div class="modal-body">
          <input type="hidden" name="del_id" id="del_id">
          <p>Are you sure you want to delete this data?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger" name="del_ed">Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- ! Delete Modal -->




<?php include_once "includes/_footer.php"; ?>