@extends('layout.main')
@section('isi-content')
    <style>
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
    <div id="right-panel" class="right-panel">
        <div class="content">
            <div class="animated fadeIn">
                @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                    </div>
                @elseif (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="card" style="background-color: #efb2b2; border-radius: 25px;">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="fa-solid fa-user-large mt-3"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <span>{{ $user[0]->name }}</span>
                                            <div class="stat-text"><i class="fa-solid fa-volume-high me-2 fs-3"></i><span
                                                    class="count fw-bold fs-2">{{ $userSatu }}</span></div>
                                            <div class="stat-heading fw-bold">Suara</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card" style="background-color: #efb2b2; border-radius: 25px;">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="fa-solid fa-user-large mt-3"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <span>{{ $user[1]->name }}</span>
                                            <div class="stat-text"><i class="fa-solid fa-volume-high me-2 fs-3"></i><span
                                                    class="count fw-bold fs-2">{{ $userDua }}</span></div>
                                            <div class="stat-heading fw-bold">Suara</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card" style="background-color: #efb2b2; border-radius: 25px;">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-3">
                                        <i class="fa-solid fa-user-large mt-3"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <span>{{ $user[2]->name }}</span>
                                            <div class="stat-text"><i class="fa-solid fa-volume-high me-2 fs-3"></i><span
                                                    class="count fw-bold fs-2">{{ $userTiga }}</span></div>
                                            <div class="stat-heading fw-bold">Suara</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card" style="background-color: #efb2b2; border-radius: 25px;">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="fa-solid fa-user-large mt-3"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <span>{{ $user[3]->name }}</span>
                                            <div class="stat-text"><i class="fa-solid fa-volume-high me-2 fs-3"></i><span
                                                    class="count fw-bold fs-2">{{ $userEmpat }}</span></div>
                                            <div class="stat-heading fw-bold">Suara</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <p class="fs-2 fw-bold mb-3 text-dark">HASIL PERHITUNGAN SUARA</p>

                <div class="card" style="background-color: #efb2b2; border-radius: 25px;">
                    <div class="card-body">
                        <h4 class="box-title ms-3 fw-bold fs-2 text-dark">Perhitungan Suara*</h4>
                        <p class="ms-3">*Tiap TPS</p>
                    </div>
                    <div class="card-body">
                        <div class="card-content">
                            <canvas id="barChart"></canvas>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var ctx = document.getElementById("barChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["TPS 1", "TPS 2", "TPS 3", "TPS 4", "TPS 5", "TPS 6", "TPS 7"],
                    datasets: [{
                            label: "Caleg 1",
                            data: [65, 59, 80, 81, 56, 55, 45],
                            borderColor: "rgb(0, 194, 146)",
                            borderWidth: "0",
                            backgroundColor: "rgb(0, 194, 146)"
                        },
                        {
                            label: "Caleg 2",
                            data: [28, 48, 40, 19, 86, 27, 76],
                            borderColor: "rgb(171, 140, 228)",
                            borderWidth: "0",
                            backgroundColor: "rgb(171, 140, 228)"
                        },
                        {
                            label: "Caleg 3",
                            data: [69, 50, 8, 80, 56, 53, 40],
                            borderColor: "rgb(3, 169, 243)",
                            borderWidth: "0",
                            backgroundColor: "rgb(3, 169, 243)"
                        },
                        {
                            label: "Caleg 4",
                            data: [28, 48, 40, 19, 86, 27, 76],
                            borderColor: "rgb(247, 118, 247)",
                            borderWidth: "0",
                            backgroundColor: "rgb(247, 118, 247)"
                        }
                    ]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        });
    </script>
@endsection
