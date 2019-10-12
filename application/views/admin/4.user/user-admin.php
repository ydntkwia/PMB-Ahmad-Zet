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
					<h5 class="txt-dark mobile-judul">User Admin</h5>
				</div>
				<!-- Breadcrumb -->
				<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url() ?>admin">Dashboard</a></li>
						<li><a class="active"><span>User</span></a></li>
						<li><a href="<?php echo base_url() ?>user-admin">User Admin</a></li>
					</ol>
				</div>
				<!-- /Breadcrumb -->
			</div>
			<?php  
			if ($this->session->flashdata('error') != '' ) 
			{ 
				?>
				<div class="alert red-7-bg alert-dismissible show" role="alert">
					<strong>Alert!</strong> <?php echo $this->session->userdata('error'); ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php
			}
			if ($this->session->flashdata('berhasil') != '' ) 
			{ 
				?>
				<div class="alert green-7-bg alert-dismissible show" role="alert">
					<strong>Alert!</strong> <?php echo $this->session->userdata('berhasil'); ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php
			}
			?>
			<div class="row">
				<div class="col-md-8">
					<div class="panel panel-default card-view">
						<div class="table-wrap">
							<div class="table-responsive">
								<table id="datable_1" class="table table-hover display  pb-30">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama</th>
											<th>Username (NIDN)</th>
											<th>Level</th>
											<th width="180px">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($admin as $key) {
											?>
											<tr>
												<td><?php echo $no ?></td>
												<td><?php echo $key->nama; ?></td>
												<td><?php echo $key->nidn; ?></td>
												<td><?php echo $key->id_level; ?></td>
												<td>
													<a class=" btn btn-success" style="color: white" href="<?php echo base_url() ?>Admin/edit_admin/<?php echo $key->id_admin?>"><i class="fa fa-pencil"></i></a>
													<?php
													$where = $key->id_level;
													if ($where == '1') {
													}else{ ?>
														<a class="btn btn-info" style="color: white" data-toggle="modal" data-target="#delete<?php echo $key->id_admin?>"><i class="fa fa-trash"></i></a>
														<div class="modal animated fadeInDown" style="animation-duration: 0.5s" id="delete<?php echo $key->id_admin?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
															<div class="modal-dialog" role="document">
																<div class="modal-content">
																	<div class="modal-body pt-35-px pb-35-px">
																		<center>
																			<span class="f-20-px">Hapus Admin?</span>
																		</center>
																	</div>
																	<div class="modal-footer">
																		<center>
																			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																			<button type="button" class="btn btn-danger" onclick="window.location.href='<?php echo base_url() ?>Admin/delete_admin/<?php echo $key->nidn?>'">Delete</button>
																		</center>
																	</div>
																</div>
															</div>
														</div>
														<?php
													}
													?>
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
				<div class="col-md-4">
					<div class="panel panel-default card-view">
						<div class="panel-heading">
							<div class="pull-left">
								<h6 class="panel-title txt-dark">Tambah Admin</h6>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="panel-wrapper collapse in">
							<div class="panel-body">
								<div class="form-wrap">
									<form action="<?php echo base_url() ?>Admin/tambah_admin" method="POST" enctype="multipart/form-data">
										<div class="form-group">
											<label class="control-label mb-10 text-left">Nama</label>
											<input required="" name="nama" type="text" class="form-control" value="" autocomplete="off" onkeypress="input_char(event)">
										</div>
										<div class="form-group">
											<label class="control-label mb-10 text-left">Username (NIDN)</label>
											<input required="" name="nidn" type="text" class="form-control" value="" onkeypress="input_number(event)" autocomplete="off">
										</div>
										<div class="form-group">
											<label class="control-label mb-10 text-left">Password</label>
											<input required="" name="password" type="password" class="form-control" value="" autocomplete="off">
										</div>

										<div class="form-group mt-30 mb-30">
											<label class="control-label mb-10 text-left">Level</label>
											<select required="" class="form-control" name="id_level">
												<option value="null">-Pilih-</option>
												<?php 
												foreach ($level as $key) {
													?>
													<option value="<?php echo $key->id_level ?>" <?php if($key->id_level=='1'){echo"style='display:none'";}elseif($key->id_level=='4'){echo"style='display:none'";} ?>><?php echo $key->level ?></option>
													<?php
												}
												?>
											</select>
										</div>
										<div class="form-group">
											<label class="control-label mb-10 text-left">Foto</label>
											<input required="" name="berkas" type="file" class="form-control" value="" autocomplete="off">
										</div>
										<div class="form-group">
											<button type="submit" class="btn btn-success">Simpan</button>
											<button type="reset" class="btn btn-danger">Reset</button>
										</div>
									</form>
								</div>
							</div>
						</div>
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