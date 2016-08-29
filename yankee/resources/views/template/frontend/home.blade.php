@section('home')
<!-- konten berita -->
<div class="col-sm-12 col-lg-8">
  <!-- slide carousel -->
  <div id="myCarousel" class="carousel slide">
	<ol class="carousel-indicators">
	  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	  <li data-target="#myCarousel" data-slide-to="1"></li>
	  <li data-target="#myCarousel" data-slide-to="2"></li>
	</ol>
	<div class="carousel-inner">
	  <div class="item active"><!-- Slide 1 -->
		<img src="{{ asset('asset/img/gallery/gambar1.jpg') }}" alt="">
		<div class="carousel-caption caption-right">
		  <h4>Title 1</h4>
		  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
		  <br>
		  <a href="#" class="btn btn-info btn-sm">Read more</a>
		</div>
	  </div>
	  <div class="item"><!-- Slide 2 -->
		<img src="{{ asset('asset/img/gallery/gambar2.jpg') }}" alt="">
		<div class="carousel-caption caption-left">
		  <h4>Title 2</h4>
		  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
		  <br>
		  <a href="#" class="btn btn-danger btn-sm">Read more</a>
		</div>
	  </div>
	  <div class="item"><!-- Slide 3 -->
		<img src="{{ asset('asset/img/gallery/gambar3.jpg') }}" alt="">
		<div class="carousel-caption">
		  <h4>A very long thumbnail title here to fill the space</h4>
		  <br>
		</div>
	  </div>
	</div>
	<a class="left carousel-control" href="#myCarousel" data-slide="prev">
	  <span class="fa fa-chevron-left icon-prev"></span>
	</a>
	<a class="right carousel-control" href="#myCarousel" data-slide="next">
	<span class="fa fa-chevron-right icon-next"></span>
	</a>
  </div> <!-- slide carousel -->
  <div class="space"></div>
  <div class="isi-berita">
	<div class="row"><!-- Thumbnails container -->
	  <div class="col-lg-6 col-sm-6 ">
		<div class="thumbnail">
		  <img src="{{ asset('asset/img/default/image-default-600x415.png') }}" alt="">
		  <div class="caption">
			<h3 class="bold">Thumbnail label</h3>
			<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
			<p><a href="#" class="btn btn-primary">Readmore</a></p>
		  </div>
		</div>
	  </div>
	  <div class="col-lg-6 col-sm-6 ">
		<div class="thumbnail">
		  <img src="{{ asset('asset/img/default/image-default-600x415.png') }}" alt="">
		  <div class="caption">
			<h3 class="bold">Thumbnail label</h3>
			<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
			<p><a href="#" class="btn btn-primary">Readmore</a></p>
		  </div>
		</div>
	  </div>
	</div>
	<div class="row">
<div class="col-lg-12 text-center">
<ul class="pagination pagination-lg">
	<li class="disabled"><a href="#">«</a></li>
	<li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
	<li><a href="#">2</a></li>
	<li><a href="#">3</a></li>
	<li><a href="#">4</a></li>
	<li><a href="#">5</a></li>
	<li><a href="#">6</a></li>
	<li><a href="#">7</a></li>
	<li><a href="#">8</a></li>
	<li><a href="#">9</a></li>
	<li><a href="#">»</a></li>
</ul>
</div>
</div>
  </div>
</div>
@stop