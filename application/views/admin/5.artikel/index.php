<!DOCTYPE html>
<html lang="en">

<head>
	<?php 
	$this->load->view('admin/fitur/head');
	?>
</head>

<body onload="waktu()">
	<?php 
	$this->load->view('admin/fitur/kepala');
	$this->load->view('admin/fitur/sidebar');
	?>

	<!-- start content -->
	<div class="page-wrapper">
		<div class="container-fluid">
			<div class="row heading-bg">
				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					<h5 class="txt-dark mobile-judul">User Mahasiswa</h5>
				</div>
				<!-- Breadcrumb -->
				<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url() ?>admin">Dashboard</a></li>
						<li><a class="active"><span>Artikel</span></a></li>
						<li><a href="<?php echo base_url() ?>user-mahasiswa">Kelola</a></li>
					</ol>
				</div>
				<!-- /Breadcrumb -->
			</div>
			<?php  
			if ($this->session->flashdata('hapus_artikel') != '' ) 
			{ 
				?>
				<div class="alert green-7-bg alert-dismissible show" role="alert">
					<strong>Alert!</strong> <?php echo $this->session->userdata('hapus_artikel'); ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php
			}
			?>
			<div class="row">
				<div class="col-12">
					<div class="panel panel-default card-view">
						<div class="table-wrap">
							<div class="table-responsive">
								<table id="datable_1" class="table table-hover display  pb-30">
									<thead>
										<tr>
											<th>No</th>
											<th>Judul Artikel</th>
											<th>Kategori</th>
											<th>Tanggal Publish</th>
											<th width="200px">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($artikel as $key) {
											?>
											<tr>
												<td><?php echo $no ?></td>
												<td><?php echo $key->judul; ?></td>
												<td><?php echo $key->kategori; ?></td>
												<td><?php echo shortdate_indo($key->tanggal); ?></td>
												<td>
													<a href="<?php echo base_url() ?>Admin/update_artikel/<?php echo $key->id_artikel ?>" class=" btn btn-success" style="color: white"><i class="fa fa-pencil"></i></a>
													<a class=" btn btn-info" style="color: white" data-toggle="modal" data-target="#delete<?php echo $key->id_artikel ?>"><i class="fa fa-trash"></i></a>

													<!-- modal delete -->
													<div class="modal animated fadeInDown" style="animation-duration: 0.5s" id="delete<?php echo $key->id_artikel ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
														<div class="modal-dialog" role="document">
															<div class="modal-content">
																<div class="modal-body pt-35-px pb-35-px">
																	<center>
																		<span class="f-20-px">Hapus Artikel?</span>
																	</center>
																</div>
																<div class="modal-footer">
																	<center>
																		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																		<button type="button" class="btn btn-info" onclick="window.location.href='<?php echo base_url() ?>Admin/delete_artikel/<?php echo $key->id_artikel ?>'">Delete</button>
																	</center>
																</div>
															</div>
														</div>
													</div>
												</td>
											</tr>
											<?php
											$no++;
										} ?>
									</tbody>
								</table>
							</div>
						</div>
						<div class="h-20-px"></div>
					</div>
				</div>
			</div>
		</div>
		<!-- start to edit -->

		<!-- end of content -->


		<?php 
		$this->load->view('admin/fitur/footer');
		$this->load->view('admin/fitur/kaki');
		?>
	</body>
	</html>