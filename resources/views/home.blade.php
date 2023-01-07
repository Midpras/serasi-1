@extends('layouts.main')

@section('nama')
    <?php echo $nama->name; ?>
@endsection

@section('role')
    <?php echo $nama->role; ?>
@endsection

@section('container')
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col p-0">
                <h4>DASHBOARD</h4>
            </div>
            <div class="col p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
        @if ($nama->role == 'kepala')
            <div class="row page-titles">
                <div class="col p-0">
                    <h4>PERJANJIAN KINERJA</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg">
                    <?php foreach ($id_pk_prov as $id_pk) { ?>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-8">
                                    <h3>
                                        <?php
                                        $a = $id_pk->nama_pk_prov;
                                        echo $a;
                                        ?>
                                    </h3>
                                </div>
                                <div class="col-lg-4" style="text-align:right;">
                                    <a href="">
                                        <h6>Selengkapnya</h6>
                                    </a>
                                </div>
                            </div>
                            <?php for ($i = 0; $i < $count_data; $i++) { if ($data_iku[$i][0]['nama_pk_prov'] == $a){ ?>
                            <div class="card-body">
                                <h5>{{ $data_iku[$i][0]['nama_iku_prov'] }}</h5>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated
                                            <?php
                                            if ($data_iku[$i][0]['realisasi'] < 50) {
                                                echo 'bg-danger';
                                            } elseif ($data_iku[$i][0]['realisasi'] >= 50 && $data_iku[$i][0]['realisasi'] < 95) {
                                                echo 'bg-warning';
                                            } else {
                                                echo 'bg-success';
                                            }
                                            ?>"
                                        role="progressbar" style="width:{{ $data_iku[$i][0]['realisasi'] }}%;"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                        {{ number_format($data_iku[$i][0]['realisasi'], 2) }}%</div>
                                </div>
                            </div>
                            <?php }
                                }
                            ?>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="row page-titles">
                <div class="col p-0">
                    <h4>PERJANJIAN KINERJA SUPLEMEN</h4>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body bg-primary">
                            <div class="text-center">
                                <h2 class="m-t-15 text-white f-s-50">1250</h2><span
                                    class="text-white m-t-10 f-s-20">user</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body bg-success">
                            <div class="text-center">
                                <h2 class="m-t-15 text-white f-s-50">1250</h2><span
                                    class="text-white m-t-10 f-s-20">user</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body bg-warning">
                            <div class="text-center">
                                <h2 class="m-t-15 text-white f-s-50">1250</h2><span
                                    class="text-white m-t-10 f-s-20">user</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>
@endsection

@section('optionaljs')
    <!-- Chartjs chart -->
    <script src="{{ asset('assets/plugins/chartjs/Chart.bundle.js') }}"></script>
    <!-- Custom dashboard script -->
    <script src="{{ asset('assets/js/dashboard-1.js') }}"></script>
@endsection
