<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Ule - Bootstrap Admin Dashboard HTML Template</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.ico') }}">
    <link href="{{ asset ('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset ('assets/css/icons.min.css') }}" rel="stylesheet">
    <script src="{{ asset ('assets/js/modernizr-3.6.0.min.js') }}"></script>
    {{-- sweet alert --}}
    <link href="{{ asset ('assets/plugins/sweetalert/css/sweetalert.css') }}" rel="stylesheet">
    {{-- <script src="{{asset('js/custom+mini-nav.js')}}"></script> --}}

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
                        <li class="icons"><a href="javascript:void(0)"><i class="mdi mdi-account f-s-20" aria-hidden="true"></i></a>
                            <div class="drop-down dropdown-profile animated bounceInDown">
                                <div class="dropdown-content-body">
                                    <ul>
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


                    <li class="nav-label">PIMPINAN</li>
                    <li><a href="/pk"><i class=" mdi mdi-book-variant-multiple"></i> <span class="nav-text">Perjanjian Kinerja</span></a>
                    </li>
                    <li><a href="/iku"><i class=" mdi mdi-book-open-outline"></i> <span class="nav-text">IKU</span></a>
                    </li>

                    <li class="nav-label">PEGAWAI</li>
                    <li><a href="/skp"><i class=" mdi mdi-book-open-page-variant-outline"></i> <span class="nav-text">SKP</span></a>
                    </li>
                    <li><a href="/iki"><i class=" mdi mdi-book-plus-outline"></i> <span class="nav-text">IKI</span></a>
                    </li>
                    <li><a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-book-settings"></i> <span class="nav-text">CKP</span></a>
                        <ul aria-expanded="false">
                            <li><a href="/ckp">Input CKP</a>
                            </li>
                            <li><a href="/penilaianckp">Penilaian CKP</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-label">UNDUH</li>
                    <li><a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-briefcase-download-outline"></i> <span class="nav-text">Unduh</span></a>
                        <ul aria-expanded="false">
                            <li><a href="/unduhckp">CKP</a>
                            </li>
                            <li><a href="/unduhskp">SKP</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-label">MASTER</li>
                    <li><a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-run-fast"></i> <span class="nav-text">Kegiatan</span></a>
                        <ul aria-expanded="false">
                            <li><a href="/keglvl1">Level 1</a>
                            </li>
                            <li><a href="/keglvl2">Level 2</a>
                            </li>
                            <li><a href="/keglvl3">Level 3</a>
                            </li>
                            <li><a href="/keglvl4">Level 4</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="/tim"><i class=" mdi mdi-account-group-outline"></i> <span class="nav-text">Tim Kerja</span></a>
                    </li>
                    <li><a href="/pengguna"><i class=" mdi mdi-account-multiple-plus-outline"></i> <span class="nav-text">Pengguna</span></a>
                    </li>
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
                <p>Copyright &copy; <a href="https://ule.merkulov.design">Ule</a> 2019, by <a href="https://1.envato.market/tf-merkulove" target="_blank">merkulove</a></p>
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