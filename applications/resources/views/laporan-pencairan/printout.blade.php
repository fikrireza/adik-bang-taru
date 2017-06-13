<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Print Out</title>
  </head>
  <body>
    <h2 style="margin-bottom:0px;">Laporan Pencairan Per Kegiatan</h2>
    @php
      $date = explode('-', date('Y-m-d'));
    @endphp
    Tanggal Cetak: {{$date[2]}}-{{$date[1]}}-{{$date[0]}}
    <br>
    <br>
    <table border="1" cellpadding="5" cellspacing="0">
      <thead>
        <tr>
          <th rowspan="3" style="width:30px;">No</th>
          <th rowspan="3" colspan="4">Program / Kegiatan</th>
          <th rowspan="3">Anggaran</th>
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
      <tbody>
        <tr>
          <td style="text-align:center;">1</td>
          <td colspan="4">{{$getprogram->nama_program}}</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td style="width:20px;"></td>
          <td colspan="3">{{$getkegiatan->nama_kegiatan}}</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        @foreach ($datacair as $key)
          @if (!is_null($key->no_rek))
            @foreach ($getitem as $item)
              @if ($key->no_rek == $item->no_rekening)
                @php
                  $jmlanggaran = 0;
                @endphp
                @foreach ($getitem as $itemget)
                  @if ($item->no_rekening == $itemget->no_rekening)
                    @php
                      $jmlanggaran = $jmlanggaran + $itemget->total;
                    @endphp
                  @endif
                @endforeach
                <tr>
                  <td></td>
                  <td style="width:20px;"></td>
                  <td style="width:20px;"></td>
                  <td colspan="2">{{$item->nama_item_kegiatan}}</td>
                  <td>{{number_format($jmlanggaran, 0, ',', '.')}}</td>
                  <td>-</td>
                  <td>-</td>
                  <td>{{number_format($item->realisasi_anggaran, 0, ',', '.')}}</td>
                  <td>
                    {{round($item->realisasi_anggaran*100/$jmlanggaran, 2)}} %
                  </td>
                  <td>
                    @php
                      $flag_fisik = 0;
                    @endphp
                    @foreach ($getfisik as $fisik)
                      @if ($fisik->no_rekening_kegiatan == $item->no_rekening)
                        {{$fisik->nilai}} %
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
                <tr>
                  <td></td>
                  <td style="width:20px;"></td>
                  <td style="width:20px;"></td>
                  <td colspan="2">
                    @foreach ($getitem as $item)
                      @if ($sumitem->id_item_kegiatan == $item->id)
                        {{$item->nama_item_kegiatan}}
                        @php
                          break;
                        @endphp
                      @endif
                    @endforeach
                  </td>
                  <td>
                    @php
                      $no_rekening = 0;
                      $jmlanggaran = 0;
                    @endphp
                    @foreach ($getitem as $item)
                      @if ($item->id == $sumitem->id_item_kegiatan)
                        @php
                          $no_rekening = $item->no_rekening;
                        @endphp
                      @endif
                    @endforeach
                    @foreach ($getitem as $item)
                      @if ($no_rekening == $item->no_rekening)
                        @php
                          $jmlanggaran = $jmlanggaran + $item->total;
                        @endphp
                      @endif
                    @endforeach
                    {{number_format($jmlanggaran, 0, ',', '.')}}
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
                  <td>{{number_format($sumitem->nilai, 0, ',', '.')}}</td>
                  <td>{{round($sumitem->nilai*100/$jmlanggaran, 2)}} %</td>
                  <td>
                    @php
                      $flag_fisik = 0;
                    @endphp
                    @foreach ($getfisik as $fisik)
                      @if ($fisik->id_item_kegiatan == $sumitem->id_item_kegiatan)
                        {{$fisik->nilai}} %
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
          @endif
        @endforeach
      </tbody>
    </table>
  </body>
</html>
