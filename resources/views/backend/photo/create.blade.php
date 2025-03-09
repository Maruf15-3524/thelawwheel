
<style>
    .uploaded-image {
        border: 2px dashed #007bff;
        border-radius: 10px;
        text-align: center;
        cursor: pointer;
        padding: 20px;
        position: relative;
        overflow: hidden;
        width: 100%;
        transition: all 0.5s ease-in-out;
    }

    .uploaded-image img {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 10px auto;
    }

    .uploaded-image.shrink {
        max-height: 120px;
        padding: 5px;
    }

    .upload-area:hover {
        background-color: #f8f9fa;
    }

    .preview-container {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        justify-content: center;
        margin-top: 20px;
        clear: both;
    }

    .preview-container img {
        max-width: 100px;
        height: 100px;
        object-fit: cover;
    }
    .upload-area {
            border: 2px dashed #007bff;
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            cursor: pointer;
        }
        .upload-area:hover {
            background-color: #f8f9fa;
        }
</style>
<div class="modal fade" id="addPhoto" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">Add User</h4>
                <button type="button" class="btn-close" onclick="buttonclick()" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
<div class="modal-body" id="modalBody">
    <form action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Title</label>
            <input type="text" name="title" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Image</label>
            <div class="d-flex align-items-center">
                <div id="imgpreview" class="uploaded-img" style="display: none;">
                    <img src="" alt="Uploaded Image" class="img-fluid rounded" id="previewImg"/>
                </div>
                <div class="upload-area" id="uploadArea">
                    <i class="fas fa-cloud-upload-alt fa-2x text-primary"></i>
                    <p class="mt-2">Drop your images here or 
                        <a href="#" onclick="document.getElementById('myFile').click(); return false;">click to browse</a>
                    </p>
                    <input type="file" id="myFile" name="img" class="form-control" accept="image/*" hidden onchange="previewImage(event)">
                </div>
            </div>
        </div>

        
            <div class="form-group col-md-12">
                <label class="fw-bold">Upload Gallery Images</label>
                <div class="uploaded-image" id="uploadAreaGallery" onclick="document.getElementById('galleryInput').click();">
                    <i class="fas fa-cloud-upload-alt fa-2x text-primary"></i>
                    <p class="mt-2">Drop your images here or <a href="#">click to browse</a></p>
                    <input type="file" id="galleryInput" name="images[]" class="form-control" accept="image/*" multiple hidden onchange="previewGallery(event)">
                </div>
                <div class="preview-container" id="galleryPreview"></div>
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

                    setTimeout(() => {
                        imgPreviewContainer.classList.add('shrink');
                    }, 1000);
                }
            };
            reader.readAsDataURL(file);
        }
    }
    $(document).ready(function () {
    $('#addPhoto').on('hidden.bs.modal', function () {
        $(this).find('form')[0].reset(); // Reset form inputs
        $('#previewImg').attr('src', '').parent().hide(); // Hide single image preview
        $('#galleryPreview').html(''); // Clear gallery previews
    });
});
    function previewGallery(event) {
        const galleryPreview = document.getElementById('galleryPreview');
        galleryPreview.innerHTML = '';

        Array.from(event.target.files).forEach(file => {
            const reader = new FileReader();
            reader.onload = function (e) {
                const imgElement = document.createElement('img');
                imgElement.src = e.target.result;
                galleryPreview.appendChild(imgElement);
            };
            reader.readAsDataURL(file);
        });
    }

    document.addEventListener("DOMContentLoaded", function () {
        const modal = document.getElementById('addUser');
        if (modal) {
            modal.addEventListener('hidden.bs.modal', function () {
                const imgPreviewContainer = document.getElementById('imgpreview');
                const imgElement = document.getElementById('previewImg');
                if (imgPreviewContainer && imgElement) {
                    imgPreviewContainer.style.display = 'none';
                    imgElement.src = '';
                    imgPreviewContainer.classList.remove('shrink');
                }
            });
        }
    });

</script>
