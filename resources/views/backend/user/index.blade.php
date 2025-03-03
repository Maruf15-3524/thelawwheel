@extends('layouts.backend')
@section('title', 'User Management')
@section('content')
@if (session()->has('message'))
    <div class="alert alert-dismissable alert-success">
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close" onclick="this.closest('.alert').remove();"></button>
        <strong>{!! session()->get('message') !!}</strong>
    </div>
@endif

<div class="main-content-inner">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Manage Users</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Users</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
                <div class="input-group w-25">
                    <input type="text" class="form-control" placeholder="Search...">
                    <button class="btn btn-primary" type="button">Search</button>
                </div>
                <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addUser">Add User</a>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                        <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#viewUser{{$user->id}}">
                            <i class="fas fa-eye"></i>
                        </a>
                            <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editUser{{$user->id}}">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm delete">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>

                    </tr>
                        @include('backend.user.view')
                        @include('backend.user.edit')          
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Add User Modal --}}
<!-- Add User Modal -->
<div class="modal fade" id="addUser" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">Add User</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Phone</label>
                        <input type="text" name="mobile" class="form-control">
                    </div>
                    <div class="form-group">
    <label for="">Image</label>
    <div class="d-flex align-items-center">
        <!-- Image Preview -->
        <div id="imgpreview" class="uploaded-img" style="display: none;">
            <img src="" alt="Uploaded Image" class="img-fluid rounded" id="previewImg"/>
        </div>
        <!-- Upload Area -->
        <div class="upload-area" id="uploadArea">
            <i class="fas fa-cloud-upload-alt fa-2x text-primary"></i>
            <p class="mt-2">Drop your images here or 
                <a href="#" onclick="document.getElementById('myFile').click(); return false;">click to browse</a>
            </p>
            <input type="file" id="myFile" name="img" class="form-control" accept="image/*" hidden onchange="previewImage(event)">
        </div>
    </div>
</div>

                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" required autocomplete="new-password">
                    </div>
                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" required autocomplete="new-password">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-block">Save User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    function previewImage(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                const imgPreviewContainer = document.getElementById('imgpreview');
                const imgElement = document.getElementById('previewImg');
                if (imgElement) {
                    imgElement.src = e.target.result;
                    imgPreviewContainer.style.display = 'block'; 
                }
            };
            reader.readAsDataURL(file);
        }
    }

    // Reset image preview when modal closes
    document.addEventListener("DOMContentLoaded", function () {
        const modal = document.getElementById('addUser');
        if (modal) {
            modal.addEventListener('hidden.bs.modal', function () {
                const imgPreviewContainer = document.getElementById('imgpreview');
                const imgElement = document.getElementById('previewImg');
                if (imgPreviewContainer && imgElement) {
                    imgPreviewContainer.style.display = 'none';
                    imgElement.src = '';
                }
            });
        }
    });
    $(document).ready(function () {
    // Reset image preview to original when modal closes
    $('[id^="editUser"]').on('hidden.bs.modal', function () {
        $(this).find('.user-image-preview').each(function () {
            const originalSrc = $(this).data('original-src'); // Retrieve original image source
            $(this).attr('src', originalSrc); // Restore original image
        });

        // Clear the file input (so users can re-select the same file if needed)
        $(this).find('.user-image-input').val('');
    });
});

function previewUserImage(event, userId) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            const $imgElement = $('#prevues-img-' + userId);
            if ($imgElement.length) {
                $imgElement.attr('src', e.target.result); // Update preview image
            } else {
                console.error('Image element not found for userId:', userId);
            }
        };
        reader.readAsDataURL(file);
    }
}

</script>
<script>
    $(document).ready(function () {
        $(".delete").on('click', function(e) {
            e.preventDefault();
            var selectedForm = $(this).closest('form');
            Swal.fire({
                title: "Are you sure?",
                text: "You want to delete this record?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then(function (result) {
                if (result.isConfirmed) {
                    selectedForm.submit();
                }
            });
        });
    });
</script>

@endsection
