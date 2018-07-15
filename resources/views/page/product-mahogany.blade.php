@include('layouts.header-public')

  <nav class="navbar fixed">
    @include('layouts.navbar-public')
  </nav>

  <section class="section-first">
    <div class="container">
      <h2 class="section__h2">Tamansari Mahogany</h2>
      <div class="row">
        <div class="col-sm-4">
          <div class="detail-view">
            <img src="{{ asset('assets/dist/img/Tamansari Mahogany.png') }}" alt="" class="detail-view__img img-responsive"/>
            <img src="{{ asset('assets/dist/img/Tamansari Mahogany.png') }}" alt="" class="detail-view__img img-responsive"/>
            <img src="{{ asset('assets/dist/img/Tamansari Mahogany.png') }}" alt="" class="detail-view__img img-responsive"/>
          </div>
        </div>
        <div class="col-sm-8">
          <div class="detail-desc">
            <h3 class="detail-desc__h3">Website</h3>
            <p class="detail-desc__p"><a href="http://tamansarimahogany.co.id" target="_blank">tamansarimahogany.co.id</a></p>
          </div>
          <div class="detail-desc">
            <h3 class="detail-desc__h3">Deskripsi</h3>
            <p class="detail-desc__p">Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
              Recusandae mollitia cumque illo placeat laboriosam, amet vero eaque quo quidem 
              nisi sit hic facere excepturi sed animi, quaerat sequi voluptatibus voluptatem!</p>
          </div>
          <div class="detail-desc">
            <h3 class="detail-desc__h3">Progress</h3>
            <div class="progress">
              <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                60%
              </div>
            </div>
          </div>
          <div class="detail-desc">
            <h3 class="detail-desc__h3">Marketing Handbook</h3>
            <a href="https://drive.google.com/open?id=0B7_zjFpq2327SzlzMjZwWmtCX2s" class="btn btn-orange-ghost"><i class="fa fa-download" aria-hidden="true"></i> Download</a>
          </div>
          <div class="detail-desc">
            <h3 class="detail-desc__h3">Pricelist</h3>
            <a href="https://drive.google.com/open?id=0B7_zjFpq2327TnRKdDE4Y21qQ3c" class="btn btn-orange-ghost"><i class="fa fa-download" aria-hidden="true"></i> Download</a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="detail-map text-center">
            <h3 class="detail-map__h3">Lokasi</h3>
            <p class="detail-map__p">Karawang Barat, Telukjambe Barat, Margakaya, Telukjambe Bar., Kabupaten Karawang, Jawa Barat 41361</p>
            <div class="detail-map-instance" id="tera-map"></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  @include('layouts.footer-public')

  <!-- Google maps script -->
  <script>
    function initMap() {
      var uluru = {lat: -6.3388818, lng: 107.2683838};
      var map = new google.maps.Map(document.getElementById('tera-map'), {
        zoom: 15,
        center: uluru
      });
      var marker = new google.maps.Marker({
        position: uluru,
        map: map
      });
    }
  </script>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCMsbdOuHMky9amFuqRcFN1QcGM0iKV5js&callback=initMap"
  type="text/javascript"></script>

</body>
</html>
