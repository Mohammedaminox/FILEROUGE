@extends('frontOffice.header')

@section('content')

<!-- Room Start -->
@if(session("success"))
<div class="alert alert-success" role="alert">
    {{ session("success") }}
</div>
@endif

@if(session("failed"))
<div class="alert alert-danger" role="alert">
    {{ session("failed") }}
</div>
@endif

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
                        <input type="date" class="form-control check_in_date" id="check_in_date" name="check_in_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="check_out_date" class="form-label">Check-out Date</label>
                        <input type="date" class="form-control check_out_date" id="check_out_date" name="check_out_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="total_price" class="form-label">Total Price</label>
                        <input type="text" class="form-control" id="total_price" name="total_price" readonly>
                    </div>
                    <input type="hidden" name="user_id" value="{{ session('user_id') }}">
                    <input type="hidden" id="room_price" value="{{ $room->price }}">
                    <button type="submit" class="btn btn-primary">Book Now</button>
                </form>
            </div>
        </div>
    </div>
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
<script src="/public/Pfront/js/main.js"></script>



</body>

</html>
@endsection