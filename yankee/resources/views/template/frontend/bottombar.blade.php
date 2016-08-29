@section('bbar')
<div class="row">
<div class="col-lg-4 col-sm-4">
	<h3 class="text-light">Popular Post</h3>
	<ul class="media-list">
	  <li class="media">
		<a class="pull-left" href="#" style="width: 74px; height: 74px;">
		  <img class="media-object img-thumbnail" data-src="holder.js/64x64" alt="64x64" src="{{ asset('asset/img/default/image-default-64x64.png') }}">
		</a>
		<div class="media-body">
		  <h5 class="media-heading"><a href="#">Media heading</a></h5>
		  <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. </p>
		</div>
	  </li>
	  <li class="media">
		<a class="pull-left" href="#" style="width: 74px; height: 74px;">
		  <img class="media-object img-thumbnail"  alt="64x64" src="{{ asset('asset/img/default/image-default-64x64.png') }}">
		</a>
		<div class="media-body">
		  <h5 class="media-heading"><a href="#">Media heading</a></h5>
		  <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. </p>
		</div>
	  </li>
	  <li class="media">
		<a class="pull-left" href="#" style="width: 74px; height: 74px;">
		  <img class="media-object img-thumbnail" data-src="holder.js/64x64" alt="64x64" src="{{ asset('asset/img/default/image-default-64x64.png') }}">
		</a>
		<div class="media-body">
		  <h5 class="media-heading"><a href="#">Media heading</a></h5>
		  <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. </p>
		</div>
	  </li>
	</ul>
</div>
<div class="col-lg-4 col-sm-4">
	<h3 class="text-light">Recent Post</h3>
	<div class="list-group">
	<a href="#" class="list-group-item active">
		<p class="list-group-item-heading">
			<span class="badge pull-right">42</span> 
			List group item heading
		</p>
	</a>
	<a href="#" class="list-group-item">
		<p class="list-group-item-heading">
			<span class="badge pull-right">42</span> 
			List group item heading
		</p>
	</a>
	<a href="#" class="list-group-item">
		<p class="list-group-item-heading">
			<span class="badge pull-right">42</span> 
			List group item heading
		</p>
	</a>	
	<a href="#" class="list-group-item">
		<p class="list-group-item-heading">
			<span class="badge pull-right">42</span> 
			List group item heading
		</p>
	</a>	
	<a href="#" class="list-group-item">
		<p class="list-group-item-heading">
			<span class="badge pull-right">42</span> 
			List group item heading
		</p>
	</a>	
	<a href="#" class="list-group-item">
		<p class="list-group-item-heading">
			<span class="badge pull-right">42</span> 
			List group item heading
		</p>
	</a>
	</div>
</div>
<div class="col-lg-4 col-sm-4">
<h3>Other Post</h3>
<div class="tabbable tabs-right">
  <ul class="nav nav-tabs">
	<li class="active"><a href="#tab1" data-toggle="tab">Section 1</a></li>
	<li><a href="#tab2" data-toggle="tab">Section 2</a></li>
	<li><a href="#tab3" data-toggle="tab">Section 3</a></li>
	<li><a href="#tab4" data-toggle="tab">Section 4</a></li>
	<li><a href="#tab5" data-toggle="tab">Section 5</a></li>
	<li><a href="#tab6" data-toggle="tab">Section 6</a></li>
  </ul>
  <div class="tab-content">
	<div class="tab-pane active" id="tab1">
	  <p>
		I'm in Section 1. Praesent sit amet augue in orci laoreet adipiscing vel vitae urna. Pellentesque eget quam dui, sit amet eleifend mauris. 
	    I'm in Section 1. Praesent sit amet augue in orci laoreet adipiscing vel vitae urna. Pellentesque eget quam dui, sit amet eleifend mauris.
	  </p>
	</div>
	<div class="tab-pane" id="tab2">
	  <p>
		Howdy, I'm in Section 2. Quisque pharetra, arcu a consectetur aliquet, mi enim porta enim, quis sodales nisl justo et justo. Morbi non quam in eros varius molestie.
		Howdy, I'm in Section 2. Quisque pharetra, arcu a consectetur aliquet, mi enim porta enim, quis sodales nisl justo et justo. Morbi non quam in eros varius molestie.
	  </p>
	</div>
	<div class="tab-pane" id="tab3">
	  <p>
		I'm in Section 3. Praesent sit amet augue in orci laoreet adipiscing vel vitae urna. Pellentesque eget quam dui, sit amet eleifend mauris.
		I'm in Section 3. Praesent sit amet augue in orci laoreet adipiscing vel vitae urna. Pellentesque eget quam dui, sit amet eleifend mauris.
	  </p>
	</div>
	<div class="tab-pane" id="tab4">
	  <p>
		Howdy, I'm in Section 4. Quisque pharetra, arcu a consectetur aliquet, mi enim porta enim, quis sodales nisl justo et justo. Morbi non quam in eros varius molestie. 
		Howdy, I'm in Section 4. Quisque pharetra, arcu a consectetur aliquet, mi enim porta enim, quis sodales nisl justo et justo. Morbi non quam in eros varius molestie. 
	  </p>
	</div>	
	<div class="tab-pane" id="tab5">
	  <p>
		I'm in Section 5. Praesent sit amet augue in orci laoreet adipiscing vel vitae urna. Pellentesque eget quam dui, sit amet eleifend mauris.
		I'm in Section 5. Praesent sit amet augue in orci laoreet adipiscing vel vitae urna. Pellentesque eget quam dui, sit amet eleifend mauris. 
	  </p>
	</div>
	<div class="tab-pane" id="tab6">
	  <p>
		Howdy, I'm in Section 6. Quisque pharetra, arcu a consectetur aliquet, mi enim porta enim, quis sodales nisl justo et justo. Morbi non quam in eros varius molestie.
		Howdy, I'm in Section 6. Quisque pharetra, arcu a consectetur aliquet, mi enim porta enim, quis sodales nisl justo et justo. Morbi non quam in eros varius molestie. 
	  </p>
	</div>
  </div>
</div>
</div>
</div>	
<div class="row">
<h3>Banner</h3>
<div class="col-lg-3 col-sm-3 ">
<div class="thumbnail text-center">
  <img src="{{ asset('asset/img/banner/kemdikbud.jpg') }}" alt="">
  <p>Lorem Ipsum</p>
</div>
</div>
<div class="col-lg-3 col-sm-3 ">
<div class="thumbnail text-center">
  <img src="{{ asset('asset/img/banner/ppdb2016.jpg') }}" alt="">
  <p>Lorem Ipsum</p>
</div>
</div>
<div class="col-lg-3 col-sm-3 ">
<div class="thumbnail text-center">
  <img src="{{ asset('asset/img/banner/banner_head.jpg') }}" alt="">
  <p>Lorem Ipsum</p>
</div>
</div>
<div class="col-lg-3 col-sm-3 ">
<div class="thumbnail text-center">
  <img src="{{ asset('asset/img/banner/Sekolah-djuanda-bannerweb-01.jpg') }}" alt="">
  <p>Lorem Ipsum</p>
</div>
</div>
</div>    
@stop