<div class="modal fade" id="viewUser{{$user->id}}" tabindex="-1" aria-labelledby="viewUserLabel{{$user->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewUserLabel{{$user->id}}">View User Details</h5>
            </div>
            <div class="modal-body">
                <!-- User Details Section -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="text-center">
                            <label for="name" class="fw-bold">Profile Image</label>
                            <div class="border rounded">
                                @if($user->img)
                                    <img src="{{ asset('img/user/'.$user->img) }}" alt="User Image" class="img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                                @else
                                    <img src="https://via.placeholder.com/150" alt="User Image" class="img-fluid rounded-circle" style="width: 150px; height: 150px;">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <!-- Name and Email -->
                        <div class="mb-3">
                            <label for="name" class="fw-bold">Name</label>
                            <p>{{ $user->name }}</p>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="fw-bold">Email</label>
                            <p>{{ $user->email }}</p>
                        </div>
                        <!-- Phone Number -->
                        <div class="mb-3">
                            <label for="mobile" class="fw-bold">Phone</label>
                            <p>{{ $user->mobile ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>
                <!-- More Info -->
                <div class="mt-4">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Account Created:</strong> {{ $user->created_at->format('d M Y') }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Last Updated:</strong> {{ $user->updated_at->format('d M Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>