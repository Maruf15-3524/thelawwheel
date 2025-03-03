@extends('layouts.backend')

@section('title', 'Edit Team Member')

@section('content')
<div class="main-container">
  <form action="{{ route('teammembers.update', $teammember->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">
      <div class="col-md-8">
        <div class="row">
          <div class="col-md-4 mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" class="form-control" name="full_name" value="{{ $teammember->full_name }}" required>
          </div>
          <div class="col-md-4 mb-3">
            <label class="form-label">Degree</label>
            <input type="text" class="form-control" name="degree" value="{{ $teammember->degree }}" required>
          </div>
          <div class="col-md-4 mb-3">
            <label class="form-label">Designation</label>
            <input type="text" class="form-control" name="designation" value="{{ $teammember->designation }}" required>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4 mb-3">
            <label class="form-label">Role</label>
            <select class="form-control" name="role" required>
              <option value="" disabled>-- Select Role --</option>
              <option value="Head of Chambers" {{ $teammember->role == 'Head of Chambers' ? 'selected' : '' }}>Head of Chambers</option>
              <option value="Senior Counsel" {{ $teammember->role == 'Senior Counsel' ? 'selected' : '' }}>Senior Counsel</option>
              <option value="Counsels" {{ $teammember->role == 'Counsels' ? 'selected' : '' }}>Counsels</option>
              <option value="Senior Associates" {{ $teammember->role == 'Senior Associates' ? 'selected' : '' }}>Senior Associates</option>
              <option value="Co-Ordinator" {{ $teammember->role == 'Co-Ordinator' ? 'selected' : '' }}>Co-Ordinator</option>
              <option value="Pro Bono Services" {{ $teammember->role == 'Pro Bono Services' ? 'selected' : '' }}>Pro Bono Services</option>
              <option value="Senior Clerk" {{ $teammember->role == 'Senior Clerk' ? 'selected' : '' }}>Senior Clerk</option>
              <option value="IT Assistant" {{ $teammember->role == 'IT Assistant' ? 'selected' : '' }}>IT Assistant</option>
              <option value="Computer Operator" {{ $teammember->role == 'Computer Operator' ? 'selected' : '' }}>Computer Operator</option>
              <option value="Court Assistants" {{ $teammember->role == 'Court Assistants' ? 'selected' : '' }}>Court Assistants</option>
              <option value="Office Assistant" {{ $teammember->role == 'Office Assistant' ? 'selected' : '' }}>Office Assistant</option>
            </select>

          </div>
          <div class="col-md-4 mb-3">
            <label class="form-label">Order</label>
            <input type="number" class="form-control" name="order" value="{{ $teammember->order }}" required>
          </div>
        </div>

        <div class="mb-3">
          <label for="dec" class="form-label">Description</label>
          <textarea id="dec" name="description" class="form-control">{{ $teammember->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update</button>
      </div>

      <div class="col-md-4 mb-3">
        <label for="profile_pic" class="form-label">Profile Picture</label>
        <div class="profile-pic-box">
          <img id="profile_preview" src="{{ asset($teammember->profile_pic) }}" alt="Profile Picture Preview" class="img-fluid rounded">
        </div>
        <input type="file" class="form-control mt-2" id="profile_pic" name="profile_pic" accept="image/*" onchange="previewImage(event)">
      </div>
    </div>
  </form>
</div>
<style>
  .profile-pic-box {
    width: 150px;
    /* Fixed width */
    height: 150px;
    /* Fixed height */
    border: 2px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    /* Hide overflow */
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #f4f4f4;
  }

  .profile-pic-box img {
    width: 100%;
    /* Make image fill the box */
    height: 100%;
    /* Maintain image within the box */
    object-fit: cover;
    /* Ensure the image covers the box without stretching */
  }

  .form-control {
    margin-bottom: 10px;
  }
</style>
<script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>
<script>
  ClassicEditor.create(document.querySelector('#dec'));

  function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function() {
      document.getElementById('profile_preview').src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  }
</script>
@endsection