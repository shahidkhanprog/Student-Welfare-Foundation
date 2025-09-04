</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2025</span>
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
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you Sure?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>


            <div class="modal-body">Are you sure to Logout Mr. <?php echo $LoginAdminName; ?></div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="./Logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>


<!-- togglePassword  Start -->
<script>
    document.getElementById('togglePassword').addEventListener('click', function(e) {
        const passwordInput = document.getElementById('Teach_Pass');
        const icon = e.currentTarget;
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });
</script>
<!-- togglePassword  end -->

<script>
    document.getElementById('togglePassword').addEventListener('click', function(e) {
        const passwordInput = document.getElementById('Std_Pass');
        const icon = e.currentTarget;
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });
</script>
<!-- __________________________________________________________Dashboard Strt______________________________________________________________________ -->

<!-- Bootstrap core JavaScript-->
<script src="Assets/vendor/jquery/jquery.min.js"></script>
<script src="Assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="Assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="Assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="Assets/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="Assets/js/demo/chart-area-demo.js"></script>
<script src="Assets/js/demo/chart-pie-demo.js"></script>

<!-- Page level custom scripts -->
<script src="Assets/js/demo/datatables-demo.js"></script>


<!-- __________________________________________________________Dashboard end______________________________________________________________________ -->

<!-- __________________________________________________________Search || table end______________________________________________________________________ -->

<!-- Page level plugins -->
<script src="Assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="Assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>


<!-- __________________________________________________________Search || table end______________________________________________________________________ -->

</body>

</html>