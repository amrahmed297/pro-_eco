<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description"
		content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<title>متجر الكتروني</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- CSS Files -->
	<link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/meanmenu.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
</head>

<body>

	<!--PreLoader-->
	<div class="loader">
		<div class="loader-inner">
			<div class="circle"></div>
		</div>
	</div>
	<!--PreLoader Ends-->

	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="/">
								<img src="{{ asset('assets/img/logo.png') }}" alt="">
							</a>
						</div>
						<!-- menu start -->
						<nav class="main-menu">
							<ul>

								@if(session('is_admin_logged_in'))
									<li class="current-list-item">
										<a href="#">لوحه التحكم</a>
										<ul class="sub-menu">
											<li><a href="{{ route('all.view') }}">كل المنتجات</a></li>
										</ul>
									</li>

									<li>
										<form action="{{ route('admin.logout') }}" method="POST">
											@csrf
											<button type="submit" class="btn btn-link text-danger">تسجيل خروج
												(أدمن)</button>
										</form>
									</li>
								@else
									<li><a href="{{ route('admin.login') }}">👤 دخول الأدمن</a></li>
								@endif

								<li class="current-list-item"><a href="/">الرئيسية</a>
									<ul class="sub-menu">
										<li><a href="/cat">الاقسام</a></li>
										<li><a href="/products">صفحة المنتجات</a></li>
									</ul>
								</li>
								<li><a href="https://amrahmed297.github.io/protof/">معلومات عنا</a></li>
								<li><a href="#">صفحات</a>
									<ul class="sub-menu">
										<li><a href="#">404 page</a></li>
										<li><a href="https://amrahmed297.github.io/protof/">About</a></li>
										<li><a href="#">السلة</a></li>
										<li><a href="#">السحب</a></li>
										<li><a href="#">التواصل</a></li>
									</ul>
								</li>
								<li><a href="https://amrahmed297.github.io/protof/">تواصل معنا</a></li>
								<li><a href="#">المتجر</a>
									<ul class="sub-menu">
										<li><a href="#">تسوق</a></li>
										<li><a href="#">الدفع</a></li>
										<li><a href="#">المنتجات</a></li>
										<li><a href="#">عربة التسوق</a></li>
									</ul>
								</li>

								<li class="current-list-item"><a href="#">الحساب</a>
									<ul class="sub-menu">
										@guest
											<li><a href="{{ route('login') }}">تسجيل الدخول</a></li>
											<li><a href="{{ route('register') }}">إنشاء حساب</a></li>
										@endguest

										@auth
											<li>
												<form action="{{ route('auth.logout') }}" method="POST"
													style="display: inline;">
													@csrf
													<button type="submit"
														style="background: none; border: none; padding: 0; margin: 0; color: #000;">
														تسجيل الخروج
													</button>
												</form>
											</li>
										@endauth
									</ul>
								</li>

								<li>
									<div class="header-icons">
										<a class="shopping-cart" href="{{ route('cart.index') }}">
											<i class="fas fa-shopping-cart"></i>
										</a>
										<a class="mobile-hide search-bar-icon" href="#">
											<i class="fas fa-search"></i>
										</a>
									</div>
								</li>

							</ul>
						</nav>
						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->

	<!-- search area -->
	<div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"><i class="fas fa-window-close"></i></span>
					<div class="search-bar">
						<div class="search-bar-tablecell">
							<h3>ابحث عن:</h3>
							<input type="text" placeholder="Keywords">
							<button type="submit">بحث <i class="fas fa-search"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end search area -->

	<!-- home page slider -->
	<div class="homepage-slider">
		<!-- single home slider -->
		<div class="single-homepage-slider homepage-bg-1">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
						<div class="hero-text">
							<div class="hero-text-tablecell">
								<p class="subtitle">اجهزه الالكترونية</p>
								<h1>هواتف</h1>
								<div class="hero-btns">
									<a href="#" class="boxed-btn">المنتجات</a>
									<a href="#" class="bordered-btn">تواصل معنا</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- home slider 2 -->
		<div class="single-homepage-slider homepage-bg-2">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 offset-lg-1 text-center">
						<div class="hero-text">
							<div class="hero-text-tablecell">
								<p class="subtitle">اجهزة كومبيوتر</p>
								<h1>كل الالوان وكل الانواع</h1>
								<div class="hero-btns">
									<a href="#" class="boxed-btn">Visit Shop</a>
									<a href="#" class="bordered-btn">Contact Us</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- home slider 3 -->
		<div class="single-homepage-slider homepage-bg-3">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 offset-lg-1 text-right">
						<div class="hero-text">
							<div class="hero-text-tablecell">
								<p class="subtitle">عروض كثيرة</p>
								<h1>احصل علي خصومات الصيف</h1>
								<div class="hero-btns">
									<a href="#" class="boxed-btn">Visit Shop</a>
									<a href="#" class="bordered-btn">Contact Us</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end slider -->

	{{-- هنا يتم إدراج المحتوى الخاص بالصفحات --}}
	@yield('content')

	<!-- footer -->
	<div class="footer-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="footer-box about-widget">
						<h2 class="widget-title">About us</h2>
						<p>انا عمرو احمد full stack dev وده مشروعي الجديد</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box get-in-touch">
						<h2 class="widget-title">Get in Touch</h2>
						<ul>
							<li>egypt</li>
							<li>amrahmedvlogs@gmail.com</li>
							<li>+201001390050</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box pages">
						<h2 class="widget-title">Pages</h2>
						<ul>
							<li><a href="/">Home</a></li>
							<li><a href="#">About</a></li>
							<li><a href="#">Shop</a></li>
							<li><a href="#">News</a></li>
							<li><a href="#">Contact</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box subscribe">
						<h2 class="widget-title">Subscribe</h2>
						<p>Subscribe to our mailing list to get the latest updates.</p>
						<form action="#">
							<input type="email" placeholder="Email">
							<button type="submit"><i class="fas fa-paper-plane"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- copyright -->
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<p>Copyright &copy; 2025 - amr ahmed dev</p>
				</div>
				<div class="col-lg-6 text-right col-md-12">
					<div class="social-icons">
						<ul>
							<li><a href="https://www.facebook.com/amr.ahmed.584435/" target="_blank"><i
										class="fab fa-facebook-f"></i></a></li>
							<li><a href="https://www.linkedin.com/in/amr-ahmed-89697b335" target="_blank"><i
										class="fab fa-linkedin"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- JS Files -->
	<script src="{{ asset('assets/js/jquery-1.11.3.min.js') }}"></script>
	<script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.countdown.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.isotope-3.0.6.min.js') }}"></script>
	<script src="{{ asset('assets/js/waypoints.js') }}"></script>
	<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.meanmenu.min.js') }}"></script>
	<script src="{{ asset('assets/js/sticker.js') }}"></script>
	<script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>