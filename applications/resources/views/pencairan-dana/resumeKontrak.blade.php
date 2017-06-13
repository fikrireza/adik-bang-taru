<html>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <style>
      table {
          border-collapse: collapse;
      }

      table, td, th {
          border: 1px solid black;
          font-size: 15px;
      }
    </style>

    <h2 style="font-size:18px;" class="text-center">Resume Kontrak</h2>
    <br>
    <hr>
    <table border="1px" class="table table-bordered" style="font-size:15px;">
      <tr>
        <td>1</td>
        <td>NOMOR DAN TANGGAL DPA SKPD</td>
        <td>No. DPA @php echo $string = (is_null($datakontrak->no_dpa)) ? "-" : $datakontrak->no_dpa; @endphp
            <br>
            Tgl. DPA @php echo $string = (is_null($datakontrak->tanggal_dpa)) ? "-" : $datakontrak->tanggal_dpa; @endphp</td>
      </tr>
      <tr>
        <td>2</td>
        <td>KODE KEGIATAN / SUB KEGIATAN</td>
        <td></td>
      </tr>
      <tr>
        <td>3</td>
        <td>NO DAN TANGGAL KONTRAK</td>
        <td>No. Kontrak @php echo $string = (is_null($datakontrak->no_kontrak)) ? "-" : $datakontrak->no_kontrak; @endphp
          <br>
          Tgl. Kontrak @php echo $string = (is_null($datakontrak->tanggal_kontrak)) ? "-" : $datakontrak->tanggal_kontrak; @endphp</td>
      </tr>
      <tr>
        <td>4</td>
        <td>NAMA PERUSAHAAN</td>
        <td>@php echo $string = (is_null($datakontrak->nama_perusahaan)) ? "-" : $datakontrak->nama_perusahaan; @endphp</td>
      </tr>
      <tr>
        <td>5</td>
        <td>ALAMAT PERUSAHAAN</td>
        <td>@php echo $string = (is_null($datakontrak->alamat_perusahaan)) ? "-" : $datakontrak->alamat_perusahaan; @endphp</td>
      </tr>
      <tr>
        <td>6</td>
        <td>NILAI SPK/KONTRAK</td>
        <td>@php echo "Rp ".$string = (is_null($datakontrak->nilai_kontrak)) ? "-" : number_format($datakontrak->nilai_kontrak, '0', ',', '.').",-"; @endphp</td>
      </tr>
      <tr>
        <td>7</td>
        <td>NO & TANGGAL BA. KEMAJUAN PEKERJAAN</td>
        <td>No. @php echo $string = (is_null($datakontrak->no_ba_kemajuan)) ? "-" : $datakontrak->no_ba_kemajuan; @endphp <br>
        Tgl. Kemajuan Kerja @php echo $string = (is_null($datakontrak->tanggal_ba_kemajuan)) ? "-" : $datakontrak->tanggal_ba_kemajuan; @endphp</td>
      </tr>
      <tr>
        <td>8</td>
        <td>NO & TANGGAL BA. PEMBAYARAN</td>
        <td>No. @php echo $string = (is_null($datakontrak->no_ba_pembayaran)) ? "-" : $datakontrak->no_ba_pembayaran; @endphp <br>
        Tgl. Pembayaran @php echo $string = (is_null($datakontrak->tanggal_ba_pembayaran)) ? "-" : $datakontrak->tanggal_ba_pembayaran; @endphp</td>
      </tr>
      <tr>
        <td>9</td>
        <td>NO & TANGGAL BA. PENYELESAIAN HASIL PEKERJAAN</td>
        <td>No. @php echo $string = (is_null($datakontrak->no_ba_penyelesaian)) ? "-" : $datakontrak->no_ba_penyelesaian; @endphp <br>
        Tgl. Penyelesaian Hasil @php echo $string = (is_null($datakontrak->tanggal_ba_penyelesaian)) ? "-" : $datakontrak->tanggal_ba_penyelesaian; @endphp</td>
      </tr>
      <tr>
        <td>10</td>
        <td>NO & TANGGAL BA. SERAH TERIMA PEKERJAAN</td>
        <td>No. @php echo $string = (is_null($datakontrak->no_ba_serah_terima)) ? "-" : $datakontrak->no_ba_serah_terima; @endphp <br>
        Tgl. Serah Terima @php echo $string = (is_null($datakontrak->tanggal_ba_serah_terima)) ? "-" : $datakontrak->tanggal_ba_serah_terima; @endphp</td>
      </tr>
      <tr>
        <td>11</td>
        <td>URAIAN DAN VOLUME KEGIATAN</td>
        <td>@php echo $string = (is_null($datakontrak->uraian_volume)) ? "-" : $datakontrak->uraian_volume; @endphp</td>
      </tr>
      <tr>
        <td>12</td>
        <td>CARA PEMBAYARAN</td>
        <td>@php echo $string = (is_null($datakontrak->cara_pembayaran)) ? "-" : $datakontrak->cara_pembayaran; @endphp</td>
      </tr>
      <tr>
        <td>13</td>
        <td>JANGKA WAKTU</td>
        <td>@if ($daysjangkawaktu==-1)
          -
        @else
          {{$daysjangkawaktu}} hari kalendar terhitung mulai tanggal {{$datakontrak->jangka_waktu_awal}} s.d. {{$datakontrak->jangka_waktu_akhir}}.
        @endif</td>
      </tr>
      <tr>
        <td>14</td>
        <td>TANGGAL PENYELESAIAN PEKERJAAN</td>
        <td>@php echo $string = (is_null($datakontrak->tanggal_penyelesaian)) ? "-" : $datakontrak->tanggal_penyelesaian; @endphp</td>
      </tr>
      <tr>
        <td>15</td>
        <td>KETENTUAN SANKSI/DENDA</td>
        <td>@php echo $string = (is_null($datakontrak->ketentuan_sanksi)) ? "-" : $datakontrak->ketentuan_sanksi; @endphp</td>
      </tr>
      <tr>
        <td>16</td>
        <td>NOMOR POKOK WAJIB PAJAK</td>
        <td>@php echo $string = (is_null($datakontrak->npwp)) ? "-" : $datakontrak->npwp; @endphp</td>
      </tr>
      <tr>
        <td>17</td>
        <td>NOMOR REKENING BANK</td>
        <td>@php echo $string = (is_null($datakontrak->no_rekening_perusahaan)) ? "-" : $datakontrak->no_rekening_perusahaan; @endphp</td>
      </tr>
    </table>

</html>
