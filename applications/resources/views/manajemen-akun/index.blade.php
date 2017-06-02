@extends('master.layouts.master')

@section('title')
  <title>Adik Bang Taru</title>
  <link rel="stylesheet" href="{{asset('theme/css/uniform.css')}}" />
  <link rel="stylesheet" href="{{asset('theme/css/select2.css')}}" />
@endsection

@section('breadcrumb')
  <div id="content-header">
    <div id="breadcrumb">
      <a href="{{route('dashboard.index')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
      <a href="#" class="current">Manajemen Akun</a>
    </div>
    <h1>Manajemen Akun</h1>
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

  <div id="hapus" class="modal hide">
    <div class="modal-header" style="background:#da4f49;color:white;">
      <button data-dismiss="modal" class="close" type="button">×</button>
      <h3 style="text-shadow:0 0px;">Hapus Akun</h3>
    </div>
    <div class="modal-body">
      <p>Apakah anda yakin akan menghapus akun ini?</p>
    </div>
    <div class="modal-footer">
      <a data-dismiss="modal" class="btn" href="#">Tidak</a>
      <a class="btn btn-danger" href="#" id="sethapus" >Ya, saya yakin</a>
    </div>
  </div>

  <div id="edit" class="modal hide">
    <div class="modal-header" style="background:#faa732;color:white;">
      <button data-dismiss="modal" class="close" type="button">×</button>
      <h3 style="text-shadow:0 0px;">Edit Bidang</h3>
    </div>
    <form action="{{route('akun.update')}}" method="post" class="form-horizontal">
      <div class="modal-body" style="overflow:hidden;">
          {{ csrf_field() }}
          <div class="control-group" style="border-bottom:0px;">
            <label class="control-label">Nama</label>
            <div class="controls">
                <input class="span3" type="text" name="name" required id="edit_name">
                <input class="span3" type="hidden" name="id" required id="id">
            </div>
          </div>
          <div class="control-group" style="border-bottom:0px;">
            <label class="control-label">Email</label>
            <div class="controls">
                <input class="span3" type="text" name="email" required id="edit_email">
            </div>
          </div>
          <div class="control-group" style="border-bottom:0px;">
            <label class="control-label">Password</label>
            <div class="controls">
                <input class="span3" type="password" name="password" required id="edit_password">
            </div>
          </div>
          <div class="control-group" style="border-bottom:0px;">
            <label class="control-label">Bidang / UPT / Sekretariat</label>
            <div class="controls">
              <select name="id_bidang" class="span3" placeholder="-- Pilih --" required>
                <option value=""></option>
                @foreach ($bidang as $key)
                  <option value="{{$key->id}}" id="edit_id_bidang_{{$key->id}}">{{$key->nama_bidang}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="control-group" style="border-bottom:0px;">
            <label class="control-label">Level Akses</label>
            <div class="controls">
              <select name="level" class="span3" placeholder="-- Pilih --" required>
                <option value=""></option>
                <option value="1" id="edit_level_admin">Administrator</option>
                <option value="2" id="edit_level_non_admin">Non Administrator</option>
              </select>
            </div>
          </div>
          <br>
      </div>
      <div class="modal-footer">
        <a data-dismiss="modal" class="btn" href="#">Cancel</a>
        <input type="submit" value="Simpan Perubahan" class="btn btn-warning">
      </div>
    </form>
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
        Dalam fitur ini, anda dapat mengelola akun yang digunakan untuk login ke dalam sistem.
      </div>
    @endif

    <div class="row-fluid">
      <div class="span5">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Input Data Akun</h5>
          </div>
          <div class="widget-content nopadding">
            <form action="{{route('akun.store')}}" method="post" class="form-horizontal">
              {{ csrf_field() }}
              <div class="control-group" style="border-bottom:0px;">
                <label class="control-label">Nama</label>
                <div class="controls">
                  <input class="span11" type="text" name="name" required>
                </div>
              </div>
              <div class="control-group" style="border-bottom:0px;">
                <label class="control-label">Email</label>
                <div class="controls">
                  <input class="span11" type="text" name="email" required>
                </div>
              </div>
              <div class="control-group" style="border-bottom:0px;">
                <label class="control-label">Password</label>
                <div class="controls">
                  <input class="span11" type="password" name="password" required>
                </div>
              </div>
              <div class="control-group" style="border-bottom:0px;">
                <label class="control-label">Bidang / UPT / Sekretariat</label>
                <div class="controls">
                  <select class="span11" name="id_bidang" placeholder="-- Pilih --" required>
                    <option value=""></option>
                    @foreach ($bidang as $key)
                      <option value="{{$key->id}}">{{$key->nama_bidang}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="control-group" style="border-bottom:0px;">
                <label class="control-label">Level Akses</label>
                <div class="controls">
                  <select class="span11" name="level" placeholder="-- Pilih --" required>
                    <option value=""></option>
                    <option value="1">Administrator</option>
                    <option value="2">Non Administrator</option>
                  </select>
                </div>
              </div>
              <br>
              <div class="form-actions">
                <button type="submit" class="btn btn-success pull-right">Simpan</button>
              </div>
              </form>
            </div>
          </div>
      </div>
      <div class="span7">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Data Akun Terdaftar</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table" id="tabel_akun">
              <thead>
                <tr>
                  <th width="20px;">#</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Bidang / UPT</th>
                  <th>Level</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $no = 1;
                @endphp
                @foreach ($data as $key)
                  <tr>
                    <td style="text-align:center;">{{$no}}</td>
                    <td>{{$key->name}}</td>
                    <td>{{$key->email}}</td>
                    <td>{{$key->nama_bidang}}</td>
                    <td>
                      @if ($key->level==1)
                        Administrator
                      @else
                        Non Administrator
                      @endif
                    </td>
                    <td>
                      <a href="#edit" data-toggle="modal" data-value="{{$key->id_user}}" class="btn btn-warning btn-mini tip-top edit" data-original-title="Ubah">
                        <i class="icon-edit"></i>
                      </a>
                      <a href="#hapus" data-toggle="modal" data-value="{{$key->id_user}}" class="btn btn-danger btn-mini tip-top hapus" data-original-title="Hapus">
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

  <script type="text/javascript">
    $(function(){
      $('#tabel_akun').on('click','.edit', function(){
        var id = $(this).data('value');
        $.ajax({
          url: "{{ url('/') }}/manajemen-akun/bind/"+id,
          success: function(data) {
            $('#id').attr('value', data.id);
            $('#edit_name').attr('value', data.name);
            $('#edit_email').html(data.email);
            $('#edit_password').attr('value', data.password);

            var id_bidang = data.id_bidang;
            $("#edit_id_bidang_"+id_bidang).attr('selected', true);

            var level = data.level;
            if (level==1) {
              $("#edit_level_admin").attr('selected', true);
            } else if (level==2) {
              $("#edit_level_non_admin").attr('selected', true);
            }
          }
        });
      });

      $('#tabel_akun').on('click','.hapus', function(){
        var id = $(this).data('value');
        $('#sethapus').attr('href', '{{url('/')}}/manajemen-akun/destroy/'+id);
      });
    });
  </script>

  <script src="{{asset('theme/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('theme/js/jquery.uniform.js')}}"></script>
  {{-- <script src="{{asset('theme/js/select2.min.js')}}"></script> --}}
  <script src="{{asset('theme/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('theme/js/matrix.js')}}"></script>
  <script src="{{asset('theme/js/matrix.tables.js')}}"></script>
@endsection
