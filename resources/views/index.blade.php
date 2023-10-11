<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<!doctype html>
<html lang="en">

<head>
    <!-- //for-mobile-apps -->
		<link href="{{asset('frontend/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
		<!-- pignose css -->
		<link href="{{asset('frontend/css/pignose.layerslider.css')}}" rel="stylesheet" type="text/css" media="all" />
		<!-- //pignose css -->
		<link href="{{asset('frontend/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
		<!-- js -->
		<script type="text/javascript" src="{{asset('frontend/js/jquery-2.1.4.min.js')}}"></script>
		<!-- //js -->
		<!-- cart -->
			<script src="{{asset('frontend/js/simpleCart.min.js')}}"></script>
		<!-- cart -->
		<!-- for bootstrap working -->
			<script type="text/javascript" src="{{asset('frontend/js/bootstrap-3.1.1.min.js')}}"></script>
			<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css'>
		<!-- //for bootstrap working -->
		<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
		<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
		<script src="{{asset('frontend/js/jquery.easing.min.js')}}"></script>
		@livewireStyles
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Movitech</title>
    <!--/google-fonts -->
    <link href="//fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,700;1,700&display=swap" rel="stylesheet">
    <!--//google-fonts -->
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
</head>
<!--/Header-->
<livewire:navbar>
	
