<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<div class="wrapper theme-3-active pimary-color-green">
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="mobile-only-brand pull-left">
				<div class="nav-header pull-left">
					<div class="logo-wrap">
						<a href="index.html">
							<img class="brand-img mln-5-px" src="<?php echo base_url()?>assets/image/favicon.png" alt="brand" />
							<span class="brand-text f-20-px">STIBA INVADA</span>
						</a>
					</div>
				</div>
				<div class="button">
					<a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
				</div>
				<a id="toggle_mobile_nav" class="mobile-only-view hideen-mobile" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>
				<div class=" inline-block ml-20 atas-kanan" style="line-height: 35px">
					<div id="output" class="white-font f-16-px c-1-bg pl-10-px pr-20-px w-min-200-px" style="position: absolute;">11:11:11</div>
					<span class="ml-80-px white-font f-16-px c-1-bg output pr-10-px pl-2-px mobile" style="position: absolute;"><?php echo("|"."&nbsp;".date('l, d-m-Y')) ?></span>
				</div>
			</div>
			<div id="mobile_only_nav" class="mobile-only-nav pull-right">
				<div style="line-height: 66px" class="toggle-left-nav-btn inline-block ml-20">
					<span class="ml-80-px white-font f-16-px c-1-bg right-name" style="text-transform: capitalize;"><?php echo $this->session->userdata('nama'); ?></span>
				</div>
				<ul class="nav navbar-right top-nav pull-right">
					<li class="dropdown auth-drp">
						<a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src="<?php echo base_url()?>assets/img/admin/<?php echo $this->session->userdata('foto'); ?>" alt="user_auth" class="user-auth-img img-circle" /><span class="user-online-status"></span></a>
						<ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
							<li>
								<a href="<?php echo base_url() ?>logout-admin"><i class="zmdi zmdi-power"></i><span>Log Out</span></a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>