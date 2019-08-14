<div class="col-md-3 left_col">
    <div class="left_col scroll-view">

        <div class="navbar nav_title" style="border: 0;">
            <a href="{{ route('home') }}" class="site_title"><i class="fa fa-github-alt"></i> <span>SMS Gateway</span></a>
        </div>
        <div class="clearfix"></div>

        <!-- menu prile quick info -->
        <div class="profile">
            <div class="profile_pic">
                <img src="{{ asset('/images/bewok1.png') }}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Selamat Datang,</span>
                <h2 class="text-uppercase">{{ Auth::user()->name }}</h2>
            </div>
        </div>

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
                <h3>Menu Utama</h3>
                <ul class="nav side-menu">
                    <li><a href="{{ Route('home') }}"><i class="fa fa-home"></i> Home </a>
                    </li>
                    <li><a href="{{ Route('buatpesan') }}"><i class="fa fa-edit"></i> Tulis Pesan </a>
                    </li>
                    <li><a><i class="fa fa-envelope"></i> Kotak Masuk <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li><a href="{{ Route('inbox') }}">Semua Pesan</a>
                            </li>
                            <li><a href="{{ Route('kritik') }}">Kritik dan Saran</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="{{ Route('sentitem') }}"><i class="fa fa-paper-plane" aria-hidden="true"></i> Pesan Terkirim</a>
                    </li>
                    <li><a href="{{ Route('outbox') }}"><i class="fa fa-external-link"></i> Kotak Keluar </a>
                    </li>
                    @if(Auth::user()->level == 'admin')
                    <li><a><i class="fa fa-user-plus"></i> Pengguna<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li><a href="{{ Route('register') }}">Tambah Pengguna</a>
                            </li>
                            <li><a href="{{ Route('userdata') }}">Lihat Data</a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    <li><a><i class="fa fa-desktop"></i> Data Penduduk <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li><a href="{{ Route('penduduk.create') }}">Input Data</a>
                            </li>
                            <li><a href="{{ Route('penduduk.index') }}">Lihat Data</a>
                            </li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-group"></i> Layanan Surat <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li><a href="{{ Route('skck') }}">Surat pengantar SKCK</a>
                            </li>
                            <li><a href="{{ Route('domisili') }}">Surat keterangan domisili</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="menu_section">
                <h3>Laporan</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-file-text-o"></i> Data Surat <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li><a href="{{ Route('datapengantar') }}">Data Surat Pengantar</a>
                            </li>
                            <li><a href="{{ Route('dataketerangan') }}">Data Surat Keterangan</a>
                            </li>
                            <li><a href="{{ route('periode1') }}">Semua Surat</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="{{ route('periode2') }}"><i class="fa fa-warning"></i> Kritik dan Saran </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="sidebar-footer hidden-small">

            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();
               document.getElementById('logout-form').submit();"data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
    </div>
</div>