<body>
    <!--//Header-->
    <!--//Banner-slider-->
	<div>
		<section class="w3l-main-slider banner-slider position-relative" id="home">
			{{-- <livewire:pricing> --}}
		</section>
		<!-- //main-slider -->
	</div>
    <!--/w3-grids-->
    <section class="w3l-passion-mid-sec py-5">
        <div class="container py-md-5 py-3">
            <div class="row w3l-passion-mid-grids">
                <div class="col-lg-5 passion-grid-item-info mb-lg-0 mb-5 pe-lg-3">
                    <h6 class="title-subhny">About Us</h6>
                    <h3 class="title-w3l mb-4">FinAgenc Build Branded Design</h3>
                    <p class="mt-2 pe-lg-5">Lorem ipsum viverra feugiat. Pellen tesque libero ut justo, ultrices in ligula. Semper at tempufddfel.Lorem ipsum dolor sit, amet consectetur elit.</p>
                    <p class="mt-3 pe-lg-5">Lorem ipsum viverra feugiat. Pellen tesque libero ut justo, ultrices in ligula. Semper at tempufddfel.Lorem ipsum dolor sit, amet consectetur elit.</p>

                </div>
                <div class="col-lg-7 passion-grid-item-info ps-lg-5">
                    <h6 class="title-subhny">History</h6>
                    <h3 class="title-w3l mb-4">Providing brilliant ideas for your business</h3>
                    <p class="mt-2 pe-lg-5">We help transform your ideas into real world applications that will outperform your toughest competition and help you achieve your strategic goals in short period of time.</p>
                    <p class="mt-3 pe-lg-5">We have been creating award-winning brands, websites, digital products, mobile apps and custom software since 2008.</p>
                    <div class="w3banner-content-btns">
                        <a href="about.html" class="btn btn-style btn-primary mt-lg-5 mt-4">Read More </a>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//w3-grids-->
    <!-- features-section -->
    <section class="w3l-features py-5" id="features">
        <div class="container py-lg-5">
            <div class="row pb-lg-5 mb-lg-5 pt-lg-3">
                <div class="col-lg-5 text-left">
                    <h6 class="title-subhny two">What We Offer</h6>
                    <h3 class="title-w3l two">Building Brands More Quickly</h3>
                </div>
                <div class="col-lg-7 text-left ps-lg-5">
                    <p class="w3p-white">Lorem ipsum viverra feugiat. Pellen tesque libero ut justo, ultrices in ligula. Semper at tempufddfel.Lorem ipsum dolor sit, amet consectetur elit.Lorem ipsum dolor sit amet.</p>
                </div>
            </div>
        </div>
    </section>
    <!--//features-section -->
    <!--/w3l-features-grids-->
    <section class="w3l-features-grids">
        <div class="container">
            <div class="main-cont-wthree-2">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 mt-lg-5 mt-4">
                        <div class="grids-1 box-wrap">
                            <div class="icon">
                                <i class="fas fa-paint-brush"></i>
                            </div>
                            <h4><a href="#service" class="title-head mb-3">UX Design</a></h4>
                            <p class="text-para">Lorem ipsum dolor sit amet, elit. Id ab commodi magnam. </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-lg-5 mt-4">
                        <div class="grids-1 box-wrap active">
                            <div class="icon">
                                <i class="fas fa-bullhorn"></i>
                            </div>
                            <h4><a href="#service" class="title-head mb-3">Marketing</a></h4>
                            <p class="text-para">Lorem ipsum dolor sit amet, elit. Id ab commodi magnam. </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-lg-5 mt-4">
                        <div class="grids-1 box-wrap">
                            <div class="icon">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <h4><a href="#service" class="title-head mb-3">
                                    Web Development</a></h4>
                            <p class="text-para">Lorem ipsum dolor sit amet, elit. Id ab commodi magnam. </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--//w3l-features-grids-->

    <!--/w3-grids-->
    <section class="w3l-passion-mid-sec py-5">
        <div class="container py-md-5 py-3">
            <div class="heading text-center mx-auto">
                <h6 class="title-subhny">Our Works</h6>
                <h3 class="title-w3l mb-3">What We Do</h3>
            </div>
            <!--/row-1-->
            <div class="w3l-passion-mid-grids w3recent-works mt-5">
                <!--/row-1-->
                <div class="row w3l-passion-mid-grids">
                    <div class="col-lg-6 w3grids-left-img p-0">
                        <img src="assets/images/g1.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="col-lg-6 passion-grid-item-info p-0">
                        <div class="w3grids-right-info">
                            <div class="icon-text">
                                <h5>UI/UX Design</h5>
                                <h4><a href="#recent" class="title-head">
                                        The ideas that are not afraid to be different.</a></h4>
                                <p class="text-para mt-2 mb-4">Lorem ipsum viverra feugiat. Pellen tesque libero ut justo, ultrices in ligula tempufddfel.</p>
                                <a href="#" class="read-more-icon"><i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--//row-1-->
                <!--/row-2-->
                <div class="row partrow-2 w3l-passion-mid-grids mt-lg-5 mt-4">
                    <div class="col-lg-6 passion-grid-item-info p-0">
                        <div class="w3grids-right-info">
                            <div class="icon-text">
                                <h5>Web Development</h5>
                                <h4><a href="#recent" class="title-head">
                                        The ideas that are not afraid to be different.</a></h4>
                                <p class="text-para mt-2 mb-4">Lorem ipsum viverra feugiat. Pellen tesque libero ut justo, ultrices in ligula tempufddfel.</p>
                                <a href="#" class="read-more-icon"><i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 w3grids-left-img p-0">
                        <img src="assets/images/g4.jpg" alt="" class="img-fluid">
                    </div>
                </div>
                <!--//row-2-->
                <!--/row-3-->
                <div class="row w3l-passion-mid-grids mt-lg-5 mt-4">
                    <div class="col-lg-6 w3grids-left-img p-0">
                        <img src="assets/images/g3.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="col-lg-6 passion-grid-item-info p-0">
                        <div class="w3grids-right-info">
                            <div class="icon-text">
                                <h5>Marketing</h5>
                                <h4><a href="#recent" class="title-head">
                                        The ideas that are not afraid to be different.</a></h4>
                                <p class="text-para mt-2 mb-4">Lorem ipsum viverra feugiat. Pellen tesque libero ut justo, ultrices in ligula tempufddfel.</p>
                                <a href="#" class="read-more-icon"><i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--//row-3-->
            </div>
        </div>
    </section>
    <!--//w3-grids-->

    <!--/testimonials-->
    <section class="w3l-clients w3l-bg-grey py-5" id="testimonials">
        <div class="container py-md-5">
            <div class="row w3-testimonial-grids align-items-center py-lg-5">
                <div class="col-12 w3-testimonial-content-top">
                    <div class="mb-4">
                        <div class="item">
                            <div class="testimonial-content">
                                <div class="test-img"><img src="assets/images/team2.jpg" class="img-fluid" alt="client-img">
                                </div>
                                <div class="testimonial">
                                    <blockquote>
                                        <q><i class="fas fa-quote-left me-2"></i>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit beatae
                                            laudantium
                                            voluptate rem ullam dolore nisi voluptatibus esse quasi, doloribus tempora. voluptate rem ullam dolore nisi voluptatibus esse quasi, doloribus tempora.Lorem ipsum dolor amet consectetur adipisicing elit ultrices in ligula.</q>

                                    </blockquote>
                                    <div class="testi-des">

                                        <div class="peopl align-self">
                                            <h3>John wilson</h3>
                                            <p class="indentity">City Name</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- //testimonials -->
    <!--/video-->
    {{-- <section class="w3l-index5 py-5" id="video">
        <div class="container py-md-5">
            <div class="row bottom-ab-grids align-items-center">
                <div class="w3l-video-left col-lg-6 mb-lg-0 mb-5">
                    <!-- /home-page-video-popup-->
                    <div class="position-relative mt-5">
                        <a href="#small-dialog" class="popup-with-zoom-anim play-view text-center position-absolute">
                            <span class="video-play-icon">
                                <span class="fa fa-play"></span>
                            </span>
                        </a>
                        <!-- dialog itself, mfp-hide class is required to make dialog hidden --
                        <div id="small-dialog" class="zoom-anim-dialog mfp-hide">
                            <iframe src="https://player.vimeo.com/video/124801644?h=d2296cb1dc" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                        </div>
						 <!-- dialog itself, mfp-hide class is required to make dialog hidden -->
                    </div>
                    <!-- //home-page-video-popup-->
                </div>
                <div class="w3ab-left-top col-lg-6 mt-lg-0 mt-5 ps-lg-5">
                    <h6 class="title-subhny two">Revealing what is Possible</h6>
                    <h3 class="title-w3l two mb-2">Fresh Ideas, Refreshing Communication</h3>
                    <p class="my-3"> Lorem ipsum viverra feugiat. Pellen tesque libero ut justo, ultrices in ligula. Semper at tempufddfel.Lorem ipsum dolor sit, amet consectetur ante ipsum elit. </p>
                    <p class="my-3"> Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                        Nulla mollis dapibus nunc.</p>
                    <a href="about.html" class="btn btn-style btn-primary mt-4">Read More </a>
                </div>
            </div>
        </div>
    </section> --}}
    <!--//video-->
    <!--/w3llets-work-->
    <section class="w3llets-work py-5">
        <div class="container py-md-5">
            <div class="row justify-content-center">
                <div class="w3llets-work-left col-lg-7">
                    <div class="text-lg-start text-center">
                        <h6 class="title-subhny">Let's Work Together</h6>
                        <h3 class="title-w3l">Have an idea?
                            Let’s get it done right!</h3>
                    </div>
                </div>
                <div class="w3llets-work-right col-lg-5 ps-lg-5 text-lg-end text-center">
                    <div class="w3banner-content-btns text-right">
                        <a href="#contact" class="btn btn-style btn-primary mt-lg-5 mt-4"> Let's Work Together </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//w3llets-work-->
    <!--/footer-->
    

	<livewire:footer /> 

    <!-- //footer -->
    <!--/Js-scripts-->
    <!-- move top -->
    <button onclick="topFunction()" id="movetop" title="Go to top">
        <span class="fas fa-arrow-up" aria-hidden="true"></span>
    </button>
    <script>
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("movetop").style.display = "block";
            } else {
                document.getElementById("movetop").style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }

    </script>
    <!-- //move-top-->
    <!-- Template JavaScript -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/theme-change.js"></script>
    
    <!-- MENU-JS -->
    <script>
        $(window).on("scroll", function() {
            var scroll = $(window).scrollTop();

            if (scroll >= 80) {
                $("#site-header").addClass("nav-fixed");
            } else {
                $("#site-header").removeClass("nav-fixed");
            }
        });

        //Main navigation Active Class Add Remove
        $(".navbar-toggler").on("click", function() {
            $("header").toggleClass("active");
        });
        $(document).on("ready", function() {
            if ($(window).width() > 991) {
                $("header").removeClass("active");
            }
            $(window).on("resize", function() {
                if ($(window).width() > 991) {
                    $("header").removeClass("active");
                }
            });
        });

    </script>
    <!-- //MENU-JS -->

    <!-- disable body scroll which navbar is in active -->
    <script>
        $(function() {
            $('.navbar-toggler').click(function() {
                $('body').toggleClass('noscroll');
            })
        });

    </script>
    <!-- //disable body scroll which navbar is in active -->

    <!-- //bootstrap -->
    <script src="assets/js/bootstrap.min.js"></script>

</body>

</html>
