@include('layouts.header-public')

  <nav class="navbar fixed">
    @include('layouts.navbar-public')
  </nav>

  <section class="section section-first">
    <div class="container">
      <h2 class="section__h2">Form Referensi <span class="text-accent">Aktif</span></h2>
      <div class="row">
        <div class="col-sm-12">
          <form class="registration-form" role="form" method="POST" action="{{ url('/post-active-customer') }}">
          {{ csrf_field() }}
          <meta name="csrf-token" content="{{ csrf_token() }}">
{{--           @include('error') --}}
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
                    <input type="text" class="form-control" name="first_name" placeholder="Nama Depan" required/>
                    @if ($errors->has('first_name'))
                    <span class="help-block">
                        <strong style="color:#a94442;">{{ $errors->first('first_name') }}</strong>
                    </span>
                  @endif
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="middle_name" placeholder="Nama Belakang"/>
                    @if ($errors->has('middle_name'))
                    <span class="help-block">
                        <strong style="color:#a94442;">{{ $errors->first('middle_name') }}</strong>
                    </span>
                  @endif
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="no-registration" class="col-sm-3 col-form-label">No. KTP/SIM/NPWP</label>
              <div class="col-sm-9">
                <input type="text" name="id_card" class="form-control"/>
                @if ($errors->has('id_card'))
                    <span class="help-block">
                        <strong style="color:#a94442;">{{ $errors->first('id_card') }}</strong>
                    </span>
                  @endif
              </div>
            </div>
            <div class="form-group row">
              <label for="no-registration" class="col-sm-3 col-form-label">No. Telephone</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="telephone" placeholder="ex. 0812xxx"/>
                @if ($errors->has('telephone'))
                    <span class="help-block">
                        <strong style="color:#a94442;">{{ $errors->first('telephone') }}</strong>
                    </span>
                  @endif
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Lokasi Diminati</label>
              <div class="col-sm-9">
                <select id="source" name="lokasi_diminati" class="form-control">
                  @foreach($products as $p)
                      <option value="{{ $p->id }}">{{ $p->name }}</option>
                  @endforeach
                </select>
                @if ($errors->has('lokasi_diminati'))
                    <span class="help-block">
                        <strong style="color:#a94442;">{{ $errors->first('lokasi_diminati') }}</strong>
                    </span>
                  @endif
              </div>
            </div>
            <div class="form-group row">
              <h3 class="form-subtitle">Data Member yang Mengajukan</h3>  
            </div>
            <div class="form-group row">
              <label for="no-registration" class="col-sm-3 col-form-label">No. Member</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="no_member" @if(Auth::check()) value="{{ Auth::user()->no_member}}" @else value="" @endif placeholder="ex. WGCC 0812" readonly>
                @if ($errors->has('no_member'))
                    <span class="help-block">
                        <strong>{{ $errors->first('no_member') }}</strong>
                    </span>
                  @endif
              </div>
            </div>
            <div class="form-group row">
              <label for="no-registration" class="col-sm-3 col-form-label">No. Pengajuan</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="no_pengajuan" placeholder="kosongkan" readonly>
                @if ($errors->has('no_pengajuan'))
                    <span class="help-block">
                        <strong>{{ $errors->first('no_pengajuan') }}</strong>
                    </span>
                  @endif
              </div>
            </div>
            <div class="form-group row">
              <label for="no-registration" class="col-sm-12 col-form-label">Keterangan</label>
              <div class="col-sm-12">
                <ul>
                  <li class="form-desc-list">Form ini berlaku selama 30 hari kalender dan dapat diajukan kembali setelahnya</li>
                  <li class="form-desc-list">Form diproses pada hari kerja, Senin s/d Jumat pukul 09.00 - 16.00. 
                    (diluar waktu tersebut akan diproses pada hari kerja berikutnya).</li>
                  <li class="form-desc-list">
                    Form Hasil Tindak Lanjut atas konsumen yang membeli 
                    akan disampaikan kepada member pada hari kerja berikutnya setelah 
                    konsumen membayar tanda jadi.</li>
                  <li class="form-desc-list">Form Hasil Tindak Lanjut atas konsumen yang tidak 
                    membeli atau belum membuat keputusan membeli dengan dasar belum membayar 
                    tanda jadi akan disampaikan kepada member pada hari ke 15 (lima belas) dan 
                    30 (tiga puluh) kalender sejak tanggal pengajuan.</li>
                  <li class="form-desc-list">
                    Sebelum calon konsumen yang direferensikan mengunjungi kantor pemasaran ataupun melakukan transaksi, 
                    member terlebih dahulu memberi konfirmasi atau berkoordinasi dengan PIC WG Circle 
                    pada masing-masing Unit Property sbb : 
                    <ol>
                      <li>Tamansari Tera > 0812 1408 3010 (Krisna Murti) </li>
                      <li>Tamansari Mahogany > 0856 9246 7387 (Kunto H. Anggoro) </li>
                      <li>Tamansari Urbano > SOLD OUT</li>
                    </ol>  
                  </li>
                </ul>  
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <input type="submit" class="btn btn-primary form__btn" value="Submit"/>
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
