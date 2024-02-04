@extends('layout.main')
@section('isi-content')
    <div id="right-panel" class="right-panel">
        <div class="content">
            <div class="animated fadeIn">
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
                                                    class="count fw-bold fs-2">23569</span></div>
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
                                                    class="count fw-bold fs-2">23569</span></div>
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
                                                    class="count fw-bold fs-2">23569</span></div>
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
                                                    class="count fw-bold fs-2">23569</span></div>
                                            <div class="stat-heading fw-bold">Suara</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-4">
                        <div class="card" style="background-color: #efb2b2; border-radius: 25px;">
                            <div class="card-body">
                                <h4 class="box-title ms-3 fw-bold fs-2 text-dark">Perhitungan Suara*</h4>
                                <p class="ms-3">*Tiap Caleg</p>
                            </div>
                            <div class="card-body">
                                <div class="card-content">
                                    <canvas id="doughnutChart" width="400" height="425"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
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
        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var dgc = document.getElementById("doughnutChart").getContext("2d");
            dgc.height = 150;
            var myChart = new Chart(dgc, {
                type: "doughnut",
                data: {
                    datasets: [{
                        data: [83, 372, 75, 40],
                        backgroundColor: [
                            "rgb(0, 194, 146)", // Merah
                            "rgb(171, 140, 228)", // Kuning
                            "rgb(3, 169, 243)", // Hijau
                            "rgb(247, 118, 247)"
                        ],
                        hoverBackgroundColor: [
                            "rgba(0, 194, 146, 0.3)", // Merah
                            "rgba(171, 140, 228, 0.3)", // Kuning
                            "rgba(3, 169, 243, 0.3)", // Hijau
                            "rgba(247, 118, 247, 0.3)" // Hijau
                        ],
                    }, ],
                    labels: ["Caleg 1", "Caleg 2", "Caleg 3", "Caleg 4"],
                },
                options: {
                    responsive: true,
                },
            });

            var ctx = document.getElementById("barChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["TPS 1", "TPS 2", "TPS 3", "TPS 4", "TPS 5", "TPS 6", "TPS 7"],
                    datasets: [
                        {
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
