<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SERASI - BPS PROVINSI NTT</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.ico') }}">
    <link href="{{ asset ('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset ('assets/css/icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset ('assets/plugins/select2/select2.min.css') }}" rel="stylesheet">
    <script src="{{ asset ('assets/js/modernizr-3.6.0.min.js') }}"></script>
    <link href="{{ asset ('assets/icons/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link  src="{{asset('assets/plugins/sweetalert/css/sweetalert.css')}}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.2/index.global.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @yield('optionalplugins')
</head>

<body class="v-light vertical-nav fix-header fix-sidebar">
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    @include('sweetalert::alert')
    <div id="main-wrapper">
        <!-- header -->
        <div class="header">
            <div class="nav-header">
                <div class="brand-logo"><a href="/"><span class="brand-title"><img src="{{ asset('assets/images/logo-serasi.png') }}" alt=""></span></a>
                </div>
                <div class="nav-control">
                    <div class="hamburger"><span class="line"></span> <span class="line"></span> <span class="line"></span>
                    </div>
                </div>
            </div>
            <div class="header-content">
                <div class="header-right">
                    <ul>
                        <li class="icons"><a href="javascript:void(0)"><i class="mdi mdi-account f-s-20" aria-hidden="true"></i><span> @yield('nama') </span></a>
                            <div class="drop-down dropdown-profile animated bounceInDown">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <span>@yield('role')</span>
                                        </li>
                                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
		                                    document.getElementById('logout-form').submit();" class="dropdown-item notify-item">
                                                <i class="icon-power"></i> <span>Logout</span></a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #/ header -->
        <!-- sidebar -->
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">BERANDA</li>
                    <li><a href="/"><i class=" mdi mdi-view-dashboard"></i> <span class="nav-text">Dashboard</span></a>
                    </li>

                    @can('kepala')
                    <li class="nav-label">PIMPINAN</li>
                    <li><a href="/pk"><i class=" mdi mdi-book-variant-multiple"></i> <span class="nav-text">Perjanjian Kinerja</span></a>
                    </li>
                    <li><a href="/iku"><i class=" mdi mdi-book-open-outline"></i> <span class="nav-text">IKU</span></a>
                    </li>
                    @endcan

                    <li class="nav-label">PEGAWAI</li>
                    <li><a href="/skp"><i class=" mdi mdi-book-open-page-variant-outline"></i> <span class="nav-text">SKP</span></a>
                    </li>
                    <li><a href="/iki"><i class=" mdi mdi-book-plus-outline"></i> <span class="nav-text">IKI</span></a>
                    </li>
                    <li><a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-book-settings"></i> <span class="nav-text">CKP</span></a>
                        <ul aria-expanded="false">
                            <li><a href="/ckp">Input CKP</a>
                            </li>
                            @can('ketua')
                            <li><a href="/penilaianckp">Penilaian CKP</a>
                            </li>
                            @endcan
                        </ul>
                    </li>
                    <li><a href={{route('laporan.index')}}><i class=" mdi mdi-book-clock-outline"></i> <span class="nav-text">Laporan Harian</span></a>
                    </li>

                    <li class="nav-label">UNDUH</li>
                    <li><a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-briefcase-download-outline"></i> <span class="nav-text">Unduh</span></a>
                        <ul aria-expanded="false">
                            <li><a href="/download">CKP</a>
                            </li>
                        </ul>
                    </li>
     
                    @can('admin')
                    <li class="nav-label">MASTER</li>
                    <li><a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-run-fast"></i> <span class="nav-text">Kegiatan</span></a>
                        <ul aria-expanded="false">
                            <li><a href={{route('level1.index')}}>Kegiatan</a>
                            </li>
                            <li><a href={{route('level2.index')}}>Sub Kegiatan</a>
                            </li>
                            <li><a href={{route('level3.index')}}>Rincian Kegiatan</a>
                            </li>
                            <li><a href="{{route('kegiatan.index')}}">Kegiatan CKP</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href={{route('tim.index')}}><i class=" mdi mdi-account-group-outline"></i> <span class="nav-text">Tim Kerja</span></a>
                    </li>
                    <li><a href={{route('users.index')}}><i class=" mdi mdi-account-multiple-plus-outline"></i> <span class="nav-text">Pengguna</span></a>
                    </li>
                    @endcan
                </ul>
            </div>
            <!-- #/ nk nav scroll -->
        </div>
        <!-- #/ sidebar -->
        <!-- content body -->
        <div class="content-body">
            @yield('container')
            <!-- #/ container -->
        </div>
        <!-- #/ content body -->
        <!-- footer -->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; BPS Provinsi NTT 2022</p>
            </div>
        </div>
        <!-- #/ footer -->
    </div>
    <!-- Common JS -->
    <script src="{{ asset('assets/plugins/common/common.min.js') }}"></script>
    <!-- Custom script -->
    <script src="{{ asset('assets/js/custom.min.js ') }}"></script>

    @yield('optionaljs')
</body>

</html>