<?php include_once("includes/_header.php");
// Get job id from the view vacancies page
if (isset($_GET['cmp_id'])) {
    $c_id = $conn->real_escape_string($_GET['cmp_id']);
}

?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Job status alert box -->
    <?php if (isset($_SESSION['apply_status']) && $_SESSION['apply_status'] != '') {
        echo "<div class='alert alert-info alert-dismissible fade show' role='alert'>
      " . $_SESSION['apply_status'] . " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        unset($_SESSION['apply_status']);
    } ?>
    <!-- ! Job status alert box -->

    <!-- Vacancy Details Details -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h1 class="h3 mb-2 text-gray-800">Company Details</h1>
            <a href="reg_companies.php" class="btn btn-info px-3">Back</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                        <?php
                        $query_get = "SELECT * FROM cmp_login WHERE id = '$c_id'";
                        $run = $conn->query($query_get);
                        if ($run->num_rows > 0) {
                            while ($row = $run->fetch_assoc()) { ?>
                                <tr>
                                    <th>Company Name</th>
                                    <td>
                                        <?php echo ucwords($row['cmp_name']); ?>
                                    </td>
                                    <th>Company Person</th>
                                    <td>
                                        <a href="mailto:<?php echo $row['cemail']; ?>"><?php echo $row['p_name']; ?></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Company Url</th>
                                    <td>
                                        <?php echo $row['cmp_url']; ?>
                                    </td>
                                    <th>Company Address</th>
                                    <td>
                                        <?php echo ucwords($row['cmp_address']); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Mobile</th>
                                    <td>
                                        <?php echo $row['mobile']; ?>
                                    </td>
                                    <th>Company Email</th>
                                    <td>
                                        <a href="mailto:<?php echo $row['cemail']; ?>"><?php echo $row['cemail']; ?></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Company Logo</th>
                                    <td>
                                        <img width="150" height="150" src="../Company/img/profiles/<?php echo $row['cmp_logo']; ?>" alt="company-logo">
                                    </td>
                                    <th>Registration Date</th>
                                    <td>
                                        <?php echo $row['created_at']; ?>
                                    </td>
                                </tr>
                        <?php }
                        }
                        $conn->close();
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

<!-- footer -->
<?php include_once("includes/_footer.php"); ?>