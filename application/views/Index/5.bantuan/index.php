<!doctype html>
<html lang="en">
<head>
	<?php 
	$this->load->view('Index/fitur/head');
	?>
	
</head>
<body onload="is_connected()" data-spy="scroll" data-target=".navbar .in" class="has-loading-screen" >

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
								<div class="h-20-px"></div>
								<font class="red-7-font f-bold f-20-px f-up">Bantuan</font>
								<div class="w-20 h-2-px red-6-bg mt2"></div>
								<div class="h-20-px"></div>
								<center>
									<img src="<?php echo base_url() ?>/assets/svg/bantuan.svg" class="w-40 svg-daftar">
								</center>
								<center>
									<div class="grey-2-bg mt-40-px h-1-px w-90"></div>
								</center>
								<div class="h-20-px"></div>
								<div class="w-100 h-400-px grey-2-bg">
									<?php
									$connected = @fsockopen("www.google.com", 80); 
									if ($connected){
										echo"<iframe src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63400.5752907248!2d108.49059648705146!3d-6.704244759138014!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6ee21a9830ed55%3A0xdae86d0465e59e19!2sSTKIP+Invada+Cirebon!5e0!3m2!1sen!2sid!4v1563347193346!5m2!1sen!2sid' class='w-100 border-0 h-400-px' frameborder='0'></iframe>";
									}else{
										echo"<div class='f-center alt-maps f-20-px'>Koneksi bermasalah.</div>";
									}
									?>
								</div>
								<div class="h-30-px" ></div>
								<center>
									<h3 class="red-8-font fw-6">Buka setiap hari Senin sampai Sabtu pukul 08.00 sampai pukul 15.00</h3>
								</center>
								<div class="h-20-px"></div>
								<div class="ml-20-px mr-20-px">
									<h4>Alamat Kami</h4>
									<div class="grey-6-font">Jl. Brigjen Darsono No. 20 By Pass Cirebon</div>
									<div class="h-20-px"></div>
									<div class="h-2-px green-5-bg w-200-px"></div>
									<div class="h-20-px"></div>
									<h4>STKIP Invada Cirebon</h4>
									<div class="grey-6-font">Panitia Penerimaan Mahasiswa Baru 2019/2020</div>
									<div class="h-20-px"></div>
									<a href="mailto:stibainvada.cirebon@gmail.com">stibainvada.cirebon@gmail.com</a><br>
									<a href="tel:(0231)029669">(0231) 029669</a><br>

									<div class="h-30-px"></div>
								</div>
							</div>
						</div>
					</div>

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

		$(".kelima").addClass("active");
		$(".pertama").removeClass("active");
        $('#penanda').addClass("in");

	</script>
	</html>

