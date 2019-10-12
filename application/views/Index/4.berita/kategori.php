<!doctype html>
<html lang="en">
<head>
	<?php 
	$this->load->view('Index/fitur/head');
	?>
	<link rel="stylesheet" href="<?php echo base_url()?>/assets/css/jquery.dataTables.min.css">
	<style type="text/css">
		.dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover{
			background: white !important;
			border: 1px solid #fbc044;
		}
		.dataTables_wrapper .dataTables_paginate .paginate_button{
			background: #fbc044 !important;
		}
		.ls-6{
			letter-spacing: 6px;
		}
		.t-un{
			text-decoration: underline;
		}
	</style>
</head>
<body data-spy="scroll" data-target=".navbar .in" class="has-loading-screen" >

	<?php 
	$this->load->view('Index/fitur/navbar');?>

	<div class="row grey-1-bg">
		<div class="col-md-12">
			<div class="container">
				<div class="h-100-px"></div>
				<div class="row">
					<div class="col-md-8">
						<div class="card">
							<div style="height:20px"></div>
							<div class="container">
								<font class="red-7-font f-bold f-20-px">BERITA</font>
								<div class="w-20 h-2-px red-6-bg mt-2-px"></div>
								<div class="h-20-px"></div>
								<div class="table-responsive">
									<table id="datable_2">
										<thead >
											<tr style="display: none;">
												<td>
													hallo
												</td>
											</tr>
										</thead>
										<tbody>
											<?php
											foreach ($artikell as $key) {
												?>
												<tr>
													<td>
														<div class="row">
															<span style="opacity: 0"><?php echo $key->id_artikel ?></span>
															<div class="col-12">
																<div class="f-center f-up ls-6"><a class="red-7-font" href="<?php echo base_url() ?>kategori/<?php echo $key->kategori ?>"><?php echo $key->kategori ?></a></div>
																<div class="h-10-px"></div>
																<a href="<?php echo base_url() ?>artikel/<?php echo $key->judul ?>">
																	<div class="f-25-px fw-7 f-up grey-7-font f-center p-10"><?php echo $key->judul ?></div>
																</a>
																<div class="h-10-px"></div>
																<a class="grey-4-font" href="<?php echo base_url() ?>artikel/<?php echo $key->judul ?>"><div class="f-center f-up t-un">Posted On&nbsp;<?php echo shortdate_indo($key->tanggal) ?></div></a>
																<div class="h-40-px"></div>
																<a href="<?php echo base_url() ?>artikel/<?php echo $key->judul ?>">
																	<div style="background: url('<?php echo base_url()?>assets/img/artikel/<?php echo $key->gambar ?>');height: 320px;width: 100%;background-size: cover">
																	</div>
																</a>

															</div>
															<div class="col-12">
																<div class="h-20-px"></div>
																<a href="<?php echo base_url() ?>artikel/<?php echo $key->judul ?>" class="grey-5-font">
																	
																	<?php
																	$str=$key->isi;
																	if (strlen($str) > 100)
																	{
																		$str = substr($str, 0, 300);
																		$str = explode(' ', $str);
																		array_pop($str);
																		$str = implode(' ', $str);
																	}
																	echo (htmlspecialchars_decode($str)."...");
																	?>
																<div class="h-20-px"></div>
																<div class="w-100 h-2-px grey-3-bg o-5"></div>
																<div class="h-20-px"></div>
															</div>
														</div>
													</td>
												</tr>
												<?php
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
							<div style="height: 20px"></div>
						</div>
					</div>
					<div class="col-md-4">
						<?php 
						$this->load->view('Index/fitur/side-berita');
						$this->load->view('Index/fitur/side-kategori');
						?>
					</div>
				</div>
			</div>
			<div class="h-50-px"></div>
		</div>
	</div>

	<?php $this->load->view('Index/fitur/footer2');
	?>
	<script type="text/javascript">
		$(".keempat").addClass("active");
		$(".pertama").removeClass("active");
		$('#penanda').addClass("in");

	</script>
	<script src="<?php echo base_url()?>assets/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/dataTables-data.js"></script>
	</html>