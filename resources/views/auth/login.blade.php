<!DOCTYPE html>
<html lang="en" class="h-100" id="login-page1">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Ule - Bootstrap Admin Dashboard HTML Template</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/assets/images/favicon.png') }}">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/js/modernizr-3.6.0.min.js') }}"></script>
</head>

<body class="h-100">
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <div class="login-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card">
                            <div class="card-body">
                                <div class="logo text-center">
                                    <a href="index.html">
                                        <img src="{{ asset('assets/images/logo-serasi.png') }}" alt="">
                                    </a>
                                </div>
                                <form class="m-t-30 m-b-30" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <h3>NIP (16 digit)</h3>
                                        <input class="form-control" type="text" name="nip" id="nip" required="" placeholder="nip" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <h3>Password</h3>
                                        <input class="form-control" type="password" required="" name="password" id="password" placeholder="Enter your password">
                                    </div>
                                    <div class="text-center m-b-15 m-t-15">
                                        <button type="submit" class="btn btn-primary">Sign in</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
    <!-- Common JS -->
    <script src="{{asset('assets/plugins/common/common.min.js') }}"></script>
    <!-- Custom script -->
    <script src="{{asset('assets/js/custom.min.js') }}"></script>
</body>

</html>