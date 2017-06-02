
<div id="sidebar"><a href="" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class=""><a href="{{route('dashboard.index')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
      @if (Auth::user()->level==1)
        <li class="submenu"> <a href="#"><i class="icon-tasks"></i> <span>Seleksi Kegiatan</span> </a>
          <ul>
            <li><a href="{{route('seleksi-kegiatan.index')}}">Lakukan Seleksi Kegiatan</a></li>
            <li><a href="{{route('seleksi-kegiatan.bidang')}}">Seleksi Kegiatan Per Bidang</a></li>
          </ul>
        </li>
        <li class="submenu"> <a href="#"><i class="icon icon-file"></i> <span>Verifikasi Dokumen</span> </a>
          <ul>
            <li><a href="{{route('verifikasi.index')}}">Lakukan Verifikasi Dokumen</a></li>
          </ul>
        </li>
        <li class="submenu"> <a href="#"><i class="icon icon-building"></i> <span>Manajemen Bidang</span> </a>
          <ul>
            <li><a href="{{route('bidang.index')}}">Lakukan Manajemen Bidang</a></li>
          </ul>
        </li>
        <li class="submenu {{ Route::is('kpa*') ? 'active' : '' }}"> <a href="#"><i class="icon icon-group"></i> <span>Manajemen KPA</span> </a>
          <ul>
            <li class="{{ Route::is('kpa.index') ? 'active' : '' }}"><a href="{{route('kpa.index')}}">Manajemen Master KPA</a></li>
            <li class="{{ Route::is('kpa.setkegiatan') ? 'active' : '' }}"><a href="{{route('kpa.setkegiatan')}}">Set KPA Kegiatan</a></li>
          </ul>
        </li>
        <li class="submenu"> <a href="#"><i class="icon icon-key"></i> <span>Manajemen PPTK</span> </a>
          <ul>
            <li><a href="{{route('pptk.index')}}">Manajemen Master PPTK</a></li>
            <li><a href="{{route('pptk.setkegiatan')}}">Set PPTK Kegiatan</a></li>
          </ul>
        </li>
        <li class="submenu"> <a href="#"><i class="icon icon-user"></i> <span>Manajemen Akun</span> </a>
          <ul>
            <li><a href="{{route('akun.index')}}">Lakukan Manajemen Akun</a></li>
          </ul>
        </li>
      @else
        <li class="submenu"> <a href="#"><i class="icon-flag"></i> <span>Daftar Kegiatan</span> </a>
          <ul>
            <li><a href="{{route('daftar-kegiatan.index')}}">Lihat Kegiatan Saya</a></li>
          </ul>
        </li>
        <li class="submenu"> <a href="#"><i class="icon-money"></i> <span>Pencairan Dana</span> </a>
          <ul>
            <li><a href="{{route('pencairan.index')}}">Lakukan Pencairan Dana</a></li>
          </ul>
        </li>
      @endif
  </ul>
</div>
