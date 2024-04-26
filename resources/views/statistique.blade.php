@extends('layout')

@section('content')

<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <i class="fas fa-users fa-2x mb-2"></i>
                            <h5 class="card-title mb-3">Total Users</h5>
                            <p class="card-text h4">{{ $users }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <i class="fas fa-concierge-bell fa-2x mb-2"></i>
                            <h5 class="card-title mb-3">Total Services</h5>
                            <p class="card-text h4">{{ $services }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <i class="fas fa-list-alt fa-2x mb-2"></i>
                            <h5 class="card-title mb-3">Total Categories</h5>
                            <p class="card-text h4">{{ $categories }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <i class="fas fa-bed fa-2x mb-2"></i>
                            <h5 class="card-title mb-3">Total Rooms</h5>
                            <p class="card-text h4">{{ $rooms }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <i class="fas fa-door-open fa-2x mb-2"></i>
                            <h5 class="card-title mb-3">Total Bookings</h5>
                            <p class="card-text h4">{{ $bookings }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <i class="fas fa-times-circle fa-2x mb-2"></i>
                            <h5 class="card-title mb-3">Cancelled Bookings</h5>
                            <p class="card-text h4">{{ $cancelBookings }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <i class="fas fa-check-circle fa-2x mb-2"></i>
                            <h5 class="card-title mb-3">Confirmed Bookings</h5>
                            <p class="card-text h4">{{ $confirmeBookings }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection