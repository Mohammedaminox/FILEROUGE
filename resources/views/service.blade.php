@extends('layout')

@section('content')
<!-- Header End -->
<div class="container-fluid">
    <div class="card">

        <div class="d-flex justify-content-between align-items-center mb-3" id="header2">
            <div>
                <button type="button" class="btn btn-primary btn-lg me-2" data-bs-toggle="modal" data-bs-target="#addServiceModal">Add Service</button>
            </div>
        </div>

        <table class="table table-stripe align-middle mb-0 bg-white">
            <thead class="bg-light">
                <tr>
                    <th>Name</th>
                    <th></th>
                    <th>Icon Class</th>
                    <th></th>
                    <th></th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $service)
                <tr>
                    <td>{{ $service->name }}</td>
                    <td></td>
                    <td>{{ $service->icon_class }}</td>
                    <td></td>
                    <td></td>
                    <td>
                        <button type="button" class="btn btn-link btn-sm btn-rounded text-danger" onclick="openDeleteModal('{{ $service->id }}')">
                            <i class="bi bi-trash h5"></i>
                        </button>
                        <button type="button" class="btn btn-link btn-sm btn-rounded" onclick="openEditModal('{{ $service->id }}', '{{ $service->name }}', '{{ $service->icon_class }}')">
                            <i class="bi bi-pencil h5"></i>
                        </button>


                    </td>
                </tr>
                @endforeach
                </tr>
            </tbody>
        </table>

    </div>


</div>
</div>


<!-- OUTSIDE THE MODAL -->
<!-- OUTSIDE THE MODAL -->
<!-- OUTSIDE THE MODAL -->

<!-- <div class="mb-3">
    <select name="icon_class" class="form-select" id="icon_select">
        @foreach($iconClasses as $iconClass)
        <option value="{{ $iconClass->class_name }}">{{ $iconClass->class_name }}</option>
        @endforeach
    </select>
</div> -->






<!-- Add service Modal -->
<div class="modal fade" id="addServiceModal" tabindex="-1" aria-labelledby="addServiceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addServiceModalLabel">Add New Service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('service.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="serviceName" class="form-label">Service Name</label>
                        <input type="text" class="form-control" id="serviceName" name="name" placeholder="Enter service name">
                    </div>

                    <div class="mb-3">
                        <select name="icon_class" class="form-select" id="icon_select">
                            @foreach($iconClasses as $iconClass)
                            <option value="{{ $iconClass->class_name }}">{{ $iconClass->class_name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#icon_select').select2({
            templateResult: formatState,
            escapeMarkup: function(m) {
                return m;
            }, // Allows HTML in option text
            dropdownCssClass: "select2-dropdown-z-index"
        });

        function formatState(state) {
            if (!state.id) {
                return state.text;
            }
            return $('<span><i class="' + state.text + '"></i> ' + state.text + '</span>');
        }
    });
</script>

<style>
    .select2-dropdown-z-index {
        z-index: 100000;
    }
</style>




<!-- Edit service Modal -->
<div class="modal fade" id="editServiceModal" tabindex="-1" aria-labelledby="editServiceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editServiceModalLabel">Edit Service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editServiceForm" action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="editServiceName" class="form-label">Service Name</label>
                        <input type="text" class="form-control" id="editServiceName" name="name" placeholder="Enter service name">
                    </div>



                    <div class="mb-3">
                        <label for="editServiceIcon" class="form-label">Icon Class</label>
                        <select name="icon_class" id="editServiceIcon" class="form-select">
                            @foreach($iconClasses as $iconClass)
                            <option value="{{ $iconClass->class_name }}">
                                <i class="{{ $iconClass->class_name }}">ppp</i>
                            </option>
                            @endforeach
                        </select>
                    </div>


                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- Delete service Modal -->
<div class="modal fade" id="deleteServiceModal" tabindex="-1" aria-labelledby="deleteServiceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteServiceModalLabel">Delete Service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete the service?</p>
            </div>
            <div class="modal-footer">
                <form id="deleteServiceForm" action="" method="POST">
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
    function openEditModal(serviceId, serviceName) {
        var editForm = document.getElementById('editServiceForm');
        editForm.action = '/service/' + serviceId;

        var editModal = new bootstrap.Modal(document.getElementById('editServiceModal'));
        editModal.show();

        document.getElementById('editServiceName').value = serviceName;
        document.getElementById('editServiceIcon').value = serviceIcon;
    }

    function openDeleteModal(serviceId) {
        var deleteForm = document.getElementById('deleteServiceForm');
        deleteForm.action = '/service/' + serviceId;

        var deleteModal = new bootstrap.Modal(document.getElementById('deleteServiceModal'));
        deleteModal.show();
    }
</script>


</body>

</html>