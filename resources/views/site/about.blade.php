<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
			<!-- meta tag -->
			<meta charset="utf-8">
			<title>Educavo - Education HTML Template</title>
			<meta name="description" content="">
			<!-- responsive tag -->
			<meta http-equiv="x-ua-compatible" content="ie=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<!-- favicon -->
			<link rel="apple-touch-icon" href="{{ asset('apple-touch-icon') }}
			<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/fav-orange.png') }}">
			<!-- Bootstrap v4.4.1 css -->
			<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
			<!-- font-awesome css -->
			<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}">
			<!-- animate css -->
			<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
			<!-- owl.carousel css -->
			<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owl.carousel.css') }}">
			<!-- slick css -->
			<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slick.css') }}">
			<!-- off canvas css -->
			<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/off-canvas.css') }}">
			<!-- linea-font css -->
			<link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/linea-fonts.css') }}">
			<!-- flaticon css  -->
			<link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/flaticon.css') }}">
			<!-- magnific popup css -->
			<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/magnific-popup.css') }}">
			<!-- Main Menu css -->
			<link rel="stylesheet" href="{{ asset('assets/css/rsmenu-main.css') }}">
			<!-- spacing css -->
			<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/rs-spacing.css') }}">
			<!-- style css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/style.css') }}"> <!-- This stylesheet dynamically changed from style.less -->
        <!-- responsive css -->
			<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">
			<!--[if lt IE 9]>
					<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
					<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
			<![endif]-->
	</head>
