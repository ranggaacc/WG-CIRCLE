@include('layouts.header-public')

  <nav class="navbar fixed">
    @include('layouts.navbar-public')
  </nav>

  <section class="section-first">
    <div class="container">
      <h2 class="section__h2">{{ $product->name }}</h2>
      <div class="row">
        <div class="col-sm-4">
          <div class="detail-view">
          @foreach($product->pictures as $p)
            <img src="{{ asset($p) }}" alt="" class="detail-view__img img-responsive"/>
          @endforeach
          </div>
        </div>
        <div class="col-sm-8">
          <div class="detail-desc">
            <h3 class="detail-desc__h3">Website</h3>
            <p class="detail-desc__p"><a href="{{ $product->website }}" target="_blank">{{ $product->website}}</a></p>
          </div>
          <div class="detail-desc">
            <h3 class="detail-desc__h3">Deskripsi</h3>
            <p class="detail-desc__p">{!! $product->description !!}</p>
          </div>
          <div class="detail-desc">
            <h3 class="detail-desc__h3">Progress</h3>
            <div class="progress">
              <div class="progress-bar" role="progressbar" aria-valuenow="{{ $product->progress}}" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
              {{ $product->progress }} %
              </div>
            </div>
          </div>
          <div class="detail-desc">
            <h3 class="detail-desc__h3">Marketing Handbook</h3>
            <a href="{{ asset($product->marketing_book) }}" class="btn btn-orange-ghost"><i class="fa fa-download" aria-hidden="true"></i> Download</a>
          </div>
          <div class="detail-desc">
            <h3 class="detail-desc__h3">Pricelist</h3>
            <a href="{{ asset($product->price_list) }}" class="btn btn-orange-ghost"><i class="fa fa-download" aria-hidden="true"></i> Download</a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="detail-map text-center">
            <h3 class="detail-map__h3">Lokasi</h3>
            <p class="detail-map__p">{{ $product->alamat }}</p>
            <div class="detail-share">
              <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ $product->location }}" class="detail-share__icon detail-share__icon--facebook">
                <i class="fa fa-facebook-square"></i>
              </a>
              <a target="_blank" href="https://twitter.com/home?status={{ $product->location }}" class="detail-share__icon detail-share__icon--twitter">
                <i class="fa fa-twitter-square"></i>
              </a>
              <a target="_blank" href="https://plus.google.com/share?url={{ $product->location }}" class="detail-share__icon detail-share__icon--gplus">
                <i class="fa fa-google-plus-square"></i>
              </a>
            </div>
            <div class="detail-map-instance" id="tera-map"></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script>
      var latitude={{ $product->lokasi_lat }};
      var longitude={{ $product->lokasi_long }};
    function initMap() {
      var uluru = {lat: latitude , lng: longitude };
      var map = new google.maps.Map(document.getElementById('tera-map'), {
        zoom: 15,
        center: uluru
      });
      var marker = new google.maps.Marker({
        position: uluru,
        url:'{{ $product->location2 }}',
        map: map
      });
      google.maps.event.addListener(marker, 'click', function() {
        window.location.href = marker.url;
      });
    }
  </script>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCMsbdOuHMky9amFuqRcFN1QcGM0iKV5js&callback=initMap"
  type="text/javascript"></script>
  @include('layouts.footer-public')

  <!-- Google maps script -->


</body>
</html>
