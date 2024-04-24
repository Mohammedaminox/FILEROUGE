@extends('layout')

@section('content')

<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Total Users</h5>
                            <p class="card-text">{{ $users }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Total Services</h5>
                            <p class="card-text">{{ $services }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Total Categories</h5>
                            <p class="card-text">{{ $categories }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Total Rooms</h5>
                            <p class="card-text">{{ $rooms }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Total Bookings</h5>
                            <p class="card-text">{{ $bookings }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Cancelled Bookings</h5>
                            <p class="card-text">{{ $cancelBookings }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Confirmed Bookings</h5>
                            <p class="card-text">{{ $confirmeBookings }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
