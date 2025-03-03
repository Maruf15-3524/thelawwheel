  <!-- Edit User Modal -->
<div class="modal right fade" id="editUser{{$user->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editUserLabel{{$user->id}}" aria-hidden="true">
     <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
             <h4 class="modal-title" id="editUserLabel{{$user->id}}">Edit User</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                   @csrf
                    @method('PUT')

                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="mobile">Phone</label>
                        <input type="text" name="mobile" value="{{ $user->mobile }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="form-label fw-bold">Upload Image</label>
                        <div class="row">
                            <div class="col-md-6 text-center">
                                <div class="border rounded">
                                    <img id="prevues-img-{{$user->id}}" 
                                        src="{{ asset('img/user/'.$user->img) }}" 
                                        alt="User Image" 
                                        class="img-fluid rounded user-image-preview" 
                                        data-original-src="{{ asset('img/user/'.$user->img) }}" 
                                        style="max-width: 100%; height: 200px;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="upload-img border rounded d-flex flex-column justify-content-center align-items-center p-4">
                                    <i class="fas fa-cloud-upload-alt fa-2x text-primary"></i>
                                    <p class="mt-2">
                                        Drop your images here or 
                                        <a href="#" onclick="document.getElementById('fileInput{{$user->id}}').click(); return false;">click to browse</a>
                                    </p>
                                    <input type="file" name="img" id="fileInput{{$user->id}}" 
                                        class="form-control user-image-input" accept="image/*" hidden 
                                        onchange="previewUserImage(event, {{$user->id}})">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" value="{{ $user->password }}" class="form-control">
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-block">Update User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>