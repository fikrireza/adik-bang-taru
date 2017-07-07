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
      <a href="{{ route('pencairan.index') }}">Manajemen Pencairan</a>
      <a href="#">Kelola Data Pencairan</a>
      <a href="{{ route('pencairan.rincian', ['no_rek' => $no_rek, 'id_keg' => $id_keg, 'nama_item' => $nama_item])}}">Rincian Item</a>
      <a href="#" class="current">Ubah Dokumen Rincian Item</a>
    </div>
    <h1>Ubah Dokumen Pencairan</h1>
  </div>
@endsection

@section('content')

  <div class="container-fluid">
    <hr style="margin:0px 0px 15px 0px;">

    @if (Session::has('success'))
      <script type="text/javascript">
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
    @endif

    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Dokumen Pencairan</h5>
          </div>
          <div class="widget-content">
            <div style="margin-bottom:0px;">
              <h4>Kosongkan Jika Tidak Ingin Mengubah File Dokumen</h4>
              <form class="form-horizontal" action="{{ route('pencairan-dokumen.storeRincian') }}" method="post" name="basic_validate" id="basic_validate" novalidate="novalidate" enctype="multipart/form-data">
              {{ csrf_field() }}
              <input type="hidden" name="no_rek" value="{{ $no_rek }}">
              <input type="hidden" name="id_keg" value="{{ $id_keg }}">
              <input type="hidden" name="nama_item" value="{{ $nama_item }}">
              <input type="hidden" name="flag_dokumen_rincian" value="1">
              <input type="hidden" name="id_dokumen" value="{{ $getDokumen->id }}">
              <input type="hidden" name="id_item_kegiatan" value="{{ $getDokumen->id_item_kegiatan }}">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nama Dokumen</th>
                    <th>File</th>
                  </tr>
                </thead>
                <tbody>
                  @if ($getDokumen->dok_spp)
                  <tr>
                    <td><span class="label label-info">SPP</span></td>
                    <td style="text-align:center;">
                      <input name="dok_spp" id="dok_spp" type="file" accept=".doc, .docx, .xls, .xlsx, .pdf"/>
                    </td>
                  </tr>
                  @endif
                  @if ($getDokumen->dok_spm)
                  <tr>
                    <td><span class="label label-info">SPM</span></td>
                    <td style="text-align:center;">
                      <input name="dok_spm" id="dok_spm" type="file" accept=".doc, .docx, .xls, .xlsx, .pdf"/>
                    </td>
                  </tr>
                  @endif
                  @if ($getDokumen->dok_sp2d)
                  <tr>
                    <td><span class="label label-info">Pengajuan SP2D</span></td>
                    <td style="text-align:center;">
                      <input name="dok_sp2d" id="dok_sp2d" type="file" accept=".doc, .docx, .xls, .xlsx, .pdf"/>
                    </td>
                  </tr>
                  @endif
                  @if ($getDokumen->dok_res_kontrak)
                  <tr>
                    <td><span class="label label-info">Resume Kontrak</span></td>
                    <td style="text-align:center;">
                      <input name="dok_res_kontrak" id="dok_res_kontrak" type="file" accept=".doc, .docx, .xls, .xlsx, .pdf"/>
                    </td>
                  </tr>
                  @endif
                  @if ($getDokumen->dok_syarat_kontrak)
                  <tr>
                    <td><span class="label label-info">Syarat Khusus Kontrak</span></td>
                    <td style="text-align:center;">
                      <input name="dok_syarat_kontrak" id="dok_syarat_kontrak" type="file" accept=".doc, .docx, .xls, .xlsx, .pdf"/>
                    </td>
                  </tr>
                  @endif
                  @if ($getDokumen->dok_npd)
                  <tr>
                    <td><span class="label label-info">NPD</span></td>
                    <td style="text-align:center;">
                      <input name="dok_npd" id="dok_npd" type="file" accept=".doc, .docx, .xls, .xlsx, .pdf"/>
                    </td>
                  </tr>
                  @endif
                  @if ($getDokumen->dok_pho)
                  <tr>
                    <td><span class="label label-info">PHO/FHO</span></td>
                    <td style="text-align:center;">
                      <input name="dok_pho" id="dok_pho" type="file" accept=".doc, .docx, .xls, .xlsx, .pdf"/>
                    </td>
                  </tr>
                  @endif
                  @if ($getDokumen->dok_kwitansi)
                  <tr>
                    <td><span class="label label-info">Kwitansi</span></td>
                    <td style="text-align:center;">
                      <input name="dok_kwitansi" id="dok_kwitansi" type="file" accept=".doc, .docx, .xls, .xlsx, .pdf"/>
                    </td>
                  </tr>
                  @endif
                  @if ($getDokumen->img_kegiatan)
                  <tr>
                    <td><span class="label label-info">Photo Kegiatan</span></td>
                    <td style="text-align:center;">
                      <input name="img_kegiatan[]" id="img_kegiatan" type="file" accept=".png, .jpg, .jpeg" multiple/>
                    </td>
                  </tr>
                  @endif
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="2">
                      <button class="btn btn-primary pull-right">Ubah Dokumen</button>
                    </td>
                  </tr>
                </tfoot>
              </table>
              </form>
            </div>
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
  <script src="{{asset('theme/js/jquery.validate.js') }}"></script>

  <script type="text/javascript">
  $(function(){
      $('input[type=file]').uniform();
      $("#basic_validate").validate({
        ignore: [],
        rules:{
          dok_spp:{
            // required:true,
            accept:"pdf|doc|docx|xls|xlsx",
          },
          dok_spm:{
            // required:true,
            accept:"pdf|doc|docx|xls|xlsx",
          },
          dok_sp2d:{
            // required:true,
            accept:"pdf|doc|docx|xls|xlsx",
          },
          dok_res_kontrak:{
            // required:true,
            accept:"pdf|doc|docx|xls|xlsx",
          },
          dok_syarat_kontrak:{
            // required:true,
            accept:"pdf|doc|docx|xls|xlsx",
          },
          dok_npd:{
            // required:true,
            accept:"pdf|doc|docx|xls|xlsx",
          },
          dok_mutual:{
            // required:true,
            accept:"pdf|doc|docx|xls|xlsx",
          },
          dok_kwitansi:{
            // required:true,
            accept:"png|jpe?g",
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
  </script>
@endsection
