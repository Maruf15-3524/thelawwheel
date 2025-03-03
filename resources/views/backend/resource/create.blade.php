@extends('layouts.backend')
@section('title','Resources')
@section('content')
<div class="main-container">
    <form action="{{ route('resources.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        

        <div class="form-group">
            <label for="category">Category</label>
            <select name="category" class="form-control" id="category" required>
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" data-type="{{($category->name) }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>
    <div class="form-group" id="photo-upload" style="display: none;">
        <label for="thumbnail">Upload Thumbnail Image</label>
        <input type="file" name="photo" class="form-control" accept="image/*">
    </div>
    <div class="form-group" id="pdf-upload" style="display: none;">
        <label for="pdf_file">Upload PDF</label>
        <input type="file" name="pdf" class="form-control" accept="application/pdf">
    </div>
    <div class="form-group" id="video-url" style="display: none;">
        <label for="video_url">Video URL</label>
        <input type="url" name="video_url" class="form-control" placeholder="Paste video URL here">
    </div>
    <div class="form-group mt-5">
        <label for="dec">Description</label>
        <textarea id="dec" name="description" class="form-control"></textarea>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-block">Save User</button>
    </div>
    </form>
</div>
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
$(document).ready(function() {
    $('#category').change(function() {
        var selectedType = $('#category option:selected').data('type').trim().toLowerCase();

        $('#photo-upload').hide();
        $('#pdf-upload').hide();
        $('#video-url').hide();

        if (selectedType === 'video') {
            $('#video-url').show(); 
        } else {

            $('#photo-upload').show();  
            $('#pdf-upload').show(); 
        }
    });

    $('#category').trigger('change');
});

</script>

@endsection
