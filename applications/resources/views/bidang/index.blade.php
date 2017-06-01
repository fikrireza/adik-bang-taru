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
      <a href="#" class="current">Manajemen Bidang</a>
    </div>
    <h1>Manajemen Bidang</h1>
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
      <h3 style="text-shadow:0 0px;">Hapus Bidang</h3>
    </div>
    <div class="modal-body">
      <p>Apakah anda yakin akan menghapus bidang ini?</p>
    </div>
    <div class="modal-footer">
      <a data-dismiss="modal" class="btn" href="#">Tidak</a>
      <a class="btn btn-danger" href="#" id="sethapus">Ya, saya yakin</a>
    </div>
  </div>

  <div id="edit" class="modal hide">
    <div class="modal-header" style="background:#faa732;color:white;">
      <button data-dismiss="modal" class="close" type="button">×</button>
      <h3 style="text-shadow:0 0px;">Edit Bidang</h3>
    </div>
    <form action="{{route('bidang.update')}}" method="post" class="form-horizontal">
      <div class="modal-body" style="overflow:hidden;">
          {{ csrf_field() }}
          <div class="control-group" style="border-bottom:0px;">
            <label class="control-label">Nama Bidang</label>
            <div class="controls">
              <input type="text" name="nama_bidang" id="edit_nama_bidang" required>
              <input type="hidden" name="id" id="edit_id">
            </div>
          </div>
          <div class="control-group" style="border-bottom:0px;">
            <label class="control-label">Jenis</label>
            <div class="controls">
              <span class="span3" style="margin-left:0px;">
                <select name="jenis_bidang" placeholder="-- Pilih --" required>
                  <option value=""></option>
                  <option value="Bidang" id="opt_bidang">Bidang</option>
                  <option value="UPT" id="opt_upt">UPT</option>
                  <option value="Sekretariat" id="opt_sekretariat">Sektretariat</option>
                </select>
              </span>
            </div>
          </div>
          <div class="control-group" style="border-bottom:0px;">
            <label class="control-label">Keterangan</label>
            <div class="controls">
              <textarea name="keterangan" rows="8" cols="80" id="edit_keterangan"></textarea>
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
        Dalam fitur ini, anda dapat mengelola data bidang yang digunakan sebagai bagian dari seleksi kegiatan.
      </div>
    @endif

    <div class="row-fluid">
      <div class="span5">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Input Data Bidang</h5>
          </div>
          <div class="widget-content nopadding">
            <form action="{{route('bidang.store')}}" method="post" class="form-horizontal">
              {{ csrf_field() }}
              <div class="control-group" style="border-bottom:0px;">
                <label class="control-label">Nama Bidang</label>
                <div class="controls">
                  <input class="span11" type="text" name="nama_bidang" required>
                </div>
              </div>
              <div class="control-group" style="border-bottom:0px;">
                <label class="control-label">Jenis</label>
                <div class="controls">
                  <select class="span11" name="jenis_bidang" placeholder="-- Pilih --" required>
                    <option value=""></option>
                    <option value="Bidang">Bidang</option>
                    <option value="UPT">UPT</option>
                    <option value="Sekretariat">Sektretariat</option>
                  </select>
                </div>
              </div>
              <div class="control-group" style="border-bottom:0px;">
                <label class="control-label">Keterangan</label>
                <div class="controls">
                  <textarea name="keterangan" rows="8" cols="80" class="span11"></textarea>
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
            <h5>Seluruh Data Bidang</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table" id="tabel_bidang">
              <thead>
                <tr>
                  <th width="20px;">#</th>
                  <th>Nama Bidang</th>
                  <th>Jenis</th>
                  <th>Keterangan</th>
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
                    <td>{{$key->nama_bidang}}</td>
                    <td>{{$key->jenis_bidang}}</td>
                    <td>{{$key->keterangan}}</td>
                    <td>
                      <a href="#edit" data-toggle="modal" data-value="{{$key->id}}" class="btn btn-warning btn-mini tip-top edit" data-original-title="Ubah">
                        <i class="icon-edit"></i>
                      </a>
                      <a href="#hapus" data-toggle="modal" data-value="{{$key->id}}" class="btn btn-danger btn-mini tip-top hapus" data-original-title="Non-aktif">
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
      $('#tabel_bidang').on('click','.edit', function(){
        var id = $(this).data('value');
        $.ajax({
          url: "{{ url('/') }}/bidang/bind/"+id,
          success: function(data) {
            $('#edit_nama_bidang').attr('value', data.nama_bidang);
            $('#edit_keterangan').html(data.keterangan);
            $('#edit_id').attr('value', data.id);

            var jenis = data.jenis_bidang;
            if (jenis=="Bidang") {
              $("#opt_bidang").attr('selected', true);
            } else if (jenis=="UPT") {
              $("#opt_upt").attr('selected', true);
            } else if (jenis=="Sekretariat") {
              $("#opt_sekretariat").attr('selected', true);
            }
          }
        });
      });

      $('#tabel_bidang').on('click','.hapus', function(){
        var id = $(this).data('value');
        $('#sethapus').attr('href', '{{url('/')}}/bidang/destroy/'+id);
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
