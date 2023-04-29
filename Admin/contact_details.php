<?php include_once("includes/_header.php");


$msg = "";

if (isset($_POST['upContactBtn'])) {
    $upName = $_POST['uName'];
    $upEmail = $_POST['uEmail'];
    if ($upName != '' && $upEmail != '') {
        $query = "UPDATE `admin_contact` SET `name`='$upName',`email`='$upEmail' WHERE id=1";
        $res = $conn->query($query);
        if ($res) {
            $msg = "Updated Successfully";
        } else {
            $msg = "Updated Failed";
        }
    }
}
?>
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- alert box -->
    <?php if ($msg != null && $msg != '') {
        echo "<div class='alert alert-info alert-dismissible fade show' role='alert'>
      " . $msg . " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        $msg = '';
    } ?>
    <!-- ! alert box -->

    <!-- Vacancy Details Details -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h1 class="h3 mb-2 text-gray-800">Add Contact Details</h1>
        </div>
        <div class="card-body">

            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                <?php $q = "SELECT * FROM `admin_contact` WHERE id=1";
                $result = $conn->query($q);
                $row = $result->fetch_assoc();
                $name = $row['name'];
                $email = $row['email']; ?>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="uName" value="<?php echo $name; ?>" required placeholder="my good name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="uEmail" value="<?php echo $email; ?>" required placeholder="name@example.com">
                </div>
                <div class="mb-3 text-center">
                    <button type="submit" name="upContactBtn" class="btn btn-primary">Update</button>
                </div>
            </form>


        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<!-- footer -->
<?php include_once("includes/_footer.php"); ?>