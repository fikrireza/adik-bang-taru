@extends('master.layouts.master')

@section('title')
  <title>Adik Bang Taru</title>
@endsection

@section('breadcrumb')
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
@endsection

@section('content')
  <div class="container-fluid">
    <div class="quick-actions_homepage">
      <ul class="quick-actions">
        <li class="bg_lb span2"> <a> <i class="icon-dashboard"></i> <span class="label label-important">{{$countprogram}}</span> Jumlah Program </a> </li>
        <li class="bg_lg span2"> <a> <i class="icon-signal"></i> <span class="label label-warning">{{$countkegiatan}}</span> Jumlah Kegiatan</a> </li>
        <li class="bg_ls span2"> <a> <i class="icon-info-sign"></i> <span class="label label-warning">{{$countitem}}</span> Item Kegiatan</a> </li>
        <li class="bg_ly span2"> <a> <i class="icon-inbox"></i><span class="label label-success">{{$countbidang}}</span> Jumlah Bidang </a> </li>
        <li class="bg_lo span2"> <a> <i class="icon-user"></i> <span class="label label-info">{{$countuser}}</span> Jumlah Akun</a> </li>
        <li class="bg_lr span2"> <a> <i class="icon-money"></i> <span class="label label-primary">{{$countpencairan}}</span> Pencairan</a> </li>
      </ul>
    </div>

    <div class="row-fluid">

      @if (Auth::user()->level==1)
        <div class="span7">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
              <h5>Pie Chart Kegiatan Per Bidang</h5>
            </div>
            <div class="widget-content nopadding">
              <div id="container" style="min-width: 310px; height: 400px; max-width: 650px; margin: 0 auto"></div>
            </div>
          </div>
        </div>
        <div class="span5">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
              <h5>Daftar Bidang</h5>
            </div>
            <div class="widget-content nopadding">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th width="20px;">#</th>
                    <th>Nama Bidang</th>
                    <th>Jumlah Akun</th>
                    <th>Jumlah Kegiatan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                  $no=1;
                  @endphp
                  @foreach ($databidang as $key)
                    <tr>
                      <td>{{$no}}</td>
                      <td>{{$key['nama_bidang']}}</td>
                      <td><span class="badge badge-success">{{$key['jumlah_akun']}}</span></td>
                      <td><span class="badge badge-info">{{$key['jumlah_kegiatan']}}</span></td>
                      <td>
                        <a href="{{route('seleksi-kegiatan.bidang')}}" class="btn btn-primary btn-mini tip-top" data-original-title="Lihat">
                          <i class="icon-eye-open"></i>
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
      @else
        <div class="span7">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
              <h5>Pie Chart Kegiatan Per Bidang</h5>
            </div>
            <div class="widget-content nopadding">
              <div id="container" style="min-width: 310px; height: 400px; max-width: 650px; margin: 0 auto"></div>
            </div>
          </div>
        </div>
        <div class="span5">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
              <h5>Daftar Kegiatan</h5>
            </div>
            <div class="widget-content nopadding">
              <table class="table table-bordered data-tables" style="margin-top:40px;">
                <thead>
                  <tr>
                    <th width="20px;">#</th>
                    <th>Nama Kegiatan</th>
                    <th>Jumlah Anggaran</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $no=1;
                  @endphp
                  @foreach ($datakegiatan as $key)
                    <tr>
                      <td style="text-align:center;">{{$no}}</td>
                      <td>
                        @foreach ($getkegiatan as $keg)
                          @if ($keg->id == $key['id'])
                            {{$keg->nama_kegiatan}}
                          @endif
                        @endforeach
                      </td>
                      <td>Rp {{number_format($key['total'], 0, ',', '.')}},-</td>
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
      @endif
    </div>
  </div>
@endsection

@section('footscript')
  <script src="{{asset('highcharts/code/highcharts.js')}}"></script>
  <script src="{{asset('highcharts/code/modules/exporting.js')}}"></script>
  <script src="{{asset('theme/js/excanvas.min.js')}}"></script>
  <script src="{{asset('theme/js/jquery.min.js')}}"></script>
  <script src="{{asset('theme/js/jquery.ui.custom.js')}}"></script>
  <script src="{{asset('theme/js/select2.min.js')}}"></script>
  <script src="{{asset('theme/js/bootstrap.min.js')}}"></script>
  {{-- <script src="{{asset('theme/js/jquery.flot.min.js')}}"></script>
  <script src="{{asset('theme/js/jquery.flot.resize.min.js')}}"></script> --}}
  <script src="{{asset('theme/js/jquery.peity.min.js')}}"></script>
  <script src="{{asset('theme/js/fullcalendar.min.js')}}"></script>
  <script src="{{asset('theme/js/matrix.js')}}"></script>
  {{-- <script src="{{asset('theme/js/matrix.dashboard.js')}}"></script> --}}
  {{-- <script src="{{asset('theme/js/jquery.gritter.min.js')}}"></script> --}}
  {{-- <script src="{{asset('theme/js/matrix.interface.js')}}"></script>
  <script src="{{asset('theme/js/matrix.chat.js')}}"></script> --}}
  <script src="{{asset('theme/js/jquery.validate.js')}}"></script>
  <script src="{{asset('theme/js/matrix.form_validation.js')}}"></script>
  <script src="{{asset('theme/js/jquery.wizard.js')}}"></script>
  <script src="{{asset('theme/js/jquery.uniform.js')}}"></script>
  <script src="{{asset('theme/js/matrix.popover.js')}}"></script>
  <script src="{{asset('theme/js/jquery.dataTables.min.js')}}"></script>
  {{-- <script src="{{asset('theme/js/matrix.tables.js')}}"></script> --}}

  <script type="text/javascript">
    $(function(){
      $('.data-tables').dataTable({
    		"bJQueryUI": true,
    		"bLengthChange": false,
    		"sPaginationType": "full_numbers",
    		"sDom": '<""l>t<"F"fp>'
    	});
    });
  </script>

  <script type="text/javascript">
    Highcharts.chart('container', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            @if (Auth::user()->level==1)
              text: 'Jumlah Kegiatan Per Bidang, 2017.'
            @else
              text: 'Jumlah Pencairan Kegiatan, 2017.'
            @endif
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: 'Presentase',
            colorByPoint: true,
            data:
            @php
              echo $chartdata;
            @endphp
        }]
      });
    </script>
@endsection
