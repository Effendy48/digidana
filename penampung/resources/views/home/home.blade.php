@extends('home.index')
@section('content')
<div class="site-section" id="blog-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
            <h2 class="section-title mb-3">Article Posts</h2>
            </div>
        </div>
        <div class="row">
            @foreach($article as $art)
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                <div class="h-entry">
                <img src="{{ $art->cover_post }}" alt="Image" style="height: 300px;" class="img-fluid">
                <div style="height:100px;">
                    <h2>
                    <a href="{{ route('home.detail-article', $art->id_post) }}">
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

<div class="site-section" id="our-team-section">
    <div class="container">
        <div class="row mb-5 justify-content-center text-center aos-init" data-aos="fade-up">
            <div class="col-7 text-center mb-5">
                <h2 class="section-title">Contributors</h2>
                <p class="lead">Berkontribusi terhadap pengembangan platform ini untuk memberi dampak positif</p>
            </div>
        </div>
        <div class="row">
            @foreach($member as $mbr)
                <div class="col-lg-2 col-sm-6 col-md-6 mb-1 aos-init" data-aos="fade-up" data-aos-delay="100">
                    <div class="person">
                        <div class="bio-img">
                            <figure>
                                <img src="{{ asset('dist/img/member/') }}/{{ $mbr->photo_profile }}" alt="Image" class="img-fluid img-profile-member">
                            </figure>
                        </div>
                        <h2 class="text-black h1 text-center">{{ $mbr->first_name }} {{ $mbr->last_name }}</h2>
                        <span class="sub-title d-block mb-3 text-center">{{ $mbr->status }}</span>
                        <p></p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<style>
    @media only screen and (max-width: 360px) {
        .img-profile-member{
            height: 100%;
            width: 200px;
            background: #09f;
        }
        .person h2{
            font-size: 16px;
        }
        .person .sub-title{
            font-size: 10px;
        }

        .col-sm-6{
            width: 50%;
        }
    }
</style>

@stop