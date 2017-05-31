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
      <a href="#" class="current">Seleksi Kegiatan</a>
    </div>
    <h1>Seleksi Kegiatan</h1>
  </div>
@endsection

@section('content')
  <div class="container-fluid">
    <hr style="margin:0px 0px 15px 0px;">
    <div class="alert alert-info alert-block" style="margin-bottom:0px;">
      <a class="close" data-dismiss="alert" href="#">×</a>
      <h4 class="alert-heading">Pemberitahuan</h4>
      <hr style="margin:5px 0px 10px 0px; border-top-color:#9fd5dc;">
      Dalam fitur ini, anda dapat menyeleksi kegiatan dibawah ini berdasarkan bidang / UPT yang melaksanakan kegiatan tersebut.
    </div>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Data Program & Kegiatan</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th width="20px;">#</th>
                  <th>Kode</th>
                  <th>Kegiatan</th>
                  <th>Program</th>
                  <th>Aksi Seleksi</th>
                </tr>
              </thead>
              <tbody>
                @for ($i=0; $i < 10; $i++)
                  <tr>
                    <td style="text-align:center;">1</td>
                    <td>01.05.01.05.01.001</td>
                    <td>Penyediaan Jasa Surat Menyurat</td>
                    <td>Program Pelayanan Administrasi Perkantoran</td>
                    <td style="text-align:center;">
                      <div class="btn-group">
                        <button class="btn btn-mini btn-primary">Pilih Bidang / UPT</button>
                        <button data-toggle="dropdown" class="btn btn-mini btn-primary dropdown-toggle"><span class="caret"></span></button>
                        <ul class="dropdown-menu">
                          <li><a href="#">Bidang Tata Ruang</a></li>
                          <li><a href="#">Bidang Bangunan</a></li>
                          <li><a href="#">Bidang Wasdal</a></li>
                          <li class="divider"></li>
                          <li><a href="#">UPT</a></li>
                        </ul>
                      </div>
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
