<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Print Out</title>
  </head>
  <style media="screen">
    @page {margin:20px;margin-right:70px;}
  </style>
  <body>
    <h2 style="margin-bottom:0px;">Laporan Pencairan Per Kegiatan</h2>
    @php
      $date = explode('-', date('Y-m-d'));
    @endphp
    Tanggal Cetak: {{$date[2]}}-{{$date[1]}}-{{$date[0]}}
    <br>
    <br>
    <table border="1" cellpadding="2" cellspacing="0" border="">
      <thead>
        <tr>
          <th rowspan="3" style="width:30px;">No</th>
          <th rowspan="3" colspan="5">Program / Kegiatan</th>
          <th rowspan="3">Anggaran</th>
          <th rowspan="3">Pelaksana</th>
          <th rowspan="3">Nilai Kontrak</th>
          <th rowspan="3">Tanggal Berlaku Kontrak</th>
          <th colspan="3">Realisasi</th>
        </tr>
        <tr>
          <th colspan="2">Anggaran</th>
          <th rowspan="2">Fisik</th>
        </tr>
        <tr>
          <th>Nilai</th>
          <th>Presentase</th>
        </tr>
      </thead>
      <tbody style="font-size:13px;">
        <tr>
          <td style="text-align:center;">1</td>
          <td colspan="5">{{$getprogram->nama_program}}</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td style="width:30px;"></td>
          <td colspan="4">{{$getkegiatan->nama_kegiatan}}</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        @php
        $prev_name = null;
        @endphp
        @foreach ($datacair as $key)
          @if (!is_null($key->no_rek))
            @foreach ($getitem as $item)
              @if ($key->no_rek == $item->no_rekening && $key->nama_item_kegiatan == $item->nama_item_kegiatan && $key->id_kegiatan == $item->id_kegiatan)
                @php
                  $jmlanggaran = 0;
                @endphp
                @foreach ($getitem as $itemget)
                  @if ($item->no_rekening == $itemget->no_rekening && $item->nama_item_kegiatan == $itemget->nama_item_kegiatan && $item->id_kegiatan == $itemget->id_kegiatan)
                    @php
                      $jmlanggaran = $jmlanggaran + $itemget->total;
                    @endphp
                  @endif
                @endforeach
                <tr>
                  <td></td>
                  <td></td>
                  <td style="width:30px;"></td>
                  <td colspan="3">{{$item->nama_item_kegiatan}}</td>
                  <td>{{number_format($jmlanggaran, 0, ',', '.')}}</td>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>
                  <td>{{number_format($item->realisasi_anggaran, 0, ',', '.')}}</td>
                  <td>
                    {{round($item->realisasi_anggaran*100/$jmlanggaran, 2)}}%
                  </td>
                  <td>
                    @php
                      $flag_fisik = 0;
                    @endphp
                    @foreach ($getfisik as $fisik)
                      @if ($fisik->no_rekening_kegiatan == $item->no_rekening)
                        {{$fisik->nilai}}%
                        @php
                          $flag_fisik++;
                          break;
                        @endphp
                      @endif
                    @endforeach
                    @if ($flag_fisik==0)
                      -
                    @endif
                  </td>
                </tr>
                @php
                  break;
                @endphp
              @endif
            @endforeach
          @else
            @foreach ($getsumitem as $sumitem)
              @if ($key->id_item_kegiatan == $sumitem->id_item_kegiatan)
                @foreach ($getitem as $item)
                  @if ($sumitem->id_item_kegiatan == $item->id)
                    @php
                      $now_name = $item->nama_item_kegiatan;
                      break;
                    @endphp
                  @endif
                @endforeach
                @if ($prev_name != $now_name)
                  @php
                    $prev_name = $now_name;
                  @endphp
                  <tr>
                    <td></td>
                    <td></td>
                    <td style="width:30px;"></td>
                    <td colspan="3">
                      @php
                        $det_norek = null;
                        $det_namaitem = null;
                        $det_idkeg = 0;
                      @endphp
                      @foreach ($getitem as $item)
                        @if ($sumitem->id_item_kegiatan == $item->id)
                          {{$item->nama_item_kegiatan}}
                          @php
                            $det_namaitem = $item->nama_item_kegiatan;
                            $det_norek = $item->no_rekening;
                            $det_idkeg = $item->id_kegiatan;
                            break;
                          @endphp
                        @endif
                      @endforeach
                    </td>
                    <td>
                      @php
                        $det_jmlangg = 0;
                      @endphp
                      @foreach ($getitem as $item)
                        @if ($item->no_rekening == $det_norek && $item->nama_item_kegiatan == $det_namaitem && $item->id_kegiatan == $det_idkeg)
                          @php
                            $det_jmlangg = $det_jmlangg + $item->total;
                          @endphp
                        @endif
                      @endforeach
                      {{number_format($det_jmlangg, 0, ',', '.')}}
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                @else
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="width:30px;"></td>
                    <td colspan="2">
                      @foreach ($getitem as $item)
                        @if ($sumitem->id_item_kegiatan == $item->id)
                          {{$item->expr1}}
                          @php
                            break;
                          @endphp
                        @endif
                      @endforeach
                    </td>
                    <td>
                      @php
                        $jmlanggaranperrinci = 0;
                      @endphp
                      @foreach ($getitem as $item)
                        @if ($sumitem->id_item_kegiatan == $item->id)
                          {{number_format($item->total, 0, ',', '.')}}
                          @php
                            $jmlanggaranperrinci = $item->total;
                            break;
                          @endphp
                        @endif
                      @endforeach
                    </td>
                    <td>
                      @foreach ($getresume as $resume)
                        @if ($resume->id_item_kegiatan == $sumitem->id_item_kegiatan)
                          {{$resume->nama_perusahaan}}
                          @php
                            break;
                          @endphp
                        @endif
                      @endforeach
                    </td>
                    <td>
                      @php
                        $flag_nilai_kontrak = 0;
                      @endphp
                      @foreach ($getresume as $resume)
                        @if ($resume->id_item_kegiatan == $sumitem->id_item_kegiatan)
                          {{number_format($resume->nilai_kontrak, 0, ',', '.')}}
                          @php
                            $flag_nilai_kontrak++;
                          @endphp
                        @endif
                      @endforeach
                      @if ($flag_nilai_kontrak == 0)
                        -
                      @endif
                    </td>
                    <td>
                      @php
                        $flag_nilai_kontrak = 0;
                      @endphp
                      @foreach ($getresume as $resume)
                        @if ($resume->id_item_kegiatan == $sumitem->id_item_kegiatan)
                          {{$resume->jangka_waktu_awal}} s.d {{$resume->jangka_waktu_akhir}}
                          @php
                            $flag_nilai_kontrak++;
                          @endphp
                        @endif
                      @endforeach
                      @if ($flag_nilai_kontrak == 0)
                        -
                      @endif
                    </td>
                    <td>
                      {{number_format($sumitem->nilai, 0, ',', '.')}}
                    </td>
                    <td>
                      {{round($sumitem->nilai*100/$jmlanggaranperrinci, 2)}}%
                    </td>
                    <td>
                      @php
                        $flag_fisik = 0;
                      @endphp
                      @foreach ($getfisik as $fisik)
                        @if ($fisik->id_item_kegiatan == $sumitem->id_item_kegiatan)
                          {{$fisik->nilai}}%
                          @php
                            $flag_fisik++;
                            break;
                          @endphp
                        @endif
                      @endforeach
                      @if ($flag_fisik==0)
                        -
                      @endif
                    </td>
                  </tr>
                @endif
                @php
                  break;
                @endphp
              @endif
            @endforeach
          @endif
        @endforeach
      </tbody>
    </table>
  </body>
</html>
