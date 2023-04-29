<?php include_once("includes/_header.php");
$msg = "";

if (isset($_POST['submit-about'])) {
    $page_content = $_POST['about_editor'];
    if ($page_content != '' && $page_content != null) {
        $query = "UPDATE `contents` SET `content`='$page_content' WHERE content_type='about'";
        $res = $conn->query($query);
        if ($res) {
            $msg = "Updated Successfully";
        } else {
            $msg = "Updated Failed";
        }
    }
}
?>
<script src="ckeditor/ckeditor.js"></script>
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
            <h1 class="h3 mb-2 text-gray-800">About Us Page Editor</h1>
        </div>
        <div class="card-body">

            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                <?php $q = "SELECT content FROM `contents` WHERE content_type='about'";
                $result = $conn->query($q);
                $row = $result->fetch_assoc();
                $content = $row['content']; ?>
                <textarea name="about_editor" id="about_editor" rows="10" cols="80"><?php echo $content; ?></textarea>
                <script>
                    CKEDITOR.replace('about_editor');
                </script>

                <div class="text-center m-3">
                    <input type="submit" class="btn btn-secondary" value="Update" name="submit-about">
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