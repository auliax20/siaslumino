@section('rsidebar')
  <!-- sidebar kanan -->
<div class="col-sm-12 col-lg-4">
<!-- sidebar kanan 1 -->
  <div class="row">
    <div class="col-sm-12 col-lg-12">
<div class="panel panel-primary" id="panels" data-effect="helix">
<div class="panel-heading bold">
<form class="form" method="get">
<div class="input-group">
  <input type="text" class="form-control" name="search" placeholder="Pencarian">
  <span class="input-group-btn">
	<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
  </span>
</div>
</form>
</div>
<div class="panel-body">
<div class="thumbnail">
  <img src="{{ asset('asset/img/default/image-default-600x415.png') }}" alt="">
  <div class="caption">
  <h3>About This Page's</h3>
	<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
	<p><a href="#" class="btn btn-primary">Readmore</a></p>
  </div>
</div>
<div class="thumbnail">
<div class="caption">
<h3 class="text-light">Archives</h3>
<ul class="nav nav-pills nav-stacked nav-transparent">
	<li class="active"><a href="#"><span class="badge pull-right">42</span>August 2016</a></li>
	<li><a href="#"><span class="badge pull-right">56</span>January 2014</a></li>
	<li><a href="#"><span class="badge pull-right">32</span>December 2013</a></li>
	<li><a href="#"><span class="badge pull-right">19</span>November 2013</a></li>
	<li><a href="#"><span class="badge pull-right">22</span>October 2013</a></li>
	<li><a href="#"><span class="badge pull-right">14</span>September 2013</a></li>
</ul>
</div>
</div>
</div>
</div>
</div>
		  
        <div class="space"></div>

    </div>
<!--
    <div class="col-sm-12 col-lg-5">
      <div class="list-group">
        <div class="panel panel-primary">
          <div class="panel-heading bold">Banner
          </div>
          <div class="panel-body">
            <p><img src="{{ asset('asset/img/default/image-default-600x415.png') }}" alt="" class="img-responsive"></p>
            <p><img src="{{ asset('asset/img/default/image-default-600x415.png') }}" alt="" class="img-responsive"></p>
            <p><img src="{{ asset('asset/img/default/image-default-600x415.png') }}" alt="" class="img-responsive"></p>
            <p><img src="{{ asset('asset/img/default/image-default-600x415.png') }}" alt="" class="img-responsive"></p>
          </div>
          <div class="panel-footer">This is a footer
          </div>
        </div>
      </div>
    </div>
  </div>-->
  <div class="space"></div>
</div>
@stop