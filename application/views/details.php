<body data-offset="200" data-spy="scroll" data-target=".ow-navigation">
	<div class="main-container">
		<!-- Loader -->
		<div id="site-loader" class="load-complete">
			<div class="loader">
				<div class="loader-inner ball-clip-rotate">
					<div></div>
				</div>
			</div>
		</div><!-- Loader /- -->

		<!-- Header Section -->
		<header class="container-fluid no-padding header-section">

			<!-- SidePanel -->
			<div id="slidepanel">

			</div><!-- SidePanel /- -->

			<div class="container-fluid no-padding menu-block">
				<!-- Container -->
				<div class="container">
					<!-- nav -->
					<nav class="navbar navbar-default ow-navigation">
						<div class="navbar-header">
							<button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="navbar-collapse collapse" id="navbar">
							<ul class="nav navbar-nav">

								<li><a href="<?php echo base_url() ?>" title="About me">Kota Bandung</a></li>
								<li><a href="<?php echo base_url() ?>maxadventure/about.html" title="About me">Kota Cimahi</a></li>
								<li><a href="<?php echo base_url() ?>maxadventure/services.html" title="Services">Kabupaten Bandung</a></li>
								<li><a href="<?php echo base_url() ?>maxadventure/gallery.html" title="Gallery">Kab Bandung Barat</a></li>
								<li><a href="<?php echo base_url()."Register" ?>" title="Gallery">Daftar</a></li>
								<li class="dropdown">
									<a href="#" title="Menu Login" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false">Login</a>
									<i class="ddl-switch fa fa-angle-down"></i>
									<ul class="dropdown-menu">
										<li><a href="<?php echo base_url() ?>Login/" >Login Pemilik Wisata</a></li>
										<li><a href="<?php echo base_url() ?>Login/admin" >Login Admin</a></li>
									</ul>
								</li>

							</ul>
						</div><!--/.nav-collapse -->
						<div id="loginpanel" class="desktop-hide">
							<div class="right" id="toggle">
								<a id="slideit" href="#slidepanel"><i class="fo-icons fa fa-inbox"></i></a>
								<a id="closeit" href="#slidepanel"><i class="fo-icons fa fa-close"></i></a>
							</div>
						</div>
					</nav><!-- nav /- -->
				</div><!-- Container /- -->
			</div>
		</header><!-- Header Section /- -->
	
		<main>
			
			<!-- Page Header -->
			<div class="container-fluid no-padding page-header">
				<div class="container">
					<ol class="breadcrumb">
						<li><a href="#">Home</a></li>
						<li class="active">Blog</li>
					</ol>
				</div>
			</div><!-- Page Header /- -->
			<div class="padding-80"></div>
			<div class="container">
				<!-- Row -->
				<div class="row blog-single">
					<!-- Content Area -->
					<div class="col-md-8 col-sm-6 col-xs-12 content-area">
						<!-- Type Post -->
						<article class="type-post">
							<div class="entry-cover">
								<a href="#"><img src="<?php echo base_url() ?>maxadventure/images/blog1.jpg" alt="Blog" /></a>
								<h3 class="entry-title"><a href="#" title="It has survived not only five centuries in The travelling">
									<?php echo $data->nama_wisata ?>
								</a></h3>
								<div class="post-date"><a href="#"><b>23</b>feb</a></div>
							</div>
							<div class="entry-meta">
								
							</div>
							<div class="entry-content">
								<p>Alamat : <?php echo $data->alamat ?> <br> <br>	
										<?php echo $data->deskripsi ?>
								</p>
							</div>
							<div class="entry-footer">
								
							</div>
						</article><!-- Type Post /- -->
						
					</div><!-- Content Area /- -->
					
				</div><!-- Row /- -->
			</div>
			<div class="padding-80"></div>
		</main>
