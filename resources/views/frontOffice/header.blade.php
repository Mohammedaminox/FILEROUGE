<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Hotelier - Hotel HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <base href="/public">
    <!-- Favicon -->
    <link href="Pfront/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="Pfront/lib/animate/animate.min.css" rel="stylesheet">
    <link href="Pfront/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="Pfront/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="Pfront/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="Pfront/css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
    <div>


        <!-- Header Start -->
        <div class="container-fluid bg-dark px-0">
            <div class="row gx-0">
                <div class="col-lg-3 bg-dark d-none d-lg-block">
                    <a href="index.html" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                        <h1 class="m-0 text-primary text-uppercase">Hotelier</h1>
                    </a>
                </div>
                <div class="col-lg-9">
                    <div class="row gx-0 bg-white d-none d-lg-flex">
                        <div class="col-lg-7 px-5 text-start">
                            <div class="h-100 d-inline-flex align-items-center py-2 me-4">
                                <i class="fa fa-envelope text-primary me-2"></i>
                                <p class="mb-0">info@example.com</p>
                            </div>
                            <div class="h-100 d-inline-flex align-items-center py-2">
                                <i class="fa fa-phone-alt text-primary me-2"></i>
                                <p class="mb-0">+012 345 6789</p>
                            </div>
                        </div>
                        <div class="col-lg-5 px-5 text-end">
                            <div class="d-inline-flex align-items-center py-2">
                                <a class="me-3" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="me-3" href=""><i class="fab fa-twitter"></i></a>
                                <a class="me-3" href=""><i class="fab fa-linkedin-in"></i></a>
                                <a class="me-3" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                        <a href="index.html" class="navbar-brand d-block d-lg-none">
                            <h1 class="m-0 text-primary text-uppercase">Hotelier</h1>
                        </a>
                        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                            <div class="navbar-nav mr-auto py-0">
                                <a href="{{ route('frontIndex') }}" class="nav-item nav-link active">Home</a>
                                <a href="{{ route('frontAbout') }}" class="nav-item nav-link">About</a>
                                <a href="{{ route('frontServices') }}" class="nav-item nav-link">Services</a>
                                <a href="{{ route('frontRooms') }}" class="nav-item nav-link">Rooms</a>
                                <a href="{{ route('frontContact') }}" class="nav-item nav-link">Contact</a>
                            </div>
                            <div class="d-flex align-items-center">
                                <a href="{{ route('myBookings') }}" class="btn btn-primary rounded-0 py-2 px-md-4 d-block d-lg-inline-block me-2">Bookings <i class="bi bi-calendar2-check ms-3"></i></a>

                                <a href="{{ route('logout') }}" class="btn btn-primary rounded-0 py-2 px-md-4 d-block d-lg-inline-block" onclick="event.preventDefault(); document.getElementById('front-logout-form').submit();">Logout <i class="fa fa-arrow-right ms-3"></i></a>
                                <form id="front-logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                            </div>
                        </div>
                    </nav>

                </div>
            </div>
        </div>
        <!-- Header End -->
        <!-- Header End -->
        @yield('content')


    </div>

    <!-- JavaScript Libraries -->
    <script src="Pfront/lib/jquery/jquery.min.js"></script>
    <script src="Pfront/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="Pfront/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="Pfront/lib/tempusdominus/js/moment.min.js"></script>
    <script src="Pfront/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="Pfront/lib/wow/wow.min.js"></script>
    <script src="Pfront/lib/waypoints/waypoints.min.js"></script>
    <script src="Pfront/lib/counterup/counterup.min.js"></script>
    <script src="Pfront/lib/isotope/isotope.pkgd.min.js"></script>
    <script src="Pfront/lib/magnific-popup/magnific-popup.min.js"></script>
    <script src="Pfront/lib/venobox/venobox.min.js"></script>
    <!-- Contact Form JavaScript File -->
    <script src="Pfront/contactform/contactform.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Template Main Javascript File -->
    <script src="Pfront/js/main.js"></script>

</body>

</html>