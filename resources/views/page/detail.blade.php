@include('layouts.header-public')

  <nav class="navbar fixed">
    @include('layouts.navbar-public')
  </nav>

  <section class="section-first" id="faq">
    <div class="container">
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
          <div class="content">
            <div class="news">
              <h3 class="news__title">{{ $new->title}} {{ $new->name}}</h3>
              <div class="news-detail">
                <span class="news-detail__date"><i class="fa fa-calendar" aria-hidden="true"></i> {{ date('j F Y', strtotime($new->created_at)) }}</span>
                <span class="news-detail__divider"> | </span>
                <span class="news-detail__category"><a href="#">{{ $new->kategori }} {{ $new->address }}</a></span>
              </div>
              <div class="news-content">
                <img src="{{ asset($new->picture) }}" alt="" class="img-responsive">
                <p class="caption">{{ $new->kategori }}</p>
                <p>
                {!! $new->description !!}
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  @include('layouts.footer-public')
</body>
</html>
