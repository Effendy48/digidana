@extends('home.index')
@section('content')
<div class="site-section" id="blog-section" >
    <div class="container" style="margin-top: 40px;">
        <div class="row">
            <div class="col-md-12">
                <h1 style="text-align: center; color: #000;"><?php echo $article->title_preview_post ?></h1>
            </div>
            
            <div class="col-md-12">
                <img src="{{ $article->cover_post }}" style="display: block;margin-left: auto;margin-right: auto;width: 50%;" alt="">
            </div>

            <div class="col-md-12" style="padding: 30px;">
                <div class="meta mb-4" style="text-align: center;"><img src="http://localhost/digidana/dist/img/member/Effendy_WP.jpg" alt="user" class="rounded-circle" width="31">  Effendy Wahyu Pradana <span class="mx-2">•</span> 19 September 2020</div>
            </div>

            <div class="col-md-12" style="padding-left: 150px;padding-right: 150px;">
                <?php echo htmlspecialchars_decode($article->content_post); ?>
            </div>
        </div>
    </div>
</div>
@stop