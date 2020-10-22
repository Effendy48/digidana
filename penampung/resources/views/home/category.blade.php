@extends('home.index')
@section('content')
<div class="site-section" id="blog-section">
    <div class="container">
        <div class="row">
            @foreach($article as $art)
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                <div class="h-entry">
                <img src="{{ $art->cover_post }}" alt="Image" style="height: 300px;" class="img-fluid">
                <div style="height:100px;">
                    <h2>
                    <a href="#">
                        <?php echo strlen($art->title_preview_post) > 50 ? substr($art->title_preview_post, 0, 50)." [...]" : $art->title_preview_post; ?>
                    </a>
                    </h2>
                </div>
                <div class="meta mb-4">{{ $art->created_by_account }} <span class="mx-2">•</span> {{ date('d F Y', strtotime($art->created_date)) }}</div>
                <p style="text-align: justify;">{{ substr($art->summary_content_preview, 0, 200) }}[...]</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@stop