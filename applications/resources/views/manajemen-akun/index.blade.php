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
      <a href="#" class="current">Manajemen Akun</a>
    </div>
    <h1>Manajemen Akun</h1>
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
      <a data-dismiss="modal" class="btn btn-danger" href="#">Ya, saya yakin</a>
    </div>
  </div>


  <div class="container-fluid">
    <hr style="margin:0px 0px 15px 0px;">
    <div class="alert alert-info alert-block" style="margin-bottom:0px;">
      <a class="close" data-dismiss="alert" href="#">×</a>
      <h4 class="alert-heading">Pemberitahuan</h4>
      <hr style="margin:5px 0px 10px 0px; border-top-color:#9fd5dc;">
      Dalam fitur ini, anda dapat mengelola akun yang digunakan untuk login ke dalam sistem.
    </div>
    <div class="row-fluid">
      <div class="span5">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Input Data Akun</h5>
          </div>
          <div class="widget-content nopadding">
            <form action="#" method="get" class="form-horizontal">
              <div class="control-group" style="border-bottom:0px;">
                <label class="control-label">Username</label>
                <div class="controls">
                  <input class="span11" type="text" name="Username">
                </div>
              </div>
              <div class="control-group" style="border-bottom:0px;">
                <label class="control-label">Password</label>
                <div class="controls">
                  <input class="span11" type="password" name="password">
                </div>
              </div>
              <div class="control-group" style="border-bottom:0px;">
                <label class="control-label">Bidang / UPT</label>
                <div class="controls">
                  <select class="span11" name="">
                    <option value="">Bidang Tataruang</option>
                    <option value="">Bidang Bangunan</option>
                    <option value="">Bidang Wasdal</option>
                    <option value="">UPT</option>
                  </select>
                </div>
              </div>
              <div class="control-group" style="border-bottom:0px;">
                <label class="control-label">Level Akses</label>
                <div class="controls">
                  <select class="span11" name="">
                    <option value="">Administrator</option>
                    <option value="">Akun Bidang / UPT</option>
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
      <div class="span7">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Data Akun Terdaftar</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th width="20px;">#</th>
                  <th>Username</th>
                  <th>Bidang / UPT</th>
                  <th>Level</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @for ($i=0; $i < 10; $i++)
                  <tr>
                    <td style="text-align:center;">1</td>
                    <td>ladiesman217</td>
                    <td>Bidang Tata Ruang</td>
                    <td>Akun Bidang / UPT</td>
                    <td>
                      <a href="#myAlert" data-toggle="modal" class="btn btn-warning btn-mini tip-top" data-original-title="Ubah">
                        <i class="icon-edit"></i>
                      </a>
                      <a href="#myAlert" data-toggle="modal" class="btn btn-danger btn-mini tip-top" data-original-title="Non-aktif">
                        <i class="icon-remove"></i>
                      </a>
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
