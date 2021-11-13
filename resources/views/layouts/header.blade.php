<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>

        <meta charset="utf-8">

        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>Test</title>

        <meta name="description" content="">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="manifest" href="site.webmanifest">

		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('Asset/websitetemplate/img/favicon.ico') }}">



		<!-- CSS here -->

            <link rel="stylesheet" href="{{ asset('Asset/websitetemplate/css/bootstrap.min.css') }}">

            <link rel="stylesheet" href="{{ asset('Asset/websitetemplate/css/owl.carousel.min.css') }}">

            <link rel="stylesheet" href="{{ asset('Asset/websitetemplate/css/flaticon.css') }}">

            <link rel="stylesheet" href="{{ asset('Asset/websitetemplate/css/slicknav.css') }}">

            <link rel="stylesheet" href="{{ asset('Asset/websitetemplate/css/animate.min.css') }}">

            <link rel="stylesheet" href="{{ asset('Asset/websitetemplate/css/magnific-popup.css') }}">

            <link rel="stylesheet" href="{{ asset('Asset/websitetemplate/css/fontawesome-all.min.css') }}">

            <link rel="stylesheet" href="{{ asset('Asset/websitetemplate/css/themify-icons.css') }}">

            <link rel="stylesheet" href="{{ asset('Asset/websitetemplate/css/slick.css') }}">

            <link rel="stylesheet" href="{{ asset('Asset/websitetemplate/css/nice-select.css') }}">

            <link rel="stylesheet" href="{{ asset('Asset/websitetemplate/css/style.css') }}">

   </head>



   <body>

       

    <!-- Preloader Start -->

    <div id="preloader-active">

        <div class="preloader d-flex align-items-center justify-content-center">

            <div class="preloader-inner position-relative">

                <div class="preloader-circle"></div>

                <div class="preloader-img pere-text">

                    <p>Loading</p>

                </div>

            </div>

        </div>

    </div>

    <!-- Preloader Start -->



    <header>

        <!-- Header Start -->

       <div class="header-area header-transparrent ">

            <div class="main-header header-sticky">

                <div class="container">

                    <div class="row align-items-center">
                        <div class="col-xl-2 col-lg-2 col-md-2">
                            <div class="logo">
                                <a href="{{ url('/') }}"></a>
                            </div>
                        </div>

                        <div class="col-xl-10 col-lg-10 col-md-10">
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">    

                                        <li class="active"><a href="{{ url('/') }}"> Home</a></li>

                                      

									@guest	  

									  @if (Route::has('register'))
										  <li><a href="{{ route('login') }}">Login</a></li>
										  <li><a href="{{ route('register') }}">Registration</a></li>
										  @endif 
										  @else
										  <li><a href="{{ route('login') }}">Dashboard</a></li>	

								     @endguest
                                    </ul>

                                </nav>

                            </div>

                        </div>

                        <!-- Mobile Menu -->

                        <div class="col-12">

                            <div class="mobile_menu d-block d-lg-none"></div>

                        </div>

                    </div>

                </div>

            </div>

       </div>

        <!-- Header End -->

    </header>

    <main>

	@yield('content')

	</main>


   </footer>

   

	<!-- JS here -->
		<!-- All JS Custom Plugins Link Here here -->

        <script src="{{ asset('Asset/websitetemplate/js/vendor/modernizr-3.5.0.min.js') }}"></script>
		<!-- Jquery, Popper, Bootstrap -->

		<script src="{{ asset('Asset/websitetemplate/js/vendor/jquery-1.12.4.min.js') }}"></script>

        <script src="{{ asset('Asset/websitetemplate/js/popper.min.js') }}"></script>

        <script src="{{ asset('Asset/websitetemplate/js/bootstrap.min.js') }}"></script>

	    <!-- Jquery Mobile Menu -->

        <script src="{{ asset('Asset/websitetemplate/js/jquery.slicknav.min.js') }}"></script>
		<!-- Jquery Slick , Owl-Carousel Plugins -->

        <script src="{{ asset('Asset/websitetemplate/js/owl.carousel.min.js') }}"></script>

        <script src="{{ asset('Asset/websitetemplate/js/slick.min.js') }}"></script>

        <!-- Date Picker -->

        <script src="{{ asset('Asset/websitetemplate/js/gijgo.min.js') }}"></script>

		<!-- One Page, Animated-HeadLin -->

        <script src="{{ asset('Asset/websitetemplate/js/wow.min.js') }}"></script>

		<script src="{{ asset('Asset/websitetemplate/js/animated.headline.js') }}"></script>

        <script src="{{ asset('Asset/websitetemplate/js/jquery.magnific-popup.js') }}"></script>



		<!-- Scrollup, nice-select, sticky -->

        <script src="{{ asset('Asset/websitetemplate/js/jquery.scrollUp.min.js') }}"></script>

        <script src="{{ asset('Asset/websitetemplate/js/jquery.nice-select.min.js') }}"></script>

		<script src="{{ asset('Asset/websitetemplate/js/jquery.sticky.js') }}"></script>

        

        <!-- contact js -->

        <script src="{{ asset('Asset/websitetemplate/js/contact.js') }}"></script>

        <script src="{{ asset('Asset/websitetemplate/js/jquery.form.js') }}"></script>

        <script src="{{ asset('Asset/websitetemplate/js/jquery.validate.min.js') }}"></script>

        <script src="{{ asset('Asset/websitetemplate/js/mail-script.js') }}"></script>

        <script src="{{ asset('Asset/websitetemplate/js/jquery.ajaxchimp.min.js') }}"></script>

        

		<!-- Jquery Plugins, main Jquery -->	

        <script src="{{ asset('Asset/websitetemplate/js/plugins.js') }}"></script>

        <script src="{{ asset('Asset/websitetemplate/js/main.js') }}"></script>

        

    </body>

</html>