@include('layouts.header-public')

  <nav class="navbar fixed">
    @include('layouts.navbar-public')
  </nav>

  <section class="section-first" id="faq">
    <div class="container">
      <h2 class="section__h2">Video Testimoni</h2>
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
          <div class="content">
          @foreach($news as $new)
            <div class="testimoni">
              <h3 class="testimoni__title">{{ $new->title }}</h3>
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="http://www.youtube.com/embed/{{ $new->url }}"></iframe>
              </div>
            </div>
         @endforeach
            <!--
            <div class="testimoni">
              <h3 class="testimoni__title">Testimoni Dhiana - WG Circle, Cara Mudah, Reward Banyak, Cair Cepat</h3>
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="http://wgcircle.com/wp-content/uploads/2016/07/Testimoni-Dhiana-WG-Circle-Cara-Mudah-Reward-Banyak-Cair-Cepat.mp4?_=2"></iframe>
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
