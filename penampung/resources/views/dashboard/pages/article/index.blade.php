@extends('dashboard.index')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="ml-auto text-right">
            <nav aria-label="breadcrumb"> 
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Master</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Article</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-10">
                <h3 align="center">Your stories</h3>
            </div>
            <div class="col-md-2">
                <a href="{{ route('article.input') }}"><button class="btn btn-default"><i class="mdi mdi-pencil-box"></i> Write a Story</button></a>
            </div>
            <hr>
            @foreach($article as $art)
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo htmlspecialchars_decode($art->title_preview_post) ?></h4>
                            <div class="row">
                                <div class="col-md-3">
                                    @if($art->cover_post == null || $art->cover_post == '')
                                        <!-- <img src="{{ $art->cover_post }}" class="img-responsive" style="width: 200px; height: 200px;" alt=""> -->
                                    @else
                                        <img src="{{ $art->cover_post }}" class="img-responsive" style="width: 200px; height: 200px;" alt="">
                                    @endif
                                </div>
                                <div class="col-md-9">
                                    <?php echo substr($art->summary_content_preview, 0, 1000)."[...]" ?>
                                </div>
                                
                                <div class="col-md-3">
                                    Published by {{ $art->publish_by }} on {{ date('d F Y', strtotime($art->created_date)) }}
                                </div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <?php 
                                                for($i = 0; $i < $art->count_tagging; $i++){
                                            ?>
                                                <p class="badge badge-light"><?php echo $art->tagging[$i]; ?></p>
                                            <?php } ?>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                                                <ul class="dropdown-menu" style="padding-left: 10px; padding-right: 10px;">
                                                    <!-- <li><a href="#"><i class="mdi mdi-grease-pencil"></i> Edit</a></li> -->
                                                    <li><a href="{{ route('article.delete', $art->id_post) }}"><i class="mdi mdi-delete-sweep"></i> Delete</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    

</div>
    

@stop
