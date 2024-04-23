@extends('layout')

@section('content')
<!-- Header End -->
<div class="container-fluid">
    <div class="card">



        <table class="table table-stripe align-middle mb-0 bg-white">
            <thead class="bg-light">
                <tr>
                    <th>Name</th>
                    <th></th>
                    <th>Email</th>
                    <th></th>
                    <th></th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td></td>
                    <td>{{ $user->email }}</td>
                    <td></td>
                    <td></td>
                    <td>
                        <button type="button" class="btn btn-link btn-sm btn-rounded text-danger" onclick="openDeleteModal('{{ $user->id }}')">
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





<!-- Delete User Modal -->
<div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteUserModalLabel">Delete User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete the User?</p>
            </div>
            <div class="modal-footer">
                <form id="deleteUserForm" action="" method="POST">
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

    function openDeleteModal(userId) {
        var deleteForm = document.getElementById('deleteUserForm');
        deleteForm.action = '/user/' + userId;

        var deleteModal = new bootstrap.Modal(document.getElementById('deleteUserModal'));
        deleteModal.show();
    }
</script>

</body>

</html>