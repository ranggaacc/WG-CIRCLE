@include('layouts.header-public')

  <nav class="navbar fixed">
    @include('layouts.navbar-public')
  </nav>

  <section class="section registration section-first" id="registration">
    <div class="container">
      <h2 class="section__h2">Pendaftaran Member</h2>
      
      @if(Session::has('message'))
          <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
      @elseif(Session::has('message2'))
          <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message2') }}</p>
      @endif

      <div class="row">
        <div class="col-sm-12">
          <form  role="form" method="POST" action="{{ url('/addmember') }}" class="registration-form">
          {{ csrf_field() }}
            <div class="form-group row">
              <label for="no-registration" class="col-sm-3 col-form-label">No. Registrasi</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="no-registration" placeholder="Kolom ini tidak perlu diisi " name="no_member" readonly>
              </div>
            </div>
            <div class="form-group row {{ $errors->has('middle_name') ? ' has-error' : '' }}">
              <label for="first-name" class="col-sm-3 col-form-label">Nama Lengkap<strong style="color:#a94442"> *</strong></label>
              <div class="col-sm-2">
                <select name="middle_name" id="middle_name_id" class="form-control">
                  <option value="bapak">Bapak</option>
                  <option value="ibu">Ibu</option>
                </select>
                  @if ($errors->has('middle_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('middle_name') }}</strong>
                        </span>
                  @endif
              </div>
              <div class="col-sm-3 {{ $errors->has('name') ? ' has-error' : '' }}">
                <input type="text" class="form-control" id="name" name="name" placeholder="Nama Depan" value="{{ old('name') }}"/>
                @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                  @endif
              </div>
              <div class="col-sm-3 {{ $errors->has('last_name') ? ' has-error' : '' }}">
                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Nama Belakang" value="{{ old('last_name') }}"/>
                @if ($errors->has('last_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('last_name') }}</strong>
                        </span>
                  @endif
              </div>
            </div>
            <div class="form-group row {{ $errors->has('jalan') ? ' has-error' : '' }}">
              <label for="first-name" class="col-sm-3 col-form-label">Alamat<strong style="color:#a94442"> *</strong></label>
              <div class="col-sm-9">
                <div class="form-group row">
                  <div class="col-sm-12">
                    <input type="text" name="jalan" class="form-control" placeholder="Jalan" value="{{ old('jalan') }}"/>
                    @if ($errors->has('jalan'))
                        <span class="help-block">
                            <strong>{{ $errors->first('jalan') }}</strong>
                        </span>
                  @endif
                  </div>
                </div>
                <div class="form-group row {{ $errors->has('kota') ? ' has-error' : '' }}">
                  <div class="col-sm-6">
                    <input type="text" name="kota" class="form-control" placeholder="Kota" value="{{ old('kota') }}" />
                    @if ($errors->has('kota'))
                        <span class="help-block">
                            <strong>{{ $errors->first('kota') }}</strong>
                        </span>
                  @endif
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
                             @if ($errors->has('provinsi'))
                        <span class="help-block">
                            <strong>{{ $errors->first('provinsi') }}</strong>
                        </span>
                  @endif

                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6">
                    <input type="text" name="kodepos" class="form-control" placeholder="Kode Pos" value="{{ old('kodepos') }}"/>
                    @if ($errors->has('kodepos'))
                        <span class="help-block">
                            <strong>{{ $errors->first('kodepos') }}</strong>
                        </span>
                  @endif

                  </div>
                  <div class="col-sm-6">
                    <select id="country" name="negara" class="form-control" value="{{ old('negara') }}">
                      <option value="indonesia">Indonesia<strong style="color:#a94442"> *</strong></option>
                    </select>
                    @if ($errors->has('negara'))
                        <span class="help-block">
                            <strong>{{ $errors->first('negara') }}</strong>
                        </span>
                  @endif

                  </div>
                </div>
              </div>
            </div>
            <div class="form-group row {{ $errors->has('birthdate') ? ' has-error' : '' }}">
              <label for="no-registration" class="col-sm-3 col-form-label">Tanggal Lahir<strong style="color:#a94442"> *</strong></label>
              <div class="col-sm-9">
                <input type="date" id="birthdate" name="birthdate"  class="form-control" value="{{ old('birthdate') }}"/>
                @if ($errors->has('birthdate'))
                        <span class="help-block">
                            <strong>{{ $errors->first('birthdate') }}</strong>
                        </span>
                  @endif
              </div>
            </div>
            <div class="form-group row {{ $errors->has('jalan') ? ' has-error' : '' }}">
              <label for="no-registration" class="col-sm-3 col-form-label">No. KTP/SIM<strong style="color:#a94442"> *</strong></label>
              <div class="col-sm-9">
                <input type="number" name="id_card" class="form-control" value="{{ old('id_card') }}"/>
                @if ($errors->has('id_card'))
                        <span class="help-block">
                            <strong style="color:#a94442;">{{ $errors->first('id_card') }}</strong>
                        </span>
                  @endif
              </div>
            </div>
            <div class="form-group row {{ $errors->has('npwp') ? ' has-error' : '' }}">
              <label for="no-registration" class="col-sm-3 col-form-label">No. NPWP</strong></label>
              <div class="col-sm-9">
                <input type="text" name="npwp" class="form-control" placeholder="ex. 33.333.333.3-333.333" data-mask="00.000.000.0-000.000" value="{{ old('npwp') }}"/>
                @if ($errors->has('npwp'))
                        <span class="help-block">
                            <strong>{{ $errors->first('npwp') }}</strong>
                        </span>
                  @endif
              </div>
            </div>
            <div class="form-group row">
              <label for="no-registration" class="col-sm-3 col-form-label">Group Member<strong style="color:#a94442"> *</strong></label>
              <div class="col-sm-9">
                <select name="group_member" class="form-control">
                  <option value="wika-group">Wika Group</option>
                  <option value="wika-gedung">Wika Gedung</option>
                  <option value="vendor">Vendor</option>
                  <option value="umum">Umum</option>
                </select>
                @if ($errors->has('group_member'))
                        <span class="help-block">
                            <strong>{{ $errors->first('group_member') }}</strong>
                        </span>
                  @endif
              </div>
            </div>
            <div class="form-group row {{ $errors->has('hp') ? ' has-error' : '' }}">
              <label for="no-registration" class="col-sm-3 col-form-label">No. Telephone<strong style="color:#a94442"> *</strong></label>
              <div class="col-sm-9">
                <input type="text" name="hp" class="form-control" placeholder="ex. 0812xxx" value="{{ old('hp') }}"/>
                @if ($errors->has('hp'))
                        <span class="help-block">
                            <strong>{{ $errors->first('hp') }}</strong>
                        </span>
                  @endif
              </div>
            </div>
            <div class="form-group row {{ $errors->has('norek') ? ' has-error' : '' }}">
              <label for="no-registration" class="col-sm-3 col-form-label">No. Rekening<strong style="color:#a94442"> *</strong></label>
              <div class="col-sm-9">
                <input type="text" name="norek" class="form-control" placeholder="ex. 82662726xxx"/>
                @if ($errors->has('norek'))
                        <span class="help-block">
                            <strong>{{ $errors->first('norek') }}</strong>
                        </span>
                  @endif
              </div>
            </div>
            <div class="form-group row {{ $errors->has('bank') ? ' has-error' : '' }}">
              <label for="no-registration" class="col-sm-3 col-form-label">Nama Bank<strong style="color:#a94442"> *</strong></label>
              <div class="col-sm-9">
                <input type="text" name="bank" class="form-control" placeholder="ex. BCA/BRI"/>
                @if ($errors->has('bank'))
                        <span class="help-block">
                            <strong>{{ $errors->first('bank') }}</strong>
                        </span>
                  @endif
              </div>
            </div>
            <div class="form-group row {{ $errors->has('atasnama') ? ' has-error' : '' }}">
              <label for="no-registration" class="col-sm-3 col-form-label">Nama Pemilik Rekening<strong style="color:#a94442"> *</strong></label>
              <div class="col-sm-9">
                <input type="text" name="atasnama" class="form-control" placeholder="ex. yanto" />
                @if ($errors->has('atasnama'))
                        <span class="help-block">
                            <strong>{{ $errors->first('atasnama') }}</strong>
                        </span>
                  @endif
              </div>
            </div>
            <div class="form-group row {{ $errors->has('email') ? ' has-error' : '' }}">
              <label class="col-sm-3 col-form-label">Email<strong style="color:#a94442"> *</strong></label>
              <div class="col-sm-9">
                <input type="email" name="email" class="form-control" placeholder="ex. myname@example.com"/>
                @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                  @endif
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Sumber<strong style="color:#a94442"> *</strong></label>
              <div class="col-sm-9">
                <div class="form-group row">
                  <div class="col-sm-12">
                    <select name="sumber" id="sumber" class="form-control">
                      <option value="website">Website</option>
                      <option value="social-media">Sosial Media</option>
                      <option value=socialization"">Sosialisasi</option>
                      <option value="friends">Teman/Kerabat</option>
                      <option value="others">Lain-lain</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-12">
                    <input type="text" name="sumber-lain" class="form-control hidden"/>
                  </div>
                </div>
                @if ($errors->has('sumber'))
                        <span class="help-block">
                            <strong>{{ $errors->first('sumber') }}</strong>
                        </span>
                  @endif
              </div>
            </div>
            <div class="form-group row {{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-3 control-label">Password<strong style="color:#a94442"> *</strong></label>

                <div class="col-md-9">
                    <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}">

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <label for="password-confirm" class="col-md-3 control-label">Confirm Password<strong style="color:#a94442"> *</strong></label>

                <div class="col-md-9">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}">

                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <input type="submit" class="btn btn-primary form__btn" value="Daftar"/>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  @include('layouts.footer-public')
</body>
<script>
    document.getElementById("birthdate").valueAsDate = new Date();
    var loadFile = function(event) {
        var output = document.getElementById('avatar');
        output.src = URL.createObjectURL(event.target.files[0]);
        };
</script>
</html>
