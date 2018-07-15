@include('layouts.header-public')

  <nav class="navbar fixed">
    @include('layouts.navbar-public')
  </nav>

  <section class="section-first" id="faq">
    <div class="container">
      <h2 class="section__h2">Kontak</h2>
      <div class="row">
        <div class="col-sm-12">
          <div class="content">
          {!! $info->description !!}

          <!--
            <ol class="row">
              <li class="col-sm-6">
                <strong>Kantor Pusat: Wijaya Karya Bangunan</strong>
                <div>Alamat : Menara MTH Lt. 10 Kav. 23, Jakarta Selatan </div>
                <div>Email : info.wgcircle@gmail.com</div>
                <div>No. Telpon : 021 - 8378 2471 ext. 116</div>
                <div>Handphone : 
                  <ul>
                    <li>0818 0207 4190 (Panca AW)</li>
                    <li>0857 2248 9343 (Saidul Ulum)</li>
                    <li>0811 945 785 (Pinatih Larasputri)</li>
                  </ul>
                </div>
              </li>
              <li class="col-sm-6">
                <strong>Kantor Unit</strong>
                <ul>
                  <li>
                    <strong>Tamansari Tera</strong>
                    <div>Alamat : Jl. Tera No 28 Bandung </div>
                    <div>No. Telpon : 022 - 4205 774 </div>
                    <div>Handphone : 0812 1408 3010 (Krisna Murti)</div>
                  </li>
                  <li>
                    <strong>Tamansari Mahogany</strong>
                    <div>Alamat : Interchange Karawang Barat </div>
                    <div>No. Telpon : 0267 - 8637 657  </div>
                    <div>Handphone : 0856 9246 7387 (Kunto H. Anggoro)</div>
                  </li>
                  <li>
                    <strong>Tamansari Urbano</strong>
                    <div>Alamat : Ruko Emerald Blok UA-56 Summarecon Bekasi </div>
                    <div>Email : marketing@tamansariurbano.com </div>
                    <div>No. Telpon : 021 - 2962 0460 </div>
                    <div>Handphone : 0899 5129 539 (Roy Effendi)</div>
                  </li>
                </ul>
              </li>
            </ol>
            -->
          </div>
        </div>
      </div>
    </div>
  </section>

  @include('layouts.footer-public')
</body>
</html>
