@include('layouts.header-public')

  <nav class="navbar fixed">
    @include('layouts.navbar-public')
  </nav>

  <section class="section-first" id="faq">
    <div class="container">
      <h2 class="section__h2">Galeri Aktivitas</h2>
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
          <div class="content">
          @foreach($news as $new)
            <div class="news">
              <a href="{{ url('/galeri-detail',$new->name) }}"><h3 class="news__title">{{ $new->name }}</h3></a>
              <div class="news-detail">
                <span class="news-detail__date"><i class="fa fa-calendar" aria-hidden="true"></i> {{ date('j F Y', strtotime($new->created_at)) }}</span>
                <span class="news-detail__divider"> | </span>
                <span class="news-detail__category"><a href="#">Galeri</a></span>
              </div>
              <div class="news-content">
                <img src="{{ asset($new->picture)}}" alt="" class="img-responsive">
                <a href="{{ url('/galeri-detail',$new->name) }}" class="btn btn-primary">Lihat Selengkapnya</a>
              </div>
            </div>
            @endforeach

            <!--
            <div class="news">
              <a href="{{ url('/detail') }}"><h3 class="news__title">HUT WIKA Gedung Ke 8</h3></a>
              <div class="news-detail">
                <span class="news-detail__date"><i class="fa fa-calendar" aria-hidden="true"></i> 17 Februari 2017</span>
                <span class="news-detail__divider"> | </span>
                <span class="news-detail__category"><a href="#">Category</a></span>
              </div>
              <div class="news-content">
                <img src="http://wgcircle.com/wp-content/uploads/2016/11/1.-H-1.jpg" alt="" class="img-responsive">
                <a href="{{ url('/detail') }}" class="btn btn-primary">Lihat Selengkapnya</a>
              </div>
            </div>
            -->
          </div>
        </div>
      </div>
    </div>
  </section>

  @include('layouts.footer-public')
</body>
</html>
