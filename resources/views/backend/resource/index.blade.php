@extends('layouts.backend')

@section('title','Resources')

@section('content')
@if (session()->has('message'))
    <div class="alert alert-dismissable alert-success">
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close" onclick="this.closest('.alert').remove();"></button>
        <strong>{!! session()->get('message') !!}</strong>
    </div>
@endif

<div class="main-content-inner">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Manage Resources</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Resources</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
                <a href="{{ route('resources.create') }}" class="btn btn-success">Add Resource</a>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>img</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($resources as $resource)
                    <tr>
                        <td>{{ $resource->id }}</td>
                        <td>{{ $resource->title }}</td>
                        <td>{{$resource->resource_category_id}}</td>
                        <td>
    @if (Str::endsWith($resource->url_or_img, ['.jpg', '.jpeg', '.png', '.gif']))
        <img src="{{ asset('resource/img/'.$resource->url_or_img) }}" alt="User Image" class="img-fluid rounded-circle" style="width: 60px; height: 50px; object-fit: cover;">
    
    @elseif (Str::contains($resource->url_or_img, 'youtube.com/watch'))
        @php
            parse_str(parse_url($resource->url_or_img, PHP_URL_QUERY), $queryParams);
            $youtubeId = $queryParams['v'] ?? '';
        @endphp
        @if($youtubeId)
            <iframe width="300" height="250" src="https://www.youtube.com/embed/{{ $youtubeId }}" frameborder="0" allowfullscreen></iframe>
        @endif
    
    @elseif (Str::contains($resource->url_or_img, 'facebook.com'))
        <iframe src="https://www.facebook.com/plugins/video.php?href={{ urlencode($resource->url_or_img) }}" width="60" height="50" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen></iframe>
    
    @else
        <p>No media</p>
    @endif
</td>



                        <td>
                            <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#viewUser{{$resource->id}}">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editUser{{$resource->id}}">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{ route('resources.destroy', $resource->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm delete">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>         
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
