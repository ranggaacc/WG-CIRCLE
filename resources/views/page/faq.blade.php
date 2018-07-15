@include('layouts.header-public')

  <nav class="navbar fixed">
    @include('layouts.navbar-public')
  </nav>

  <section class="section-first" id="faq">
    <div class="container">
      <h2 class="section__h2">FAQ</h2>
      <div class="row">
        <div class="col-sm-12">
          <div class="content">
          {!! $info->description !!}

          <!--
            <ol>
              <li>
                <strong>Apa yang dimaksud WG Circle?</strong>
                <br>wgcircle merupakan wadah yang dibentuk oleh WIKA Gedung untuk membangun sinergi dan akselerasi potensi network yang dapat menghasilkan reward bagi seluruh pihak yang tergabung didalamnya.
              </li>
              <li>
                <strong>Bagaimana cara saya bergabung sebagai member?</strong>
                <br> Anda dapat mendaftarkan dengan mengisi data diri di form registrasi yang ada dalam web WG Circle
              </li>
              <li>
                <strong>Apakah menjadi member harus bayar?</strong>
                <br>Tidak. Program ini tidak dipungut&nbsp;biaya apapun.
              </li>
              <li>
                <strong>Apakah sebagai member ada target yang harus dipenuhi?</strong>
                <br>Tidak
              </li>
              <li>
                <strong>Bagaimana cara agar saya mendapatkan reward?</strong>
                <br>Member mereferensikan calon pembeli produk properti WIKA Gedung dalam website www.wgcircle.com pada menu referensi dengan isi data kemudian setelah calon pembeli telah closing, maka member berhak mendapatkan reward.
              </li>
              <li>
                <strong>Produk properti apa saja yang tergabung dalam program WG Circle?</strong>
                <br>Tamansari Tera, Tamansari Mahogany dan Tamansari Urbano
              </li>
              <li>
                <strong>Jika saya sendiri yang beli apa bisa dapat reward juga?</strong>
                <br>Bisa. Member yang beli atas namanya sendiri berhak mendapatkan cashback senilai sales comission fee nya.
              </li>
              <li>
                <strong>Reward paket trip liburan apa bisa diuangkan atau diberikan ke orang lain?&nbsp;</strong>
                <br>Tidak bisa dan paket liburan hanya bisa digunakan oleh member dan dapat mengajak 1 orang. (paket 2 orang)
              </li>
              <li>
                <strong>Apakah poin saya akan hangus setelah 2 bulan?</strong>
                <br>Untuk mendapatkan reward trip liburan akan diakumulasi selama 2 bulan, namun poin tidak akan hangus.
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
