<html>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <style>
      /*table {
          border-collapse: collapse;
      }

      table, td, th {
          border: 1px solid black;
          font-size: 15px;
      }*/
    </style>

    <h2 style="font-size:18px;" class="text-center">Resume Kontrak</h2>
    <br>
    <hr>
    <table style="border: 1px solid black;border-collapse: collapse;font-size: 15px;" style="font-size:15px;">
      <tr style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">
        <td style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">1</td>
        <td style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">NOMOR DAN TANGGAL DPA SKPD</td>
        <td style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">No. DPA @php echo $string = (is_null($datakontrak->no_dpa)) ? "-" : $datakontrak->no_dpa; @endphp
            <br>
            Tgl. DPA @php echo $string = (is_null($datakontrak->tanggal_dpa)) ? "-" : $datakontrak->tanggal_dpa; @endphp</td>
      </tr>
      <tr style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">
        <td style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">2</td>
        <td style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">KODE KEGIATAN / SUB KEGIATAN</td>
        <td style="border: 1px solid black;border-collapse: collapse;font-size: 15px;"></td>
      </tr>
      <tr style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">
        <td style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">3</td>
        <td style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">NO DAN TANGGAL KONTRAK</td>
        <td style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">No. Kontrak @php echo $string = (is_null($datakontrak->no_kontrak)) ? "-" : $datakontrak->no_kontrak; @endphp
          <br>
          Tgl. Kontrak @php echo $string = (is_null($datakontrak->tanggal_kontrak)) ? "-" : $datakontrak->tanggal_kontrak; @endphp</td>
      </tr>
      <tr style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">
        <td style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">4</td>
        <td style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">NAMA PERUSAHAAN</td>
        <td style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">@php echo $string = (is_null($datakontrak->nama_perusahaan)) ? "-" : $datakontrak->nama_perusahaan; @endphp</td>
      </tr>
      <tr style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">
        <td style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">5</td>
        <td style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">ALAMAT PERUSAHAAN</td>
        <td style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">@php echo $string = (is_null($datakontrak->alamat_perusahaan)) ? "-" : $datakontrak->alamat_perusahaan; @endphp</td>
      </tr>
      <tr style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">
        <td style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">6</td>
        <td style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">NILAI SPK/KONTRAK</td>
        <td style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">@php echo "Rp ".$string = (is_null($datakontrak->nilai_kontrak)) ? "-" : number_format($datakontrak->nilai_kontrak, '0', ',', '.').",-"; @endphp</td>
      </tr>
      <tr style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">
        <td style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">7</td>
        <td style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">NO & TANGGAL BA. KEMAJUAN PEKERJAAN</td>
        <td style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">No. @php echo $string = (is_null($datakontrak->no_ba_kemajuan)) ? "-" : $datakontrak->no_ba_kemajuan; @endphp <br>
        Tgl. Kemajuan Kerja @php echo $string = (is_null($datakontrak->tanggal_ba_kemajuan)) ? "-" : $datakontrak->tanggal_ba_kemajuan; @endphp</td>
      </tr>
      <tr style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">
        <td style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">8</td>
        <td style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">NO & TANGGAL BA. PEMBAYARAN</td>
        <td style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">No. @php echo $string = (is_null($datakontrak->no_ba_pembayaran)) ? "-" : $datakontrak->no_ba_pembayaran; @endphp <br>
        Tgl. Pembayaran @php echo $string = (is_null($datakontrak->tanggal_ba_pembayaran)) ? "-" : $datakontrak->tanggal_ba_pembayaran; @endphp</td>
      </tr>
      <tr style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">
        <td style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">9</td>
        <td style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">NO & TANGGAL BA. PENYELESAIAN HASIL PEKERJAAN</td>
        <td style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">No. @php echo $string = (is_null($datakontrak->no_ba_penyelesaian)) ? "-" : $datakontrak->no_ba_penyelesaian; @endphp <br>
        Tgl. Penyelesaian Hasil @php echo $string = (is_null($datakontrak->tanggal_ba_penyelesaian)) ? "-" : $datakontrak->tanggal_ba_penyelesaian; @endphp</td>
      </tr>
      <tr style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">
        <td style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">10</td>
        <td style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">NO & TANGGAL BA. SERAH TERIMA PEKERJAAN</td>
        <td style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">No. @php echo $string = (is_null($datakontrak->no_ba_serah_terima)) ? "-" : $datakontrak->no_ba_serah_terima; @endphp <br>
        Tgl. Serah Terima @php echo $string = (is_null($datakontrak->tanggal_ba_serah_terima)) ? "-" : $datakontrak->tanggal_ba_serah_terima; @endphp</td>
      </tr>
      <tr style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">
        <td style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">11</td>
        <td style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">URAIAN DAN VOLUME KEGIATAN</td>
        <td style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">@php echo $string = (is_null($datakontrak->uraian_volume)) ? "-" : $datakontrak->uraian_volume; @endphp</td>
      </tr>
      <tr style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">
        <td style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">12</td>
        <td style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">CARA PEMBAYARAN</td>
        <td style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">@php echo $string = (is_null($datakontrak->cara_pembayaran)) ? "-" : $datakontrak->cara_pembayaran; @endphp</td>
      </tr>
      <tr style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">
        <td style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">13</td>
        <td style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">JANGKA WAKTU</td>
        <td style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">@if ($daysjangkawaktu==-1)
          -
        @else
          {{$daysjangkawaktu}} hari kalendar terhitung mulai tanggal {{$datakontrak->jangka_waktu_awal}} s.d. {{$datakontrak->jangka_waktu_akhir}}
        @endif</td>
      </tr>
      <tr style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">
        <td style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">14</td>
        <td style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">TANGGAL PENYELESAIAN PEKERJAAN</td>
        <td style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">@php echo $string = (is_null($datakontrak->tanggal_penyelesaian)) ? "-" : $datakontrak->tanggal_penyelesaian; @endphp</td>
      </tr>
      <tr style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">
        <td style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">15</td>
        <td style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">KETENTUAN SANKSI/DENDA</td>
        <td style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">@php echo $string = (is_null($datakontrak->ketentuan_sanksi)) ? "-" : $datakontrak->ketentuan_sanksi; @endphp</td>
      </tr>
      <tr style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">
        <td style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">16</td>
        <td style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">NOMOR POKOK WAJIB PAJAK</td>
        <td style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">@php echo $string = (is_null($datakontrak->npwp)) ? "-" : $datakontrak->npwp; @endphp</td>
      </tr>
      <tr style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">
        <td style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">17</td>
        <td style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">NOMOR REKENING BANK</td>
        <td style="border: 1px solid black;border-collapse: collapse;font-size: 15px;">@php echo $string = (is_null($datakontrak->no_rekening_perusahaan)) ? "-" : $datakontrak->no_rekening_perusahaan; @endphp</td>
      </tr>
    </table>
    <br>
    <br>
    <br>
    <table style="font-size:15px;" align="right">
      <tr>
        <td>Tigaraksa, {{ date('Y-m-d') }}</td>
      </tr>
      <tr>
        <td height="70">&nbsp;</td>
      </tr>
      <tr>
        <td>{{ $getPejabat[0]->nama_bidang}}</td>
      </tr>
      <tr>
        <td>{{ $getPejabat[0]->nama}}</td>
      </tr>
      <tr>
        <td>{{ $getPejabat[0]->nip_sapk}}</td>
      </tr>
    </table>

</html>
