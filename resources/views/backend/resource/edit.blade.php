@extends('layouts.backend')
@section('title','Resources')
@section('content')
<div class="main-container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Edit Resources</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item " ><a href="{{route('resource.index')}}">Manage Resources</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Resource</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ isset($resource) ? route('resource.update', $resource->id) : route('resource.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    @method('PUT')

                <div class="form-group">
                    <label for="category">Category</label>
                    <input type="text" class="form-control" value="{{ $resource->category->name }}" required readonly>
                </div>

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{ $resource->title }}" required>
                </div>

                @if(isset($resource) && Str::endsWith($resource->url_or_img, ['.jpg', '.jpeg', '.png', '.gif']))
                    <div class="form-group">
                        <label class="form-label fw-bold">Upload Main Image</label>
                        <div class="row">
                            <div class="col-md-6 text-center">
                                <div class="border rounded">
                                    <img id="preview-img-{{ $resource->id }}" 
                                         src="{{ asset('store/resource/img/'.$resource->url_or_img) }}" 
                                         alt="User Image" 
                                         class="img-fluid rounded user-image-preview"
                                         data-original-src="{{ asset('store/resource/img/'.$resource->url_or_img) }}" 
                                         style="max-width: 100%; height: 200px;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="upload-img border rounded d-flex flex-column justify-content-center align-items-center p-4">
                                    <i class="fas fa-cloud-upload-alt fa-2x text-primary"></i>
                                    <p class="mt-2">
                                        Drop your image here or 
                                        <a href="#" onclick="document.getElementById('mainFileInput{{ $resource->id }}').click(); return false;">click to browse</a>
                                    </p>
                                    <input type="file" name="photo" id="mainFileInput{{ $resource->id }}" 
                                           class="form-control user-image-input" accept="image/*" hidden 
                                           onchange="previewUserImage(event, {{ $resource->id }})">
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @if(isset($resource) && $resource->link) <!-- Only show PDF upload if link is present -->
                    <div class="form-group border rounded mt-2" id="pdf-upload">
                        <label for="pdf_file">Upload PDF</label>
                        <p>Current PDF: <a href="{{ asset('store/resource/pdf/'.$resource->link) }}" target="_blank">View PDF</a></p>
                        <input type="file" name="pdf" id="pdf_file" class="form-control" accept="application/pdf">
                    </div>
                @endif

                <div class="form-group" id="video-url" style="display: none;">
                    <label for="video_url">Video URL</label>
                    @if(isset($resource) && (Str::contains($resource->url_or_img, 'youtube.com') || Str::contains($resource->url_or_img, 'facebook.com')))
                        <input type="url" name="video_url" id="video_url" class="form-control" placeholder="Paste video URL here" value="{{ $resource->url_or_img }}">
                    @endif
                </div>

                <div class="form-group mt-5">
                    <label for="dec">Description</label>
                    <textarea id="dec" name="description" class="form-control">{{ $resource->description }}</textarea>
                </div>

                <div class="modal-footer mt-3">
                    <button type="submit" class="btn btn-primary btn-block">Update Resource</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor.create(document.querySelector('#dec'))
        .then(editor => { window.editor = editor; })
        .catch(error => { console.error('CKEditor error:', error); });

    if ("{{ isset($resource) ? $resource->url_or_img : '' }}".endsWith(".jpg") || "{{ isset($resource) ? $resource->url_or_img : '' }}".endsWith(".jpeg") || "{{ isset($resource) ? $resource->url_or_img : '' }}".endsWith(".png") || "{{ isset($resource) ? $resource->url_or_img : '' }}".endsWith(".gif")) {
        document.getElementById('photo-upload').style.display = 'block';
    } else if ("{{ isset($resource) ? $resource->url_or_img : '' }}".includes("youtube.com") || "{{ isset($resource) ? $resource->url_or_img : '' }}".includes("facebook.com")) {
        document.getElementById('video-url').style.display = 'block';
    }

    function previewUserImage(event, id) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('preview-img-' + id).src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }
</script>

@endsection
