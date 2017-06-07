<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>

    <link rel="stylesheet" href="{{asset('theme/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('theme/css/bootstrap-responsive.min.css')}}" />
    <link rel="stylesheet" href="{{asset('theme/css/fullcalendar.css')}}" />
    <link rel="stylesheet" href="{{asset('theme/css/matrix-style.css')}}" />
    <link rel="stylesheet" href="{{asset('theme/css/matrix-media.css')}}" />
    <link href="{{asset('theme/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
  </head>
  <body>

    <table cellpadding="5" style="margin-top:5px;">
      <tr>
        <table>
          <tr>
            <td>
              <h4 class="alert-heading">Resume Kontrak</h4>
              <hr style="margin:5px 0px 10px 0px; border-top-color:#9fd5dc;">
              Berikut adalah resume kontrak untuk pencairan dana:
            </td>
          </tr>
        </table>
      </tr>
      <tr>
        <td>Nomor & Tanggal DPA</td>
        <td>: &nbsp;&nbsp;
          <span class="kontrak_label">
            @php echo $string = (is_null($datakontrak)) ? "-" : $datakontrak->no_dpa; @endphp |
            @php echo $string = (is_null($datakontrak)) ? "-" : $datakontrak->tanggal_dpa; @endphp
          </span>

          <span class="kontrak_control">
            <input type="hidden" name="id_item" value="{{$id_item}}" id="id_item">
            <input type="text" name="no_dpa" placeholder="Nomor DPA" id="no_dpa"> --
            <input type="text" name="tanggal_dpa" placeholder="Tanggal Kontrak" id="tanggal_kontrak" data-date-format="yyyy-mm-dd" class="datepicker">
          </span>
        </td>
      </tr>
      <tr>
        <td>Nomor & Tanggal Kontrak</td>
        <td>: &nbsp;&nbsp;
          <span class="kontrak_label">
            @php echo $string = (is_null($datakontrak)) ? "-" : $datakontrak->no_kontrak; @endphp |
            @php echo $string = (is_null($datakontrak)) ? "-" : $datakontrak->tanggal_kontrak; @endphp
          </span>

          <span class="kontrak_control">
            <input type="text" name="no_kontrak" placeholder="Nomor Kontrak" id="no_kontrak"> --
            <input type="text" name="tanggal_kontrak" placeholder="Tanggal Kontrak" id="tanggal_dpa" data-date-format="yyyy-mm-dd" class="datepicker">
          </span>
        </td>
      </tr>
      <tr>
        <td>Nama Perusahaan</td>
        <td>: &nbsp;&nbsp;
          <span class="kontrak_label">
            @php echo $string = (is_null($datakontrak)) ? "-" : $datakontrak->nama_perusahaan; @endphp
          </span>

          <span class="kontrak_control">
            <input type="text" name="nama_perusahaan" placeholder="Nama Perusahaan" id="nama_perusahaan">
          </span>
        </td>
      </tr>
      <tr>
        <td>Alamat Perusahaan</td>
        <td>: &nbsp;&nbsp;
          <span class="kontrak_label">
            @php echo $string = (is_null($datakontrak)) ? "-" : $datakontrak->alamat_perusahaan; @endphp
          </span>

          <span class="kontrak_control">
            <input type="text" name="alamat_perusahaan" placeholder="Alamat Perusahaan" id="alamat_perusahaan">
          </span>
        </td>
      </tr>
      <tr>
        <td>Nilai SPK / Kontrak</td>
        <td>: &nbsp;&nbsp;
          <span class="kontrak_label">
            @php echo "Rp ".$string = (is_null($datakontrak)) ? "-" : number_format($datakontrak->nilai_kontrak, '0', ',', '.').",-"; @endphp
          </span>

          <span class="kontrak_control">
            <input type="text" name="nilai_kontrak" placeholder="Nilai Kontrak" id="nilai_kontrak">
          </span>
        </td>
      </tr>
      <tr>
        <td>Nomor & Tanggal BA. Kemajuan Pekerjaan</td>
        <td>: &nbsp;&nbsp;
          <span class="kontrak_label">
            @php echo $string = (is_null($datakontrak)) ? "-" : $datakontrak->no_ba_kemajuan; @endphp |
            @php echo $string = (is_null($datakontrak)) ? "-" : $datakontrak->tanggal_ba_kemajuan; @endphp
          </span>

          <span class="kontrak_control">
            <input type="text" name="no_ba_kemajuan" placeholder="Nomor BA Kemajuan" id="no_ba_kemajuan"> --
            <input type="text" name="tanggal_ba_kemajuan" placeholder="Tanggal BA Kemajuan" id="tanggal_ba_kemajuan" data-date-format="yyyy-mm-dd" class="datepicker">
          </span>
        </td>
      </tr>
      <tr>
        <td>Nomor & Tanggal BA. Pembayaran</td>
        <td>: &nbsp;&nbsp;
          <span class="kontrak_label">
            @php echo $string = (is_null($datakontrak)) ? "-" : $datakontrak->no_ba_pembayaran; @endphp |
            @php echo $string = (is_null($datakontrak)) ? "-" : $datakontrak->tanggal_ba_pembayaran; @endphp
          </span>

          <span class="kontrak_control">
            <input type="text" name="no_ba_pembayaran" placeholder="Nomor BA Pembayaran" id="no_ba_pembayaran"> --
            <input type="text" name="tanggal_ba_pembayaran" placeholder="Tanggal BA Pembayaran" id="tanggal_ba_pembayaran" data-date-format="yyyy-mm-dd" class="datepicker">
          </span>
        </td>
      </tr>
      <tr>
        <td>Nomor & Tanggal BA. Penyelesaian Hasil Pekerjaan</td>
        <td>: &nbsp;&nbsp;
          <span class="kontrak_label">
            @php echo $string = (is_null($datakontrak)) ? "-" : $datakontrak->no_ba_penyelesaian; @endphp |
            @php echo $string = (is_null($datakontrak)) ? "-" : $datakontrak->tanggal_ba_penyelesaian; @endphp
          </span>

          <span class="kontrak_control">
            <input type="text" name="no_ba_penyelesaian" placeholder="Nomor BA Penyelesaian" id="no_ba_penyelesaian"> --
            <input type="text" name="tanggal_ba_penyelesaian" placeholder="Tanggal BA Penyelesaian" id="tanggal_ba_penyelesaian" data-date-format="yyyy-mm-dd" class="datepicker">
          </span>
        </td>
      </tr>
      <tr>
        <td>Nomor & Tanggal BA. Serah Terima Pekerjaan</td>
        <td>: &nbsp;&nbsp;
          <span class="kontrak_label">
            @php echo $string = (is_null($datakontrak)) ? "-" : $datakontrak->no_ba_serah_terima; @endphp |
            @php echo $string = (is_null($datakontrak)) ? "-" : $datakontrak->tanggal_ba_serah_terima; @endphp
          </span>

          <span class="kontrak_control">
            <input type="text" name="no_ba_serah_terima" placeholder="Nomor BA Serah Terima" id="no_ba_serah_terima"> --
            <input type="text" name="tanggal_ba_serah_terima" placeholder="Tanggal BA Serah Terima" id="tanggal_ba_serah_terima" data-date-format="yyyy-mm-dd" class="datepicker">
          </span>
        </td>
      </tr>
      <tr>
        <td>Uraian & Volume Kegiatan</td>
        <td>: &nbsp;&nbsp;
          <span class="kontrak_label">
            @php echo $string = (is_null($datakontrak)) ? "-" : $datakontrak->uraian_volume; @endphp
          </span>

          <span class="kontrak_control">
            <input type="text" name="uraian_volume" placeholder="Uraian" id="uraian_volume">
          </span>
        </td>
      </tr>
      <tr>
        <td>Cara Pembayaran</td>
        <td>: &nbsp;&nbsp;
          <span class="kontrak_label">
            @php echo $string = (is_null($datakontrak)) ? "-" : $datakontrak->cara_pembayaran; @endphp
          </span>

          <span class="kontrak_control">
            <input type="text" name="cara_pembayaran" placeholder="Cara Pembayaran" id="cara_pembayaran">
          </span>
        </td>
      </tr>
      <tr>
        <td>Jangka Waktu</td>
        <td>: &nbsp;&nbsp;
          <span class="kontrak_label">
            @if ($daysjangkawaktu==-1)
              -
            @else
              {{$daysjangkawaktu}} hari kalendar terhitung mulai tanggal {{$datakontrak->jangka_waktu_awal}} s.d. {{$datakontrak->jangka_waktu_akhir}}.
            @endif
          </span>

          <span class="kontrak_control">
            <input type="text" name="jangka_waktu_awal" placeholder="Awal" id="jangka_waktu_awal" data-date-format="yyyy-mm-dd" class="datepicker"> --
            <input type="text" name="jangka_waktu_akhir" placeholder="Akhir" id="jangka_waktu_akhir" data-date-format="yyyy-mm-dd" class="datepicker">
          </span>
        </td>
      </tr>
      <tr>
        <td>Tanggal Penyelesaian Pekerjaan</td>
        <td>: &nbsp;&nbsp;
          <span class="kontrak_label">
            @php echo $string = (is_null($datakontrak)) ? "-" : $datakontrak->tanggal_penyelesaian; @endphp
          </span>

          <span class="kontrak_control">
            <input type="text" name="tanggal_penyelesaian" placeholder="Tanggal Penyelesaian" id="tanggal_penyelesaian" data-date-format="yyyy-mm-dd" class="datepicker">
          </span>
        </td>
      </tr>
      <tr>
        <td>Ketentuan Sanksi / Denda</td>
        <td>: &nbsp;&nbsp;
          <span class="kontrak_label">
            @php echo $string = (is_null($datakontrak)) ? "-" : $datakontrak->ketentuan_sanksi; @endphp
          </span>

          <span class="kontrak_control">
            <input type="text" name="ketentuan_sanksi" placeholder="Ketentuan Sanksi" id="ketentuan_sanksi">
          </span>
        </td>
      </tr>
      <tr>
        <td>Nomor Pokok Wajib Pajak (NPWP)</td>
        <td>: &nbsp;&nbsp;
          <span class="kontrak_label">
            @php echo $string = (is_null($datakontrak)) ? "-" : $datakontrak->npwp; @endphp
          </span>

          <span class="kontrak_control">
            <input type="text" name="npwp" placeholder="NPWP" id="npwp">
          </span>
        </td>
      </tr>
      <tr>
        <td>Nomor Rekening BANK</td>
        <td>: &nbsp;&nbsp;
          <span class="kontrak_label">
            @php echo $string = (is_null($datakontrak)) ? "-" : $datakontrak->no_rekening_perusahaan; @endphp
          </span>

          <span class="kontrak_control">
            <input type="text" name="no_rekening_perusahaan" placeholder="No Rekening Perusahaan" id="no_rekening_perusahaan">
          </span>
        </td>
      </tr>
    </table>
  </body>
</html>
