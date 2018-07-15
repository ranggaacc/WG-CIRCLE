@include('layouts.header')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
  <div class="page-header">
      <h1><i class="glyphicon glyphicon-edit"></i> Referensi Pasif / Create</h1>
  </div>
  </section>
    <!-- Main content -->
  <section class="content">
      @include('error')
      @if(Session::has('message'))
         <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('message') }}</p>
      @elseif(Session::has('message2'))
         <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message2') }}</p>
      @endif
    <div class="row">
            <form action="{{ route('customer_pasifs.update', $customer_pasif->id) }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id_pesanan" value="{{ is_null(old("pesanan['id']")) ? $customer_pasif->pesanan['id'] : old("pesanan['id']") }}">
            <div class="col-md-12">
              <div class="col-md-6">
                <div class="form-group @if($errors->has('first_name')) has-error @endif">
                       <label for="first_name-field">Nama Depan</label>
                    <input type="text" id="first_name-field" name="first_name" class="form-control" value="{{ is_null(old("first_name")) ? $customer_pasif->first_name : old("first_name") }}"/>
                       @if($errors->has("first_name"))
                        <span class="help-block">{{ $errors->first("first_name") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('middle_name')) has-error @endif">
                       <label for="middle_name-field">Nama Tengah</label>
                    <input type="text" id="middle_name-field" name="middle_name" class="form-control" value="{{ is_null(old("middle_name")) ? $customer_pasif->middle_name : old("middle_name") }}"/>
                       @if($errors->has("middle_name"))
                        <span class="help-block">{{ $errors->first("middle_name") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('id_card')) has-error @endif">
                       <label for="id_card-field">No KTP</label>
                    <input type="text" id="id_card-field" name="id_card" class="form-control" value="{{ is_null(old("id_card")) ? $customer_pasif->id_card : old("id_card") }}" readonly>
                       @if($errors->has("id_card"))
                        <span class="help-block">{{ $errors->first("id_card") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('no_member')) has-error @endif">
                       <label for="no_member-field">No member</label>
                    <input type="text" id="no_member-field" name="no_member" class="form-control" value="{{ is_null(old("no_member")) ? $customer_pasif->no_member : old("no_member") }}" readonly>
                       @if($errors->has("no_member"))
                        <span class="help-block">{{ $errors->first("no_member") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('no_pengajuan')) has-error @endif">
                       <label for="no_pengajuan-field">No pengajuan</label>
                    <input type="text" id="no_pengajuan-field" name="no_pengajuan" class="form-control" value="{{ is_null(old("no_pengajuan")) ? $customer_pasif->no_pengajuan : old("no_pengajuan") }}" readonly>
                       @if($errors->has("no_pengajuan"))
                        <span class="help-block">{{ $errors->first("no_pengajuan") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('hp')) has-error @endif">
                       <label for="hp-field">Hp</label>
                    <input type="text" id="hp-field" name="hp" class="form-control" value="{{ is_null(old("hp")) ? $customer_pasif->hp : old("hp") }}" readonly/>
                       @if($errors->has("hp"))
                        <span class="help-block">{{ $errors->first("hp") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('email')) has-error @endif">
                       <label for="email-field">Email</label>
                    <input type="text" id="email-field" name="email" class="form-control" value="{{ is_null(old("email")) ? $customer_pasif->email : old("email") }}"/>
                       @if($errors->has("email"))
                        <span class="help-block">{{ $errors->first("email") }}</span>
                       @endif
                    </div>
                     <input type="hidden" id="hp-field" name="hp" class="form-control" value="{{ is_null(old("hp")) ? $customer_pasif->hp : old("hp") }}"/>
                    <div class="form-group @if($errors->has('jalan')) has-error @endif">
                       <label for="jalan-field">Jalan</label>
                    <input type="text" id="jalan-field" name="jalan" class="form-control" value="{{ is_null(old("jalan")) ? $customer_pasif->jalan : old("jalan") }}"/>
                       @if($errors->has("jalan"))
                        <span class="help-block">{{ $errors->first("jalan") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('kota')) has-error @endif">
                       <label for="kota-field">Kota</label>
                    <input type="text" id="kota-field" name="kota" class="form-control" value="{{ is_null(old("kota")) ? $customer_pasif->kota : old("kota") }}"/>
                       @if($errors->has("kota"))
                        <span class="help-block">{{ $errors->first("kota") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('provinsi')) has-error @endif">
                       <label for="provinsi-field">Provinsi</label>
                    <input type="text" id="provinsi-field" name="provinsi" class="form-control" value="{{ is_null(old("provinsi")) ? $customer_pasif->provinsi : old("provinsi") }}"/>
                       @if($errors->has("provinsi"))
                        <span class="help-block">{{ $errors->first("provinsi") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('negara')) has-error @endif">
                       <label for="negara-field">Negara</label>
                    <input type="text" id="negara-field" name="negara" class="form-control" value="Indonesia"/>
                       @if($errors->has("negara"))
                        <span class="help-block">{{ $errors->first("negara") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('kodepos')) has-error @endif">
                       <label for="kodepos-field">Kode Pos</label>
                    <input type="text" id="kodepos-field" name="kodepos" class="form-control" value="{{ is_null(old("kodepos")) ? $customer_pasif->kodepos : old("kodepos") }}"/>
                       @if($errors->has("kodepos"))
                        <span class="help-block">{{ $errors->first("kodepos") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('lokasi_diminati')) has-error @endif">
                       <label for="lokasi_diminati-field">Lokasi diminati</label>
                    <input type="text" id="lokasi_diminati-field" name="lokasi_diminati" class="form-control" value="{{ is_null(old("lokasi_diminati")) ? $customer_pasif->product['name'] : old("lokasi_diminati") }}" readonly>
                       @if($errors->has("lokasi_diminati"))
                        <span class="help-block">{{ $errors->first("lokasi_diminati") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('segmentasi')) has-error @endif">
                       <label for="lokasi_diminati-field">Segmentasi</label>
                    <input type="text" id="segmentasi-field" name="segmentasi" class="form-control" value="{{ is_null(old("product['segmentasi']")) ? $customer_pasif->product['segmentasi'] : old("product['segmentasi']") }}" readonly>
                       @if($errors->has("segmentasi"))
                        <span class="help-block">{{ $errors->first("segmentasi") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('picture')) has-error @endif">
                       <label for="picture-field">Foto</label>
                    <input type="file" id="picture-field" name="picture" onchange="loadFile(event)" class="form-control" value="{{ is_null(old("picture")) ? $customer_pasif->picture : old("picture") }}"/>
                       @if($errors->has("picture"))
                        <span class="help-block">{{ $errors->first("picture") }}</span>
                       @endif
                       <br>
                       <img id="avatar" width="100" height="100" src="{{ asset($customer_pasif->picture) }}" class="img-responsive"/>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group @if($errors->has('no_pesanan')) has-error @endif">
                       <label for="nomor_surat_pesanan-field">Nomor Surat Pesanan</label>
                    <input type="text" id="nomor_surat_pesanan-field" name="no_pesanan" class="form-control" value="{{ is_null(old("pesanan['no_pesanan']")) ? $customer_pasif->pesanan['no_pesanan'] : old("pesanan['no_pesanan']") }}" />
                       @if($errors->has("no_pesanan"))
                        <span class="help-block">{{ $errors->first("no_pesanan") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('nilai_transaksi')) has-error @endif">
                       <label for="nilai_transaksi-field">Nilai transaksi (diluar PPN)</label>
                    <input type="number" id="nilai_transaksi-field" name="nilai_transaksi" class="form-control" value="{{ is_null(old("pesanan['nilai_transaksi']")) ? $customer_pasif->pesanan['nilai_transaksi'] : old("pesanan['nilai_transaksi']") }}" />
                       @if($errors->has("nilai_transaksi"))
                        <span class="help-block">{{ $errors->first("nilai_transaksi") }}</span>
                       @endif
                    </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Tipe Diminati</label>
                    <div class="col-sm-9">
                      <div class="form-group row">
                        <div class="col-xs-6">
                          <div class="checkbox">
                            <label><input {{isset($customer_pasif->pesanan['tipe_diminati_1'])=='Studio' ? 'checked' : ''}} type="checkbox" name="tipe_diminati_1" value="studio"> Studio (1 poin)</label>
                          </div>
                          <div class="checkbox">
                            <label><input {{isset($customer_pasif->pesanan['tipe_diminati_2'])=='Studio' ? 'checked' : ''}} type="checkbox" name="tipe_diminati_2" value="1br"> 1 BR (2 poin)</label>
                          </div>
                          <div class="checkbox">  
                            <label><input {{isset($customer_pasif->pesanan['tipe_diminati_3'])=='Studio' ? 'checked' : ''}} type="checkbox" name="tipe_diminati_3" value="2br"> 2 BR (4 poin)</label>
                          </div>
                          <div class="checkbox">  
                            <label><input {{isset($customer_pasif->pesanan['tipe_diminati_4'])=='Studio' ? 'checked' : ''}} type="checkbox" name="tipe_diminati_4" value="3br"> 3 BR (4 poin)</label>
                          </div>
                        </div>
                        <div class="col-xs-6">
                          <div class="checkbox">
                            <label><input {{isset($customer_pasif->pesanan['tipe_diminati_5'])=='Studio' ? 'checked' : ''}} type="checkbox" name="tipe_diminati_5" value="superior"> Superior (1 poin)</label>
                          </div>
                          <div class="checkbox">
                            <label><input {{isset($customer_pasif->pesanan['tipe_diminati_6'])=='Studio' ? 'checked' : ''}} type="checkbox" name="tipe_diminati_6" value="deluxe"> Deluxe (2 poin)</label>
                          </div>
                          <div class="checkbox">  
                            <label><input {{isset($customer_pasif->pesanan['tipe_diminati_7'])=='Studio' ? 'checked' : ''}} type="checkbox" name="tipe_diminati_7" value="suite"> Suite (4 poin)</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                    <div class="form-group @if($errors->has('date_fee_1')) has-error @endif">
                       <label for="date_fee_1-field">Tanggal pencairan (10%)</label>
                    <input type="date" id="date_fee_1-field" name="date_fee_1" class="form-control date-picker"  value="{{ is_null(old("pesanan['date_fee_1']")) ? $customer_pasif->pesanan['date_fee_1'] : old("pesanan['date_fee_1']") }}"/>
                       @if($errors->has("date_fee_1"))
                        <span class="help-block">{{ $errors->first("date_fee_1") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('date_fee_2')) has-error @endif">
                       <label for="date_fee_2-field">Tanggal pencairan (20%)</label>
                    <input type="date" id="date_fee_2-field" name="date_fee_2" class="form-control date-picker" value="{{ is_null(old("pesanan['date_fee_2']")) ? $customer_pasif->pesanan['date_fee_2'] : old("pesanan['date_fee_2']") }}"/>
                       @if($errors->has("date_fee_2"))
                        <span class="help-block">{{ $errors->first("date_fee_2") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('poin')) has-error @endif">
                       <label for="poin-field">Poin</label>
                    <input type="number" id="poin-field" name="poin" class="form-control" value="{{ is_null(old("pesanan['poin']")) ? $customer_pasif->pesanan['poin'] : old("pesanan['poin']") }}" readonly/>
                       @if($errors->has("poin"))
                        <span class="help-block">{{ $errors->first("poin") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('closing_fee')) has-error @endif">
                       <label for="closing_fee-field">Closing fee</label>
                    <input type="number" id="closing_fee-field" name="closing_fee" class="form-control" value="{{ is_null(old("pesanan['closing_fee']")) ? $customer_pasif->pesanan['closing_fee'] : old("pesanan['closing_fee']") }}" readonly/>
                       @if($errors->has("closing_fee"))
                        <span class="help-block">{{ $errors->first("closing_fee") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('sales_fee')) has-error @endif">
                       <label for="sales_fee-field">Commision fee</label>
                    <input type="number" id="sales_fee-field" name="sales_fee" class="form-control" value="{{ is_null(old("pesanan['sales_fee']")) ? $customer_pasif->pesanan['sales_fee'] : old("pesanan['sales_fee']") }}" readonly/>
                       @if($errors->has("sales_fee"))
                        <span class="help-block">{{ $errors->first("sales_fee") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('customer_pasifs.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </form>

        </div>
    </div>
    </section>
    <!-- /.content -->
  </div>
@include('layouts.footer') 
</body>
<script>
    var loadFile = function(event) {
        var output = document.getElementById('avatar');
        output.src = URL.createObjectURL(event.target.files[0]);
        };
</script>

</html>