<body class="defult-home">
			
		<!--Preloader area start here-->
		<div id="loader" class="loader orange-color">
		    <div class="loader-container">
		        <div class='loader-icon'>
		            <img src="{{ asset('assets/images/pre-logo1.png') }}" alt="">
		        </div>
		    </div>
		</div>
		<!--Preloader area End here-->

		<!--Full width header Start-->
            @include('site.partials.navbar')
        <!--Full width header End-->


		<!-- Main content Start -->
		<div class="main-content">
			<!-- Breadcrumbs Start -->
			<div class="rs-breadcrumbs breadcrumbs-overlay">
					<div class="breadcrumbs-img">
							<img src="{{ asset('assets/images/breadcrumbs/2.jpg') }}" alt="Breadcrumbs Image">
					</div>
					<div class="breadcrumbs-text white-color">
							<h1 class="page-title">About Us</h1>
							<ul>
								<li>
									<a class="active" href="index.html">Home</a>
								</li>
								<li>About Us</li>
							</ul>
					</div>
			</div>
			<!-- Breadcrumbs End -->

			<!-- About Section Start -->
			<div id="rs-about" class="rs-about style1 pt-100 pb-100 md-pt-70 md-pb-70">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-6 order-last padding-0 md-pl-15 md-pr-15 md-mb-30">
							<div class="img-part">
								<img class="" src="{{ asset('assets/images/about/about2orange.png') }}" alt="About Image">
							</div>
						</div>
						<div class="col-lg-6 pr-70 md-pr-15">
							<div class="sec-title">
								<div class="sub-title orange">About Educavo</div>
								<h2 class="title mb-17">Welcome to The Educavo Online Learning</h2>
								<div class="bold-text mb-22">Recogizing the need is the primary than we expected Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint ipsa voluptatibus,</div>
								<div class="desc">Lorem ipsum dolor sit amet, consectetur adipisic ing elit, sed eius to mod tempors incididunt ut labore et dolore magna this aliqua  enims ad minim. Lorem ipsum dolor sit amet, consectetur adipisic ing elit, sed eius to mod tempor. Lorem ipsum dolor sit amet</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- About Section End -->

			<!-- CTA Section Start -->
			<div class="rs-cta style2">
				<div class="partition-bg-wrap inner-page">
					<div class="container">
						<div class="row y-bottom">
							<div class="col-lg-6 pb-50 md-pt-70 md-pb-70">
								<div class="video-wrap">
									<a class="popup-videos" href="https://www.youtube.com/watch?v=atMUy_bPoQI">
											<i class="fa fa-play"></i>
											<h4 class="title mb-0">Take a Video  Tour at Educavo</h4>
										</a>
								</div>
							</div>
							<div class="col-lg-6 pl-62 pt-134 pb-150 md-pt-50 md-pb-50 md-pl-15">
								<div class="sec-title mb-40 md-mb-20">
										<h2 class="title mb-16">Admission Open for 2020</h2>
										<div class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed eius to mod tempor incididunt ut labore et dolore magna aliqua. Ut enims ad minim veniam. Aenean massa. Cum sociis natoque penatibus et magnis.</div>
								</div>
								<div class="btn-part">
										<a class="readon2 orange" href="#">Apply Now</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- CTA Section End -->

			<!-- Counter Section Start -->
			<div id="rs-counter" class="rs-counter style2-about pt-100 md-pt-70">
				<div class="container">
					<div class="row couter-area">
						<div class="col-md-4 sm-mb-30">
							<div class="counter-item text-center">
								<div class="counter-bg">
									<img src="{{ asset('assets/images/counter/bg1.png') }}" alt="Counter Image">
								</div>
								<div class="counter-text">
									<h2 class="rs-count kplus">2</h2>
									<h4 class="title mb-0">Students</h4>
								</div>
							</div>
						</div>
						<div class="col-md-4 sm-mb-30">
							<div class="counter-item text-center">
								<div class="counter-bg">
									<img src="{{ asset('assets/images/counter/bg2.png') }}" alt="Counter Image">
								</div>
								<div class="counter-text">
									<h2 class="rs-count">3.50</h2>
									<h4 class="title mb-0">Average CGPA</h4>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="counter-item text-center">
								<div class="counter-bg">
									<img src="{{ asset('assets/images/counter/bg3.png') }}" alt="Counter Image">
								</div>
								<div class="counter-text">
									<h2 class="rs-count percent">95</h2>
									<h4 class="title mb-0">Graduates</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Counter Section End -->

			<!-- About Section Start -->
			<div class="rs-about style1 pt-100 pb-100 md-pt-70 md-pb-70">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-6 padding-0 md-pl-15 md-pr-15 md-mb-30">
							<div class="img-part">
								<img class="" src="{{ asset('assets/images/about/history.png') }}" alt="About Image">
							</div>
                            <ul class="nav nav-tabs histort-part" id="myTab" role="tablist">
                                <li class="nav-item tab-btns single-history">
                                    <a class="nav-link tab-btn active" id="about-history-tab" data-toggle="tab" href="#about-history" role="tab" aria-controls="about-history" aria-selected="true"><span class="icon-part"><i class="flaticon-banknote"></i></span>History</a>
                                </li>
                                <li class="nav-item tab-btns single-history">
                                    <a class="nav-link tab-btn" id="about-mission-tab" data-toggle="tab" href="#about-mission" role="tab" aria-controls="about-mission" aria-selected="false"><span class="icon-part"><i class="flaticon-flower"></i></span>Mission & Vission</a>
                                </li>
                                <li class="nav-item tab-btns single-history last-item">
                                    <a class="nav-link tab-btn" id="about-admin-tab" data-toggle="tab" href="#about-admin" role="tab" aria-controls="about-admin" aria-selected="false"><span class="icon-part"><i class="flaticon-analysis"></i></span>Administration</a>
                                </li>
                            </ul>
						</div>
						<div class="offset-lg-1"></div>
						<div class="col-lg-5">
							<div class="tab-content tabs-content" id="myTabContent">
                                <div class="tab-pane tab fade show active" id="about-history" role="tabpanel" aria-labelledby="about-history-tab">
                                    <div class="sec-title mb-25">
                                        <h2 class="title">Educavo History</h2>
                                        <div class="desc">At vero eos et accusamus et iusto odio dignissimos ducimus qui blan ditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, sim ilique sunt in culpa.</div>
                                    </div>
                                    <div class="tab-img">
                                        <img class="" src="{{ asset('assets/images/about/tab1.jpg') }}" alt="Tab Image">
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="about-mission" role="tabpanel" aria-labelledby="about-mission-tab">
                                    <div class="sec-title mb-25">
                                        <h2 class="title">Educavo Mission</h2>
                                        <div class="desc">At vero eos et accusamus et iusto odio dignissimos ducimus qui blan ditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, sim ilique sunt in culpa.</div>
                                    </div>
                                    <div class="tab-img">
                                        <img class="" src="{{ asset('assets/images/about/tab2.jpg') }}" alt="Tab Image">
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="about-admin" role="tabpanel" aria-labelledby="about-admin-tab">
                                    <div class="sec-title mb-25">
                                        <h2 class="title">Educavo Administration</h2>
                                        <div class="desc">At vero eos et accusamus et iusto odio dignissimos ducimus qui blan ditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, sim ilique sunt in culpa.</div>
                                    </div>
                                    <div class="tab-img">
                                        <img class="" src="{{ asset('assets/images/about/tab3.jpg') }}" alt="Tab Image">
                                    </div>
                                </div>
                            </div>
						</div>
					</div>
                    <!-- Intro Info Tabs-->
                    <div class="intro-info-tabs">
                        
                    </div>
				</div>
			</div>
			<!-- About Section End -->

			<!-- Team Section Start -->
			<div id="rs-team" class="rs-team style1 orange-color pt-94 pb-100 md-pt-64 md-pb-70 gray-bg">
				<div class="container">
					<div class="sec-title mb-50 md-mb-30">
							<div class="sub-title orange">Instructor</div>
							<h2 class="title mb-0">Expert Teachers</h2>
					</div>
					<div class="rs-carousel owl-carousel nav-style2 orange-color" data-loop="true" data-items="3" data-margin="30" data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false" data-nav="true" data-nav-speed="false" data-center-mode="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="2" data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="3" data-md-device-nav="true" data-md-device-dots="false">
						<div class="team-item">
							<img src="{{ asset('assets/images/team/1.jpg') }}" alt="">
							<div class="content-part">
								<h4 class="name"><a href="team-single.html">Jhon Pedrocas</a></h4>
								<span class="designation">Professor</span>
								<ul class="social-links">
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
										<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								</ul>
							</div>
						</div>
						<div class="team-item">
							<img src="{{ asset('assets/images/team/2.jpg') }}" alt="">
							<div class="content-part">
								<h4 class="name"><a href="team-single.html">Jesika Albenian</a></h4>
								<span class="designation">Professor</span>
								<ul class="social-links">
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
										<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								</ul>
							</div>
						</div>
						<div class="team-item">
							<img src="{{ asset('assets/images/team/3.jpg') }}" alt="">
							<div class="content-part">
								<h4 class="name"><a href="team-single.html">Alex Anthony</a></h4>
								<span class="designation">Professor</span>
								<ul class="social-links">
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
										<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Team Section End -->           

        </div> 
        <!-- Main content End --> 

        <!-- Footer Start -->
            @include('site.partials.footer')
        <!-- Footer End -->

		<!-- start scrollUp  -->
		<div id="scrollUp" class="orange-color">
			<i class="fa fa-angle-up"></i>
		</div>
		<!-- End scrollUp  -->

		<!-- Search Modal Start -->
		<div aria-hidden="true" class="modal fade search-modal" role="dialog" tabindex="-1">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span class="flaticon-cross"></span>
			</button>
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="search-block clearfix">
						<form>
							<div class="form-group">
								<input class="form-control" placeholder="Search Here..." type="text">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- Search Modal End -->

		<!-- modernizr js -->
		<script src="{{ asset('assets/js/modernizr-2.8.3.min.js') }}"></script>
		<!-- jquery latest version -->
		<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
		<!-- Bootstrap v4.4.1 js -->
		<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
		<!-- Menu js -->
		<script src="{{ asset('assets/js/rsmenu-main.js') }}"></script> 
		<!-- op nav js -->
		<script src="{{ asset('assets/js/jquery.nav.js') }}"></script>
		<!-- owl.carousel js -->
		<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
		<!-- Slick js -->
		<script src="{{ asset('assets/js/slick.min.js') }}"></script>
		<!-- isotope.pkgd.min js -->
		<script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
		<!-- imagesloaded.pkgd.min js -->
		<script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
		<!-- wow js -->
		<script src="{{ asset('assets/js/wow.min.js') }}"></script>
		<!-- Skill bar js -->
		<script src="{{ asset('assets/js/skill.bars.jquery.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>        
		 <!-- counter top js -->
		<script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
		<!-- video js -->
		<script src="{{ asset('assets/js/jquery.mb.YTPlayer.min.js') }}"></script>
		<!-- magnific popup js -->
		<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>      
		<!-- plugins js -->
		<script src="{{ asset('assets/js/plugins.js') }}"></script>
		<!-- contact form js -->
		<script src="{{ asset('assets/js/contact.form.js') }}"></script>
		<!-- main js -->
		<script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>