@extends('layout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Rooms</div>

                <div class="card-body">
                    <!-- Button to trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addroomModal">
                        Add Room
                    </button>
                </div>
            </div>
            @foreach ($rooms as $room)
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="{{ asset('Pback/assets/images/' . $room->image) }}" class="img-fluid" alt="room Image">
                        </div>
                        <div class="col-md-9">
                            <p class="card-text">{!! $room->description !!}</p>
                        </div>
                    </div>

                    <h5 class="card-title">{{ $room->room_number }} <span><b>Floor:</b> {{ $room->floor }}</span></h5>
                    <h5 class="card-title 
                       @if($room->status === 'vacant') 
                       text-success 
                       @else 
                       text-danger 
                       @endif">
                        {{ $room->status }}
                    </h5>


                    <div class="row">
                        <div class="col-3">
                            <b>Categorie:</b> {{ $room->categories->name }}
                        </div>

                    </div>




                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editroomModal{{ $room->id }}">Edit</button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal{{ $room->id }}">Delete</button>


                    <!-- Delete Confirmation Modal -->
                    <div class="modal fade" id="confirmDeleteModal{{ $room->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel{{ $room->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmDeleteModalLabel{{ $room->id }}">
                                        Confirm Delete</h5>

                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete this room?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <!-- Form to submit delete request -->
                                    <form action="{{ route('room.destroy', $room->id) }}" method="POST">

                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Edit room Modal -->
                <div class="modal fade" id="editroomModal{{ $room->id }}" tabindex="-1" role="dialog" aria-labelledby="editroomModalLabel{{ $room->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editroomModalLabel{{ $room->id }}">Edit
                                    room</h5>

                            </div>
                            <div class="modal-body">
                                <form action="{{ route('room.update', $room->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')


                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" class="form-control-file" id="image" name="image">
                                    </div>

                                    <!-- price input -->
                                    <div class="form-group">
                                        <label for="price">price</label>
                                        <input type="number" class="form-control" id="price" name="price" value="{{ $room->price }}">
                                    </div>


                                    <!-- FLOOR input -->
                                    <div class="form-group">
                                        <label for="floor">floor</label>
                                        <input type="number" class="form-control" id="floor" name="floor" value="{{ $room->floor }}">
                                    </div>

                                    <!-- MAXoccup input -->
                                    <div class="form-group">
                                        <label for="max_occupancy">max_occupancy</label>
                                        <input type="number" min="1" class="form-control" id="max_occupancy" name="max_occupancy" value="{{ $room->max_occupancy }}">
                                    </div>

                                    <!-- type input -->
                                    <div class="form-group">
                                        <label for="room_type">room_type</label>
                                        <select class="form-control" id="room_type" name="room_type">

                                            <option value="single" {{ $room->room_type === 'single' ? 'selected' : '' }}>single</option>
                                            <option value="double" {{ $room->room_type === 'double' ? 'selected' : '' }}>double</option>
                                            <option value="suite" {{ $room->room_type === 'suite' ? 'selected' : '' }}>suite</option>

                                        </select>
                                    </div>

                                    <!-- status input -->
                                    <div class="form-group">
                                        <label for="status">status</label>
                                        <select class="form-control" id="status" name="status">

                                            <option value="vacant" {{ $room->status === 'vacant' ? 'selected' : '' }}>vacant</option>
                                            <option value="occupied" {{ $room->status === 'occupied' ? 'selected' : '' }}>occupied</option>
                                            <option value="under_maintenance" {{ $room->status === 'under_maintenance' ? 'selected' : '' }}>under_maintenance</option>
                                        </select>
                                    </div>

                                    <!-- cateogries input -->
                                    <div class="form-group">
                                        <label for="categories">Categories</label>
                                        <select class="form-control" name="category_id" id="categories">
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $room->category_id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <!-- description input -->
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="editor" name="description" rows="6">{{ $room->description }}</textarea>
                                    </div>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Add room Modal -->
    <div class="modal fade" id="addroomModal" tabindex="-1" role="dialog" aria-labelledby="addroomModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addroomModalLabel">Add room</h5>

                </div>
                <form action="{{ route('room.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <!-- image input -->
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>

                        <!-- price input -->
                        <div class="form-group">
                            <label for="price">price</label>
                            <input type="number" class="form-control" id="price" name="price" placeholder="Enter price per day">
                        </div>

                        <!-- roomNum input -->
                        <div class="form-group">
                            <label for="room_number">room_number</label>
                            <input type="text" class="form-control" id="room_number" name="room_number" placeholder="Enter room_number">
                        </div>

                        <!-- FLOOR input -->
                        <div class="form-group">
                            <label for="floor">floor</label>
                            <input type="number" class="form-control" id="floor" name="floor" placeholder="Enter floor_number">
                        </div>

                        <!-- MAXoccup input -->
                        <div class="form-group">
                            <label for="max_occupancy">max_occupancy</label>
                            <input type="number" min="1" class="form-control" id="max_occupancy" name="max_occupancy" placeholder="Enter max_occupancy">
                        </div>

                        <!-- type input -->
                        <div class="form-group">
                            <label for="room_type">room_type</label>
                            <select class="form-control" id="room_type" name="room_type">
                                <option value="single">single</option>
                                <option value="double">double</option>
                                <option value="suite">suite</option>
                            </select>
                        </div>

                        <!-- status input -->
                        <div class="form-group">
                            <label for="status">status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="vacant">vacant</option>
                                <option value="occupied">occupied</option>
                                <option value="under_maintenance">under_maintenance</option>
                            </select>
                        </div>

                        <!-- cateogries input -->
                        <div class="form-group">
                            <label for="categories">Categories</label>
                            <select class="form-control" id="categories" name="category_id">
                                @foreach ($categories as $category)
                                <option value="{{$category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- services input -->
                        <div class="form-group">
                            <label for="services">Services</label>
                            <select class="form-control" id="services" name="service_id">
                                @foreach ($services as $service)
                                <option value="{{$service->id }}">{{ $service->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <!-- description input -->
                        <div class="form-group">
                            <label for="editor">Description</label>

                            <textarea name="description" id="editorAddroom"></textarea>
                        </div>

                        <!-- user input -->
                        <input type="hidden" value="{{ $user }}" name="user_id">





                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>



    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#editorAddroom'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>





    <script src="Pback/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="Pback/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="Pback/assets/js/sidebarmenu.js"></script>
    <script src="Pback/assets/js/app.min.js"></script>
    <script src="Pback/assets/libs/simplebar/dist/simplebar.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @endsection