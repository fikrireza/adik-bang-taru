@extends('master.layouts.master')

@section('title')
  <title>Adik Bang Taru</title>
  <link rel="stylesheet" href="{{asset('theme/css/uniform.css')}}" />
  <link rel="stylesheet" href="{{asset('theme/css/select2.css')}}" />
  <link rel="stylesheet" href="{{asset('theme/css/datepicker.css')}}" />

  <style media="screen">
    .select2-container.span3 {
      margin-left: 0px;
    }
  </style>
@endsection

@section('breadcrumb')
  <div id="content-header">
    <div id="breadcrumb">
      <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
      <a href="#">Manajemen Pencairan</a>
      <a href="#">Kelola Data Pencairan</a>
      <a href="#">Rincian Item</a>
      <a href="#" class="current">Proses Pencairan</a>
    </div>
    <h1>Proses Pencairan</h1>
  </div>
@endsection

@section('content')
  <script>
    window.setTimeout(function() {
      $(".alert-success").fadeTo(500, 0).slideUp(500, function(){
          $(this).remove();
      });
    }, 5000);

    window.setTimeout(function() {
      $(".alert-danger").fadeTo(500, 0).slideUp(500, function(){
          $(this).remove();
      });
    }, 5000);
  </script>

  <div id="fisik" class="modal hide">
    <div class="modal-header" style="background:#faa732;color:white;">
      <button data-dismiss="modal" class="close" type="button">×</button>
      <h3 style="text-shadow:0 0px;">Ubah Realisasi Fisik</h3>
    </div>
    <form action="{{route('fisik.storefisikitem')}}" method="post">
      {{ csrf_field() }}
      <div class="modal-body">
        <div class="controls" style="margin-left:15px;">
          <span style="font-weight:bold;">Presentase Realisasi Fisik :</span>
          <br>
          <div class="input-append">
            <input type="text" class="span5" name="nilai" id="nilai_fisik">
            <input type="hidden" class="span5" name="id_item_kegiatan" value="{{$id_item}}">
            <span class="add-on">%</span>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a data-dismiss="modal" class="btn" href="#">Cancel</a>
        <input type="submit" class="btn btn-warning" value="Simpan Perubahan">
      </div>
    </form>
  </div>

  <div id="edit" class="modal hide">
    <div class="modal-header" style="background:#faa732;color:white;">
      <button data-dismiss="modal" class="close" type="button">×</button>
      <h3 style="text-shadow:0 0px;">Edit Data Pencairan</h3>
    </div>
    <form action="{{route('pencairan-termin.update')}}" method="post" class="form-horizontal">
      <div class="modal-body" style="overflow:hidden;">
          {{ csrf_field() }}
          <div class="control-group" style="border-bottom:0px;">
            <label class="control-label">Nama</label>
            <div class="controls">
              <select class="span3" name="termin" placeholder="-- Pilih --" id="selecttermin">
                <option value=""></option>
                <option value="Non Termin" id="non_termin">Non Termin</option>
                <option value="Uang Muka" id="uang_muka">Uang Muka</option>
                <option value="Termin 1" id="termin_1">Termin 1</option>
                <option value="Termin 2" id="termin_2">Termin 2</option>
                <option value="Termin 3" id="termin_3">Termin 3</option>
                <option value="Termin 4" id="termin_4">Termin 4</option>
                <option value="Termin 5" id="termin_5">Termin 5</option>
                <option value="Termin 6" id="termin_6">Termin 6</option>
              </select>
            </div>
          </div>
          <div class="control-group" style="border-bottom:0px;">
            <label class="control-label">Nilai Pembayaran</label>
            <div class="controls">
              <input type="text" class="span3" name="nilai" id="nilai">
              <input type="hidden" class="span3" name="id" id="id_pencairan">
              <input type="hidden" class="span3" name="id_item_kegiatan" id="edit_id_item_kegiatan">
            </div>
          </div>
          <br>
      </div>
      <div class="modal-footer">
        <a data-dismiss="modal" class="btn" href="#">Cancel</a>
        <input type="submit" value="Simpan Perubahan" class="btn btn-warning">
      </div>
    </form>
  </div>

  <div class="container-fluid">
    <hr style="margin:0px 0px 15px 0px;">

    @if (Session::has('success'))
      <div class="alert alert-success alert-block" style="margin-bottom:0px;">
        <a class="close" data-dismiss="alert" href="#">×</a>
        <h4 class="alert-heading">Berhasil!</h4>
        <hr style="margin:5px 0px 10px 0px; border-top-color:#9fdcae;">
        {{ Session::get('success') }}
      </div>
    @endif

    @if (Session::has('failed'))
      <div class="alert alert-danger alert-block" style="margin-bottom:0px;">
        <a class="close" data-dismiss="alert" href="#">×</a>
        <h4 class="alert-heading">Oops, terjadi kesalahan!</h4>
        <hr style="margin:5px 0px 10px 0px; border-top-color:#dc9f9f;">
        {{ Session::get('failed') }}
      </div>
    @endif

    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Detail Resume Kontrak</h5>
          </div>
          <div class="widget-content">
            <div class="alert alert-info alert-block" style="margin-bottom:0px;">
              <h4 class="alert-heading">Resume Kontrak</h4>
              <hr style="margin:5px 0px 10px 0px; border-top-color:#9fd5dc;">
              Berikut adalah resume kontrak untuk pencairan dana:
              <form action="{{route('resume.store')}}" method="post">
                {{csrf_field()}}
              <table cellpadding="5" style="margin-top:5px;">
                <tr>
                  <td>Nomor & Tanggal DPA</td>
                  <td>: &nbsp;&nbsp;
                    <span class="kontrak_label">
                      @php echo $string = (is_null($datakontrak)) ? "-" : $datakontrak->no_dpa; @endphp |
                      @php echo $string = (is_null($datakontrak)) ? "-" : $datakontrak->tanggal_dpa; @endphp
                    </span>

                    <span class="kontrak_control">
                      <input type="hidden" name="id_item" value="{{$id_item}}" id="id_item">
                      <input type="text" name="no_dpa" placeholder="Nomor DPA" id="no_dpa"> --
                      <input type="text" name="tanggal_dpa" placeholder="Tanggal Kontrak" id="tanggal_kontrak" data-date-format="yyyy-mm-dd" class="datepicker">
                    </span>
                  </td>
                </tr>
                <tr>
                  <td>Nomor & Tanggal Kontrak</td>
                  <td>: &nbsp;&nbsp;
                    <span class="kontrak_label">
                      @php echo $string = (is_null($datakontrak)) ? "-" : $datakontrak->no_kontrak; @endphp |
                      @php echo $string = (is_null($datakontrak)) ? "-" : $datakontrak->tanggal_kontrak; @endphp
                    </span>

                    <span class="kontrak_control">
                      <input type="text" name="no_kontrak" placeholder="Nomor Kontrak" id="no_kontrak"> --
                      <input type="text" name="tanggal_kontrak" placeholder="Tanggal Kontrak" id="tanggal_dpa" data-date-format="yyyy-mm-dd" class="datepicker">
                    </span>
                  </td>
                </tr>
                <tr>
                  <td>Nama Perusahaan</td>
                  <td>: &nbsp;&nbsp;
                    <span class="kontrak_label">
                      @php echo $string = (is_null($datakontrak)) ? "-" : $datakontrak->nama_perusahaan; @endphp
                    </span>

                    <span class="kontrak_control">
                      <input type="text" name="nama_perusahaan" placeholder="Nama Perusahaan" id="nama_perusahaan">
                    </span>
                  </td>
                </tr>
                <tr>
                  <td>Alamat Perusahaan</td>
                  <td>: &nbsp;&nbsp;
                    <span class="kontrak_label">
                      @php echo $string = (is_null($datakontrak)) ? "-" : $datakontrak->alamat_perusahaan; @endphp
                    </span>

                    <span class="kontrak_control">
                      <input type="text" name="alamat_perusahaan" placeholder="Alamat Perusahaan" id="alamat_perusahaan">
                    </span>
                  </td>
                </tr>
                <tr>
                  <td>Nilai SPK / Kontrak</td>
                  <td>: &nbsp;&nbsp;
                    <span class="kontrak_label">
                      @php echo "Rp ".$string = (is_null($datakontrak)) ? "-" : number_format($datakontrak->nilai_kontrak, '0', ',', '.').",-"; @endphp
                    </span>

                    <span class="kontrak_control">
                      <input type="text" name="nilai_kontrak" placeholder="Nilai Kontrak" id="nilai_kontrak">
                    </span>
                  </td>
                </tr>
                <tr>
                  <td>Nomor & Tanggal BA. Kemajuan Pekerjaan</td>
                  <td>: &nbsp;&nbsp;
                    <span class="kontrak_label">
                      @php echo $string = (is_null($datakontrak)) ? "-" : $datakontrak->no_ba_kemajuan; @endphp |
                      @php echo $string = (is_null($datakontrak)) ? "-" : $datakontrak->tanggal_ba_kemajuan; @endphp
                    </span>

                    <span class="kontrak_control">
                      <input type="text" name="no_ba_kemajuan" placeholder="Nomor BA Kemajuan" id="no_ba_kemajuan"> --
                      <input type="text" name="tanggal_ba_kemajuan" placeholder="Tanggal BA Kemajuan" id="tanggal_ba_kemajuan" data-date-format="yyyy-mm-dd" class="datepicker">
                    </span>
                  </td>
                </tr>
                <tr>
                  <td>Nomor & Tanggal BA. Pembayaran</td>
                  <td>: &nbsp;&nbsp;
                    <span class="kontrak_label">
                      @php echo $string = (is_null($datakontrak)) ? "-" : $datakontrak->no_ba_pembayaran; @endphp |
                      @php echo $string = (is_null($datakontrak)) ? "-" : $datakontrak->tanggal_ba_pembayaran; @endphp
                    </span>

                    <span class="kontrak_control">
                      <input type="text" name="no_ba_pembayaran" placeholder="Nomor BA Pembayaran" id="no_ba_pembayaran"> --
                      <input type="text" name="tanggal_ba_pembayaran" placeholder="Tanggal BA Pembayaran" id="tanggal_ba_pembayaran" data-date-format="yyyy-mm-dd" class="datepicker">
                    </span>
                  </td>
                </tr>
                <tr>
                  <td>Nomor & Tanggal BA. Penyelesaian Hasil Pekerjaan</td>
                  <td>: &nbsp;&nbsp;
                    <span class="kontrak_label">
                      @php echo $string = (is_null($datakontrak)) ? "-" : $datakontrak->no_ba_penyelesaian; @endphp |
                      @php echo $string = (is_null($datakontrak)) ? "-" : $datakontrak->tanggal_ba_penyelesaian; @endphp
                    </span>

                    <span class="kontrak_control">
                      <input type="text" name="no_ba_penyelesaian" placeholder="Nomor BA Penyelesaian" id="no_ba_penyelesaian"> --
                      <input type="text" name="tanggal_ba_penyelesaian" placeholder="Tanggal BA Penyelesaian" id="tanggal_ba_penyelesaian" data-date-format="yyyy-mm-dd" class="datepicker">
                    </span>
                  </td>
                </tr>
                <tr>
                  <td>Nomor & Tanggal BA. Serah Terima Pekerjaan</td>
                  <td>: &nbsp;&nbsp;
                    <span class="kontrak_label">
                      @php echo $string = (is_null($datakontrak)) ? "-" : $datakontrak->no_ba_serah_terima; @endphp |
                      @php echo $string = (is_null($datakontrak)) ? "-" : $datakontrak->tanggal_ba_serah_terima; @endphp
                    </span>

                    <span class="kontrak_control">
                      <input type="text" name="no_ba_serah_terima" placeholder="Nomor BA Serah Terima" id="no_ba_serah_terima"> --
                      <input type="text" name="tanggal_ba_serah_terima" placeholder="Tanggal BA Serah Terima" id="tanggal_ba_serah_terima" data-date-format="yyyy-mm-dd" class="datepicker">
                    </span>
                  </td>
                </tr>
                <tr>
                  <td>Uraian & Volume Kegiatan</td>
                  <td>: &nbsp;&nbsp;
                    <span class="kontrak_label">
                      @php echo $string = (is_null($datakontrak)) ? "-" : $datakontrak->uraian_volume; @endphp
                    </span>

                    <span class="kontrak_control">
                      <input type="text" name="uraian_volume" placeholder="Uraian" id="uraian_volume">
                    </span>
                  </td>
                </tr>
                <tr>
                  <td>Cara Pembayaran</td>
                  <td>: &nbsp;&nbsp;
                    <span class="kontrak_label">
                      @php echo $string = (is_null($datakontrak)) ? "-" : $datakontrak->cara_pembayaran; @endphp
                    </span>

                    <span class="kontrak_control">
                      <input type="text" name="cara_pembayaran" placeholder="Cara Pembayaran" id="cara_pembayaran">
                    </span>
                  </td>
                </tr>
                <tr>
                  <td>Jangka Waktu</td>
                  <td>: &nbsp;&nbsp;
                    <span class="kontrak_label">
                      @if ($daysjangkawaktu==-1)
                        -
                      @else
                        {{$daysjangkawaktu}} hari kalendar terhitung mulai tanggal {{$datakontrak->jangka_waktu_awal}} s.d. {{$datakontrak->jangka_waktu_akhir}}.
                      @endif
                    </span>

                    <span class="kontrak_control">
                      <input type="text" name="jangka_waktu_awal" placeholder="Awal" id="jangka_waktu_awal" data-date-format="yyyy-mm-dd" class="datepicker"> --
                      <input type="text" name="jangka_waktu_akhir" placeholder="Akhir" id="jangka_waktu_akhir" data-date-format="yyyy-mm-dd" class="datepicker">
                    </span>
                  </td>
                </tr>
                <tr>
                  <td>Tanggal Penyelesaian Pekerjaan</td>
                  <td>: &nbsp;&nbsp;
                    <span class="kontrak_label">
                      @php echo $string = (is_null($datakontrak)) ? "-" : $datakontrak->tanggal_penyelesaian; @endphp
                    </span>

                    <span class="kontrak_control">
                      <input type="text" name="tanggal_penyelesaian" placeholder="Tanggal Penyelesaian" id="tanggal_penyelesaian" data-date-format="yyyy-mm-dd" class="datepicker">
                    </span>
                  </td>
                </tr>
                <tr>
                  <td>Ketentuan Sanksi / Denda</td>
                  <td>: &nbsp;&nbsp;
                    <span class="kontrak_label">
                      @php echo $string = (is_null($datakontrak)) ? "-" : $datakontrak->ketentuan_sanksi; @endphp
                    </span>

                    <span class="kontrak_control">
                      <input type="text" name="ketentuan_sanksi" placeholder="Ketentuan Sanksi" id="ketentuan_sanksi">
                    </span>
                  </td>
                </tr>
                <tr>
                  <td>Nomor Pokok Wajib Pajak (NPWP)</td>
                  <td>: &nbsp;&nbsp;
                    <span class="kontrak_label">
                      @php echo $string = (is_null($datakontrak)) ? "-" : $datakontrak->npwp; @endphp
                    </span>

                    <span class="kontrak_control">
                      <input type="text" name="npwp" placeholder="NPWP" id="npwp">
                    </span>
                  </td>
                </tr>
                <tr>
                  <td>Nomor Rekening BANK</td>
                  <td>: &nbsp;&nbsp;
                    <span class="kontrak_label">
                      @php echo $string = (is_null($datakontrak)) ? "-" : $datakontrak->no_rekening_perusahaan; @endphp
                    </span>

                    <span class="kontrak_control">
                      <input type="text" name="no_rekening_perusahaan" placeholder="No Rekening Perusahaan" id="no_rekening_perusahaan">
                    </span>
                  </td>
                </tr>
              </table>
              <br>
              <span class="kontrak_label">
                <a href="" data-value="{{$id_item}}" class="btn btn-warning" id="showformkontrak">Update Kelengkapan Resume Kontrak</a>
                @if ($getDokumen != null)
                <a href="{{ asset('dokumen/pencairan').'/'.$getDokumen->dok_res_kontrak }}" class="btn btn-success" target="_blank">Download Resume Kontrak</a>
                @endif
              </span>

              <span class="kontrak_control">
                <input type="submit" class="btn btn-primary" value="Simpan Data Resume Kontrak">
                <a href="#resume" class="btn btn-danger" id="hideformkontrak">Batalkan</a>
              </span>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row-fluid">
      <div class="span5">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Form Pencairan</h5>
          </div>
          <div class="widget-content nopadding">
            <form action="{{route('pencairan-termin.store')}}" method="post" class="form-horizontal">
              {{ csrf_field() }}
              <div class="control-group" style="padding-bottom:7px;border-bottom:0px;">
                <label class="control-label">Jenis Pembayaran</label>
                <div class="controls">
                  <select class="span11" name="termin" placeholder="-- Pilih --">
                    <option value=""></option>
                    <option value="Non Termin">Non Termin</option>
                    <option value="Uang Muka">Uang Muka</option>
                    <option value="Termin 1">Termin 1</option>
                    <option value="Termin 2">Termin 2</option>
                    <option value="Termin 3">Termin 3</option>
                    <option value="Termin 4">Termin 4</option>
                    <option value="Termin 5">Termin 5</option>
                    <option value="Termin 6">Termin 6</option>
                  </select>
                </div>
              </div>
              <div class="control-group" style="padding-bottom:7px;border-bottom:0px;">
                <label class="control-label">Nilai Pembayaran</label>
                <div class="controls">
                  <input type="text" class="span11" name="nilai">
                  <input type="hidden" class="span11" name="id_item_kegiatan" value="{{$id_item}}">
                </div>
              </div>
              <div class="form-actions">
                <button type="submit" class="btn btn-success pull-right">Simpan</button>
              </div>
            </form>
            <br>

          </div>
        </div>
      </div>
      <div class="span7">
        <ul class="quick-actions">
          <li class="bg_lb span12">
            @php
              $getfisikid = 0;
              if (count($getfisik)!=0) {
                $getfisikid = $getfisik->id;
              }
            @endphp
            <a id="fisikdisplay" data-value="{{$getfisikid}}" href="#fisik" data-toggle="modal">
              <i class="icon-signal"></i>
              <span style="font-size:20px;">
                @if (count($getfisik)==0)
                  Presentase Realisasi Fisik: 0 % <br>
                  <i style="font-size:11px;">Klik disini untuk mengubah nilai realisasi fisik.</i>
                @else
                  Presentase Realisasi Fisik: {{$getfisik->nilai}} % <br>
                  <i style="font-size:11px;">Klik disini untuk mengubah nilai realisasi fisik.</i>
                @endif
              </span>
            </a>
          </li>
        </ul>
        <ul class="quick-actions">
          <li class="bg_lg span12">
            <a>
              <i class="icon-money"></i>
              <span style="font-size:20px;">
                @if (count($gettermin)==0)
                  Realisasi Pembayaran: Rp 0,-;
                @else
                  Realisasi Pembayaran: Rp {{number_format($gettermin->sum('nilai'), 0, ',', '.')}},-
                @endif
              </span>
            </a>
          </li>
        </ul>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Termin Pembayaran</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table" id="tabel_termin">
              <thead>
                <tr>
                  <th width="20px;">#</th>
                  <th>Jenis Pembayaran</th>
                  <th>Nilai Pembayaran</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $no=1;
                @endphp
                @foreach ($gettermin as $key)
                  <tr>
                    <td style="text-align:center;">{{$no}}</td>
                    <td>{{$key->termin}}</td>
                    <td>Rp {{number_format($key->nilai, '0', ',', '.')}},-</td>
                    <td style="text-align:center;">
                      <a href="#edit" data-value="{{$key->id}}" data-toggle="modal" class="btn btn-warning btn-mini ubah">Ubah</a>
                    </td>
                  </tr>
                  @php
                    $no++;
                  @endphp
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('footscript')
  <script src="{{asset('theme/js/jquery.min.js')}}"></script>
  <script src="{{asset('theme/js/jquery.ui.custom.js')}}"></script>
  <script src="{{asset('theme/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('theme/js/jquery.uniform.js')}}"></script>
  <script src="{{asset('theme/js/select2.min.js')}}"></script>
  <script src="{{asset('theme/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('theme/js/matrix.js')}}"></script>
  <script src="{{asset('theme/js/matrix.tables.js')}}"></script>
  <script src="{{asset('theme/js/bootstrap-datepicker.js')}}"></script>


  <script type="text/javascript">
    $(function(){
      $('.kontrak_control').hide();

      $('#showformkontrak').click(function(){
        $('.kontrak_control').show();
        $('.kontrak_label').hide();
      });

      $('#hideformkontrak').click(function(){
        $('.kontrak_control').hide();
        $('.kontrak_label').show();
      });

      $('.datepicker').datepicker();

      $('#showformkontrak').click(function(){
        var id = $(this).data('value');
        $.ajax({
          url: "{{url('/')}}/resume-kontrak/bind/"+id,
          success: function(data){
            $('#no_dpa').attr('value', data.no_dpa);
            $('#tanggal_dpa').attr('value', data.tanggal_dpa);
            $('#no_kontrak').attr('value', data.no_kontrak);
            $('#tanggal_kontrak').attr('value', data.tanggal_kontrak);
            $('#nama_perusahaan').attr('value', data.nama_perusahaan);
            $('#alamat_perusahaan').attr('value', data.alamat_perusahaan);
            $('#nilai_kontrak').attr('value', data.nilai_kontrak);
            $('#no_ba_kemajuan').attr('value', data.no_ba_kemajuan);
            $('#tanggal_ba_kemajuan').attr('value', data.tanggal_ba_kemajuan);
            $('#no_ba_pembayaran').attr('value', data.no_ba_pembayaran);
            $('#tanggal_ba_pembayaran').attr('value', data.tanggal_ba_pembayaran);
            $('#no_ba_penyelesaian').attr('value', data.no_ba_penyelesaian);
            $('#tanggal_ba_penyelesaian').attr('value', data.tanggal_ba_penyelesaian);
            $('#no_ba_serah_terima').attr('value', data.no_ba_serah_terima);
            $('#tanggal_ba_serah_terima').attr('value', data.tanggal_ba_serah_terima);
            $('#uraian_volume').attr('value', data.uraian_volume);
            $('#cara_pembayaran').attr('value', data.cara_pembayaran);
            $('#jangka_waktu_awal').attr('value', data.jangka_waktu_awal);
            $('#jangka_waktu_akhir').attr('value', data.jangka_waktu_akhir);
            $('#tanggal_penyelesaian').attr('value', data.tanggal_penyelesaian);
            $('#ketentuan_sanksi').attr('value', data.ketentuan_sanksi);
            $('#npwp').attr('value', data.npwp);
            $('#no_rekening_perusahaan').attr('value', data.no_rekening_perusahaan);
            $('#id_item').attr('value', data.id_item_kegiatan);
          }
        });
      });

      $('#tabel_termin').on('click','.ubah', function(){
        var id = $(this).data('value');
        $.ajax({
          url: "{{url('/')}}/pencairan-termin/bind/"+id,
          success: function(data){
            if (data.termin=="Uang Muka") {
              $("#selecttermin").select2().select2('val','Uang Muka');
            } else if (data.termin=="Termin 1") {
              $("#selecttermin").select2().select2('val','Termin 1');
            } else if (data.termin=="Termin 2") {
              $("#selecttermin").select2().select2('val','Termin 2');
            } else if (data.termin=="Termin 3") {
              $("#selecttermin").select2().select2('val','Termin 3');
            } else if (data.termin=="Termin 4") {
              $("#selecttermin").select2().select2('val','Termin 4');
            } else if (data.termin=="Termin 5") {
              $("#selecttermin").select2().select2('val','Termin 5');
            } else if (data.termin=="Termin 6") {
              $("#selecttermin").select2().select2('val','Termin 6');
            } else if (data.termin=="Non Termin") {
              $("#selecttermin").select2().select2('val','Non Termin');
            }

            $('#nilai').attr('value', data.nilai);
            $('#id_pencairan').attr('value', data.id);
            $('#edit_id_item_kegiatan').attr('value', data.id_item_kegiatan);
          }
        });
      });

      $('#fisikdisplay').click(function(){
        var id = $(this).data('value');
        $.ajax({
          url: "{{url('/')}}/presentase-fisik/bind/"+id,
          success: function(data) {
            $('#nilai_fisik').attr('value', data.nilai);
          }
        });
      });
    });
  </script>
@endsection
