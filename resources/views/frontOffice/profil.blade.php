<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Hotelier - Hotel HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

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
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->

        <!-- Spinner End -->

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
                                <a class="" href=""><i class="fab fa-youtube"></i></a>
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
                            <a href="{{ route('myBookings') }}" class="btn btn-primary rounded-0 py-2 px-md-4 d-none d-lg-block">Profile <i class="fa fa-arrow-right ms-3"></i></a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Header End -->

        <div class="container-fluid bg-light py-5">
            <div class="container">
                <h1 class="mb-4">Welcome to your profile <span class="text-primary text-uppercase">{{ session('username') }}</span></h1>

                <h3 class="mb-3">Your Bookings:</h3>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User Email</th>
                                        <th>Room Id</th>
                                        <th>Check-in</th>
                                        <th>Check-out</th>
                                        <th>Price</th>
                                        <th>Cancel</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($bookings as $booking)
                                    <tr>
                                        <td>{{ $booking->id }}</td>
                                        <td>{{ $booking->user->email }}</td>
                                        <td>{{ $booking->room->id }}</td>
                                        <td>{{ $booking->check_in_date }}</td>
                                        <td>{{ $booking->check_out_date }}</td>
                                        <td>{{ $booking->total_price }}</td>
                                        <td>
                                            <button type="button" class="btn btn-link text-danger" onclick="openCancelModal('{{ $booking->id }}')">
                                                <i class="bi bi-trash h5"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<!-- Cancel booking Modal -->
<div class="modal fade" id="cancelBookingModal" tabindex="-1" aria-labelledby="cancelBookingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cancelBookingModalLabel">Cancel Booking</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to cancel the booking?</p>
            </div>
            <div class="modal-footer">
                <form id="cancelBookingForm" action="{{ route('cancelBooking') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="booking_id" id="booking_id">
                    <button type="submit" class="btn btn-danger">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
        <script src="Pback/assets/js/sidebarmenu.js"></script>
        <script src="Pback/assets/js/app.min.js"></script>
        <script src="Pback/assets/libs/simplebar/dist/simplebar.js"></script>
        <script>
    function openCancelModal(bookingId) {
        var cancelForm = document.getElementById('cancelBookingForm');
        cancelForm.action = '/cancel-booking';
        document.getElementById('booking_id').value = bookingId;

        var cancelModal = new bootstrap.Modal(document.getElementById('cancelBookingModal'));
        cancelModal.show();
    }
</script>

    </div>
</body>

</html>