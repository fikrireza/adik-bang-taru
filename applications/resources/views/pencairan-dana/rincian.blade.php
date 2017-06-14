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
  <div id="myDok" class="modal hide" style="min-height:400px">
    <div class="modal-header" style="background:#3a87ad;color:white;">
      <button data-dismiss="modal" class="close" type="button">×</button>
      <h3 style="text-shadow:0 0px;">Kelengkapan Dokumen</h3>
    </div>
    <div class="modal-body">
      <form class="form-horizontal" action="{{ route('pencairan-dokumen.storeRincian') }}" method="post" name="basic_validate" id="basic_validate" novalidate="novalidate" enctype="multipart/form-data">
      {{ csrf_field() }}
      <input type="hidden" name="no_rek" value="{{ $no_rek }}">
      <input type="hidden" name="id_keg" value="{{ $id_keg }}">
      <input type="hidden" name="nama_item" value="{{ $nama_item }}">
      <input type="hidden" name="id_dokumen" id="edit_id_dokumen">
      <input type="hidden" name="id_item_kegiatan" id="edit_id_item_kegiatan">
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
            <td style="text-align:center;" id="edit_dok_spp">

            </td>
          </tr>
          <tr>
            <td><span class="label label-info">SPM</span></td>
            <td style="text-align:center;" id="edit_dok_spm">

            </td>
          </tr>
          <tr>
            <td><span class="label label-info">Pengajuan SP2D</span></td>
            <td style="text-align:center;" id="edit_dok_sp2d">

            </td>
          </tr>
          <tr>
            <td><span class="label label-info">Resume Kontrak</span></td>
            <td style="text-align:center;" id="edit_dok_res_kontrak">

            </td>
          </tr>
          <tr>
            <td><span class="label label-info">Syarat Khusus Kontrak</span></td>
            <td style="text-align:center;" id="edit_dok_syarat_kontrak">

            </td>
          </tr>
          <tr>
            <td><span class="label label-info">NPD</span></td>
            <td style="text-align:center;" id="edit_dok_npd">

            </td>
          </tr>
          <tr>
            <td><span class="label label-info">PHO/FHO</span></td>
            <td style="text-align:center;" id="edit_dok_pho">

            </td>
          </tr>
          <tr>
            <td><span class="label label-info">Kwitansi</span></td>
            <td style="text-align:center;" id="edit_dok_kwitansi">

            </td>
          </tr>
          {{-- <tr>
            <td><span class="label label-info">Mutual Cek 100</span></td>
            <td style="text-align:center;" id="edit_dok_mutual">

            </td>
          </tr> --}}
          <tr>
            <td><span class="label label-info">Photo Kegiatan</span></td>
            <td style="text-align:center;" id="edit_img_kegiatan">

            </td>
          </tr>
        </tbody>
      </table>
        <p id="upload"></p>
      </form>
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

    @if (Session::has('success'))
      <script>
        window.setTimeout(function() {
          $(".alert-success").fadeTo(500, 0).slideUp(500, function(){
              $(this).remove();
          });
        }, 5000);
      </script>
      <div class="alert alert-success alert-block" style="margin-bottom:0px;">
        <a class="close" data-dismiss="alert" href="#">×</a>
        <h4 class="alert-heading">Berhasil!</h4>
        <hr style="margin:5px 0px 10px 0px; border-top-color:#9fdcae;">
        {{ Session::get('success') }}
      </div>
      <hr class="alert-success">
    @endif

    @if (Session::has('failed'))
      <script>
        window.setTimeout(function() {
          $(".alert-danger").fadeTo(500, 0).slideUp(500, function(){
              $(this).remove();
          });
        }, 5000);
      </script>
      <div class="alert alert-danger alert-block" style="margin-bottom:0px;">
        <a class="close" data-dismiss="alert" href="#">×</a>
        <h4 class="alert-heading">Oops, terjadi kesalahan!</h4>
        <hr style="margin:5px 0px 10px 0px; border-top-color:#dc9f9f;">
        {{ Session::get('failed') }}
      </div>
      <hr class="alert-danger">
    @endif

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
            <table class="table table-bordered data-table" id="data-table">
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
                    <td style="text-align:center;">
                      <a href="#myDok" data-value="{{ $key->id }}" data-toggle="modal" style="color:white;" class="badge btn-primary myDok">Lihat Dokumen</a></td>
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

  <script type="text/javascript">
    $(function(){
      $('#data-table').on('click','.myDok', function(){
        var id = $(this).data('value');
        $.ajax({
          url: "{{ url('/') }}/pencairan-dana/proses/dokRincian/"+id,
          success: function(data) {
            console.log(data);
            $('#edit_id_dokumen').attr('value', data.id);
            $('#edit_id_item_kegiatan').attr('value', data.id_item_kegiatan);

            var dok_spp = data.dok_spp;
            if (dok_spp == null) {
              document.getElementById("edit_dok_spp").innerHTML = '<input name="dok_spp" id="dok_spp" type="file" accept=".doc, .docx, .xls, .xlsx, .pdf"/>';
            } else{
              document.getElementById("edit_dok_spp").innerHTML = '<a href="{{ url("/")}}/dokumen/pencairan/'+dok_spp+'" class="badge btn-primary" style="color:white;" target="_blank" >Download</a>';
            }

            var dok_spm = data.dok_spm;
            if(dok_spm == null){
              document.getElementById("edit_dok_spm").innerHTML = '<input name="dok_spm" id="dok_spm" type="file" accept=".doc, .docx, .xls, .xlsx, .pdf"/>';
            }else{
              document.getElementById("edit_dok_spm").innerHTML = '<a href="{{ url("/")}}/dokumen/pencairan/'+ dok_spm +'" class="badge btn-primary" style="color:white;" target="_blank" >Download</a>';
            }

            var dok_sp2d = data.dok_sp2d;
            if(dok_sp2d == null){
              document.getElementById('edit_dok_sp2d').innerHTML = '<input name="dok_sp2d" id="dok_sp2d" type="file" accept=".doc, .docx, .xls, .xlsx, .pdf"/>';
            }else{
              document.getElementById('edit_dok_sp2d').innerHTML = '<a href="{{ url("/")}}/dokumen/pencairan/'+ dok_sp2d +'" class="badge btn-primary" style="color:white;" target="_blank" >Download</a>';
            }

            var dok_res_kontrak = data.dok_res_kontrak;
            if(dok_res_kontrak == null){
              document.getElementById('edit_dok_res_kontrak').innerHTML = '-';
            }else{
              document.getElementById('edit_dok_res_kontrak').innerHTML = '<a href="{{ url('/')}}/dokumen/pencairan/'+ dok_res_kontrak +'" class="badge btn-primary" style="color:white;" target="_blank" download>Download</a>';
            }

            var dok_syarat_kontrak = data.dok_syarat_kontrak;
            if(dok_syarat_kontrak == null){
              document.getElementById('edit_dok_syarat_kontrak').innerHTML = '<input name="dok_syarat_kontrak" id="dok_syarat_kontrak" type="file"  accept=".doc, .docx, .xls, .xlsx, .pdf"/>';
            }else{
              document.getElementById('edit_dok_syarat_kontrak').innerHTML = '<a href="{{ url('/')}}/dokumen/pencairan/'+ dok_syarat_kontrak +'" class="badge btn-primary" style="color:white;" target="_blank" >Download</a>';
            }

            var dok_npd = data.dok_npd;
            if(dok_npd == null){
              document.getElementById('edit_dok_npd').innerHTML = '<input name="dok_npd" id="dok_npd" type="file"  accept=".doc, .docx, .xls, .xlsx, .pdf"/>';
            }else{
              document.getElementById('edit_dok_npd').innerHTML = '<a href="{{ url("/")}}/dokumen/pencairan/'+ dok_npd +'" class="badge btn-primary" style="color:white;" target="_blank" >Download</a>';
            }

            var dok_pho = data.dok_pho;
            if(dok_pho == null){
              document.getElementById('edit_dok_pho').innerHTML = '<input name="dok_pho" id="dok_pho" type="file"  accept=".doc, .docx, .xls, .xlsx, .pdf"/>';
            }else{
              document.getElementById('edit_dok_pho').innerHTML = '<a href="{{ url("/")}}/dokumen/pencairan/'+ dok_pho +'" class="badge btn-primary" style="color:white;" target="_blank" >Download</a>';
            }

            var dok_kwitansi = data.dok_kwitansi;
            if(dok_kwitansi == null){
              document.getElementById('edit_dok_kwitansi').innerHTML = '<input name="dok_kwitansi" id="dok_kwitansi" type="file"  accept=".doc, .docx, .xls, .xlsx, .pdf"/>';
            }else{
              document.getElementById('edit_dok_kwitansi').innerHTML = '<a href="{{ url("/")}}/dokumen/pencairan/'+ dok_kwitansi +'" class="badge btn-primary" style="color:white;" target="_blank" >Download</a>';
            }

            // var dok_mutual = data.dok_mutual;
            // if(dok_mutual == null){
            //   document.getElementById('edit_dok_mutual').innerHTML = '<input name="dok_mutual" id="dok_mutual" type="file" accept=".doc, .docx, .xls, .xlsx, .pdf"/>';
            // }else{
            //   document.getElementById('edit_dok_mutual').innerHTML = '<a href="{{ url("/")}}/dokumen/pencairan/'+ dok_mutual +'" class="badge btn-primary" style="color:white;" target="_blank" >Download</a>';
            // }

            var img_kegiatan = data.img_kegiatan;
            if(img_kegiatan == null){
              document.getElementById('edit_img_kegiatan').innerHTML = '<input name="img_kegiatan[]" id="img_kegiatan" type="file" accept=".png, .jpg, .jpeg, .bmp" multiple=""/>';
            }else{
              var img = img_kegiatan.split('|');
              console.log(img);

              var img_1 = img[0];
              var img_2 = img[1];
              var img_3 = img[2];

              document.getElementById('edit_img_kegiatan').innerHTML = '<a href="{{ url("/")}}/dokumen/pencairan/'+ img_1 +'" class="badge btn-primary" style="color:white;" target="_blank" >Download</a><a href="{{ url("/")}}/dokumen/pencairan/'+ img_2 +'" class="badge btn-primary" style="color:white;" target="_blank" >Download</a><a href="{{ url("/")}}/dokumen/pencairan/'+ img_3 +'" class="badge btn-primary" style="color:white;" target="_blank" >Download</a>';
            }

            if((dok_spp != null) && (dok_spm != null) && (dok_sp2d != null) && (dok_syarat_kontrak != null) && (dok_npd != null) && (dok_pho  != null) && (dok_kwitansi != null) && (dok_mutual !=null)){
              document.getElementById('upload').innerHTML = '';
            }else{
              document.getElementById('upload').innerHTML = '<button class="btn btn-primary pull-right">Simpan Dokumen</button>';
            }
          }

        });
      });
    });
  </script>

  <script type="text/javascript">
  $(function(){
    $('#data-table').on('click','.myDok', function(){
      $('input[type=file]').uniform();
      $("#basic_validate").validate({
        ignore: [],
        rules:{
          dok_spp:{
            required:true,
            accept:"pdf|doc|docx|xls|xlsx",
          },
          dok_spm:{
            required:true,
            accept:"pdf|doc|docx|xls|xlsx",
          },
          dok_sp2d:{
            required:true,
            accept:"pdf|doc|docx|xls|xlsx",
          },
          dok_res_kontrak:{
            required:true,
            accept:"pdf|doc|docx|xls|xlsx",
          },
          dok_syarat_kontrak:{
            required:true,
            accept:"pdf|doc|docx|xls|xlsx",
          },
          dok_pho:{
            required:true,
            accept:"pdf|doc|docx|xls|xlsx",
          },
          dok_npd:{
            required:true,
            accept:"pdf|doc|docx|xls|xlsx",
          },
          dok_mutual:{
            required:true,
            accept:"pdf|doc|docx|xls|xlsx",
          },
          dok_kwitansi:{
            // required:true,
            accept:"pdf|doc|docx|xls|xlsx",
          },
        },
        errorClass: "help-inline",
        errorElement: "span",
        highlight:function(element, errorClass, validClass) {
          $(element).parents('.control-group').addClass('error');
        },
        unhighlight: function(element, errorClass, validClass) {
          $(element).parents('.control-group').removeClass('error');
          $(element).parents('.control-group').addClass('success');
        }
      });
    });
  });
  </script>
@endsection
