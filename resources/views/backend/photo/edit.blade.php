<div class="modal fade edit" id="editPhoto{{ $photo->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">Edit Photo</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('photos.update', $photo->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" value="{{ $photo->title }}" class="form-control">
                    </div>

                    <!-- Single Image Preview -->
                    <div class="form-group">
                        <label class="form-label fw-bold">Upload Main Image</label>
                        <div class="row">
                            <div class="col-md-6 text-center">
                                <div class="border rounded">
                                    <img id="preview-img-{{ $photo->id }}" 
                                        src="{{ asset('store/photo/photos/' . $photo->img) }}" 
                                        alt="User Image" 
                                        class="img-fluid rounded user-image-preview"
                                        data-original-src="{{ asset('img/photos/' . $photo->img) }}" 
                                        style="max-width: 100%; height: 200px;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="upload-img border rounded d-flex flex-column justify-content-center align-items-center p-4">
                                    <i class="fas fa-cloud-upload-alt fa-2x text-primary"></i>
                                    <p class="mt-2">
                                        Drop your image here or 
                                        <a href="#" onclick="document.getElementById('mainFileInput{{ $photo->id }}').click(); return false;">click to browse</a>
                                    </p>
                                    <input type="file" name="img" id="mainFileInput{{ $photo->id }}" 
                                        class="form-control user-image-input" accept="image/*" hidden 
                                        onchange="previewUserImage(event, {{ $photo->id }})">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Current Multiple Images Preview -->
                    <div class="form-group">
                        <label class="form-label fw-bold">Current & New Images</label>
                        <div class="preview-container" id="galleryPreview-{{ $photo->id }}">
                            <!-- Show existing images from the database -->
                            @php
                                $images = json_decode($photo->images, true);
                            @endphp
                            @if ($images && is_array($images))
                                <div class="img-grid">
                                    @foreach ($images as $image)
                                        <div class="img-preview-box">
                                            <img src="{{ asset('store/photo/gallery/'.$image) }}" class="img-thumbnail" >
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <span>No Images</span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="form-label fw-bold">Upload New Images</label>
                        <div class="upload-img border rounded d-flex flex-column justify-content-center align-items-center p-4" 
                            onclick="document.getElementById('multiFileInput{{ $photo->id }}').click();">
                            <i class="fas fa-cloud-upload-alt fa-2x text-primary"></i>
                            <p class="mt-2">Drop your images here or <a href="#">click to browse</a></p>
                            <input type="file" name="images[]" id="multiFileInput{{ $photo->id }}" 
                                class="form-control" accept="image/*" multiple hidden 
                                onchange="previewAndReplaceGallery(event, {{ $photo->id }})">
                        </div>
                    </div>

                    <div class="modal-footer mt-3">
                        <button type="submit" class="btn btn-primary btn-block">update Photo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Function to preview single image
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

    // Function to preview multiple images and replace current preview
    function previewAndReplaceGallery(event, id) {
        const galleryPreview = document.getElementById('galleryPreview-' + id);
        galleryPreview.innerHTML = ''; // Clear old images (replace them)

        const grid = document.createElement('div');
        grid.classList.add('img-grid'); // Create the grid for new images
        galleryPreview.appendChild(grid);

        Array.from(event.target.files).forEach(file => {
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const imgElement = document.createElement('img');
                    imgElement.src = e.target.result;
                    imgElement.classList.add('img-thumbnail');

                    const imgWrapper = document.createElement('div');
                    imgWrapper.classList.add('img-preview-box');
                    imgWrapper.appendChild(imgElement);

                    grid.appendChild(imgWrapper);
                };
                reader.readAsDataURL(file);
            }
        });
    }
</script>

<style>
    .preview-container {
        margin-top: 15px;
    }

    .img-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr); /* 4 images per row */
        gap: 10px;
    }

    .img-preview-box {
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .img-thumbnail {
        width: 100%;
        height: 100px;
        object-fit: cover;
    }
</style>
