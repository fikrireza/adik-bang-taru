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
      <a href="{{ route('verifikasi.index') }}">Verifikasi Dokumen</a>
      <a href="#" class="current">Detail Verifikasi Dokumen</a>
    </div>
    <h1>Barang Cetak</h1>
  </div>
@endsection

@section('content')

  <div id="myAlert" class="modal hide">
    <div class="modal-header" style="color:white;">
      <button data-dismiss="modal" class="close" type="button">×</button>
      <h3 style="text-shadow:0 0px;">Proses Dokumen Kegiatan</h3>
    </div>
    <div class="modal-body">
      <p>Apakah anda yakin akan memproses dokumen ini?</p>
    </div>
    <div class="modal-footer">
      <a data-dismiss="modal" class="btn" href="#">Tidak</a>
      <a class="btn btn-danger" href="#" id="setProses">Ya, saya yakin</a>
    </div>
  </div>


  <div class="container-fluid">
    <hr style="margin:0px 0px 15px 0px;">
    <div class="alert alert-info alert-block" style="margin-bottom:0px;">
      <a class="close" data-dismiss="alert" href="#">×</a>
      <h4 class="alert-heading">Pemberitahuan</h4>
      <hr style="margin:5px 0px 10px 0px; border-top-color:#9fd5dc;">
      {!! $getdokumen->flag_status == 1 ? 'Sudah Dilakukan Proses Dokumen' : 'Dokumen Belum di Proses'!!}
    </div>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Dokumen Pencairan =></h5><h5>{{ $getdokumen->itemKegiatan->kegiatan->program->nama_program }} | {{ $getdokumen->itemKegiatan->kegiatan->nama_kegiatan }} | {{ $getdokumen->itemKegiatan->nama_item_kegiatan }}</h5>
          </div>
          <div class="widget-content">
            @if ($getdokumen->itemKegiatan->flag_rincian_item == 0)
            <table class="table table-bordered data-table">
              <tbody>
                <tr>
                  <td width="30%"><b>Dokumen SPP</b></td>
                  @if ($getdokumen->dok_spp != null)
                    <td width="40%"><a href="{{ asset('dokumen/pencairan').'/'.$getdokumen->dok_spp }}" target="_blank">{!! $getdokumen->dok_spp !!}</a></td>
                  @else
                    <td>-</td>
                  @endif
                </tr>
                <tr>
                  <td><b>Dokumen SPM</b></td>
                  @if ($getdokumen->dok_spm != null)
                    <td><a href="{{ asset('dokumen/pencairan').'/'.$getdokumen->dok_spm }}" target="_blank">{!! $getdokumen->dok_spm !!}</a></td>
                  @else
                    <td>-</td>
                  @endif
                </tr>
                <tr>
                  <td><b>Dokumen SP2D</b></td>
                  @if ($getdokumen->dok_sp2d != null)
                    <td><a href="{{ asset('dokumen/pencairan').'/'.$getdokumen->dok_sp2s }}" target="_blank">{!! $getdokumen->dok_sp2d !!}</a></td>
                  @else
                    <td>-</td>
                  @endif
                </tr>
                {{-- <tr>
                  <td><b>Dokumen Resume Kontrak</b></td>
                  @if ($getdokumen->dok_res_kontrak != null)
                    <td><a href="{{ asset('dokumen/pencairan').'/'.$getdokumen->dok_res_kontrak }}" target="_blank">{!! $getdokumen->dok_res_kontrak !!}</a></td>
                  @else
                    <td>-</td>
                  @endif
                </tr> --}}
                <tr>
                  <td><b>Dokumen Syarat Kontrak</b></td>
                  @if ($getdokumen->dok_syarat_kontrak != null)
                    <td><a href="{{ asset('dokumen/pencairan').'/'.$getdokumen->dok_syarat_kontrak }}" target="_blank">{!! $getdokumen->dok_syarat_kontrak !!}</a></td>
                  @else
                    <td>-</td>
                  @endif
                </tr>
                <tr>
                  <td><b>Dokumen NPD</b></td>
                  @if ($getdokumen->dok_npd != null)
                    <td><a href="{{ asset('dokumen/pencairan').'/'.$getdokumen->dok_npd }}" target="_blank">{!! $getdokumen->dok_npd !!}</a></td>
                  @else
                    <td>-</td>
                  @endif
                </tr>
                {{-- <tr>
                  <td><b>Dokumen PHO</b></td>
                  @if ($getdokumen->dok_pho != null)
                    <td><a href="{{ asset('dokumen/pencairan').'/'.$getdokumen->dok_pho }}" target="_blank">{!! $getdokumen->dok_pho !!}</a></td>
                  @else
                    <td>-</td>
                  @endif
                </tr> --}}
                <tr>
                  <td><b>Dokumen Kwitansi</b></td>
                  @if ($getdokumen->dok_kwitansi != null)
                    <td><a href="{{ asset('dokumen/pencairan').'/'.$getdokumen->dok_kwitansi }}" target="_blank">{!! $getdokumen->dok_kwitansi !!}</a></td>
                  @else
                    <td>-</td>
                  @endif
                </tr>
                {{-- <tr>
                  <td><b>Dokumen Mutual</b></td>
                  @if ($getdokumen->dok_mutual != null)
                    <td><a href="{{ asset('dokumen/pencairan').'/'.$getdokumen->dok_mutual }}" target="_blank">{!! $getdokumen->dok_mutual !!}</a></td>
                  @else
                    <td>-</td>
                  @endif
                </tr> --}}
                <tr>
                  <td colspan="2" style="text-align:center;">
                    <a data-toggle="modal" data-value="{{ $getdokumen->id }}" class="btn btn-success proses" {!! $getdokumen->flag_status == 1 ? 'disabled=""' : 'href="#myAlert"'!!} >Proses Dokumen</a>
                  </td>
                </tr>
              </tbody>
            </table>
            @else
            <table class="table table-bordered data-table">
              <tbody>
                <tr>
                  <td width="30%"><b>Dokumen SPP</b></td>
                  @if ($getdokumen->dok_spp != null)
                    <td width="40%"><a href="{{ asset('dokumen/pencairan').'/'.$getdokumen->dok_spp }}" target="_blank">{!! $getdokumen->dok_spp !!}</a></td>
                  @else
                    <td>-</td>
                  @endif
                </tr>
                <tr>
                  <td><b>Dokumen SPM</b></td>
                  @if ($getdokumen->dok_spm != null)
                    <td><a href="{{ asset('dokumen/pencairan').'/'.$getdokumen->dok_spm }}" target="_blank">{!! $getdokumen->dok_spm !!}</a></td>
                  @else
                    <td>-</td>
                  @endif
                </tr>
                <tr>
                  <td><b>Dokumen SP2D</b></td>
                  @if ($getdokumen->dok_sp2d != null)
                    <td><a href="{{ asset('dokumen/pencairan').'/'.$getdokumen->dok_sp2s }}" target="_blank">{!! $getdokumen->dok_sp2d !!}</a></td>
                  @else
                    <td>-</td>
                  @endif
                </tr>
                <tr>
                  <td><b>Dokumen Resume Kontrak</b></td>
                  @if ($getdokumen->dok_res_kontrak != null)
                    <td><a href="{{ asset('dokumen/pencairan').'/'.$getdokumen->dok_res_kontrak }}" target="_blank">{!! $getdokumen->dok_res_kontrak !!}</a></td>
                  @else
                    <td>-</td>
                  @endif
                </tr>
                <tr>
                  <td><b>Dokumen Syarat Kontrak</b></td>
                  @if ($getdokumen->dok_syarat_kontrak != null)
                    <td><a href="{{ asset('dokumen/pencairan').'/'.$getdokumen->dok_syarat_kontrak }}" target="_blank">{!! $getdokumen->dok_syarat_kontrak !!}</a></td>
                  @else
                    <td>-</td>
                  @endif
                </tr>
                <tr>
                  <td><b>Dokumen NPD</b></td>
                  @if ($getdokumen->dok_npd != null)
                    <td><a href="{{ asset('dokumen/pencairan').'/'.$getdokumen->dok_npd }}" target="_blank">{!! $getdokumen->dok_npd !!}</a></td>
                  @else
                    <td>-</td>
                  @endif
                </tr>
                <tr>
                  <td><b>Dokumen PHO</b></td>
                  @if ($getdokumen->dok_pho != null)
                    <td><a href="{{ asset('dokumen/pencairan').'/'.$getdokumen->dok_pho }}" target="_blank">{!! $getdokumen->dok_pho !!}</a></td>
                  @else
                    <td>-</td>
                  @endif
                </tr>
                <tr>
                  <td><b>Dokumen Kwitansi</b></td>
                  @if ($getdokumen->dok_kwitansi != null)
                    <td><a href="{{ asset('dokumen/pencairan').'/'.$getdokumen->dok_kwitansi }}" target="_blank">{!! $getdokumen->dok_kwitansi !!}</a></td>
                  @else
                    <td>-</td>
                  @endif
                </tr>
                {{-- <tr>
                  <td><b>Dokumen Mutual</b></td>
                  @if ($getdokumen->dok_mutual != null)
                    <td><a href="{{ asset('dokumen/pencairan').'/'.$getdokumen->dok_mutual }}" target="_blank">{!! $getdokumen->dok_mutual !!}</a></td>
                  @else
                    <td>-</td>
                  @endif
                </tr> --}}
                <tr>
                  <td><b>Photo Kegiatan</b></td>
                  @if ($getdokumen->img_kegiatan != null)
                    @php
                      $pecah = explode("|", $getdokumen->img_kegiatan);
                    @endphp
                    <td><a href="{{ asset('dokumen/pencairan').'/'.$pecah[0] }}" target="_blank">{!! $pecah[0] !!}</a><br /><a href="{{ asset('dokumen/pencairan').'/'.$pecah[1] }}" target="_blank">{!! $pecah[1] !!}</a><br /><a href="{{ asset('dokumen/pencairan').'/'.$pecah[2] }}" target="_blank">{!! $pecah[2] !!}</a></td>
                  @else
                    <td>-</td>
                  @endif
                </tr>
                <tr>
                  <td colspan="2" style="text-align:center;">
                    <a data-toggle="modal" data-value="{{ $getdokumen->id }}" class="btn btn-success proses" {!! $getdokumen->flag_status == 1 ? 'disabled=""' : 'href="#myAlert"'!!} >Proses Dokumen</a>
                  </td>
                </tr>
              </tbody>
            </table>
            @endif

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
  <script src="{{asset('theme/js/jquery.gritter.min.js') }}"></script>
  <script src="{{asset('theme/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('theme/js/matrix.js')}}"></script>
  <script src="{{asset('theme/js/matrix.tables.js')}}"></script>

  <script type="text/javascript">
    $('a.proses').click(function(){
      var a = $(this).data('value');
      $('#setProses').attr('href', "{{ url('/') }}/verifikasi-dokumen/proses/"+a);
    });
  </script>


  @if(Session::has('berhasil'))
  <script type="text/javascript">
    $.gritter.add({
      title:	'Success',
      text:	'{{ Session::get('berhasil') }}',
      sticky: false
    });
  </script>
  @endif
@endsection
