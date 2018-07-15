@include('layouts.header-public')

  <nav class="navbar">
    @include('layouts.navbar-public')
  </nav>

  <section class="head-section">
    <div class="head-section-slide head-section-slide-1">
      <div class="head-section-slide-overlay"></div>
      <div class="container text-center">
        <h1 class="head-section-slide__h1">Selamat Datang di WG Circle</h1>
        <!-- <div class="head-section__h1-border"></div> -->
        <p class="head-section-slide__p">
          WG Circle merupakan wadah yang dibentuk PT. Wika Gedung untuk 
          membangun sinergi dan akselerasi potensi network yang 
          dapat menghasilkan reward bagi seluruh pihak yang tergabung didalamnya.
        </p>
        <!-- <button data-modal="video" data-url="https://www.youtube.com/embed/5-UuTx5q8D4" class="head-section-slide__video-btn">
          <img src="{{ asset('assets/dist/img/icons/play-sign.png') }}" alt="" class="img-responsive">
        </button> -->
        <a href="{{ url('/member-login') }}" class="btn btn-primary head-section-slide__btn">Referensikan Rekanmu !</a>
      </div>
    </div>
    <div class="head-section-slide head-section-slide-2">
      <div class="head-section-slide-overlay"></div>
      <div class="container text-center">
        <h1 class="head-section-slide__h1">Referensikan, Dapatkan Reward Menarik</h1>
        <!-- <div class="head-section__h1-border"></div> -->
        <p class="head-section-slide__p">
        Atas keberhasilan member WG Circle mereferensikan pembeli produk property WIKA Gedung, yaitu Tamansari Tera, Tamansari Mahogany dan Tamansari Urbano, 
        maka member berkesempatan untuk memperoleh reward senilai jutaan rupiah dalam bentuk closing fee, sales commission fee dan bonus paket trip wisata idaman
        </p>
        <a href="{{ url('/member-login') }}" class="btn btn-primary head-section-slide__btn">Dapatkan Reward !</a>
      </div>
    </div>
  </section>

  <section class="section section--alur" id="alur">
    <div class="container">
      <h2 class="section__h2">Alur Program</h2>
      <div class="row">
        <div class="col-sm-4">
          <a href="{{ url('/registration') }}">
            <div class="alur-icon text-center">
              <i class="fa fa-drivers-license-o" aria-hidden="true"></i>
            </div>
            <p class="alur__p text-center"><b>Registrasi</b></p>
            <p class="alur__p text-center">Isi Form Registrasi</p>
          </a>
          <div class="alur-arrow"><i class="fa fa-angle-right"></i></div>
        </div>
        <div class="col-sm-4">
          <a href="{{ url('/active-customer') }}">
            <div class="alur-icon text-center">
              <i class="fa fa-users" aria-hidden="true"></i>
            </div>
            <p class="alur__p text-center"><b>Referensi</b></p>
            <p class="alur__p text-center">Isi form referensi</p>
          </a>
          <div class="alur-arrow"><i class="fa fa-angle-right"></i></div>
        </div>
        <div class="col-sm-4">
          <a href="{{ url('#reward') }}">
            <div class="alur-icon text-center">
              <i class="fa fa-money" aria-hidden="true"></i>
            </div>
            <p class="alur__p text-center"><b>Reward</b></p>
            <p class="alur__p text-center">Terima Reward</p>
          </a>
        </div>
      </div>
    </div>
  </section>

  <section class="section section--reward bg-grey" id="reward">
    <div class="container">
      <h2 class="section__h2 section__h2--card text-primary">Reward</h2>
      <div class="reward">
        <div class="row">
          <div class="col-sm-4">
            <div class="reward-icon">
              <img src="{{ asset('assets/dist/img/icons/user-passive.png') }}" alt="" class="reward-icon__img img-responsive">
              <p class="reward-icon__label text-secondary">Referensi Pasif</p>
            </div>
          </div>
          <div class="col-sm-8">
            <div class="reward-desc">
              <div class="reward-desc-list reward-desc-expander">
                <span class="reward-desc-list__text text-primary">Commision Fee* <span class="reward-desc-list__text--emphasize">1.25%</span></span>
              </div>
              <button class="btn btn-orange-ghost" data-url="{{ asset('assets/dist/img/simulasi-pasif.png') }}" data-modal="image">
                Lihat Simulasi <i class="fa fa-chevron-right" aria-hidden="true"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="reward">
        <div class="row">
          <div class="col-sm-4">
            <div class="reward-icon">
              <img src="{{ asset('assets/dist/img/icons/user-active.png') }}" alt="" class="reward-icon__img img-responsive">
              <p class="reward-icon__label text-secondary">Referensi Aktif</p>
            </div>
          </div>
          <div class="col-sm-8">
            <div class="reward-desc">
              <div class="reward-desc-list">
                <span class="reward-desc-list__text text-primary">Commision Fee* <span class="reward-desc-list__text--emphasize">2.25%</span></span>
              </div>
              <div class="reward-desc-list reward-desc-expander">
                <i class="fa fa-plus" aria-hidden="true"></i>
                <span class="reward-desc-list__text text-primary">Closing Fee <i class="fa fa-angle-down reward-desc-list__icon" aria-hidden="true"></i></span>
                <div class="reward-desc-expand-table">
                  <table class="reward-desc-list-table table text-center">
                    <thead>
                      <tr>
                        <th class="text-center">Studio</th>
                        <th class="text-center">1 Bedroom</th>
                        <th class="text-center">2-3 Bedroom</th>
                        <th class="text-center">Product</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><span class="reward-desc-list-table__emphasis">1.0 jt</span></td>
                        <td><span class="reward-desc-list-table__emphasis">1.5 jt</span></td>
                        <td><span class="reward-desc-list-table__emphasis">2.5 jt</span></td>
                        <td>TS. Mahogany</td>
                      </tr>
                      <tr>
                        <td><span class="reward-desc-list-table__emphasis">3.0 jt</span></td>
                        <td><span class="reward-desc-list-table__emphasis">3.5 jt</span></td>
                        <td><span class="reward-desc-list-table__emphasis">4.5 jt</span></td>
                        <td>TS. Tera</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <button href="#" class="btn btn-orange-ghost reward-desc-btn" data-url="{{ asset('assets/dist/img/simulasi-aktif.png') }}" data-modal="image">
                Lihat Simulasi <i class="fa fa-chevron-right" aria-hidden="true"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="reward">
        <div class="row">
          <div class="col-sm-4">
            <div class="reward-icon">
              <img src="{{ asset('assets/dist/img/icons/airplane.png') }}" alt="" class="reward-icon__img img-responsive">
              <p class="reward-icon__label text-secondary">Bonus</p>
            </div>
          </div>
          <div class="col-sm-8">
            <div class="reward-desc">
              <div class="reward-desc-list reward-desc-expander">
                <i class="fa fa-plus" aria-hidden="true"></i>
                <span class="reward-desc-list__text text-primary">Trip 2 persons <i class="fa fa-angle-down reward-desc-list__icon" aria-hidden="true"></i></span>
                <div class="row reward-desc-expand-table">
                  <div class="col-sm-8">
                    <table class="reward-desc-list-table table">
                      <thead>
                        <tr>
                          <th>Destinasi</th>
                          <th>Durasi</th>
                          <th>Point</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Lombok</td>
                          <td>3D2N</td>
                          <td>7</td>
                        </tr>
                        <tr>
                          <td>Bali</td>
                          <td>3D2N</td>
                          <td>8</td>
                        </tr>
                        <tr>
                          <td>Singapore</td>
                          <td>3D2N</td>
                          <td>11</td>
                        </tr>
                        <tr>
                          <td>Vietnam</td>
                          <td>5D4N</td>
                          <td>15</td>
                        </tr>
                        <tr>
                          <td>Hongkong</td>
                          <td>4D3N</td>
                          <td>20</td>
                        </tr>
                        <tr>
                          <td>Korea Selatan</td>
                          <td>5D4N</td>
                          <td>23</td>
                        </tr>
                        <tr>
                          <td>Sidney</td>
                          <td>4D3N</td>
                          <td>24</td>
                        </tr>
                        <tr>
                          <td>China</td>
                          <td>8D7N</td>
                          <td>34</td>
                        </tr>
                        <tr>
                          <td>Euro Trip <small>(atau yang setara)</small></td>
                          <td>7D6N</td>
                          <td>46</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="col-sm-4">
                    <table class="reward-desc-list-table table">
                      <thead>
                        <tr>
                          <th colspan="2">Keterangan</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Studio / Superior</td>
                          <td>1 Point</td>
                        </tr>
                        <tr>
                          <td>1 BR / Deluxe</td>
                          <td>2 Point</td>
                        </tr>
                        <tr>
                          <td>2 BR / 3BR / Suiter</td>
                          <td>4 Point</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- <section class="section bg-dark section--testimoni" id="testimoni">
    <div class="container">
      <h2 class="section__h2">Testimoni</h2>
      <div class="testimoni-slide">
        <div class="testimoni-box">
          <div class="testimoni-box-video">
            <img src="{{ asset('assets/dist/img/icons/play-sign.png') }}" alt="" class="testimoni-box-video__btn img-responsive">
          </div>
          <div class="testimoni-box-desc">
            <h4 class="testimoni-box-desc__h4">John Doe</h4>
            <p class="testimoni-box-desc__p">Bogor</p>
          </div>
        </div>
        <div class="testimoni-box">
          <div class="testimoni-box-video">
            <img src="{{ asset('assets/dist/img/icons/play-sign.png') }}" alt="" class="testimoni-box-video__btn img-responsive">
          </div>
          <div class="testimoni-box-desc">
            <h4 class="testimoni-box-desc__h4">John Doe</h4>
            <p class="testimoni-box-desc__p">Bogor</p>
          </div>
        </div>
        <div class="testimoni-box">
          <div class="testimoni-box-video">
            <img src="{{ asset('assets/dist/img/icons/play-sign.png') }}" alt="" class="testimoni-box-video__btn img-responsive">
          </div>
          <div class="testimoni-box-desc">
            <h4 class="testimoni-box-desc__h4">John Doe</h4>
            <p class="testimoni-box-desc__p">Bogor</p>
          </div>
        </div>
        <div class="testimoni-box">
          <div class="testimoni-box-video">
            <img src="{{ asset('assets/dist/img/icons/play-sign.png') }}" alt="" class="testimoni-box-video__btn img-responsive">
          </div>
          <div class="testimoni-box-desc">
            <h4 class="testimoni-box-desc__h4">John Doe</h4>
            <p class="testimoni-box-desc__p">Bogor</p>
          </div>
        </div>
        <div class="testimoni-box">
          <div class="testimoni-box-video">
            <img src="{{ asset('assets/dist/img/icons/play-sign.png') }}" alt="" class="testimoni-box-video__btn img-responsive">
          </div>
          <div class="testimoni-box-desc">
            <h4 class="testimoni-box-desc__h4">John Doe</h4>
            <p class="testimoni-box-desc__p">Bogor</p>
          </div>
        </div>
      </div>
    </div>
  </section> -->

  <div class="modal-overlay">
    <span class="modal-overlay-close">&times;</span>
  </div>
  <div class="modal-media modal-media-image">
    <img src="{{ asset('assets/dist/img/photo1.png') }}" alt="" class="img-responsive" />
  </div>
  <div class="modal-media modal-media-video">
    <iframe width="840" height="473" src="" class="modal-media-video__iframe" frameborder="0" allowfullscreen></iframe>
  </div>
  

  @include('layouts.footer-public')
</body>
</html>
