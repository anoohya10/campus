<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; 2023 CRS</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->
</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Select "Logout" below if you are ready to end your current session.
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">
                    Cancel
                </button>
                <a class="btn btn-primary" href="../logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="./../../bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"
    integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<!-- restrict date of birth below 18 years -->
<script>

    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }

    $(document).ready(function () {
        $('#datepicker').datepicker({
            changeMonth: true,
            changeYear: true,
            maxDate: '-18y'
        });
    });

    // education form page
    $('#add_stu_data').click(function () {
        $('#stuEduModalLabel').text('Add Education Details');
        $('#edu_form')[0].reset();
        $('#action').val('Add');
        $('#action_btn').text('Add');
        $('#stuEduModal').modal('show');
    });

    $('.edit_edu').click(function (e) {
        e.preventDefault();
        var ed_id = $(this).closest('tr').find('.ed_id').text();

        $('#stuEduModalLabel').text('Edit Education Details');
        $('#action').val('Edit');
        $('#action_btn').text('Update');

        $.ajax({
            type: "POST",
            url: "action.php",
            data: {
                'check_edit': true,
                'ed_id': ed_id,
            },
            success: function (response) {
                $.each(response, function (key, value) {
                    $('#stu_id').val(value['ed_id']);
                    $('#education_level').val(value['edu_level']);
                    $('#board_name').val(value['edu_university']);
                    $('#passing_year').val(value['edu_pass']);
                    $('#percentage').val(value['edu_percentage']);
                    $('#cgpa').val(value['edu_cgpa']);
                });
                $('#stuEduModal').modal('show');
            }
        });

    });

    $('.delete_btn').click(function (e) {
        e.preventDefault();
        var ed_id = $(this).closest('tr').find('.ed_id').text();
        $('#del_id').val(ed_id);
        // console.log(ed_id);
        $('#delEduModal').modal('show');
    });

    // !! education form page

</script>



</body>

</html>