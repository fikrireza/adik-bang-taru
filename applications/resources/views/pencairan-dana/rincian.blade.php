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
      <a href="#" class="current">Rincian Item</a>
    </div>
    <h1>Rincian Sub Item Kegiatan <span style="font-size:15px;"> &nbsp;&nbsp;//&nbsp;&nbsp; {{$dataitem[0]->nama_item_kegiatan}}</span></h1>
  </div>
@endsection

@section('content')
  <div id="myAlert" class="modal hide">
    <div class="modal-header" style="background:#3a87ad;color:white;">
      <button data-dismiss="modal" class="close" type="button">×</button>
      <h3 style="text-shadow:0 0px;">Kelengkapan Dokumen</h3>
    </div>
    <div class="modal-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Nama Dokumen</th>
            <th>Download File</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><span class="label label-info">SPP</span></td>
            <td style="text-align:center;">
              <span class="badge btn-primary"><a href="#myAlert" data-toggle="modal" style="color:white;">Download</a></span>
            </td>
          </tr>
          <tr>
            <td><span class="label label-info">SPM</span></td>
            <td style="text-align:center;">
              <span class="badge btn-primary"><a href="#myAlert" data-toggle="modal" style="color:white;">Download</a></span>
            </td>
          </tr>
          <tr>
            <td><span class="label label-info">Pengajuan SP2D</span></td>
            <td style="text-align:center;">
              <span class="badge btn-primary"><a href="#myAlert" data-toggle="modal" style="color:white;">Download</a></span>
            </td>
          </tr>
          <tr>
            <td><span class="label label-info">Resume Kontrak</span></td>
            <td style="text-align:center;">
              <span class="badge btn-primary"><a href="#myAlert" data-toggle="modal" style="color:white;">Download</a></span>
            </td>
          </tr>
          <tr>
            <td><span class="label label-info">Syarat Khusus Kontrak</span></td>
            <td style="text-align:center;">
              <span class="badge btn-primary"><a href="#myAlert" data-toggle="modal" style="color:white;">Download</a></span>
            </td>
          </tr>
          <tr>
            <td><span class="label label-info">NPD</span></td>
            <td style="text-align:center;">
              <span class="badge btn-primary"><a href="#myAlert" data-toggle="modal" style="color:white;">Download</a></span>
            </td>
          </tr>
          <tr>
            <td><span class="label label-info">PHO/FHO</span></td>
            <td style="text-align:center;">
              <span class="badge btn-primary"><a href="#myAlert" data-toggle="modal" style="color:white;">Download</a></span>
            </td>
          </tr>
          <tr>
            <td><span class="label label-info">Kwitansi</span></td>
            <td style="text-align:center;">
              <span class="badge btn-primary"><a href="#myAlert" data-toggle="modal" style="color:white;">Download</a></span>
            </td>
          </tr>
          <tr>
            <td><span class="label label-info">Mutual Cek 100</span></td>
            <td style="text-align:center;">
              <span class="badge btn-primary"><a href="#myAlert" data-toggle="modal" style="color:white;">Download</a></span>
            </td>
          </tr>
        </tbody>
      </table>
      <a href="#" class="btn btn-primary pull-right btn-mini"><i class="icon-plus"></i> &nbsp;Tambah Dokumen</a>
    </div>
    <div class="modal-footer">
      <a data-dismiss="modal" class="btn" href="#">Tutup</a>
    </div>
  </div>

  <div id="myInputKontrak" class="modal hide">
    <div class="modal-header" style="background:#3a87ad;color:white;">
      <button data-dismiss="modal" class="close" type="button">×</button>
      <h3 style="text-shadow:0 0px;">Ubah Status Rincian Item</h3>
    </div>
    <div class="modal-body">
      Apakah anda yakin untuk mengubah status rincian item ini?
    </div>
    <div class="modal-footer">
      <a data-dismiss="modal" class="btn" href="#">Tidak</a>
      <a data-dismiss="modal" class="btn btn-primary" href="#">Ya, saya yakin</a>
    </div>
  </div>


  <div class="container-fluid">
    <hr style="margin:0px 0px 15px 0px;">
    <div class="alert alert-info alert-block" style="margin-bottom:0px;">
      <a class="close" data-dismiss="alert" href="#">×</a>
      <h4 class="alert-heading">Pemberitahuan</h4>
      <hr style="margin:5px 0px 10px 0px; border-top-color:#9fd5dc;">
      Berikut ini adalah data rincian dari <strong>{{$dataitem[0]->nama_item_kegiatan}}</strong>. Silahkan lakukan pencairan dana pada tiap-tiap rincian di bawah ini.
    </div>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Detail Sub Item Kegiatan</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table" id="">
              <thead>
                <tr>
                  <th width="20px;" rowspan="2">#</th>
                  <th rowspan="2">Uraian Rincian</th>
                  <th rowspan="2">Jumlah Anggaran</th>
                  <th rowspan="2">Lihat Dokumen</th>
                  <th colspan="2">Realisasi By Input</th>
                  <th rowspan="2">Aksi</th>
                </tr>
                <tr>
                  <th>Anggaran</th>
                  <th>Fisik</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $no=1;
                @endphp
                @foreach ($dataitem as $key)
                  <tr>
                    <td style="width:20px;">{{$no}}</td>
                    <td>{{$key->expr1}}</td>
                    <td>{{number_format($key->total, 0, ',', '.')}}</td>
                    <td style="text-align:center;"><span class="badge btn-primary"><a href="#myAlert" data-toggle="modal" style="color:white;">Lihat Dokumen</a></span></td>
                    <td>
                      @php
                        $flaganggaran = 0;
                      @endphp
                      @foreach ($getpencairan as $cair)
                        @if ($cair->id_item_kegiatan == $key->id)
                          {{number_format($cair->nilai, 0, ',', '.')}}
                          @php
                            $flaganggaran = 1;
                            break;
                          @endphp
                        @endif
                      @endforeach
                      @if ($flaganggaran==0)
                        -
                      @endif
                    </td>
                    <td>
                      @php
                        $flagfisik = 0;
                      @endphp
                      @foreach ($getfisik as $fisik)
                        @if ($fisik->id_item_kegiatan == $key->id)
                          {{$fisik->nilai}} %
                          @php
                            $flagfisik = 1;
                            break;
                          @endphp
                        @endif
                      @endforeach
                      @if ($flagfisik==0)
                        -
                      @endif
                    </td>
                    <td style="text-align:center;">
                      <a href="{{route('pencairan.progressbyitem', $key->id)}}" class="btn btn-primary btn-mini">Proses Pencairan</a>
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
@endsection
