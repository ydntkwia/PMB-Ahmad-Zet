<!doctype html>
<html lang="en">
<head>
	<?php 
	$this->load->view('Index/fitur/head');
	?>
	<style type="text/css">
		ol{
			color: rgba(0,0,0,0.5);
		}
		.path>#berita{
			color: rgba(0,0,0,0.5);
		}
		.path>#sub-berita{
			color: #e53935;
		}
		.judul{
			padding: 15px !important;
			font-weight: 750;
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
							<div class="container">
								<?php 
								foreach ($tampil as $key) {
									?>
									<div class="h-60-px"></div>
									<div class="f-up ls-6 pl-15-px"><a class="red-7-font" href="<?php echo base_url() ?>kategori/<?php echo $key->kategori ?>"><?php echo $key->kategori ?></a></div>
									<a  href="<?php echo base_url() ?>artikel/<?php echo $key->judul ?>">
										<div class="judul f-25-px f-up grey-7-font"><?php echo $key->judul ?></div>
									</a>
									<a class="grey-4-font" href="<?php echo base_url() ?>artikel/<?php echo $key->judul ?>"><div class="pl-15-px f-up t-un">Posted On&nbsp;<?php echo shortdate_indo($key->tanggal) ?></div></a>
									<div class="h-60-px"></div>
									<div class="col-12">
										<a href="<?php echo base_url() ?>artikel/<?php echo $key->judul ?>">
											<div style="background: url('<?php echo base_url()?>assets/img/artikel/<?php echo $key->gambar ?>');height: 320px;width: 100%;background-size: cover">
											</div>
										</a>
									</div>
									<div class="col-12">

										<div class="h-50-px"></div>
										<?php 
										echo htmlspecialchars_decode($key->isi);
										?>
										<div class="h-20-px"></div>
										<div class="h-40-px"></div>
									</div>
								</div>
							</div>
						</div>
						<?php
					}
					?>
					<!-- berita -->
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
	</html>

