@extends('dashboard.index')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="ml-auto text-right">
            <nav aria-label="breadcrumb"> 
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page"> {{ $page }} Account</li>
                </ol>
            </nav>
        </div>
        <div class="row" style="padding: 30px;">   
            <div class="col-md-12">
                <div class="d-flex flex-row comment-row">
                    <div class="p-2"><img src="{{ asset('dist/img/member/') }}/{{ $account->photo_profile }}" alt="user" width="50" class="rounded-circle"></div>
                    <div class="comment-text active w-100">
                        <h6 class="font-medium">{{ $account->first_name }} {{ $account->last_name }}</h6>
                        <span class="m-b-15 d-block">{{ $account->status }}</span>
                        <div class="comment-footer">
                            <span class="text-muted float-right">Join Date : {{ date('d F Y', strtotime($account->created_date)) }}</span> 
                            <!-- <button type="button" class="btn btn-cyan btn-sm">Edit</button> -->
                            <!-- <button type="button" class="btn btn-success btn-sm">Publish</button> -->
                            <!-- <button type="button" class="btn btn-danger btn-sm">Delete</button> -->
                        </div>
                    </div>
                </div>
            </div>

            <h4 style="padding-left: 30px;margin-top: 25px;">Article</h4>

            @foreach($account->article as $art)
                <div class="col-md-12" style="margin-top: 25px;">
                    <div class="d-flex flex-row comment-row">
                        <div class="p-2"><img src="{{ $art->cover_post }}" alt="user" width="100"></div>
                        <div class="comment-text active w-100">
                            <h6 class="font-medium">{{ $art->title_preview_post }}</h6>
                            <span class="m-b-15 d-block">{{ substr($art->summary_content_preview, 0, 500) }}</span>
                            <div class="comment-footer">
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