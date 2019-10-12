<!DOCTYPE html>
<html lang="en">

<head>
	<?php 
	$this->load->view('admin/fitur/head');
	?>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/ckeditor/ckeditor.js"></script>
</head>

<style type="text/css">
	#cke_1_contents{
		height: 771px !important;
	}
</style>
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
						<li><a class="active"><span>Artikel</span></a></li>
						<li><a href="<?php echo base_url() ?>artikel-tambahs">tambah</a></li>
					</ol>
				</div>
				<!-- /Breadcrumb -->
			</div>
			<?php  
			if ($this->session->flashdata('edit_artikel') != '' ) 
			{ 
				?>
				<div class="alert green-7-bg alert-dismissible show" role="alert">
					<strong>Alert!</strong> <?php echo $this->session->userdata('edit_artikel'); ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php
			}
			?>
			<div class="row">
				<?php 
				foreach ($edit as $key) {
					?>
					<form action="<?php echo base_url() ?>Admin/aksi_edit_artikel" method="POST" enctype="multipart/form-data"> 
						<div class="col-md-8">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Form Isi Artikel</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<textarea name="isi" class="ckeditor" id="editor1">
									<?php echo $key->isi ?>
								</textarea>
								<div class="h-20-px"></div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Form Artikel</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="form-wrap">
											<div class="form-group" style="display: none;">
												<label class="control-label mb-10 text-left">Id_artikel</label>
												<input required="" name="id_artikel" type="text" class="form-control" value="<?php echo $key->id_artikel ?>" autocomplete="off" >
											</div>
											<div class="form-group">
												<label class="control-label mb-10 text-left">Judul</label>
												<input required="" name="judul" type="text" class="form-control" value="<?php echo $key->judul ?>" autocomplete="off" >
											</div>
											<div class="form-group">
												<label class="control-label mb-10 text-left">Tanggal</label>
												<input required="" name="tanggal" type="date" class="form-control" value="<?php echo $key->tanggal ?>" autocomplete="off" >
											</div>
											<div class="form-group mt-20 mb-30">
												<label class="control-label mb-10 text-left">Kategori</label>
												<select required="" class="form-control" name="id_kategori">
													<?php  
													$pilih = $key->id_kategori;
													foreach ($kategori as $key2) 
													{
														?>
														<option value="<?php echo $key2->id_kategori ?>" <?php if ($key2->id_kategori==$pilih) { echo "selected";} ?>><?php echo $key2->kategori ?></option>
														<?php
													}
													?>
												</select>
											</div>
											<div class="form-group">
												<label class="control-label mb-10 text-left">Gambar Artikel</label>
												<input name="berkas" type="file" class="form-control">
											</div>
											<div class="form-group">
												<button type="submit" class="btn btn-success">Simpan</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">*Gambar Hero Sebelumnya</h6>
									</div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div style="background: url('<?php echo base_url()?>assets/img/artikel/<?php echo $key->gambar?>') no-repeat;background-size: cover !important" class="img-edit"></div>
									</div>
								</div>
							</div>
						</div>
					</form>
					<?php
				}
				?>
			</div>
		</div>
		<!-- start to edit -->

		<!-- end of content -->


		<?php 
		$this->load->view('admin/fitur/footer');
		$this->load->view('admin/fitur/kaki');
		?>



		<script type="text/javascript">
			CKEDITOR.replace( 'editor1' );
		</script>

	</body>
	</html>