@include('layouts.header-public')

  <nav class="navbar fixed">
    @include('layouts.navbar-public')
  </nav>

  <section class="section-first section-member" id="products">
    <div class="container">
      <h2 class="section__h2">Produk</h2>
      <div class="row">
      @foreach($products as $p)
        <div class="col-sm-4">
          <a href="{{ url('/wg-products',$p->id) }}" class="product-list">
            <img src="{{ asset($p->logo) }}" alt="" class="img-responsive product__img">
          </a>
        </div>
        @endforeach
      </div>
      <!-- <div class="product">
        <div class="row">
          <div class="col-sm-4">
            <img src="{{ asset('assets/dist/img/Tamansari-Tera-logo.png') }}" alt="" class="img-responsive product__img">
          </div>
          <div class="col-sm-8">
            <div class="product-desc">
              <h3 class="product-desc__h3">Tamansari Tera</h3>
              <p class="product-desc__p">
                Lorem ipsum dolor sit amet consectetur, 
                adipisicing elit. Ducimus officiis delectus animi odit voluptatum, 
                dicta repellat blanditiis fugit beatae quam sit! Velit quisquam itaque dolor nisi harum.
              </p>
              <div class="product-desc-icon">
                <span class="product-desc-icon__span"><i class="fa fa-map-marker" aria-hidden="true"></i> <a href="https://goo.gl/maps/8t9UFbDNmZ52" target="_blank">Bandung</a></span>
                <span class="product-desc-icon__span"><i class="fa fa-globe" aria-hidden="true"></i> <a href="http://tamansaritera.com" target="_blank">tamansaritera.com</a></span>
                <span class="product-desc-icon__span"><i class="fa fa-phone" aria-hidden="true"></i> 022 - 4205 774</span>
              </div>
              <a href="{{ url('/wg-products/tera') }}" class="product-desc__btn">Lihat detail <i class="fa fa-angle-right" aria-hidden="true"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="product">
        <div class="row">
          <div class="col-sm-4">
            <img src="{{ asset('assets/dist/img/Tamansari-Mahogany-logo.png') }}" alt="" class="img-responsive product__img">
          </div>
          <div class="col-sm-8">
            <div class="product-desc">
              <h3 class="product-desc__h3">Tamansari Mahogany</h3>
              <p class="product-desc__p">
                Lorem ipsum dolor sit amet consectetur, 
                adipisicing elit. Ducimus officiis delectus animi odit voluptatum, 
                dicta repellat blanditiis fugit beatae quam sit! Velit quisquam itaque dolor nisi harum.
              </p>
              <div class="product-desc-icon">
                <span class="product-desc-icon__span"><i class="fa fa-map-marker" aria-hidden="true"></i> <a href="https://goo.gl/maps/9fmQG4dafQC2" target="_blank">Karawang</a></span>
                <span class="product-desc-icon__span"><i class="fa fa-globe" aria-hidden="true"></i> <a href="http://tamansarimahogany.co.id/" target="_blank">tamansarimahogany.co.id</a></span>
                <span class="product-desc-icon__span"><i class="fa fa-phone" aria-hidden="true"></i> 0267 - 8637 657 </span>
              </div>
              <a href="{{ url('/wg-products/mahogany') }}" class="product-desc__btn">Lihat detail <i class="fa fa-angle-right" aria-hidden="true"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="product">
        <div class="row">
          <div class="col-sm-4">
            <img src="{{ asset('assets/dist/img/Tamansari-Urbano-logo.png') }}" alt="" class="img-responsive product__img">
          </div>
          <div class="col-sm-8">
            <div class="product-desc">
              <h3 class="product-desc__h3">Tamansari Urbano <span class="product-desc__sold-out">Sold Out</span></h3>
              <p class="product-desc__p">
                Lorem ipsum dolor sit amet consectetur, 
                adipisicing elit. Ducimus officiis delectus animi odit voluptatum, 
                dicta repellat blanditiis fugit beatae quam sit! Velit quisquam itaque dolor nisi harum.
              </p>
              <div class="product-desc-icon">
                <span class="product-desc-icon__span"><i class="fa fa-map-marker" aria-hidden="true"></i> <a href="https://goo.gl/maps/LDbJGk4V7FN2" target="_blank">Bekasi</a></span>
                <span class="product-desc-icon__span"><i class="fa fa-globe" aria-hidden="true"></i> <a href="http://tamansariurbano.com/" target="_blank">tamansariurbano.com</a></span>
                <span class="product-desc-icon__span"><i class="fa fa-phone" aria-hidden="true"></i> 021 - 2962 0460</span>
              </div>
              <a href="{{ url('/wg-products/urbano') }}" class="product-desc__btn">Lihat detail <i class="fa fa-angle-right" aria-hidden="true"></i></a>
            </div>
          </div>
        </div>
      </div> -->
    </div>
  </section>

  @include('layouts.footer-public')
</body>
</html>
