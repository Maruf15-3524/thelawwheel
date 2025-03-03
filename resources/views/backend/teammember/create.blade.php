@extends('layouts.backend')
@section('title','Create Team Member')
@section('content')
<div class="main-container">
  <form action="{{ route('teammembers.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
      <!-- Profile Picture Box (Left Side) -->
      <div class="col-md-8">
        <div class="row">
          <div class="col-md-4 mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" class="form-control" name="full_name" required>
          </div>
          <div class="col-md-4 mb-3">
            <label class="form-label">Degree</label>
            <input type="text" class="form-control" name="degree" required>
          </div>
          <div class="col-md-4 mb-3">
            <label class="form-label">Designation</label>
            <input type="text" class="form-control" name="designation" required>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4 mb-3">
            <label class="form-label">Role</label>
            <select class="form-control" name="role" required>
              <option value="" disabled selected>-- Select Role --</option>
              <option value="Head of Chambers">Head of Chambers</option>
              <option value="Senior Counsel">Senior Counsel</option>
              <option value="Counsels">Counsels</option>
              <option value="Senior Associates">Senior Associates</option>
              <option value="Co-Ordinator">Co-Ordinator</option>
              <option value="Pro Bono Services">Pro Bono Services</option>
              <option value="Senior Clerk">Senior Clerk</option>
              <option value="IT Assistant">IT Assistant</option>
              <option value="Computer Operator">Computer Operator</option>
              <option value="Court Assistants">Court Assistants</option>
              <option value="Office Assistant">Office Assistant</option>
            </select>
          </div>
          <div class="col-md-4 mb-3">
            <label class="form-label">Order</label>
            <input type="number" class="form-control" name="order" required>
          </div>
        </div>

        <!-- Description Field -->
        <div class="mb-3">
          <label for="dec" class="form-label">Description</label>
          <textarea id="dec" name="description" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Save</button>
      </div>
      <div class="col-md-4 mb-3">
        <label for="profile_pic" class="form-label">Profile Picture</label>
        <div class="profile-pic-box">
          <img id="profile_preview" src="" alt="Profile Picture Preview" class="img-fluid rounded" style="display: none;">
        </div>
        <input type="file" class="form-control mt-2" id="profile_pic" name="profile_pic" accept="image/*" onchange="previewImage(event)">
      </div>

      <!-- Right Side Columns (3 Input Fields) -->

    </div>
  </form>
</div>

<!-- JavaScript for Image Preview -->
<script>

</script>

<!-- CSS for the Image Box -->
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
  ClassicEditor
    .create(document.querySelector('#dec'))
    .then(editor => {
      window.editor = editor;
    })
    .catch(error => {
      console.error('There was an error initializing CKEditor:', error);
    });

  function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function() {
      const preview = document.getElementById('profile_preview');
      preview.src = reader.result;
      preview.style.display = 'block'; // Show the image once it is loaded
    };
    reader.readAsDataURL(event.target.files[0]); // Convert image to base64 and show
  }
</script>

@endsection