<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="wpoceans">
    <title>Hello world</title>
    <link href="assets/css/themify-icons.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/flaticon.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/owl.carousel.css" rel="stylesheet">
    <link href="assets/css/owl.theme.css" rel="stylesheet">
    <link href="assets/css/slick.css" rel="stylesheet">
    <link href="assets/css/slick-theme.css" rel="stylesheet">
    <link href="assets/css/swiper.min.css" rel="stylesheet">
    <link href="assets/css/owl.transitions.css" rel="stylesheet">
    <link href="assets/css/jquery.fancybox.css" rel="stylesheet">
    <link href="assets/css/odometer-theme-default.css" rel="stylesheet">
    <link href="assets/css/nice-select.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->



</head>

<body>
    <!-- start page-wrapper -->
    <div class="page-wrapper">
        <!-- start preloader -->
        <div class="preloader">
            <div class="sk-folding-cube">
                <div class="sk-cube1 sk-cube"></div>
                <div class="sk-cube2 sk-cube"></div>
                <div class="sk-cube4 sk-cube"></div>
                <div class="sk-cube3 sk-cube"></div>
            </div>
        </div>
        <!-- end preloader -->
        <!-- Start header -->
        <header id="header" class="wpo-site-header wpo-header-style-3">
            <nav class="navigation navbar navbar-default">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="open-btn">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                       <!-- Logo: <a class="navbar-brand" href="index-2.html"><img src="assets/images/logo-2.png" alt="logo"></a> -->
                    </div>
                    <div id="navbar" class="navbar-collapse collapse navbar-right navigation-holder">
                        <button class="close-navbar"><i class="ti-close"></i></button>
                        <ul class="nav navbar-nav">



							<li><a href="{{route('accueil')}}">Accueil</a></li>
							<li><a href="index.html#quisommenous">Qui sommes nous</a></li>
                            <li><a href="index.html#NoAction">Nos actions</a></li>

							<li class="menu-item-has-children">
                                <a href="images.html">Galerie</a>
                                <ul class="sub-menu">
                                    <li><a href="images.html">Images</a></li>
                                    <li><a href="videos.html">Vidéos</a></li>
                                </ul>
                            </li>

							<li><a href="{{route('forum')}}">Forum</a></li>
                            <li><a href="{{route('contact-us')}}">Contactez nous</a></li>

                        </ul>
                    </div><!-- end of nav-collapse -->

        </header>
        <!-- end of header -->



@yield('content');





		 <!-- start wpo-site-footer -->
            <footer class="wpo-site-footer">
                <div class="wpo-upper-footer">
                    <div class="container">
                        <div class="row">
                            <div class="col col-lg-3 col-md-3 col-sm-6">
                                <div class="widget about-widget">
                                    <div class="logo widget-title">
                                        <img src="assets/images/logo.png" alt="blog">
                                    </div>
                                    <p>Build and Earn with your online store with lots of cool and exclusive wpo-features </p>
                                    <ul>
                                        <li><a href="#"><i class="ti-facebook"></i></a></li>
                                        <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                                        <li><a href="#"><i class="ti-instagram"></i></a></li>
                                        <li><a href="#"><i class="ti-google"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col col-lg-3 col-md-3 col-sm-6">
                                <div class="widget link-widget resource-widget">
                                    <div class="widget-title">
                                        <h3>Top News</h3>
                                    </div>
                                    <div class="news-wrap">
                                        <div class="news-img">
                                            <img src="assets/images/footer/img-1.jpg" alt="">
                                        </div>
                                        <div class="news-text">
                                            <h3>Education for all poor children</h3>
                                            <span>12 Nov, 2020</span>
                                        </div>
                                    </div>
                                    <div class="news-wrap">
                                        <div class="news-img">
                                            <img src="assets/images/footer/img-2.jpg" alt="">
                                        </div>
                                        <div class="news-text">
                                            <h3>Education for all poor children</h3>
                                            <span>12 Nov, 2020</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-lg-2 col-md-3 col-sm-6">
                                <div class="widget link-widget">
                                    <div class="widget-title">
                                        <h3>Useful Links</h3>
                                    </div>
                                    <ul>
                                        <li><a href="#">About Us</a></li>
                                        <li><a href="#">Our Causes</a></li>
                                        <li><a href="#">Our Mission</a></li>
                                        <li><a href="#">Contact Us</a></li>
                                        <li><a href="#">Our Event</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col col-lg-3 col-lg-offset-1 col-md-3 col-sm-6">
                                <div class="widget market-widget wpo-service-link-widget">
                                    <div class="widget-title">
                                        <h3>Contact </h3>
                                    </div>
                                    <p>online store with lots of cool and exclusive wpo-features</p>
                                    <div class="contact-ft">
                                        <ul>
                                            <li><i class="fi flaticon-pin"></i>28 Street, New York City, USA</li>
                                            <li><i class="fi flaticon-call"></i>+000123456789</li>
                                            <li><i class="fi flaticon-envelope"></i>Hastium@gmail.com</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end container -->
                </div>

            </footer>
            <!-- end wpo-site-footer -->
        </div>
    </div>
    <!-- end of page-wrapper -->
    <!-- All JavaScript files
    ================================================== -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Plugins for this template -->
    <script src="assets/js/jquery-plugin-collection.js"></script>
    <!-- Custom script for this template -->
    <script src="assets/js/script.js"></script>
</body>

</html>
