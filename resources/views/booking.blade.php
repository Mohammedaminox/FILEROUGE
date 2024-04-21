@extends('layout')

@section('content')
<!-- Header End -->
<div class="container-fluid">
    <div class="card">


        <table class="table table-stripe align-middle mb-0 bg-white">
            <thead class="bg-light">
                <tr>
                    <th>#</th>
                    <th>UserEmail</th>
                    <th>RoomId</th>
                    <th>Check-in</th>
                    <th>Check-out</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Actions</th>
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
                    <td class="{{ $booking->status === 'confirmed' ? 'text-success' : 'text-danger' }}">{{ $booking->status }}</td>
                    <td>
                        <button type="button" class="btn btn-link btn-sm btn-rounded text-danger" onclick="openDeleteModal('{{ $booking->id }}')">
                            <i class="bi bi-trash h5"></i>
                        </button>

                    </td>
                </tr>
                @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</div>





<!-- Delete booking Modal -->
<div class="modal fade" id="deleteBookingModal" tabindex="-1" aria-labelledby="deleteBookingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteBookingModalLabel">Delete Booking</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete the booking?</p>
            </div>
            <div class="modal-footer">
                <form id="deleteBookingForm" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>


@endsection

<script src="Pback/assets/libs/jquery/dist/jquery.min.js"></script>
<script src="Pback/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="Pback/assets/js/sidebarmenu.js"></script>
<script src="Pback/assets/js/app.min.js"></script>
<script src="Pback/assets/libs/simplebar/dist/simplebar.js"></script>
<script>

    function openDeleteModal(bookingId) {
        var deleteForm = document.getElementById('deleteBookingForm');
        deleteForm.action = '/booking/' + bookingId;

        var deleteModal = new bootstrap.Modal(document.getElementById('deleteBookingModal'));
        deleteModal.show();
    }
</script>


</body>

</html>