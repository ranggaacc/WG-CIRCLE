@include('layouts.header-public')

  <nav class="navbar fixed">
    @include('layouts.navbar-public')
  </nav>

  <section class="section-first" id="faq">
    <div class="container">
      <h2 class="section__h2">Syarat dan Ketentuan</h2>
      <div class="row">
        <div class="col-sm-12">
          <div class="content">
          {!! $info->description !!}
            <!--
            <ol>
              <li style="text-align: justify;">PT Wijaya Karya Bangunan Gedung adalah anak perusahan dari PT Wijaya Karya (Persero), Tbk yang bergerak dibidang Konstruksi dan Property.</li>
              <li style="text-align: justify;">WG Circle adalah program yang dibentuk oleh Divisi Property PT Wijaya Karya Bangunan Gedung.</li>
              <li style="text-align: justify;">Program ini berlaku bagi seluruh pihak yang telah terdaftar resmi sebagai member WG CIRCLE.</li>
              <li style="text-align: justify;">Program ini tidak berlaku bagi sales inhouse ataupun agent individu/korporat yang terikat kontrak penjualan Unit Properti PT. Wika Gedung.</li>
              <li style="text-align: justify;">Program WG CIRCLE ini berlaku atas produk Property &nbsp;yang dikembangkan oleh PT Wijaya Karya Bangunan Gedung. (Tamansari Tera – Bandung, Tamansari Mahogany – Karawang dan Tamansari Urbano – Bekasi).</li>
              <li style="text-align: justify;">Pihak yang telah melakukan registrasi sebagai member WG CIRCLE berhak mendapatkan nomor identitas keanggotaan dan berhak mendapatkan kartu keanggotaan setelah terjadinya penjualan atas calon konsumen yang direferensikan.&nbsp;&nbsp;</li>
              <li style="text-align: justify;">Member tidak dapat mereferensikan member lainnya.</li>
              <li style="text-align: justify;">Untuk memperoleh reward, member dapat memberikan referensi calon konsumen dalam 2 (dua) kategori yaitu melalui Form Referensi Pasif atau Form Referensi Aktif.</li>
              <li style="text-align: justify;">Referensi Pasif adalah member mengisi form referensi kategori pasif pada menu form dengan data calon konsumen yang akan direferensikan dan kemudian calon konsumen tersebut ditindaklanjuti oleh pihak pemasaran unit property PT. Wika Gedung, dengan ketentuan sebagai berikut :
                <ol>
                  <li>Reward yang diperoleh untuk referensi pasif yaitu sales commission fee sebesar 1.25% dari harga jual netto.</li>
                  <li>Member mereferensikan data calon konsumen dan pihak pemasaran unit property PT Wika Gedung melakukan tindak lanjut kepada calon konsumen yang bersangkutan agar calon konsumen tersebut melakukan pembelian unit property PT. Wika Gedung.</li>
                  <li>Jika dalam periode 30 hari kalender sejak member memberikan referensi terjadi closing/pembelian oleh calon konsumen melalui pihak pemasaran unit property PT. Wika Gedung, maka member tersebut berhak mendapatkan reward berupa Sales Commission Fee sebesar 1.25% dari harga jual netto.</li>
                  <li>Jika dalam periode 30 hari kalender sejak member memberikan referensi terjadi closing/pembelian oleh calon konsumen melalui member yang bersangkutan, maka reward yang berhak didapat member tersebut adalah Closing Fee + Sales Commission Fee sebesar 2.25% dari harga jual netto.&nbsp;</li>
                </ol>
              </li>
              <li style="text-align: justify;">Referensi Aktif adalah member mengisi form referensi kategori aktif pada menu form dengan data calon konsumen yang akan direferensikan dan kemudian menindaklanjuti calon konsumen tersebut oleh member yang bersangkutan, dengan ketentuan sebagai berikut :
                <ol>
                  <li>Reward yang diperoleh untuk referensi aktif yaitu closing fee + sales commission fee sebesar 2.25% dari harga jual netto.</li>
                  <li>Member mereferensikan data calon konsumen dan melakukan tindak lanjut secara personal kepada calon konsumen yang bersangkutan dengan berkoordinasi dengan PIC WG Circle Unit Properti agar calon konsumen tersebut melakukan pembelian unit property PT. Wika Gedung.</li>
                  <li>Jika dalam periode 30 hari kalender sejak member memberikan referensi terjadi closing/pembelian oleh calon konsumen melalui member yang bersangkutan, maka member tersebut berhak mendapatkan reward berupa Closing Fee + Sales Commission Fee 2.25% dari harga jual netto.</li>
                  <li>Jika dalam periode 30 hari kalender sejak member memberikan referensi terjadi closing/pembelian oleh calon konsumen bukan melalui member yang bersangkutan, maka reward yang berhak didapat member tersebut adalah Sales Commission Fee sebesar 1.25% dari harga jual netto.</li>
                </ol>
              </li>
              <li style="text-align: justify;">Reward bagi member akan dikurangi sebesar nilai reward yang diikuti member dalam program lain yang diselenggarakan oleh unit properti (jika ada) atas pembelian unit property yang sama.</li>
              <li style="text-align: justify;">Pembelian unit apartemen oleh member yang bersangkutan berlaku sebagai cashback dengan periode penerimaan oleh member setelah pembayaran mencapai minimal 20% dari harga jual bruto atau harga sesudah PPN.</li>
              <li style="text-align: justify;">Atas setiap unit yang terjual melalui referensi member baik yang kategori aktif maupun pasif maka diberlakukan hitungan poin sbb :
                <ol>
                  <li>Studio / Superior &nbsp; &nbsp;: 1 Point</li>
                  <li>1 BR / Deluxe &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: 2 Point</li>
                  <li>2 BR / 3 BR / Suite &nbsp;: 4 Point</li>
                </ol>Member dapat menerima reward berupa paket trip untuk 2 (dua) orang sesuai jumlah poin yang diperoleh dalam periode maksimal 2 (dua) bulan dengan paket destinasi yang telah ditentukan PT Wjaya Karya Bangunan Gedung dan tidak dapat ditukar dalam bentuk uang.
                <br>Member dapat menerima reward berupa paket trip tersebut setelah pembayaran konsumen yang direferensikan seluruhnya mencapai minimal 20% dari harga jual brutto&nbsp;atau sesudah PPN.
              </li>
              <li style="text-align: justify;">Form Referensi Data Calon Konsumen berlaku selama 30 hari kalender dan dapat diajukan kembali setelahnya.</li>
              <li style="text-align: justify;">Form Referensi Data Calon Konsumen &nbsp;diproses pada hari kerja, Senin s/d Jumat pukul 09.00 – 16.00. (diluar waktu tersebut akan diproses pada hari kerja berikutnya).</li>
              <li style="text-align: justify;">Form Hasil Tindak Lanjut atas konsumen yang membeli akan disampaikan kepada member pada hari kerja berikutnya setelah konsumen membayar tanda jadi.</li>
              <li style="text-align: justify;">Form Hasil Tindak Lanjut atas konsumen yang tidak membeli atau belum membuat keputusan membeli dengan dasar belum membayar tanda jadi akan disampaikan kepada member pada hari ke 15 (lima belas) dan 30 (tiga puluh) kalender sejak tanggal pengajuan.</li>
              <li style="text-align: justify;">Closing Fee diberikan maksimal 2 (dua) hari kerja setelah konsumen melakukan pembayaran booking fee/tanda jadi sebesar Rp. 10.000.000 (sepuluh juta rupiah).</li>
              <li style="text-align: justify;">Sales Commission Fee diberikan secara bertahap sbb :
                <br>Tahap I, 50% sales commission fee diberikan maksimal 7 (tujuh) hari kerja setelah pembayaran oleh konsumen mencapai minimal 10% dari harga jual bruto atau harga sesudah PPN.
                <br>Tahap II, 50% sales commission fee diberikan maksimal 7 (tujuh) hari kerja setelah pembayaran konsumen mencapai minimal 20% dari harga jual bruto atau harga sesudah PPN.
              </li>
              <li style="text-align: justify;">Nilai sales commission fee dihitung terhadap harga jual netto atau harga sebelum PPn.</li>
              <li style="text-align: justify;">Jika terdapat ketidaksesuaian atas data yang disampaikan oleh member dalam mereferensikan calon konsumen maka PT Wijaya Karya Bangunan Gedung berhak menganulir reward yang ditetapkan.</li>
              <li style="text-align: justify;">Seluruh pihak yang terdaftar sebagai member WG CIRCLE, terikat serta tunduk terhadap ketentuan-ketentuan dan/atau peraturan-peraturan yang diberlakukan dalam program ini.</li>
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
