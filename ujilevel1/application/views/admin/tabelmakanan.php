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
						<h1 class="h3 mb-0 text-gray-800">Tabel Data Makanan</h1>
						<a href="<?php echo site_url('dashboard/tambahdata');?>"
							class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
								class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
					</div>

					<!-- DataTales Example -->
					<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-primary">Tabel</h6>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>ID Makanan</th>
											<th>Nama Makanan</th>
											<th>Harga</th>
											<th>Status Makanan</th>
											<th>Foto</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<?php 
                          foreach ($masakan as $datas)
                          {
                      ?>
											<td><?php echo $datas->id_masakan;?></td>
											<td><?php echo $datas->nama_masakan;?></td>
											<td><?php echo $datas->harga;?></td>
											<td><?php echo $datas->status_masakan;?></td>
											<td><img src="<?php echo base_url(); ?>assets/foto/<?php echo $datas->foto;?>" width="90px"></td>
											<td>
												<?php echo anchor('dashboard/hapus_makanan/'.$datas->id_masakan,'<button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                          <i class="fas fa-trash fa-sm text-white-50"></i> Delete</button>')?>

												<button class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal"
													data-target="#editmodal"><i class="fas fa-pen fa-sm text-white-50"></i> Edit</button>
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
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

	<!-- Modal Edit Data-->
	<div class="modal" id="editmodal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit Data Makanan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php echo form_open_multipart('dashboard/update_makanan'); ?>
				    <div class="modal-body">
						<div class="form-group">
							<label for="exampleFormControlInput1">ID Makanan</label>
							<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Tulis nama masakan..."
								name="idd" value="<?php echo $datas->id_masakan;?>">
						</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="exampleFormControlInput1">Nama Masakan</label>
							<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Tulis nama masakan..."
								name="masakan" value="<?php echo $datas->nama_masakan;?>">
						</div>
						<div class="form-group">
							<label for="exampleFormControlInput1">Harga</label>
							<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Tulis harga"
								name="hargaa" value="<?php echo $datas->harga;?>">
						</div>
						<div class="form-group">
							<label for="exampleFormControlInput1">Status</label>
							<input type="text" class="form-control" id="exampleFormControlInput1" name="statuss" value="<?php echo $datas->status_masakan;?>">
						</div>
						<div class="form-group">
							<label for="exampleFormControlFile1">Foto</label>
							<input type="file" class="form-control-file" id="exampleFormControlFile1" name="filess">
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Save changes</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
          <?php echo form_close(); ?>
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
