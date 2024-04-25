@extends('frontOffice.header')

@section('content')

@if(session("success"))
<div class="alert alert-success" role="alert">
    {{ session("success") }}
</div>
@endif
<div class="container-fluid bg-light py-5">
    <div class="container">
        <h1 class="mb-4">Welcome <span class="text-primary text-uppercase">{{ session('username') }}</span></h1>

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
@endsection