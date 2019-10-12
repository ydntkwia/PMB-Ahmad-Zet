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

				<form class="login100-form validate-form" action="<?php echo base_url('login-admin');?>" method="POST">
					
					<div class="wrap-input100 validate-input" data-validate="Name is required">
						<span class="label-input100">NIDN</span>
						<input required="" onkeypress="input_number(event)" class="input100" type="text" autocomplete="off" name="nidn" >
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input required="" class="input100" type="password" autocomplete="off" name="password">
						<span class="focus-input100"></span>
					</div>
					
					<input required="" id="ap" type="text" autocomplete="off" name="token" hidden="">


					<div style="border-bottom: unset;width: 100%;margin-top: -20px"> 

						<?php  
						if ($this->session->flashdata('message-wrong') != '' ) {
							echo "
							<div class='alert alert-danger alert-dismissible' role='alert'>
							<strong>";
							echo $this->session->flashdata('message-wrong');
							echo "</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
							<span aria-hidden='true'>&times;</span>
							</button>
							</div>
							";
						}
						?>
					</div>


					<div class="container-login100-form-btn">
						
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="btn btn-info form-login" name="login" type="submit" value="login"><div class="text-login"><i class="fa fa-sign-in"></i>&nbsp;&nbsp;Sign in</div></button>

						</div>	

					</div>

					<div class="wrap-login100-form-btn m-t-20">
						<div class="login100-form-bgbtn"></div>
						<a href="<?php echo base_url() ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Back</a>
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