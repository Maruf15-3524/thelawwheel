@extends('layouts.backend')
@section('title','Resources')
@section('content')
<div class="main-container">
    <!-- Heading Field -->
    <form action="{{ route('resources.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
                <label for="category">Category</label>
                <select name="category" class="form-control" id="category" required>
                    <option value="photo">Photo</option>
                    <option value="story">Story</option>
                    <option value="video">Video</option>
                </select>
            </div>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>
    <div class="form-group" id="thumbnail-upload" style="display: none;">
        <label for="thumbnail">Upload Thumbnail Image</label>
        <input type="file" name="thumbnail" class="form-control" accept="image/*">
    </div>
    <div class="form-group" id="pdf-upload" style="display: none;">
        <label for="pdf_file">Upload PDF</label>
        <input type="file" name="pdf_file" class="form-control" accept="application/pdf">
    </div>
    <div class="form-group" id="video-url" style="display: none;">
        <label for="video_url">Video URL</label>
        <input type="url" name="video_url" class="form-control" placeholder="Paste video URL here">
    </div>
    <div class="form-group mt-5">
        <label for="dec">Description</label>
        <textarea id="dec" name="dec" class="form-control"></textarea>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-block">Save User</button>
    </div>
    </form>
</div>

<!-- CKEditor Script -->
<script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>

<!-- jQuery Script (Make sure this is loaded before your script) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // Initialize CKEditor
    ClassicEditor
        .create(document.querySelector('#dec'))
        .then(editor => {
            window.editor = editor;
        })
        .catch(error => {
            console.error('There was an error initializing CKEditor:', error);
        });

    $(document).ready(function() {
        $('#category').change(function() {
            var selectedType = $('#category option:selected').data('type').toLowerCase(); // Convert to lowercase
            // Hide all fields initially
            $('#thumbnail-upload').hide();
            $('#pdf-upload').hide();
            $('#video-url').hide();

           
            if (selectedType === 'video') {
                $('#video-url').show();
            } else {
    
                $('#thumbnail-upload').show();
                $('#pdf-upload').show();
            }
        });


        $('#category').trigger('change');
    });
</script>
@endsection
