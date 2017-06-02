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
      <a href="#">Daftar Kegiatan</a>
      <a href="#" class="current">Detail Kegiatan</a>
    </div>
    <h1>Detail Kegiatan</h1>
  </div>
@endsection

@section('content')
  <div class="container-fluid">
    <hr style="margin:0px 0px 15px 0px;">
    <div class="row-fluid">
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Informasi Kegiatan</h5>
          </div>
          <div class="widget-content">
            <div class="alert alert-info alert-block" style="margin-bottom:0px;">
              <h4 class="alert-heading">Informasi Kegiatan</h4>
              <hr style="margin:5px 0px 10px 0px; border-top-color:#9fd5dc;">
              Berikut adalah detail dari kegiatan ini:
              <table cellpadding="5">
                <tr>
                  <td>Nama Program</td>
                  <td style="width:1px;">:</td>
                  <td>{{$getkegiatan->nama_program}}</td>
                </tr>
                <tr>
                  <td>Nama Kegiatan</td>
                  <td style="width:1px;">:</td>
                  <td>{{$getkegiatan->nama_kegiatan}}</td>
                </tr>
                <tr>
                  <td>Kode Kegiatan</td>
                  <td style="width:1px;">:</td>
                  <td>{{$getkegiatan->kode_kegiatan}}</td>
                </tr>
                <tr>
                  <td style="width:130px;">Jumlah Item Kegiatan</td>
                  <td style="width:1px;">:</td>
                  <td><span class="badge badge-info">{{count($getitem)}}</span></td>
                </tr>
                <tr>
                  <td>Jumlah Anggaran</td>
                  <td style="width:1px;">:</td>
                  <td>Rp {{number_format($jumlahanggaran, 0, ',', '.')}},-</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Detail Sub Item Kegiatan</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th width="20px;">#</th>
                  <th>Kode Rekening</th>
                  <th>Uraian Item Kegiatan</th>
                  <th>Keterangan Item</th>
                  <th>Nilai</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $no=1;
                @endphp
                @foreach ($getitem as $key)
                  <tr>
                    <td style="text-align:center;">{{$no}}</td>
                    <td>{{$key->no_rekening}}</td>
                    <td>{{$key->nama_item_kegiatan}}</td>
                    <td>{{$key->expr1}}</td>
                    <td>{{number_format($key->total, 0, ',', '.')}}</td>
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
