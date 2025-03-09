@extends('layouts.backend')
@section('title','Resources')
@section('content')
<div class="main-container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Show Resources</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item " ><a href="{{route('resource.index')}}">Manage Resources</a></li>
                <li class="breadcrumb-item active" aria-current="page">Show Resource</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body">
        <div class="row">
                    <div class="col-md-5">
                        <div class="text-center">
                            <label for="name" class="fw-bold">Profile Image</label>
                            <div class="border rounded">
                            @if (Str::endsWith($resource->url_or_img, ['.jpg', '.jpeg', '.png', '.gif']))
                        <!-- Display image -->
                        <img src="{{ asset('store/resource/img/'.$resource->url_or_img) }}" alt="Image" class="img-fluid rounded" style="width: 300px; height: 300px; object-fit: cover;">
                    @elseif (Str::contains($resource->url_or_img, 'youtube.com'))
                        <!-- Display YouTube video -->
                        @php
                            parse_str(parse_url($resource->url_or_img, PHP_URL_QUERY), $queryParams);
                            $youtubeId = $queryParams['v'] ?? '';
                        @endphp
                        @if($youtubeId)
                            <iframe width="300" height="300" src="https://www.youtube.com/embed/{{ $youtubeId }}" frameborder="0" allowfullscreen></iframe>
                        @endif
                    @elseif (Str::contains($resource->url_or_img, 'facebook.com'))
                        <!-- Display Facebook video -->
                        <iframe src="https://www.facebook.com/plugins/video.php?href={{ urlencode($resource->url_or_img) }}" width="560" height="315" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen></iframe>
                    @else
                        <p>No media available</p>
                    @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 mt-3">
                        <!-- Name and Email -->
                        <div class="mb-3">
                            <label for="name" class="fw-bold">Category</label>
                            <p>{{  $resource->category->name }}</p>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="fw-bold">Title</label>
                            <p>{{ $resource->title }}</p>
                        </div>
                       
                    </div>
                </div>
                <div class="row mt-3">
                <div class=" border rounded col-md-6 {{ $resource->link && file_exists(base_path('store/resource/pdf/' . $resource->link)) ? 'col-md-6' : 'col-md-12' }}">
                <label for="description">Description:</label>
                <p>{!! $resource->description !!}</p> 
            
                </div>
                <div class="border rounded col-md-6 text-center">
                    @if ($resource->link && file_exists(base_path('store/resource/pdf/' . $resource->link)))
                        <div class="d-flex justify-content-between align-items-center p-2">
                            <span>Document</span>
                            <button id="prev" class="btn btn-sm btn-secondary">&lt;</button>
                            <span id="page_num">1</span> / <span id="page_count">?</span>
                            <button id="next" class="btn btn-sm btn-secondary">&gt;</button>
                            <a href="{{ asset('store/resource/pdf/'.$resource->link) }}" class="btn btn-sm btn-primary" download>Download</a>
                        </div>
                        <canvas id="pdf-render" class="border"></canvas>
                    @endif
                </div>
                </div>
                <div class="mt-4">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Resource Created:</strong> {{ $resource->created_at->format('d M Y') }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Last Updated:</strong> {{ $resource->updated_at->format('d M Y') }}</p>
                        </div>
                    </div>
                </div>
           
            </div>
        </div>
    </div>
    <style>
    .pdf-container {
        width: 100%;
        overflow: hidden;
        display: flex;
        justify-content: center;
    }
    canvas {
        max-width: 100%;
        height: auto;
    }
</style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
<script>
    const url = "{{ asset('store/resource/pdf/'.$resource->link) }}";
    let pdfDoc = null, pageNum = 1, pageIsRendering = false, pageNumPending = null;
    const scale = 1.5, canvas = document.querySelector('#pdf-render'), ctx = canvas.getContext('2d');

    const renderPage = num => {
        pageIsRendering = true;
        pdfDoc.getPage(num).then(page => {
            const viewport = page.getViewport({ scale });
            canvas.height = viewport.height;
            canvas.width = viewport.width;
            const renderCtx = { canvasContext: ctx, viewport };
            return page.render(renderCtx).promise;
        }).then(() => {
            pageIsRendering = false;
            if (pageNumPending !== null) {
                renderPage(pageNumPending);
                pageNumPending = null;
            }
        });
        document.querySelector('#page_num').textContent = num;
    };

    const queueRenderPage = num => {
        if (pageIsRendering) {
            pageNumPending = num;
        } else {
            renderPage(num);
        }
    };

    document.querySelector('#prev').addEventListener('click', () => {
        if (pageNum <= 1) return;
        pageNum--;
        queueRenderPage(pageNum);
    });

    document.querySelector('#next').addEventListener('click', () => {
        if (pageNum >= pdfDoc.numPages) return;
        pageNum++;
        queueRenderPage(pageNum);
    });

    pdfjsLib.getDocument(url).promise.then(pdfDoc_ => {
        pdfDoc = pdfDoc_;
        document.querySelector('#page_count').textContent = pdfDoc.numPages;
        renderPage(pageNum);
    });
</script>
@endsection