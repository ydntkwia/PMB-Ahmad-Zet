<!DOCTYPE html>
<html lang="en">

<head>
	<?php 
	$this->load->view('admin/fitur/head');
	?>
	<?php
	foreach($data as $data){
		$merk[] = $data->status;
		$stok[] = (int) $data->jumlah;
	}
	?>
</head>

<body onload="waktu()">
	<?php 
	$this->load->view('admin/fitur/kepala');
	$this->load->view('admin/fitur/sidebar');
	?>

	<div class="page-wrapper">
		<div class="container-fluid">
			<div class="row heading-bg">
				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					<h5 class="txt-dark mobile-judul">Laporan Pendaftaran</h5>
				</div>
				<!-- Breadcrumb -->
				<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url() ?>admin">Dashboard</a></li>
						<li><a href="<?php echo base_url() ?>laporan">Laporan Pendaftaran</a></li>
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
			?>
			<div class="row">
				<div class="col-md-8">
					<div class="panel panel-default card-view">
						<div class="panel-heading">
							<div class="pull-left">
								<h6 class="panel-title txt-dark">Grafik Pendaftaran</h6>
								<div class="w-100 h-1-px blue-5-bg"></div>
							</div>
							<div class="clearfix"></div>
							<div class="h-50-px"></div>
							<div class="row">
								<div class="col-md-8 col-xs-12">
									<div class="table-responsive">
										<table class="table">
											<tr>
												<td>
													<canvas id="chart" width="500" height="300"></canvas>
												</td>
											</tr>
										</table>
									</div>
								</div>
								<div class="col-md-4 col-xs-12">
									<table style="width: 100%">
										<tr>
											<td class="fw-6" colspan="3" style="width: 100%;">&nbsp;&nbsp;Keterangan</td>
										</tr>
										<?php
										foreach ($data2 as $data) {
											?>
											<tr>
												<td width="40%">&nbsp;&nbsp;<?php echo $data->status ?></td>
												<td>&nbsp;:&nbsp;</td>
												<td><?php echo $data->jumlah ?>&nbsp;orang</td>
											</tr>
											<?php										 
										} 
										?>
									</table>
									<div class="h-10-px"></div>
									<div class="h-1-px w-100 grey-5-bg"></div>
									<div class="h-10-px"></div>
									<table style="width: 100%">
										<tr>
											<td class="fw-6" colspan="3" style="width: 100%;display: none;">&nbsp;&nbsp;</td>
										</tr>
										<?php
										foreach ($data3 as $data) {
											?>
											<tr>
												<td width="40%">&nbsp;&nbsp;Total</td>
												<td>&nbsp;:&nbsp;</td>
												<td><?php echo $data->jumlah ?>&nbsp;orang</td>
											</tr>
											<?php										 
										} 
										?>
									</table>	
									<div class="h-10-px"></div>
									<div class="h-1-px w-100 grey-5-bg"></div>
									<div class="h-10-px"></div>
									<a href="<?php echo base_url() ?>Admin/cetak_jm" class="btn btn-primary w-100"><i class="fa fa-print"></i>&nbspCetak Laporan</a>
								</div>	
								<div class="col-md-3"></div>
							</div>
							<div class="h-50-px"></div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="panel panel-default card-view">
						<div class="panel-heading">
							<div class="pull-left">
								<h6 class="panel-title txt-dark">Cetak Data</h6>
								<div class="w-100 h-1-px blue-5-bg"></div>
							</div>
							<div class="clearfix"></div>
							<div class="h-10-px"></div>
							<form action="<?php echo base_url() ?>Admin/cetak_jd" method="POST">
								<div class="form-group">
									<div class="col-sm-12">
										<select class="form-control" name="id_status">
											<option value="null">-Pilih-</option>
											<?php 
											foreach ($status as $key) {
												?>
												<option value="<?php echo $key->id_status ?>"> <?php echo $key->status ?></option>
												<?php
											}
											?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-12">
										<div class="h-15-px"></div>
										<button class="btn btn-primary" type="submit"><i class="fa fa-print"></i>&nbsp;Cetak Data</button>
									</div>
								</div>
							</form>
						</div>
						<div class="panel-wrapper collapse in">
							<div class="panel-body">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php 
		$this->load->view('admin/fitur/footer');
		$this->load->view('admin/fitur/kaki');
		?>
		<script type="text/javascript" src="<?php echo base_url().'assets/chartjs/chart.min.js'?>"></script>
		<script>
			var lineChartData = {
				options: { 
					responsive: true,
					maintainAspectRatio: true, 
				},
				labels : <?php echo json_encode($merk);?>,
				datasets : 
				[
				{
					fillColor: "rgba(60,141,188,0.9)",
					strokeColor:"rgba(60,141,188,0.8)", 
					pointColor: "#3b8bba", pointStrokeColor: "#fff",
					pointHighlightFill: "#fff",
					pointHighlightStroke: "rgba(152,235,239,1)",
					data: <?php echo json_encode($stok);?> 
				}
				]
			}
			var myLine = new Chart(document.getElementById("chart").getContext("2d")).Line(lineChartData);
		</script>
	</body>
	</html>