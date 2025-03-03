@extends('layouts.backend')

@section('title','Team Member')

@section('content')
@if (session()->has('message'))
<div class="alert alert-dismissable alert-success">
  <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close" onclick="this.closest('.alert').remove();"></button>
  <strong>{!! session()->get('message') !!}</strong>
</div>
@endif

<div class="main-content-inner">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Manage Team</h2>
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
        <a href="{{ route('teammembers.create') }}" class="btn btn-success"><i class="fa fa-plus"></i>Add New Team Member</a>
      </div>

      <table class="table table-bordered" id="teamMemberTable">
        <thead>
          <tr>
            <th>#</th>
            <th>Profile Pic</th>
            <th>Full Name</th>
            <th>Degree</th>
            <th>Designation</th>
            <th>Role</th>
            <th>Order</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($teamMembers as $key => $member)
          <tr>
            <td>{{ $key + 1 }}</td>
            <td>
              @if($member->profile_pic)
              <img src="{{ asset($member->profile_pic) }}" alt="Profile Picture" width="50">
              @else
              No Image
              @endif
            </td>
            <td>{{ $member->full_name }}</td>
            <td>{{ $member->degree }}</td>
            <td>{{ $member->designation }}</td>
            <td>{{ $member->role }}</td>
            <td>{{ $member->order }}</td>
            <td>
              <a href="{{ route('teammembers.edit', $member->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>

              <form action="{{ route('teammembers.destroy', $member->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
              </form>
            </td>

          </tr>
          @endforeach
        </tbody>
      </table>


    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('#teamMemberTable').DataTable({
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
@endsection