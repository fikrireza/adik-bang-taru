@extends('master.layouts.master')

@section('title')
  <title>Adik Bang Taru</title>
  <link rel="stylesheet" href="{{asset('theme/css/uniform.css')}}" />
  <link rel="stylesheet" href="{{asset('theme/css/select2.css')}}" />
  <link rel="stylesheet" href="{{asset('theme/css/datepicker.css')}}" />
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
  {{-- <div class="alert alert-info alert-block" style="margin-bottom:0px;">
    <a class="close" data-dismiss="alert" href="#">×</a>
    <h4 class="alert-heading">Pemberitahuan</h4>
    <hr style="margin:5px 0px 10px 0px; border-top-color:#9fd5dc;">
    Berikut ini adalah data rincian dari <strong>Honorarium Panitia Pelaksana Kegiatan</strong>. Silahkan lakukan pencairan dana pada tiap-tiap rincian di bawah ini.
  </div> --}}

  <div class="container-fluid">
    <hr style="margin:0px 0px 15px 0px;">
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
                      @php echo $string = (is_null($datakontrak)) ? "-" : $datakontrak->nilai_kontrak; @endphp
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
                      @php echo $string = (is_null($datakontrak)) ? "-" : $datakontrak->jangka_waktu; @endphp
                    </span>

                    <span class="kontrak_control">
                      <input type="text" name="jangka_waktu" placeholder="Awal" id="jangka_waktu" data-date-format="yyyy-mm-dd" class="datepicker"> --
                      <input type="text" name="jangka_waktu" placeholder="Akhir" id="jangka_waktu" data-date-format="yyyy-mm-dd" class="datepicker">
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
                <a href="#resume" class="btn btn-warning" id="showformkontrak">Update Kelengkapan Resume Kontrak</a>
                <a href="#resume" class="btn btn-success">Download Resume Kontrak</a>
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
            <form action="#" method="get" class="form-horizontal">
              <div class="control-group" style="padding-bottom:7px;border-bottom:0px;">
                <label class="control-label">Jenis Pembayaran</label>
                <div class="controls">
                  <select class="span11" name="">
                    <option value="">Uang Muka</option>
                    <option value="">Termin 1</option>
                    <option value="">Termin 2</option>
                    <option value="">Termin 3</option>
                    <option value="">Termin 4</option>
                    <option value="">Termin 5</option>
                    <option value="">Termin 6</option>
                  </select>
                </div>
              </div>
              <div class="control-group" style="padding-bottom:7px;border-bottom:0px;">
                <label class="control-label">Nilai Pembayaran</label>
                <div class="controls">
                  <input type="text" class="span11">
                </div>
              </div>
              {{-- <br>
              &nbsp;&nbsp;Upload Kelengkapan Dokumen:
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama Dokumen</th>
                    <th>Upload File</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td style="text-align:center;"><a href="#" class="btn btn-mini btn-danger"><i class="icon-remove"></i></a></td>
                    <td>
                      <select class="span12" name="">
                        <option value="">SPP</option>
                        <option value="">SPM</option>
                        <option value="">Pengajuan SP2D</option>
                        <option value="">Syarat Khusus Kontrak</option>
                        <option value="">NDP</option>
                        <option value="">PHO/FHO</option>
                        <option value="">Kwitansi</option>
                        <option value="">Mutual Cek 100</option>
                        <option value="">Lainnya</option>
                      </select>
                    </td>
                    <td style="text-align:center;"><input type="file" class="span12"></td>
                  </tr>
                  <tr>
                    <td style="text-align:center;"><a href="#" class="btn btn-mini btn-danger"><i class="icon-remove"></i></a></td>
                    <td>
                      <select class="span12" name="">
                        <option value="">SPP</option>
                        <option value="">SPM</option>
                        <option value="">Pengajuan SP2D</option>
                        <option value="">Syarat Khusus Kontrak</option>
                        <option value="">NDP</option>
                        <option value="">PHO/FHO</option>
                        <option value="">Kwitansi</option>
                        <option value="">Mutual Cek 100</option>
                        <option value="">Lainnya</option>
                      </select>
                    </td>
                    <td style="text-align:center;"><input type="file" class="span12"></td>
                  </tr>
                </tbody>
                <tfoot>
                  <a href="#" class="btn btn-mini btn-primary pull-right" style="margin-right:5px;margin-bottom:5px;"><i class="icon-plus"></i> Tambah Dokumen</a>
                </tfoot>
              </table> --}}
              <div class="form-actions">
                <button type="submit" class="btn btn-success pull-right">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="span7">
        <ul class="quick-actions">
          <li class="bg_lg span12">
            <a>
              <i class="icon-money"></i>
              <span style="font-size:20px;">
                Retensi Pembayaran: Rp 123.500.000,-
              </span>
            </a>
          </li>
        </ul>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Termin Pembayaran</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th width="20px;">#</th>
                  <th>Jenis Pembayaran</th>
                  <th>Nilai Pembayaran</th>
                  {{-- <th>Download Dokumen</th> --}}
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @for ($i=0; $i < 5; $i++)
                  <tr>
                    <td style="text-align:center;">1</td>
                    <td>Termin 1</td>
                    <td>Rp 20.000.000,-</td>
                    {{-- <td>-</td> --}}
                    <td style="text-align:center;">
                      <a href="#" class="btn btn-warning btn-mini">Ubah</a>
                    </td>
                  </tr>
                @endfor
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
    });
  </script>
@endsection
