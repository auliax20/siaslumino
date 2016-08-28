@section('footer')
<div class="container-fluid footer">
  <div class="row">
    <div class="col-sm-6 col-lg-3">
      <h2>Media Lainnya</h2>
      <ul class="media-list">
        <li class="media">
          <a class="pull-left" href="#" style="width: 74px; height: 74px;">
            <img class="media-object img-thumbnail" alt="64x64" src="{{ asset('asset/img/media/vlc.png') }}">
          </a>
          <div class="media-body">
            <h5 class="media-heading"><a href="#">E-Tube</a></h5>
            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. </p>
          </div>
        </li>
        <li class="media">
          <a class="pull-left" href="#" style="width: 74px; height: 74px;">
            <img class="media-object img-thumbnail"  alt="64x64" src="{{ asset('asset/img/media/grsync.png') }}">
          </a>
          <div class="media-body">
            <h5 class="media-heading"><a href="#">E-Download</a></h5>
            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. </p>
          </div>
        </li>
      </ul>
    </div>
    <div class="col-sm-6 col-lg-3">
      <h2>Media Elektronik</h2>
      <ul class="media-list">
        <li class="media">
          <a class="pull-left" href="#" style="width: 74px; height: 74px;">
            <img class="media-object img-thumbnail" alt="64x64" src="{{ asset('asset/img/media/gbrainy.png') }}">
          </a>
          <div class="media-body">
            <h5 class="media-heading"><a href="#">E-Library</a></h5>
            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. </p>
          </div>
        </li>
        <li class="media">
          <a class="pull-left" href="#" style="width: 74px; height: 74px;">
            <img class="media-object img-thumbnail"  alt="64x64" src="{{ asset('asset/img/media/notes.png') }}">
          </a>
          <div class="media-body">
            <h5 class="media-heading"><a href="#">E-Learning</a></h5>
            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. </p>
          </div>
        </li>
      </ul>
    </div>
<div class="col-sm-6 col-lg-6">
  <h2>Kontak Kami</h2>
    <form class="form-horizontal" role="form" method="post" action="">
    	<div class="form-group">
    		<label for="name" class="col-sm-2 control-label">Name</label>
    		<div class="col-sm-10">
    			<input type="text" class="form-control" id="name" name="name" placeholder="Masukan Nama Lengkap" value="">
    		</div>
    	</div>
    	<div class="form-group">
    		<label for="email" class="col-sm-2 control-label">Email</label>
    		<div class="col-sm-10">
    			<input type="email" class="form-control" id="email" name="email" placeholder="Masukan Email" value="">
    		</div>
    	</div>
    	<div class="form-group">
    		<label for="message" class="col-sm-2 control-label">Message</label>
    		<div class="col-sm-10">
    			<textarea class="form-control" rows="4" name="message" placeholder="Masukan Pesan"></textarea>
    		</div>
    	</div>
    	<div class="form-group">
    		<div class="col-sm-10 col-sm-offset-2">
    			<input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
    		</div>
    	</div>
    </form>
  </div>
  </div>
  <div class="space"></div>
  <footer>
      <div class="row">
          <div class="col-lg-12">
              <p>Copyright © 2016 - SMA N 1 Lorem Ipsum</p>
              <a href="">LOREM</a> |
              <a href="">IPSUM</a> |
              <a href="">SIT</a> |
              <a href="">AMET</a> |
              <a href="">DOLOR</a>
          </div>
      </div>
  </footer>
</div>
<script src="{{ asset('asset/libs/jquery/jquery-1.11.2.min.js') }}"></script>
<script src="{{ asset('asset/js/bootstrap.min.js') }}"></script>
@stop