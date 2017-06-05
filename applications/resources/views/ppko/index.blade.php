@extends('master.layouts.master')

@section('title')
  <title>Adik Bang Taru</title>
  <link rel="stylesheet" href="{{asset('theme/css/uniform.css')}}" />
  <link rel="stylesheet" href="{{asset('theme/css/select2.css')}}" />
  <link rel="stylesheet" href="{{ asset('backend/css/jquery.gritter.css') }}" />
@endsection

@section('breadcrumb')
  <div id="content-header">
    <div id="breadcrumb">
      <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
      <a href="#" class="current">Manajemen PPKo</a>
    </div>
    <h1>Manajemen PPKo</h1>
  </div>
@endsection

@section('content')

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
      <a class="btn btn-danger" href="#" id="setDelete">Ya, saya yakin</a>
    </div>
  </div>


  <div class="container-fluid">
    <hr style="margin:0px 0px 15px 0px;">
    <div class="alert alert-info alert-block" style="margin-bottom:0px;">
      {{-- <a class="close" data-dismiss="alert" href="#">×</a> --}}
      <h4 class="alert-heading">Pemberitahuan</h4>
      <hr style="margin:5px 0px 10px 0px; border-top-color:#9fd5dc;">
      Dalam fitur ini, anda dapat mengelola data PPKo. Data ini akan digunakan dalam fitur set PPKo untuk setiap kegiatan.
    </div>
    <div class="row-fluid">
      <div class="span5">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Input Data PPKo</h5>
          </div>
          <div class="widget-content nopadding">
            @if (isset($editPpko))
            <form action="{{ route('ppko.edit')}}" method="POST" class="form-horizontal" name="form-validate" id="form-validate" novalidate="novalidate">
            @else
            <form action="{{ route('ppko.store')}}" method="POST" class="form-horizontal" name="form-validate" id="form-validate" novalidate="novalidate">
            @endif
              {{ csrf_field() }}
              <div class="control-group">
                <label class="control-label">NIP</label>
                <div class="controls">
                  @if (isset($editPpko))
                  <input type="hidden" name="id" value="{{ $editPpko->id }}">
                  @endif
                  <select class="span11" name="nip_sapk" id="nip_sapk" title="Pilih Pegawai">
                    <option value="">--Choose--</option>
                    @if (isset($editPpko))
                      @php
                        $nip_sapk = $editPpko->nip_sapk.'|'.$editPpko->nama;
                      @endphp
                      @if(!$pegawaiApi == null)
                        @foreach ($pegawaiApi as $key)
                          <option value="{{ $key->nip_sapk }} | {{ $key->nama }}" {{ $nip_sapk == $key->nip_sapk.' | '.$key->nama ? 'selected="selected"' : '' }}>{{ $key->nip_sapk }} | {{ $key->nama }}</option>
                        @endforeach
                      @else
                        <option value="">Connection Error</option>
                      @endif
                    @else
                      @if(!$pegawaiApi == null)
                        @foreach ($pegawaiApi as $key)
                          <option value="{{ $key->nip_sapk }} | {{ $key->nama }}" {{ old('nip_sapk') == $key->nip_sapk ? 'selected="selected"' : '' }}>{{ $key->nip_sapk }} | {{ $key->nama }}</option>
                        @endforeach
                      @else
                        <option value="">Connection Error</option>
                      @endif
                    @endif
                  </select>
                </div>
              </div>
              <div class="control-group" style="border-bottom:0px;">
                <label class="control-label">Bidang / UPT</label>
                <div class="controls">
                  <select class="span11" name="id_bidang" id="id_bidang" title="Pilih Pegawai">
                    <option value="" selected="">--Choose--</option>
                    @if (isset($editPpko))
                      @foreach ($getBidang as $key)
                        <option value="{{ $key->id }}" {{ $editPpko->id_bidang == $key->id ? 'selected="selected"' : '' }}>{{ $key->nama_bidang }}</option>
                      @endforeach
                    @else
                      @foreach ($getBidang as $key)
                        <option value="{{ $key->id }}">{{ $key->nama_bidang }}</option>
                      @endforeach
                    @endif
                  </select>
                </div>
              </div>
              <br>
              <div class="form-actions">
                <input type="submit" value="Simpan" class="btn btn-success pull-right">
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="span7">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Daftar PPKo</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th width="20px;">#</th>
                  <th>NIP</th>
                  <th>Nama</th>
                  <th>Bidang / UPT</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $no = 1;
                @endphp
                @foreach ($getPpko as $key)
                  <tr>
                    <td style="text-align:center;">{{ $no }}</td>
                    <td>{{ $key->nip_sapk }}</td>
                    <td>{{ $key->nama }}</td>
                    <td>{{ $key->bidang->nama_bidang }}</td>
                    <td>
                      <a href="{{ route('ppko.ubah', ['id' => $key->id ])}}" class="btn btn-warning btn-mini tip-top" data-original-title="Ubah">
                        <i class="icon-edit"></i>
                      </a>
                      <a href="#myAlert" data-toggle="modal" data-value="{{ $key->id }}" class="btn btn-danger btn-mini tip-top delete" data-original-title="Hapus">
                        <i class="icon-remove"></i>
                      </a>
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
  <script src="{{asset('theme/js/jquery.validate.js') }}"></script>
  <script src="{{asset('theme/js/jquery.gritter.min.js') }}"></script>
  <script src="{{asset('theme/js/matrix.js')}}"></script>
  <script src="{{asset('theme/js/matrix.tables.js')}}"></script>

  <script type="text/javascript">
  $(document).ready(function(){
    $('input[type=checkbox],input[type=radio],input[type=file]').uniform();

    $('select').select2();

    // Form Validation
    $("#form-validate").validate({
      ignore: [],
      rules:{
        nip_sapk:{
          required:true
        },
        id_bidang:{
          required:true,
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

  $('a.delete').click(function(){
    var a = $(this).data('value');
    $('#setDelete').attr('href', "{{ url('/') }}/ppko/delete/"+a);
  });

  </script>
@endsection
