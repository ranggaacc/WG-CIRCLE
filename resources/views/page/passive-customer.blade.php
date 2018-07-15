@include('layouts.header-public')

  <nav class="navbar fixed">
    @include('layouts.navbar-public')
  </nav>

  <section class="section section-first">
    <div class="container">
      <h2 class="section__h2">Form Referensi <span class="text-accent">Pasif</span></h2>
      <div class="row">
        <div class="col-sm-12">
          <form class="registration-form" role="form" method="POST" action="{{ url('/post-passive-customer') }}">
          {{ csrf_field() }}
          <meta name="csrf-token" content="{{ csrf_token() }}">
          @include('error')
          @if(Session::has('message'))
              <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('message') }}</p>
          @elseif(Session::has('message2'))
              <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message2') }}</p>
          @endif
            <div class="form-group row">
              <h3 class="form-subtitle">Referensi Data Calon Konsumen</h3>  
            </div>
            <div class="form-group row">
              <label for="first-name" class="col-sm-3 col-form-label">Nama Lengkap</label>
              <div class="col-sm-9">
                <div class="form-group row">
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="first_name" placeholder="Nama Depan" value="{{ old('first-name') }}" required/>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="middle_name" placeholder="Nama Belakang" value="{{ old('middle_name') }}"/>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="first-name" class="col-sm-3 col-form-label">Alamat</label>
              <div class="col-sm-9">
                <div class="form-group row">
                  <div class="col-sm-12">
                    <input type="text" name="jalan" class="form-control" placeholder="Jalan" value="{{ old('jalan') }}"/>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6">
                    <input type="text" name="kota" class="form-control" placeholder="Kota" value="{{ old('kota') }}"/>
                  </div>
                  <div class="col-sm-6">
                    <select name="provinsi" id="provinsi" class="form-control">
                    <option value="">Pilih</option>
                    <option value="22">DKI Jakarta</option>
                    <option value="29">Bali</option>
                    <option value="32">Bangka Belitung</option>
                    <option value="36">Banten</option>
                    <option value="40">Bengkulu</option>
                    <option value="19">Di Yogyakarta</option>
                    <option value="17">Gorontalo</option>
                    <option value="26">Jambi</option>
                    <option value="35">Jawa Barat</option>
                    <option value="46">Jawa Tengah</option>
                    <option value="23">Jawa Timur</option>
                    <option value="27">Kalimantan Barat</option>
                    <option value="20">Kalimantan Selatan</option>
                    <option value="25">Kalimantan Tengah</option>
                    <option value="24">Kalimantan Timur</option>
                    <option value="17198">Kalimantan Utara</option>
                    <option value="37">Kepulauan Riau</option>
                    <option value="18">Lampung</option>
                    <option value="28">Maluku</option>
                    <option value="38">Maluku Utara</option>
                    <option value="3023">Nanggroe Aceh Darussalam (Nad)</option>
                    <option value="2896">Nusa Tenggara Barat (Ntb)</option>
                    <option value="2590">Nusa Tenggara Timur (Ntt)</option>
                    <option value="42">Papua</option>
                    <option value="48">Papua Barat</option>
                    <option value="21">Riau</option>
                    <option value="50">Sulawesi Barat</option>
                    <option value="45">Sulawesi Selatan</option>
                    <option value="30">Sulawesi Tengah</option>
                    <option value="47">Sulawesi Tenggara</option>
                    <option value="49">Sulawesi Utara</option>
                    <option value="31">Sumatera Barat</option>
                    <option value="34">Sumatera Selatan</option>
                    <option value="39">Sumatera Utara</option>
                    </select>
                </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6">
                    <input type="text" name="kodepos" class="form-control" placeholder="Kode Pos" value="{{ old('kodepos') }}"/>
                  </div>
                  <div class="col-sm-6">
                    <select name="negara" id="prefix" class="form-control">
                      <option value="indonesia">Indonesia</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="no-registration" class="col-sm-3 col-form-label">No. KTP/SIM/NPWP</label>
              <div class="col-sm-9">
                <input type="text" name="id_card" class="form-control" value="{{ old('id_card') }}"/>
              </div>
            </div>
            <div class="form-group row">
              <label for="no-registration" class="col-sm-3 col-form-label">No. Telephone</label>
              <div class="col-sm-9">
                <input type="text" name="hp" class="form-control" placeholder="ex. 0812xxx" value="{{ old('hp') }}"/>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Email</label>
              <div class="col-sm-9">
                <input type="email" name="email" class="form-control" placeholder="ex. myname@example.com" value="{{ old('email') }}"/>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Lokasi Diminati</label>
              <div class="col-sm-9">
                <select name="lokasi_diminati" id="source" class="form-control">
                @foreach($products as $p)
                    <option value="{{ $p->id }}">{{ $p->name }}</option>
                @endforeach
            </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Tipe Diminati</label>
              <div class="col-sm-9">
                <div class="form-group row">
                  <div class="col-xs-6">
                    <div class="checkbox">
                      <label><input type="checkbox" name="tipe_diminati_1" value="studio"> Studio</label>
                    </div>
                    <div class="checkbox">
                      <label><input type="checkbox" name="tipe_diminati_2" value="1br"> 1 BR</label>
                    </div>
                    <div class="checkbox">  
                      <label><input type="checkbox" name="tipe_diminati_3" value="2br"> 2 BR</label>
                    </div>
                    <div class="checkbox">  
                      <label><input type="checkbox" name="tipe_diminati_4" value="3br"> 3 BR</label>
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <div class="checkbox">
                      <label><input type="checkbox" name="tipe_diminati_5" value="superior"> Superior</label>
                    </div>
                    <div class="checkbox">
                      <label><input type="checkbox" name="tipe_diminati_6" value="deluxe"> Deluxe</label>
                    </div>
                    <div class="checkbox">  
                      <label><input type="checkbox" name="tipe_diminati_7" value="suite"> Suite</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <h3 class="form-subtitle">Data Member yang Mengajukan</h3>  
            </div>
            <div class="form-group row">
              <label for="no-registration" class="col-sm-3 col-form-label">No. Member</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="id_member" @if(Auth::check()) value="{{ Auth::user()->no_member}}" @else value="" @endif  readonly>
              </div>
            </div>
            <div class="form-group row">
              <label for="no-registration" class="col-sm-3 col-form-label">No. Pengajuan</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="kosongkan" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label for="no-registration" class="col-sm-12 col-form-label">Keterangan</label>
              <div class="col-sm-12">
                <ul>
                  <li class="form-desc-list">Form ini berlaku selama 30 hari kalender dan dapat diajukan kembali setelahnya</li>
                  <li class="form-desc-list">Form diproses pada hari kerja, Senin s/d Jumat pukul 09.00 - 16.00. 
                    (diluar waktu tersebut akan diproses pada hari kerja berikutnya).</li>
                  <li class="form-desc-list">Form Hasil Tindak Lanjut atas konsumen yang membeli akan disampaikan 
                    kepada member pada hari kerja berikutnya setelah konsumen membayar tanda jadi.</li>
                  <li class="form-desc-list">Form Hasil Tindak Lanjut atas konsumen yang tidak membeli atau belum 
                    membuat keputusan membeli dengan dasar belum membayar tanda jadi akan disampaikan kepada 
                    member pada hari ke 15 (lima belas) dan 30 (tiga puluh) kalender sejak tanggal pengajuan.</li>
                </ul>  
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <input type="submit" class="btn btn-primary form__btn" value="Submit"/>
              </div>
            </div>
            <div class="form-group row form-statement">
              <label for="no-registration" class="col-sm-12 col-form-label">Pernyataan</label>
              <div class="col-sm-12">
                <p class="form-statement__p">
                  Bahwa data calon konsumen tersebut benar-benar sudah pernah saya hubungi 
                  dan potensial untuk membeli unit property yang dipasarkan oleh WIKA Gedung. 
                </p>
              </div>
            </div>
            <div class="form-group row form-signment">
              <div class="col-sm-12 text-right">
                <h4 class="form-signment__h4">Form Data Konsumen</h4>
                <p class="form-signment__p">Terima kasih sudah menjadi bagian dari WG Circle</p>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  @include('layouts.footer-public')
</body>
</html>
