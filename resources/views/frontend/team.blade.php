@extends('layouts.frontend')
@section('title','Team|Law Wheel')
@section('content')
<div class="main-content">
<div class="page-header">
      <div class="page-header-text">
       Our Team
      </div>
    </div>





      <div class="container mt-5">
        <!-- Head of Chambers Section (Full Width) -->
        <h2 class="fw-bold">Head of Chambers</h2>
        <div class="row align-items-center mt-3">
            <div class="col-lg-4 col-md-5 col-12">
                <img src="{{asset('frontend/img/team-1.jpg')}}" class="profile-img" alt="Mohammad Shishir Manir">
            </div>
            <div class="col-lg-6 col-md-7 col-12 profile-text">
                <h3>Md.Rois Uddin</h3>
                <p><strong>LL.B. (Hons.), LL.M.</strong></p>
                <p>Advocate</p>
                <p>Supreme Court of Bangladesh</p>
            </div>
        </div>
    
    
        <!-- Counsels Section -->
        <h3 class="fw-bold mt-5">Counsels</h3>
        <div class="row mt-3">
            <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4 text-center">
                <img src="{{asset('frontend/img/team-1.jpg')}}" class="counsel-img" alt="Md. Mizanul Hoque">
                <p class="counsel-name">Md. Mizanul Hoque</p>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4 text-center">
                <img src="{{asset('frontend/img/team-1.jpg')}}" class="counsel-img" alt="Mohammad Abdul Wadud">
                <p class="counsel-name">Mohammad Abdul Wadud</p>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4 text-center">
                <img src="{{asset('frontend/img/team-1.jpg')}}" class="counsel-img" alt="Abdullah Sadiq">
                <p class="counsel-name">Abdullah Sadiq</p>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4 text-center">
                <img src="{{asset('frontend/img/team-1.jpg')}}" class="counsel-img" alt="Abdullah Sadiq">
                <p class="counsel-name">Abdullah Sadiq</p>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4 text-center">
                <img src="{{asset('frontend/img/team-1.jpg')}}" class="counsel-img" alt="Abdullah Sadiq">
                <p class="counsel-name">Abdullah Sadiq</p>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4 text-center">
                <img src="{{asset('frontend/img/team-1.jpg')}}" class="counsel-img" alt="Abdullah Sadiq">
                <p class="counsel-name">Abdullah Sadiq</p>
            </div>
        </div>
    </div>
</div>
@endsection