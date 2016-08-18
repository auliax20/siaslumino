@section('menu')
<li class="active"><a href="{{ asset('/') }}"><svg class="glyph stroked notepad"><use xlink:href="#stroked-notepad"></use></svg> Dashboard</a></li>
    <li><a href="{{ asset('/siswa') }}"><svg class="glyph stroked female-user"><use xlink:href="#stroked-female-user"></use></svg> Siswa</a></li>
    <li><a href="{{ asset('/buku') }}"><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"></use></svg> Buku</a></li>
    <li><a href="{{ asset('/mapel') }}"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"></use></svg> Mata Pelajaran</a></li>
    <li><a href="{{ asset('/guru') }}"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Forms</a></li>
    <li><a href="{{ asset('/pustaka') }}"><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window"></use></svg> Alerts &amp; Panels</a></li>
    <li><a href="{{ asset('/absen') }}"><svg class="glyph stroked star"><use xlink:href="#stroked-star"></use></svg> Icons</a></li>
    <li class="parent"><a href="#"><span data-toggle="collapse" href="#sub-item-1" class="collapsed">Test DD</span></a>
        <ul class="children collapse" id="sub-item-1">
            <li><a href="#">asd</a></li>
            <li><a href="#">asd</a></li>
        </ul>
        
    </li>
    <li role="presentation" class="divider"></li>
    
    <li><a href="login.html"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Login Page</a></li>
@stop