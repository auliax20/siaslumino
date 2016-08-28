@extends('template.lumino')
@extends('template.menulumino')
@extends('template.contentlumino')
@section('cssextend')
<!-- Include Font Awesome. -->
  <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

  <!-- Include Editor style. -->
  <link href="{{ asset('asset/css/froala_editor.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('asset/css/froala_style.min.css') }}" rel="stylesheet" type="text/css" />

  <!-- Include Code Mirror style -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">

  <!-- Include Editor Plugins style. -->
  <link rel="stylesheet" href="{{ asset('asset/css/plugins/char_counter.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/css/plugins/code_view.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/css/plugins/colors.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/css/plugins/emoticons.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/css/plugins/file.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/css/plugins/fullscreen.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/css/plugins/image.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/css/plugins/image_manager.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/css/plugins/line_breaker.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/css/plugins/quick_insert.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/css/plugins/table.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/css/plugins/video.css') }}">
@stop
@section('title')
Input Post
@stop
@section('panel')
@if (session('error'))
    <div class="alert bg-danger">
        {{ session('error') }}
    </div>
@endif
@if (session('message'))
    <div class="alert bg-primary">
        {{ session('message') }}
    </div>
@endif
<div class="panel panel-default">
					<div class="panel-heading">Form Input Post</div>
					<div class="panel-body">
						<div class="col-lg-12">
							<form role="form" method="POST" action="{{ asset('bahanajar/inputbahanajar') }}" enctype="multipart/form-data">
                            	<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="form-group">
									<label>Judul</label>
									<input class="form-control" placeholder="Judul Postingan" name="title">
								</div>
								<div class="form-group">
									<label>Kategori</label>
                                                                        <select class="form-control" name="category">
                                                                            <option value=""> - Pilih Kategori - </option>
                                                                        </select>
								</div>
                                <div class="form-group">
									<label>Kontent Posting</label>
                                                                        <textarea placeholder="Ketikkan Post" name="post" id="post"></textarea>
								</div>
								<div class="form-group">
									<button class="btn btn-primary">Submit</button>
								</div>				
						</form>
					</div>
				</div>
@stop
@section('jsadd')
<script type="text/javascript" src="{{ asset('asset/js/froala_editor.min.js') }}"></script>
<!-- Include Plugins. -->
  <script type="text/javascript" src="{{ asset('asset/js/plugins/align.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('asset/js/plugins/char_counter.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('asset/js/plugins/code_beautifier.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('asset/js/plugins/code_view.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('asset/js/plugins/colors.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('asset/js/plugins/emoticons.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('asset/js/plugins/entities.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('asset/js/plugins/file.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('asset/js/plugins/font_family.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('asset/js/plugins/font_size.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('asset/js/plugins/fullscreen.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('asset/js/plugins/image.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('asset/js/plugins/image_manager.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('asset/js/plugins/inline_style.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('asset/js/plugins/line_breaker.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('asset/js/plugins/link.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('asset/js/plugins/lists.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('asset/js/plugins/paragraph_format.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('asset/js/plugins/paragraph_style.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('asset/js/plugins/quick_insert.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('asset/js/plugins/quote.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('asset/js/plugins/table.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('asset/js/plugins/save.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('asset/js/plugins/url.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('asset/js/plugins/video.min.js') }}"></script>
  
  <script>
      $(function() {
          $('#post').froalaEditor({
              heightMin: 200,
              heightMax: 350
          })
      });
  </script>
@stop