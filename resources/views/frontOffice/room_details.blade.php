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

        <!-- Room Start -->
        <div class="container py-5">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <img src="{{ asset('Pback/assets/images/' . $room->image) }}" class="card-img-top" alt="Room Image" style="max-width: 80%; height: auto;">
                        <div class="card-body">
                            <h5 class="card-title">{{$room->name}}</h5>
                            <p class="card-text">{!! $room->description !!}</p>
                            <ul class="list-group mb-3">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Floor :
                                    <span class="badge bg-primary rounded-pill">Number: {{$room->floor}}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Category :
                                    <span class="badge bg-primary rounded-pill">{{$room->categories->name}}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Room Type :
                                    <span class="badge bg-primary rounded-pill">{{$room->room_type}}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Occupancy :
                                    <span class="badge bg-primary rounded-pill">{{$room->max_occupancy}}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Price per Night :
                                    <span class="badge bg-primary rounded-pill">${{$room->price}}</span>
                                </li>
                                <li class="list-group-item">
                                    Services :
                                    <ul class="list-group mt-2">
                                        @foreach($room->services as $service)
                                        <li class="list-group-item">
                                            <i class="{{ $service->icon_class }} fs-6 me-2"></i>{{ $service->name }}
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bookRoomModal">
                                Book Now
                            </button>
                            <a href="{{ route('frontIndex') }}" class="btn btn-secondary">Back to Rooms</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="bookRoomModal" tabindex="-1" aria-labelledby="bookRoomModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="bookRoomModalLabel">Book Room</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Your booking form goes here -->
                        <form action="{{ route('book', $room->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="check_in_date" class="form-label">Check-in Date</label>
                                <input type="date" class="form-control" id="check_in_date" name="check_in_date" required>
                            </div>
                            <div class="mb-3">
                                <label for="check_out_date" class="form-label">Check-out Date</label>
                                <input type="date" class="form-control" id="check_out_date" name="check_out_date" required>
                            </div>
                            <div class="mb-3">
                                <label for="total_price" class="form-label">Total Price</label>
                                <input type="text" class="form-control" id="total_price" name="total_price" readonly>
                            </div>
                            <input type="hidden" name="user_id" value="{{ session('user_id') }}">
                            <button type="submit" class="btn btn-primary">Book Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="Pfront/lib/wow/wow.min.js"></script>
    <script src="Pfront/lib/easing/easing.min.js"></script>
    <script src="Pfront/lib/waypoints/waypoints.min.js"></script>
    <script src="Pfront/lib/counterup/counterup.min.js"></script>
    <script src="Pfront/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="Pfront/lib/tempusdominus/js/moment.min.js"></script>
    <script src="Pfront/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="Pfront/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
        $(function() {
            // Get today's date
            let today = new Date();
            // Get the day, month, and year
            let dd = today.getDate();
            let mm = today.getMonth() + 1; //January is 0!
            let yyyy = today.getFullYear();

            // Add leading zeros if necessary
            if (dd < 10) {
                dd = '0' + dd;
            }
            if (mm < 10) {
                mm = '0' + mm;
            }

            // Format the date as 'YYYY-MM-DD'
            today = yyyy + '-' + mm + '-' + dd;

            // Set the minimum date for check-in and check-out to today
            $('#check_in_date').attr('min', today);
            $('#check_out_date').attr('min', today);

            // When the check-in date changes
            $('#check_in_date').on('change', function() {
                // Set the minimum date for check-out to the selected check-in date
                $('#check_out_date').attr('min', $(this).val());
                // Clear the check-out date to prevent selecting an invalid date
                $('#check_out_date').val('');
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const checkInDateInput = document.getElementById('check_in_date');
            const checkOutDateInput = document.getElementById('check_out_date');
            const totalPriceInput = document.getElementById('total_price');
            const pricePerNight = {{$room -> price}};

            checkInDateInput.addEventListener('change', updateTotalPrice);
            checkOutDateInput.addEventListener('change', updateTotalPrice);

            function updateTotalPrice() {
                const nights = Math.round((new Date(checkOutDateInput.value) - new Date(checkInDateInput.value)) / (1000 * 60 * 60 * 24));
                totalPriceInput.value = (pricePerNight * nights).toFixed(2);
            }
        });
    </script>


</body>

</html>