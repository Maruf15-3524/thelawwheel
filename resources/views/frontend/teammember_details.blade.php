@extends('layouts.frontend')
@section('title', $member->full_name . ' | Law Wheel')

@section('content')
<div class="main-content">
    <div class="page-header">
        <div class="page-header-text">Team Member</div>
    </div>
    
    <div class="container mt-5">
        <div class="row align-items-center">
            <!-- Profile Picture with Frame -->
            <div class="col-lg-4 col-md-5 col-12 d-flex justify-content-center">
                <div class="head-frame">
                    <img src="{{ asset($member->profile_pic) }}" class="profile-img" alt="{{ $member->full_name }}">
                </div>
            </div>

            <!-- Member Details -->
            <div class="col-lg-8 col-md-7 col-12">
                <h1 class="fw-bold">{{ $member->full_name }}</h1>
                <p>{{ $member->degree }}</p>
                <p>{{ $member->designation }}</p>
            </div>
        </div>

        <!-- Description Section -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="description-box" style="color:black">

                <div>
                {!! $member->description !!}
                </div>
                
                
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom Styling -->
<style>
  .head-frame {
    width: 300px;
    height: 300px; /* Fixed height */
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

</style>

@endsection
