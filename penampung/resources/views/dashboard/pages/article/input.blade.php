@extends('dashboard.index')
@section('style')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href='https://cdn.jsdelivr.net/npm/froala-editor@3.2.0/css/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="{{ asset('dist/froala/css/froala_style.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/froala/css/plugins/code_view.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/froala/css/plugins/colors.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/froala/css/plugins/emoticons.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/froala/css/plugins/image_manager.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/froala/css/plugins/image.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/froala/css/plugins/line_breaker.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/froala/css/plugins/quick_insert.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/froala/css/plugins/table.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/froala/css/plugins/file.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/froala/css/plugins/char_counter.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/froala/css/plugins/video.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/froala/css/plugins/emoticons.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/froala/css/plugins/fullscreen.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">



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
    </style>
@stop

@section('content')
<form action="{{ route('article.simpan') }}" method="POST">
    {{ csrf_field() }}
    <div class="card">
        <div class="card-body">
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb"> 
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Add</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Article</li>
                    </ol>
                    <button type="submit" class="btn btn-success">
                        Publish
                    </button>
                </nav>
            </div>

            <!-- <div class="form-group col-sm-12" style="padding-left: 50px; padding-right: 50px;">
                <input type="text" name="title_post" style="border-top: 0px; border-right: 0px; border-left: 0px;" class="form-control" placeholder="Title...">
            </div> -->

            <div class="form-group col-sm-12" style="padding-left: 50px; padding-right: 50px;margin-top: 30px; font-size: 30px;">    
              <!--   <div id="title_editor">
                    <textarea id='title' name="title_post">
                        <h1></h1>
                    </textarea>
                </div> -->

                <input type="text" class="form-control" name="title_post" placeholder="Title..." style="border-left: 0; border-top: 0; border-right: 0; font-size: 30px;">
            </div>

            <!-- <div class="form-group col-sm-12" style="padding-left: 50px; padding-right: 50px;margin-top: 30px;">    
                <div id="editor">
                    <textarea id='edit' name="content_post">
                        
                    </textarea>
                </div>
            </div> -->
            <div class="form-group col-sm-12" style="padding-left: 50px; padding-right: 50px;margin-top: 30px;">
	            <textarea id="full-featured-non-premium" name="content_post">

				</textarea>
            </div>
        </div>
        
    </div>
