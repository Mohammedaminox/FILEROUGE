<div class="row g-4">
    @foreach ($available_rooms as $room)
    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
        <div class="room-item shadow rounded overflow-hidden">
            <div class="position-relative">
                <img class="blog-image" src="{{ asset('Pback/assets/images/' . $room->image) }}" width="100%" height="250" alt="room Image" />
                <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">${{$room->price}} /Night</small>
            </div>
            <div class="p-4 mt-2">
                <div class="d-flex justify-content-between mb-3">
                    <h5 class="mb-0">{{$room->categories->name}} </h5>
                </div>
                <div class="d-flex mb-3">
                    @foreach($room->services as $service)
                    <small class="border-end me-3 pe-3"><i class="{{ $service->icon_class }} fs-6 "></i>{{ $service->name }}</small>
                    @endforeach
                </div>
                <p class="text-body mb-3">{!! $room->description !!} </p>
                <div class="d-flex justify-content-between">
                    <a class="btn btn-sm btn-primary rounded py-2 px-4" href="{{ url('room_details', $room->id) }}">View Detail</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>