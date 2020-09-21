<?php $this->load->view('template/admin/header');?>
<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<?php $this->load->view('template/admin/sidebar');?>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<?php $this->load->view('template/admin/topbar');?>
				<!-- End of Topbar -->

				<!-- Begin Page Content -->
				<div class="container-fluid">

					<!-- Page Heading -->
					<div class="d-sm-flex align-items-center justify-content-between mb-4">
						<h1 class="h3 mb-0 text-gray-800">Tambah Data Makanan</h1>
						<a href="<?php echo site_url('dashboard/adminmakanan');?>" class="d-none d-sm-inline-block btn btn-sm btn-outline-secondary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Kembali</a>
					</div>

					<!-- DataTales Example -->
					<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-primary">Tabel</h6>
						</div>
						<div class="card-body">
                        
                        <?php echo form_open_multipart('dashboard/simpan_makanan'); ?>
								
								<div class="form-group">
									<label for="exampleFormControlInput1">ID Makanan</label>
									<input type="text" class="form-control" id="exampleFormControlInput1"
										placeholder="Tulis nama masakan..." name="idd">
								</div>
								<div class="form-group">
									<label for="exampleFormControlInput1">Nama Masakan</label>
									<input type="text" class="form-control" id="exampleFormControlInput1"
										placeholder="Tulis nama masakan..." name="food">
								</div>
								<div class="form-group">
									<label for="exampleFormControlInput1">Harga</label>
									<input type="text" class="form-control" id="exampleFormControlInput1"
										placeholder="Tulis harga" name="price">
								</div>
								<div class="form-group">
									<label for="exampleFormControlInput1">Status</label>
									<input type="text" class="form-control" id="exampleFormControlInput1" name="stat">
								</div>
                                <div class="form-group">
									<label for="exampleFormControlFile1">Foto</label>
									<input type="file" class="form-control-file" id="exampleFormControlFile1" name="files">
								</div>
								<br>
								<button type="submit" class="btn btn-outline-danger ">Tambah</button>
                            <?php echo form_close(); ?>
						</div>
					</div>

				</div>
				<!-- /.container-fluid -->

			</div>
			<!-- End of Main Content -->

			<!-- Footer -->
			<?php $this->load->view('template/admin/footer');?>
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
				<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<a class="btn btn-primary" href="login.html">Logout</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Bootstrap core JavaScript-->
	<script src="<?php echo base_url()?>assets/admin/vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url()?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?php echo base_url()?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="<?php echo base_url()?>assets/admin/js/sb-admin-2.min.js"></script>

	<!-- Page level plugins -->
	<script src="<?php echo base_url()?>assets/admin/vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url()?>assets/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

	<!-- Page level custom scripts -->
	<script src="<?php echo base_url()?>assets/admin/js/demo/datatables-demo.js"></script>

</body>

</html>
