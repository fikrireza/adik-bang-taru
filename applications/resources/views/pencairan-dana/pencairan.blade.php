@extends('master.layouts.master')

@section('title')
  <title>Adik Bang Taru</title>
  <link rel="stylesheet" href="{{asset('theme/css/uniform.css')}}" />
  <link rel="stylesheet" href="{{asset('theme/css/select2.css')}}" />
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
              <table cellpadding="5" style="margin-top:5px;">
                <tr>
                  <td>Nomor & Tanggal DPA</td>
                  <td>: &nbsp;&nbsp;2.13.1.03.02.21.02.5.2 - 5 Januari 2017</td>
                </tr>
                <tr>
                  <td>Nomor & Tanggal Kontrak</td>
                  <td>: &nbsp;&nbsp;159/K.APBD-BANG-DCK/2016 - 17 Oktober 2016</td>
                </tr>
                <tr>
                  <td>Nama Perusahaan</td>
                  <td>: &nbsp;&nbsp;PT. BIT OPTIMUM</td>
                </tr>
                <tr>
                  <td>Alamat Perusahaan</td>
                  <td>: &nbsp;&nbsp;Rukan Perumahaan Bintaro Blok D No.21</td>
                </tr>
                <tr>
                  <td>Nilai SPK / Kontrak</td>
                  <td>: &nbsp;&nbsp;Rp 150.000.000,-</td>
                </tr>
                <tr>
                  <td>Nomor & Tanggal BA. Kemajuan Pekerjaan</td>
                  <td>: &nbsp;&nbsp;020/BAKP-BANG/APBD-DRTB/2017 - 26 April 2017</td>
                </tr>
                <tr>
                  <td>Nomor & Tanggal BA. Pembayaran</td>
                  <td>: &nbsp;&nbsp;900/BAKP-BANG/APBD-DRTB/2017 - 26 April 2017</td>
                </tr>
                <tr>
                  <td>Nomor & Tanggal BA. Penyelesaian Hasil Pekerjaan</td>
                  <td>: &nbsp;&nbsp;015/BAKP-BANG/APBD-DRTB/2017 - 26 April 2017</td>
                </tr>
                <tr>
                  <td>Nomor & Tanggal BA. Serah Terima Pekerjaan</td>
                  <td>: &nbsp;&nbsp;-</td>
                </tr>
                <tr>
                  <td>Uraian & Volume Kegiatan</td>
                  <td>: &nbsp;&nbsp;53.42 %</td>
                </tr>
                <tr>
                  <td>Cara Pembayaran</td>
                  <td>: &nbsp;&nbsp;Bertahap kepada PT. BIT OPTIMUM yang memiliki rekening pada Bank BJB</td>
                </tr>
                <tr>
                  <td>Jangka Waktu</td>
                  <td>: &nbsp;&nbsp;360 hari kalender terhitung dari mulai tanggal 17 Oktober 2016 s.d 12 Oktober 2017</td>
                </tr>
                <tr>
                  <td>Tanggal Penyelesaian Pekerjaan</td>
                  <td>: &nbsp;&nbsp;12 Oktober 2017</td>
                </tr>
                <tr>
                  <td>Ketentuan Sanksi / Denda</td>
                  <td>: &nbsp;&nbsp;-</td>
                </tr>
                <tr>
                  <td>Nomor Pokok Wajib Pajak (NPWP)</td>
                  <td>: &nbsp;&nbsp;21.149.709.4-441.000</td>
                </tr>
                <tr>
                  <td>Nomor Rekening BANK</td>
                  <td>: &nbsp;&nbsp;0010365090001 a.n PT. BIT OPTIMUM</td>
                </tr>
                <tr>
                  <td>Kuasa Pengguna Anggaran</td>
                  <td>: &nbsp;&nbsp;Firdiansyah Sundawa, M.Kom</td>
                </tr>
                <tr>
                  <td>Pejabat Pelaksana Teknis Kegiatan</td>
                  <td>: &nbsp;&nbsp;Dwi Handika Putro, M.Sc</td>
                </tr>
              </table>
              <br>
              <button type="button" name="button" class="btn btn-warning">Update Kelengkapan Resume Kontrak</button>
              <button type="button" name="button" class="btn btn-success">Download Resume Kontrak</button>
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
@endsection
