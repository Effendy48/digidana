@extends('dashboard.index')
@section('style')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('style_dashboard/assets/libs/froala/css/froala_editor.css') }}">
    <link rel="stylesheet" href="{{ asset('style_dashboard/assets/libs/froala/css/froala_style.css') }}">
    <link rel="stylesheet" href="{{ asset('style_dashboard/assets/libs/froala/css/plugins/code_view.css') }}">
    <link rel="stylesheet" href="{{ asset('style_dashboard/assets/libs/froala/css/plugins/colors.css') }}">
    <link rel="stylesheet" href="{{ asset('style_dashboard/assets/libs/froala/css/plugins/emoticons.css') }}">
    <link rel="stylesheet" href="{{ asset('style_dashboard/assets/libs/froala/css/plugins/image_manager.css') }}">
    <link rel="stylesheet" href="{{ asset('style_dashboard/assets/libs/froala/css/plugins/image.css') }}">
    <link rel="stylesheet" href="{{ asset('style_dashboard/assets/libs/froala/css/plugins/line_breaker.css') }}">
    <link rel="stylesheet" href="{{ asset('style_dashboard/assets/libs/froala/css/plugins/quick_insert.css') }}">
    <link rel="stylesheet" href="{{ asset('style_dashboard/assets/libs/froala/css/plugins/table.css') }}">
    <link rel="stylesheet" href="{{ asset('style_dashboard/assets/libs/froala/css/plugins/file.css') }}">
    <link rel="stylesheet" href="{{ asset('style_dashboard/assets/libs/froala/css/plugins/char_counter.css') }}">
    <link rel="stylesheet" href="{{ asset('style_dashboard/assets/libs/froala/css/plugins/video.css') }}">
    <link rel="stylesheet" href="{{ asset('style_dashboard/assets/libs/froala/css/plugins/emoticons.css') }}">
    <link rel="stylesheet" href="{{ asset('style_dashboard/assets/libs/froala/css/plugins/fullscreen.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">
    <link rel="stylesheet" type="text/css" href="https://pbtaxand.net/plugins/tags/jquery.tag-editor.css" />

    <style>
        body {
        text-align: center;
        margin: 0;
        }

        div#editor {
        width: 100%;
        margin: auto;
        text-align: left;
        }

        div#title_editor {
        width: 100%;
        margin: auto;
        text-align: left;
        }

        .tag-editor
        {
            border: 1px solid #ccc !important;
            padding: 2px !important;
        }
    </style>

@stop

@section('content')
<form action="{{ route('article.edit', Request()->id) }}" method="POST">
    {{ csrf_field() }}
    <div class="card">
        <div class="card-body">
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb"> 
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Add</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Article</li>
                    </ol>
                   
                </nav>
            </div>

            <!-- <div class="form-group col-sm-12" style="padding-left: 50px; padding-right: 50px;">
                <input type="text" name="title_post" style="border-top: 0px; border-right: 0px; border-left: 0px;" class="form-control" placeholder="Title...">
            </div> -->
            
            <div class="row">
                <div class="col-sm-6">
                    <h4>Story Preview</h4>
                </div>
                <div class="col-sm-12" style="margin-top: 20px;">
                    
                </div>
                <div class="col-sm-6" style="background: #fafafa!important;">
                    @if($image_preview == null || $image_preview == '')
                        <p align="center" >Sertakan gambar berkualitas tinggi dalam cerita Anda agar lebih menarik bagi pembaca.</p>
                        <input type="hidden" name="cover_post">
                    @else 
                        <img src="{{ $image_preview }}" style="width: 100%; height: 300px!important;" alt="">
                        <input type="hidden" name="cover_post" value="{{ $image_preview }}">
                    @endif
                </div>
                <div class="col-sm-6">
                    <p for="" align="left">Tambahkan atau ubah tag (hingga 5) sehingga pembaca tahu tentang cerita Anda</p>
                    <input type="text" name="tag" class="form-control tags" placeholder="Tag, Tag...">
                    <br>
                    <div align="left"><button class="btn btn-success">Publish</button></div>
                </div>

                <div class="col-sm-12" style="margin-top: 10px;"></div>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="title_preview_post" style="font-weight: bold; font-size: 20px;border-left: 0; border-top: 0; border-right: 0;" value="{{ $title }}">
                </div>
                <div class="col-sm-12" style="margin-top: 10px;"></div>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="summary_content_preview" style="border-left: 0; border-top: 0; border-right: 0;" value="{{ $content_preview }}">
                </div>
            </div>
        </div>
        
    </div>
</form>
@stop
@section('script')
    <script type="text/javascript" src="https://pbtaxand.net/plugins/tags/jquery.tag-editor.min.js"></script>
    <script type="text/javascript" src="https://pbtaxand.net/plugins/tags/jquery.caret.min.js"></script>
    <script>
    $(document).ready(function () {
        $('.tags').tagEditor({
            autocomplete: {
                delay: 0, // show suggestions immediately
                position: { collision: 'flip' }, // automatic menu position up/down
            },
            forceLowercase: false,
            placeholder: 'Tag, Tag...'
        });
    });
    </script>
@stop

  