</form>
@stop
@section('script')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>
    <script type="text/javascript" src="{{ asset('dist/froala/js/froala_editor.min.js')}}"></script>

    <script type="text/javascript" src="{{ asset('dis/froala/js/plugins/align.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dis/froala/js/plugins/code_beautifier.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dis/froala/js/plugins/code_view.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dis/froala/js/plugins/colors.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dis/froala/js/plugins/emoticons.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dis/froala/js/plugins/draggable.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dis/froala/js/plugins/font_size.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dis/froala/js/plugins/font_family.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dis/froala/js/plugins/image.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dis/froala/js/plugins/image_manager.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dis/froala/js/plugins/line_breaker.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dis/froala/js/plugins/quick_insert.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dis/froala/js/plugins/link.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dis/froala/js/plugins/lists.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dis/froala/js/plugins/paragraph_format.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dis/froala/js/plugins/paragraph_style.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dis/froala/js/plugins/video.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dis/froala/js/plugins/table.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dis/froala/js/plugins/url.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dis/froala/js/plugins/emoticons.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dis/froala/js/plugins/file.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dis/froala/js/plugins/entities.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dis/froala/js/plugins/inline_style.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dis/froala/js/plugins/save.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dis/froala/js/plugins/fullscreen.min.js') }}"></script>

    <script src="https://cdn.tiny.cloud/1/92z8p8s0waz8jrwn8u9z6hw77q75fjvu25bqyr85bjadcw5j/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>


    <script>
	    
		tinymce.init({
		  selector: 'textarea#full-featured-non-premium',
		  plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
		  imagetools_cors_hosts: ['picsum.photos'],
		  menubar: 'file edit view insert format tools table help',
		  toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
		  toolbar_sticky: true,
		  autosave_ask_before_unload: true,
		  autosave_interval: '30s',
		  autosave_prefix: '{path}{query}-{id}-',
		  autosave_restore_when_empty: false,
		  autosave_retention: '2m',
		  image_advtab: true,
		  link_list: [
		    { title: 'My page 1', value: 'http://www.tinymce.com' },
		    { title: 'My page 2', value: 'http://www.moxiecode.com' }
		  ],
		  image_list: [
		    { title: 'My page 1', value: 'http://www.tinymce.com' },
		    { title: 'My page 2', value: 'http://www.moxiecode.com' }
		  ],
		  image_class_list: [
		    { title: 'None', value: '' },
		    { title: 'Some class', value: 'class-name' }
		  ],
		  importcss_append: true,
		  file_picker_callback: function (callback, value, meta) {
		    /* Provide file and text for the link dialog */
		    if (meta.filetype === 'file') {
		      callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
		    }

		    /* Provide image and alt text for the image dialog */
		    if (meta.filetype === 'image') {
		      callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
		    }

		    /* Provide alternative source and posted for the media dialog */
		    if (meta.filetype === 'media') {
		      callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
		    }
		  },
		  templates: [
		        { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
		    { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
		    { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
		  ],
		  template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
		  template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
		  height: 600,
		  border: 0,
		  image_caption: true,
		  quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
		  noneditable_noneditable_class: 'mceNonEditable',
		  toolbar_mode: 'sliding',
		  contextmenu: 'link image imagetools table',
		  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
		});
	</script>

    <!-- <script>

        (function () {
        new FroalaEditor("#edit", {
            toolbarInline: true,
            key: '1CC3kA5C7A3F6E4C3byrncoeG4eheuD3E2A2B2C4G1G4F1A11A7==',
            toolbarButtons: [ ['bold', 'italic', 'underline', 'strikeThrough', 'textColor', 'backgroundColor', 'emoticons'], ['paragraphFormat', 'align', 'formatOL', 'formatUL', 'indent', 'outdent'], ['insertImage', 'insertLink', 'insertFile', 'insertVideo', 'undo', 'redo'] ],
            toolbarButtonsXS: null,
            toolbarButtonsSM: null,
            toolbarButtonsMD: null,
            fileUploadParam: 'file_param',
            imageUploadURL: 'http://localhost/digidana/image_upload.php',
            imageUploadParams: {
                id: '#edit'
            }
        })
        .editable({
            imageDeleteURL: 'http://localhost/digidana/image_delete.php'
        }).on('editable.afterRemoveImage', function (e, editor, $img) {
        // Set the image source to the image delete params.
            editor.options.imageDeleteParams = {src: $img.attr('src')};

            // Make the delete request.
            editor.deleteImage($img);
        })

        })()
    </script>  -->

   <!--  <script>
        (function () {
        new FroalaEditor("#title", {
            toolbarInline: true,
            key: '1CC3kA5C7A3F6E4C3byrncoeG4eheuD3E2A2B2C4G1G4F1A11A7==',
            toolbarButtons: [['bold', 'italic', 'underline', 'strikeThrough', 'textColor', 'backgroundColor'], ['paragraphFormat', 'align', 'formatOL', 'formatUL', 'indent', 'outdent'], ['insertLink', 'insertFile', 'insertVideo', 'undo', 'redo'] ],
            toolbarButtonsXS: null,
            toolbarButtonsSM: null,
            toolbarButtonsMD: null,
            placeholderText: 'Title...',
        	
            fileUploadParam: 'file_param',
            imageUploadURL: 'http://localhost/digidana/image_upload.php',
            imageUploadParams: {
                id: '#title'
            }
        }).editable({
            imageDeleteURL: 'http://localhost/digidana/image_delete.php'
        }).on('editable.afterRemoveImage', function (e, editor, $img) {
        // Set the image source to the image delete params.
            editor.options.imageDeleteParams = {src: $img.attr('src')};

            // Make the delete request.
            editor.deleteImage($img);
        })

        })()
    </script> 
 -->
    <script type="text/javascript">
    	$(document).ready(function(){

    		// $('.show-placeholder').children('div:eq(0)').html("<h1></h1>");
    		// $('.show-placeholder:eq(1)').children('div:eq(0)').html("<br>");

    		$('.tox-tinymce').css("border", "0");
    		// $('.fr-view').keypress(function(){
    		// 	// alert('Ketik');

    		// 	$('.show-placeholder').children('div:eq(1)').html("");
    		// });

    	});
    	
    </script>


@stop


  
