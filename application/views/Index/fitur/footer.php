<footer id="ts-footer">
	<div class="map maps grey-2-bg">
		<?php
	$connected = @fsockopen("www.google.com", 80); 
	if ($connected){
		echo"<iframe src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.434626190992!2d108.53146791498146!3d-6.716697595144191!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f1ded4655e7cb%3A0x582d58a32329c729!2sSTIBA+INVADA!5e0!3m2!1sen!2sid!4v1559011968141!5m2!1sen!2sid' width='100%' height='100%' frameborder='0' class='o-y-hidden border-0 ts-height__500px' ></iframe>";
	}else{
		echo"<div class='h-200-px f-center f-20-px' style='line-height:200px;'>Koneksi bermasalah.</div>";
	}
	?>
	</div>
	<section id="contact" class="ts-separate-bg-element" data-bg-image="assets/image/7.jpg" data-bg-image-opacity=".6" data-bg-color="#1b1464">
		<div class="container">
			<div class="ts-box mb-0 p-5 ts-mt__n-3">
				<div class="row">
					<div class="col-md-3">
						<address>
							<figure>
								<div class="f-bold yellow-8-font"><i class="fa fa-envelope"></i>&nbspEmail:</div>
								<a href="mailto:achmad.zahra62@gmail.com?subject=HELLO STIBA!" class="break-all">stibainvada.cirebon@gmail.com</a>
							</figure>
						</address>
					</div>
					<div class="col-md-2">
						<figure>
							<div class="f-bold yellow-8-font"><i class="fa fa-phone"></i>&nbspPhone:</div>
							<a href="tel:+6281312119466" class="f-break-all">+62 811 2433 883</a>
							
						</figure>
					</div>
					<div class="col-md-4"></div>
					<div class="col-md-3">
						<center><img src="<?php echo base_url()?>/assets/image/logo-w2.png" class="logo-footer" width="85%" height="85%" ></center>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
					</div>
				</div>
			</div>
			<div class="col-md-12 h-20-px footer-sosmed biru-dark-bg">
				<div class="container">
					<div class="col-md-12">
						<center>
							<div class="item sosmed" >
								<a href=""><i class="fa fa-facebook"></i>&nbsp</a>
								<a href=""><i class="fa fa-linkedin"></i>&nbsp</a>
								<a href=""><i class="fa fa-twitter"></i>&nbsp</a>
								<a href=""><i class="fa fa-instagram"></i>&nbsp</a>
							</div>
						</center>
					</div>
				</div>
			</div>
			<div class="text-center text-white py-4">
				<small class="signature">© 2019 STIBA INVADA</small>
			</div>
		</div>
	</section>
</footer>

</div>
<div id='ignielToTop'/>
</body>


<script src="<?php echo base_url()?>/assets/js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript">
    $(window).scroll(function () {
      if($(window).scrollTop()>10){
        $('#penanda').addClass("in");
      }else{
        $('#penanda').removeClass("in");
      }
    })
  </script>

<script src="<?php echo base_url()?>/assets/js/popper.min.js"></script>
<script src="<?php echo base_url()?>/assets/js/my.js"></script>
<script src="<?php echo base_url()?>/assets/js/sweetalert-dev.js"></script>
<script src="<?php echo base_url()?>/assets/js/bootstrap.js"></script>
<script src="<?php echo base_url()?>/assets/js/imagesloaded.pkgd.min.js"></script>

<script src="<?php echo base_url()?>/assets/js/isInViewport.jquery.js"></script>
<script src="<?php echo base_url()?>/assets/js/jquery.particleground.min.js"></script>

<script src="<?php echo base_url()?>/assets/js/main3.js"></script>

<script src="<?php echo base_url()?>/assets/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url()?>/assets/js/scrolla.jquery.min.js"></script>
<script src="<?php echo base_url()?>/assets/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url()?>/assets/js/jquery-validate.bootstrap-tooltip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/TweenMax.min.js"></script>

<script src="<?php echo base_url()?>/assets/js/jquery.wavify.js"></script>
<script src="<?php echo base_url()?>/assets/js/custom2.js"></script>


<script type="text/javascript">
	var forEach=function(t,o,r){if("[object Object]"===Object.prototype.toString.call(t))for(var c in t)Object.prototype.hasOwnProperty.call(t,c)&&o.call(r,t[c],c,t);else for(var e=0,l=t.length;l>e;e++)o.call(r,t[e],e,t)};33


</script>