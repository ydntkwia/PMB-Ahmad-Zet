<!DOCTYPE html>
<html lang="en">
<head>
	<?php 
	$this->load->view('login/fitur/head');
	?>
</head>
<body class="animated fadeIn" style="animation-duration: 1s;">
	<div class="limiter">
		<div class="container-login100">
			<div class="login100-more" style="background-image: url('<?php echo base_url() ?>assets/img/gedung-awan3.png');"></div>

			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
				<span class="login100-form-title p-b-59">
					Sign In
					<br>
					Admin.
				</span>

				<form class="login100-form validate-form">

					<div style="border-bottom: unset;width: 100%;margin-top: -20px"> 
						<div class='alert alert-danger alert-dismissible' role='alert'>
							<strong>Peringatan!
							</strong><br>
							Akun anda sudah login pada device/browser lain.
						</div>
					</div>


					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<!-- <button onclick="window.location.href='<?php echo base_url() ?>force-login-admin'" class="btn btn-info form-login"><div class="text-login"><i class="fa fa-sign-in"></i>&nbsp;&nbsp;Tetap Login</div></button> -->
							<a href="<?php echo base_url() ?>force-login-admin" class="btn btn-info form-login"><i class="fa fa-sign-in"></i>&nbsp;&nbsp;Tetap Login</a>
						</div>	
					</div>

					<div class="wrap-login100-form-btn m-t-20">
						<div class="login100-form-bgbtn"></div>
						<a href="<?php echo base_url() ?>force-logout-admin" class="btn btn-danger"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Batal Login</a>
					</div>	

				</form>
			</div>

		</div>
	</div>
</div>
<?php 
$this->load->view('login/fitur/kaki');
?>

</body>
</html>