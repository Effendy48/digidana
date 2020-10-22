@extends('dashboard.index')
@section('content')
<div class="card">
    <div class="card-body">
        
        <div class="row">
            <div class="col-md-6 col-lg-4 col-xlg-6">
                <div class="card card-hover">
                    <div class="box bg-cyan text-center">
                        <h1 class="font-light text-white">{{ count($article) }}</h1>
                        <h6 class="text-white">Stories</h6>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 col-xlg-6">
                <div class="card card-hover">
                    <div class="box bg-white text-center">
                        <h1 class="font-light text-cyan">{{ $account }}</h1>
                        <h6 class="text-cyan">Account</h6>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <h4 style="padding-left: 30px;margin-top: 25px;">Article</h4>
            </div>

            @foreach($article as $art)
                <div class="col-md-12" style="margin-top: 25px;">
                    <div class="d-flex flex-row comment-row">
                        <div class="p-2"><img src="{{ $art->cover_post }}" alt="user" width="100"></div>
                        <div class="comment-text active w-100">
                            <h6 class="font-medium">{{ $art->title_preview_post }}</h6>
                            <span class="m-b-15 d-block">{{ substr($art->summary_content_preview, 0, 500) }}</span>
                            <div class="comment-footer">
                                <span class="text-muted">Read : 10</span>
                                <span class="text-muted float-right">Created Date : {{ date('d F Y', strtotime($art->created_date)) }}</span> 
                                <!-- <button type="button" class="btn btn-cyan btn-sm">Edit</button> -->
                                <!-- <button type="button" class="btn btn-success btn-sm">Publish</button> -->
                                <!-- <button type="button" class="btn btn-danger btn-sm">Delete</button> -->
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
        
    </div>
</div>

@stop
@section('script')