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

    window.setTimeout(function() {
      $(".alert-info").fadeTo(500, 0).slideUp(500, function(){
          $(this).remove();
      });
    }, 5000);
  </script>

  <div id="seleksi" class="modal hide">
    <div class="modal-header" style="background:#006dcc;color:white;">
      <button data-dismiss="modal" class="close" type="button">×</button>
      <h3 style="text-shadow:0 0px;">Seleksi Kegiatan Per Bidang</h3>
    </div>
    <div class="modal-body">
      <p>Apakah anda yakin akan memindahkan kegiatan ini ke bidang yang telah anda pilih?</p>
    </div>
    <div class="modal-footer">
      <a data-dismiss="modal" class="btn" href="#">Tidak</a>
      <a class="btn btn-primary" href="#" id="sethapus">Ya, saya yakin</a>
    </div>
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

    @if (!(Session::has('success') || Session::has('failed')))
      <div class="alert alert-info alert-block" style="margin-bottom:0px;">
        <a class="close" data-dismiss="alert" href="#">×</a>
        <h4 class="alert-heading">Pemberitahuan</h4>
        <hr style="margin:5px 0px 10px 0px; border-top-color:#9fd5dc;">
        Dalam fitur ini, anda dapat menyeleksi kegiatan dibawah ini berdasarkan bidang / UPT yang melaksanakan kegiatan tersebut.
      </div>
    @endif

    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Data Program & Kegiatan</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table" id="tabel_kegiatan">
              <thead>
                <tr>
                  <th width="20px;">#</th>
                  <th>Kode Kegiatan</th>
                  <th>Kegiatan</th>
                  <th>Program</th>
                  <th>Aksi Seleksi</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $no = 1;
                @endphp
                @foreach ($data as $key)
                  <tr>
                    <td style="text-align:center;">{{$no}}</td>
                    <td>{{$key->kode_kegiatan}}</td>
                    <td>
                      @php
                        echo ucwords($key->nama_kegiatan);
                      @endphp
                    </td>
                    <td>
                      @php
                        echo ucwords($key->nama_program);
                      @endphp
                    </td>
                    <td>
                      <div class="btn-group">
                        <button class="btn btn-mini btn-primary">Pilih Bidang / UPT</button>
                        <button data-toggle="dropdown" class="btn btn-mini btn-primary dropdown-toggle"><span class="caret"></span></button>
                        <ul class="dropdown-menu">
                          @foreach ($bidang as $bdg)
                            <li><a href="#seleksi" data-toggle="modal" data-value="{{$key->id_kegiatan}}/{{$bdg->id}}" class="seleksi">{{$bdg->nama_bidang}}</a></li>
                          @endforeach
                        </ul>
                      </div>
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

  <script type="text/javascript">
    $(function(){
      $('#tabel_kegiatan').on('click','.seleksi', function(){
        var id = $(this).data('value');
        $('#sethapus').attr('href', '{{url('/')}}/seleksi-kegiatan/proses/'+id);
      });
    });
  </script>
@endsection
