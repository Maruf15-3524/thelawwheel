@extends('layouts.backend')
@section('title','dashboard-photo')
@section('content')
<div class="main-content-inner">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Manage Photo</h2>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Manage Team</li>
      </ol>
    </nav>
  </div>

  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between mb-3">
      <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addPhoto">Add Photo</a>
      </div>

      <table class="table table-bordered" id="photoTable">
        <thead>
          <tr>
            <th>#</th>
            <th>Title</th>
            <th>Tumble Img</th>
            <th>Gallery Img</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($photos as $key => $photo)
          <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $photo->title }}</td>
            <td>
              <img src="{{ asset('store/photo/photos/' . $photo->img) }}" alt="Profile Picture" width="50">
             
            </td>
            <td>
              <!-- Gallery Images -->
              @php
                // Decode the JSON string into an array
                $images = json_decode($photo->images, true);
              @endphp

              @if ($images && is_array($images))
                @foreach ($images as $image)
                  <img src="{{ asset('store/photo/gallery/' . $image) }}" alt="Gallery Image" width="50" style="margin-right: 5px;">
                @endforeach
              @else
                <span>No Images</span>
              @endif
            </td>   
            <td>
            <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editPhoto{{$photo->id}}">
                <i class="fa fa-edit"></i>
            </a>
              <form action="{{ route('photos.destroy', $photo->id) }}" method="POST" style="display:inline;">
                  @csrf
                  @method('DELETE')
                  <button type="button" class="btn btn-danger btn-sm delete">
                      <i class="fa fa-trash"></i>
                  </button>
              </form>
            </td>
          </tr>
          @include('backend.photo.edit')
          @endforeach
        </tbody>
      </table>

    </div>
  </div>
</div>
@include('backend.photo.create')
<script>
  $(document).ready(function() {
    $('#photoTable').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true
    });
  });
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