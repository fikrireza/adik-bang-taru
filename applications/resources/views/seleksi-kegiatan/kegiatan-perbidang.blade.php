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
      <a href="#" class="current">Seleksi Kegiatan Per Bidang</a>
    </div>
    <h1>Seleksi Kegiatan Per Bidang / UPT</h1>
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

  <div id="myAlert" class="modal hide">
    <div class="modal-header" style="background:#da4f49;color:white;">
      <button data-dismiss="modal" class="close" type="button">×</button>
      <h3 style="text-shadow:0 0px;">Hapus Kegiatan</h3>
    </div>
    <div class="modal-body">
      <p>Apakah anda yakin akan menghapus kegiatan dari bidang ini?</p>
    </div>
    <div class="modal-footer">
      <a data-dismiss="modal" class="btn" href="#">Tidak</a>
      <a class="btn btn-danger" href="#" id="sethapus">Ya, saya yakin</a>
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
        Dalam fitur ini, anda dapat melihat kegiatan yang telah di seleksi untuk masing-masing bidang / UPT.
      </div>
    @endif


    <div class="row-fluid">
      <div class="span8">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Form Bidang / UPT</h5>
          </div>
          <div class="widget-content nopadding">
            <form action="{{route('seleksi-kegiatan.find')}}" method="post" class="form-horizontal">
              {{ csrf_field() }}
              <div class="control-group" style="border-bottom:0px;">
                <label class="control-label">Pilih Bidang / UPT :</label>
                <div class="controls">
                  <select class="span11" name="id_bidang" placeholder="-- Pilih --">
                    <option value=""></option>
                    @foreach ($bidang as $key)
                      <option value="{{$key->id}}">{{$key->nama_bidang}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <br>
              <div class="form-actions">
                <button type="submit" class="btn btn-success pull-right">Lihat Kegiatan</button>
              </div>
              </form>
            </div>
          </div>
      </div>
      <div class="span4">
        <div class="container-fluid">
          <div class="quick-actions_homepage">
            <ul class="quick-actions">
              <li class="bg_lo span12" style="margin-left:0px;">
                <a> <i class="icon-flag"></i> <i style="font-size:11px;">
                  @if (isset($jumlahprogram))
                    Terlibat dalam {{$jumlahprogram}} program.
                  @else
                    ...
                  @endif
                </i></a>
              </li>
              <li class="bg_lg span12" style="margin-left:0px;">
                <a> <i class="icon-th-list"></i> <i style="font-size:11px;">
                  @if (isset($dataperbidang))
                    Memiliki sebanyak {{count($dataperbidang)}} kegiatan.
                  @else
                    ...
                  @endif
                </i></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
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
                  <th>Kode</th>
                  <th>Kegiatan</th>
                  <th>Program</th>
                  <th>Aksi Seleksi</th>
                </tr>
              </thead>
              <tbody>
                @if (isset($dataperbidang))
                  @php
                    $no=1;
                  @endphp
                  @foreach ($dataperbidang as $key)
                    <tr>
                      <td style="text-align:center;">{{$no}}</td>
                      <td>{{$key->kode_kegiatan}}</td>
                      <td>{{$key->nama_kegiatan}}</td>
                      <td>{{$key->nama_program}}</td>
                      <td style="text-align:center;">
                        <a href="#myAlert" data-toggle="modal" data-value="{{$key->id}}" class="btn btn-danger btn-mini tip-top hapus" data-original-title="Hapus">
                          <i class="icon-remove"></i>
                        </a>
                      </td>
                    </tr>
                    @php
                      $no++;
                    @endphp
                  @endforeach
                @endif
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
      $('#tabel_kegiatan').on('click','.hapus', function(){
        var id = $(this).data('value');
        $('#sethapus').attr('href', '{{url('/')}}/seleksi-kegiatan/destroy/'+id);
      });
    });
  </script>
@endsection
