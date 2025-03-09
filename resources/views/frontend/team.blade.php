@extends('layouts.frontend')
@section('title','Team|Law Wheel')
@section('content')
<div class="main-content">
    <div class="page-header">
        <div class="page-header-text">Our Team</div>
    </div>
    
    <div class="container mt-5">
    @foreach($teamMembers as $role => $members)
        @if($role == 'Head of Chambers')
            <!-- Head of Chambers Section -->
            <div class="row align-items-start mt-3">
                <div class="col-12">
                    <h2 class="fw-bold">{{ $role }}</h2>
                </div>
                @foreach($members as $member)
                    <div class="col-lg-4 col-md-5 col-12 d-flex align-items-start">
                        <a href="{{ route('team.show', ['id' => $member->id, 'slug' => Str::slug($member->full_name)]) }}" class="text-decoration-none">
                            <div class="head-frame"> 
                                <img src="{{ asset($member->profile_pic) }}" class="profile-img" alt="{{ route('team.show', ['id' => $member->id, 'slug' => Str::slug($member->full_name)]) }}">
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-7 col-12 profile-text">
                        <h3>
                            <a href="{{ route('team.show', ['id' => $member->id, 'slug' => Str::slug($member->full_name)]) }}" class="text-dark text-decoration-none">
                                {{ $member->full_name }}
                            </a>
                        </h3>
                        <p><strong>{{ $member->degree }}</strong></p>
                        <p>{{ $member->designation }}</p>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Other Roles (Counsels, Junior Counsels, etc.) -->
            <h3 class="fw-bold mt-5">{{ $role }}</h3>
            <div class="row mt-3 justify-content-start">
                @foreach($members as $member)
                    <div class="col-lg-2 col-md-3 col-sm-4 col-6 d-flex flex-column align-items-center text-center">
                        <a href="{{ route('team.show', ['id' => $member->id, 'slug' => Str::slug($member->full_name)]) }}" class="text-decoration-none">
                            <div class="fixed-frame">
                                <img src="{{ asset($member->profile_pic) }}" class="counsel-img" alt="{{ route('team.show', ['id' => $member->id, 'slug' => Str::slug($member->full_name)]) }}">
                            </div>
                        </a>
                        <p class="counsel-name text-center">
                            <a href="{{ route('team.show', ['id' => $member->id, 'slug' => Str::slug($member->full_name)]) }}" class="text-dark text-decoration-none">
                                {{ $member->full_name }}
                            </a>
                        </p>
                    </div>
                @endforeach
            </div>
        @endif
    @endforeach
</div>


<style>
 /* Ensure the Head of Chambers image aligns with the title */
.head-frame {
    width: 400px;
    height: 400px; /* Fixed height */
    display: flex;
    align-items: center; /* Center image vertically */
    justify-content: center;
    overflow: hidden;
    border: 2px solid #ddd; /* Optional */
    background-color: #f8f9fa; /* Light background to handle smaller images */
}

.head-frame img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Ensures the image fills the frame */
}

/* Frame for other members */
.fixed-frame {
    width: 200px;
    height: 200px; /* Fixed height */
    display: flex;
    align-items: center; /* Center image vertically */
    justify-content: center;
    overflow: hidden;
    border: 2px solid #ddd; /* Optional */
    background-color: #f8f9fa; /* Light background */
}

.fixed-frame img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Ensures image fills the frame */
}

</style>
@endsection