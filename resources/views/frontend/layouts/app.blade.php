<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>WildCare</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{ asset('fabicon16x16.png') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Flaticon Font -->
    <link href="{{ asset('frontend/lib/flaticon/font/flaticon.css') }}" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <!-- <div class="row bg-secondary py-2 px-lg-5">
            <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center">
                    <a class="text-white pr-3" href="">FAQs</a>
                    <span class="text-white">|</span>
                    <a class="text-white px-3" href="">Help</a>
                    <span class="text-white">|</span>
                    <a class="text-white pl-3" href="">Support</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-white px-3" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-white px-3" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-white px-3" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-white px-3" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-white pl-3" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div> -->
        <!-- <div class="row py-3 px-lg-5">
            <div class="col-lg-4">
                <a href="" class="navbar-brand d-none d-lg-block">
                    <h1 class="m-0 display-5 text-capitalize"><span class="text-primary">Pet</span>Lover</h1>
                </a>
            </div>
            <div class="col-lg-8 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <div class="d-inline-flex flex-column text-center pr-3 border-right">
                        <h6>Opening Hours</h6>
                        <p class="m-0">8.00AM - 9.00PM</p>
                    </div>
                    <div class="d-inline-flex flex-column text-center px-3 border-right">
                        <h6>Email Us</h6>
                        <p class="m-0">info@example.com</p>
                    </div>
                    <div class="d-inline-flex flex-column text-center pl-3">
                        <h6>Call Us</h6>
                        <p class="m-0">+012 345 6789</p>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid p-0  ">
        <nav class="navbar navbar-expand-lg bg-dark1 navbar-dark py-3 py-lg-0 px-lg-5 fixed-top" id="nav" data-spy="affix">
            <div class="col-lg-4">
                <a href="" class="navbar-brand d-none d-lg-block justify-content-center">
                    <!-- <h1 class="m-0 display-5 text-capitalize"><span class="text-primary">Pet</span>Lover</h1> -->
                    <img class="w-50" src="{{asset('brand_original.png')}}" alt="" srcset="">
                </a>
            </div>
            <div class="d-flex">

                <a href="" class="navbar-brand d-block d-lg-none">
                    <img class="w-25 m-0 display-5" src="{{asset('brand_original.png')}}" alt="" srcset="" />
                    <!-- <h1 class="m-0 display-5"><span class="text-primary">Safety</span>First</h1> -->
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-nav navbar-collapse justify-content-between px-3" id="navbarCollapse">
                <div class="navbar-nav ml-auto py-0">
                    <a href="index.html" class="nav-item nav-link active">Home</a>
                    @foreach($pages as $page)
                    @if($page->is_nav_page && $page->parentPage == null)
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link {{count($page->childPages) > 0 ? 'dropdown-toggle':''}}" data-toggle="dropdown">{{$page->title}}</a>
                        @if(count($page->childPages) > 0)
                        <div class="dropdown-menu rounded-0 m-0">
                            @foreach($page->childPages as $childPage)
                            <a href="blog.html" class="dropdown-item">{{$childPage->title}}</a>
                            @endforeach
                        </div>
                        @endif
                    </div>
                    @endif
                    @endforeach
                    <!-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">About</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="blog.html" class="dropdown-item">Blog Grid</a>
                            <a href="single.html" class="dropdown-item">Blog Detail</a>
                        </div>
                    </div> -->
                    <!-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Projects</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="blog.html" class="dropdown-item">Blog Grid</a>
                            <a href="single.html" class="dropdown-item">Blog Detail</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Work</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="blog.html" class="dropdown-item">Blog Grid</a>
                            <a href="single.html" class="dropdown-item">Blog Detail</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Media</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="blog.html" class="dropdown-item">Blog Grid</a>
                            <a href="single.html" class="dropdown-item">Blog Detail</a>
                        </div>
                    </div>
                    <a href="contact.html" class="nav-item nav-link">Contact</a>
                    <a href="contact.html" class="nav-item nav-link">Donate</a> -->
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    @yield('content')

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white mt-5 py-5 px-sm-3 px-md-5">
        <div class="row pt-5">
            <div class="col-lg-4 col-md-12 mb-5">
                <a href="" class="d-lg-block justify-content-center">
                    <!-- <h1 class="m-0 display-5 text-capitalize"><span class="text-primary">Pet</span>Lover</h1> -->
                    <img class="w-50" src="{{asset('brand_original.png')}}" alt="" srcset="">
                </a>
                <p class="m-0">Ipsum amet sed vero et lorem stet eos ut, labore sed sed stet sea est ipsum ut. Volup
                    amet
                    ea sanct ipsum, dolore vero lorem no duo eirmod. Eirmod amet ipsum no ipsum lorem clita ut. Ut sed
                    sit
                    lorem ea lorem sed, amet stet sit sea ea diam tempor kasd kasd. Diam nonumy etsit tempor ut sed diam
                    sed et ea</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-primary mb-4">Get In Touch</h5>
                        <p><i class="fa fa-map-marker-alt mr-2"></i>123 Street, New York, USA</p>
                        <p><i class="fa fa-phone-alt mr-2"></i>+012 345 67890</p>
                        <p><i class="fa fa-envelope mr-2"></i>info@example.com</p>
                        <div class="d-flex justify-content-start mt-4">
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-primary mb-4">Popular Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>About
                                Us</a>
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our
                                Services</a>
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our
                                Team</a>
                            <a class="text-white" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-primary mb-4">Newsletter</h5>
                        <form action="">
                            <div class="form-group">
                                <input type="text" class="form-control border-0" placeholder="Your Name" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control border-0" placeholder="Your Email" required="required" />
                            </div>
                            <div>
                                <button class="btn btn-lg btn-primary btn-block border-0" type="submit">Submit
                                    Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid text-white py-4 px-sm-3 px-md-5" style="background: #111111;">
        <div class="row">
            <div class="col-md-6 text-center text-md-left mb-3 mb-md-0">
                <p class="m-0 text-white">
                    &copy; <a class="text-white font-weight-bold" href="#">Your Site Name</a>. All Rights
                    Reserved.
                    Designed by
                    <a class="text-white font-weight-bold" href="https://htmlcodex.com">HTML Codex</a>
                </p>
            </div>
            <div class="col-md-6 text-center text-md-right">
                <ul class="nav d-inline-flex">
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">Privacy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">Terms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">FAQs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">Help</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('frontend/mail/jqBootstrapValidation.min.js') }}"></script>
    <script src="{{ asset('frontend/mail/contact.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script>
        $('nav').affix({
            offset: {
                top: $('#slider-content').offset().top
            }
        });
    </script>
</body>

</html>