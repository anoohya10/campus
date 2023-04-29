<?php include_once "includes/_header.php"; ?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Education Details -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">
        All Registered Companies
      </h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>S.NO.</th>
              <th>Company Name</th>
              <th>Contact Number</th>
              <th>Registered Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $q = "SELECT * FROM `cmp_login`";
            $result = $conn->query($q);
            if ($result->num_rows > 0) {
              $sno = 1;
              while ($row = $result->fetch_array()) { ?>
                <tr>
                  <td>
                    <?php echo $sno++; ?>
                  </td>
                  <td>
                    <?php echo ucwords($row['cmp_name']); ?>
                  </td>
                  <td>
                    <?php echo $row['mobile']; ?>
                  </td>
                  <td>
                    <?php echo $row['created_at']; ?>
                  </td>
                  <td><a href="company_details.php?cmp_id=<?php echo $row['id']; ?>" class="btn btn-info">View Details</a></td>
                </tr>
            <?php }
            } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<?php include_once "includes/_footer.php"; ?>