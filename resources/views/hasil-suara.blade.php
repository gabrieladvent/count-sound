@extends('layout.main')
@section('isi-content')
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
                                            <span>{{ $users[0]->name }}</span>
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
                                            <span>{{ $users[1]->name }}</span>
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
                                            <span>{{ $users[2]->name }}</span>
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
                                            <span>{{ $users[3]->name }}</span>
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
                        <p class="ms-3">*Tiap Kecamatan</p>
                    </div>
                    <div class="card-body">
                        <div class="card-content">
                            <canvas id="barChart"></canvas>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col me-3 py-3" style="border-radius: 15px; background-color: #efb2b2">
                        <div class="row">
                            <div class="col mb-3">
                                <span class="fs-4 fw-bold text-dark">{{ $users[0]->name }}</span> <br>
                                <div class="tabel-content mt-2">
                                    <div class="content-kecamatan mt-3">
                                        <span class="fs-6 text-secondary">{{ $kecamatans[0]->nama_kecamatan }}</span>
                                        <table cellpadding="">
                                            <thead>
                                                <th>Desa</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($kecamatans[0]->desa as $desa)
                                                    <tr>
                                                        <td>{{ $desa->nama_desa }}</td>
                                                        @for ($i = 1; $i <= $desa->jumlah_tps; $i++)
                                                            @php
                                                                $suaraTPS = $suara
                                                                    ->where('id_desa', $desa->id)
                                                                    ->where('id_tps', $i)
                                                                    ->where('id_user', 1)
                                                                    ->first();
                                                            @endphp
                                                            <td>
                                                                <input type="number" style="width:100%;"
                                                                    placeholder="tps {{ $i }}"
                                                                    value="{{ $suaraTPS ? $suaraTPS->jumlah_suara : '' }}"
                                                                    readonly>
                                                            </td>
                                                        @endfor
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>


                                    <div class="content-kecamatan mt-3">
                                        <span class="fs-6 text-secondary">{{ $kecamatans[1]->nama_kecamatan }}</span>
                                        <table cellpadding="">
                                            <thead>
                                                <th>Desa</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($kecamatans[1]->desa as $desa)
                                                    <tr>
                                                        <td>{{ $desa->nama_desa }}</td>
                                                        @for ($i = 1; $i <= $desa->jumlah_tps; $i++)
                                                            @php
                                                                $suaraTPS = $suara
                                                                    ->where('id_desa', $desa->id)
                                                                    ->where('id_tps', $i)
                                                                    ->where('id_user', 1)
                                                                    ->first();
                                                            @endphp
                                                            <td>
                                                                <input type="number" style="width:100%;"
                                                                    placeholder="tps {{ $i }}"
                                                                    value="{{ $suaraTPS ? $suaraTPS->jumlah_suara : '' }}"
                                                                    readonly>
                                                            </td>
                                                        @endfor
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="content-kecamatan mt-3">
                                        <span class="fs-6 text-secondary">{{ $kecamatans[2]->nama_kecamatan }}</span>
                                        <table cellpadding="">
                                            <thead>
                                                <th>Desa</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($kecamatans[2]->desa as $desa)
                                                    <tr>
                                                        <td>{{ $desa->nama_desa }}</td>
                                                        @for ($i = 1; $i <= $desa->jumlah_tps; $i++)
                                                            @php
                                                                $suaraTPS = $suara
                                                                    ->where('id_desa', $desa->id)
                                                                    ->where('id_tps', $i)
                                                                    ->where('id_user', 1)
                                                                    ->first();
                                                            @endphp
                                                            <td>
                                                                <input type="number" style="width:100%;"
                                                                    placeholder="tps {{ $i }}"
                                                                    value="{{ $suaraTPS ? $suaraTPS->jumlah_suara : '' }}"
                                                                    readonly>
                                                            </td>
                                                        @endfor
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col me-3 py-3" style="border-radius: 15px; background-color: #efb2b2">
                        <div class="row">
                            <div class="col mb-3">
                                <span class="fs-4 fw-bold text-dark">{{ $users[1]->name }}</span> <br>
                                <div class="tabel-content mt-2">
                                    <div class="content-kecamatan mt-3">
                                        <span class="fs-6 text-secondary">{{ $kecamatans[0]->nama_kecamatan }}</span>
                                        <table cellpadding="">
                                            <thead>
                                                <th>Desa</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($kecamatans[0]->desa as $desa)
                                                    <tr>
                                                        <td>{{ $desa->nama_desa }}</td>
                                                        @for ($i = 1; $i <= $desa->jumlah_tps; $i++)
                                                            @php
                                                                $suaraTPS = $suara
                                                                    ->where('id_desa', $desa->id)
                                                                    ->where('id_tps', $i)
                                                                    ->where('id_user', 2)
                                                                    ->first();
                                                            @endphp
                                                            <td>
                                                                <input type="number" style="width:100%;"
                                                                    placeholder="tps {{ $i }}"
                                                                    value="{{ $suaraTPS ? $suaraTPS->jumlah_suara : '' }}"
                                                                    readonly>
                                                            </td>
                                                        @endfor
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>


                                    <div class="content-kecamatan mt-3">
                                        <span class="fs-6 text-secondary">{{ $kecamatans[1]->nama_kecamatan }}</span>
                                        <table cellpadding="">
                                            <thead>
                                                <th>Desa</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($kecamatans[1]->desa as $desa)
                                                    <tr>
                                                        <td>{{ $desa->nama_desa }}</td>
                                                        @for ($i = 1; $i <= $desa->jumlah_tps; $i++)
                                                            @php
                                                                $suaraTPS = $suara
                                                                    ->where('id_desa', $desa->id)
                                                                    ->where('id_tps', $i)
                                                                    ->where('id_user', 2)
                                                                    ->first();
                                                            @endphp
                                                            <td>
                                                                <input type="number" style="width:100%;"
                                                                    placeholder="tps {{ $i }}"
                                                                    value="{{ $suaraTPS ? $suaraTPS->jumlah_suara : '' }}"
                                                                    readonly>
                                                            </td>
                                                        @endfor
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="content-kecamatan mt-3">
                                        <span class="fs-6 text-secondary">{{ $kecamatans[2]->nama_kecamatan }}</span>
                                        <table cellpadding="">
                                            <thead>
                                                <th>Desa</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($kecamatans[2]->desa as $desa)
                                                    <tr>
                                                        <td>{{ $desa->nama_desa }}</td>
                                                        @for ($i = 1; $i <= $desa->jumlah_tps; $i++)
                                                            @php
                                                                $suaraTPS = $suara
                                                                    ->where('id_desa', $desa->id)
                                                                    ->where('id_tps', $i)
                                                                    ->where('id_user', 2)
                                                                    ->first();
                                                            @endphp
                                                            <td>
                                                                <input type="number" style="width:100%;"
                                                                    placeholder="tps {{ $i }}"
                                                                    value="{{ $suaraTPS ? $suaraTPS->jumlah_suara : '' }}"
                                                                    readonly>
                                                            </td>
                                                        @endfor
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col me-3 py-3" style="border-radius: 15px; background-color: #efb2b2">
                        <div class="row">
                            <div class="col mb-3">
                                <span class="fs-4 fw-bold text-dark">{{ $users[2]->name }}</span> <br>
                                <div class="tabel-content mt-2">
                                    <div class="content-kecamatan mt-3">
                                        <span class="fs-6 text-secondary">{{ $kecamatans[0]->nama_kecamatan }}</span>
                                        <table cellpadding="">
                                            <thead>
                                                <th>Desa</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($kecamatans[0]->desa as $desa)
                                                    <tr>
                                                        <td>{{ $desa->nama_desa }}</td>
                                                        @for ($i = 1; $i <= $desa->jumlah_tps; $i++)
                                                            @php
                                                                $suaraTPS = $suara
                                                                    ->where('id_desa', $desa->id)
                                                                    ->where('id_tps', $i)
                                                                    ->where('id_user', 3)
                                                                    ->first();
                                                            @endphp
                                                            <td>
                                                                <input type="number" style="width:100%;"
                                                                    placeholder="tps {{ $i }}"
                                                                    value="{{ $suaraTPS ? $suaraTPS->jumlah_suara : '' }}"
                                                                    readonly>
                                                            </td>
                                                        @endfor
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>


                                    <div class="content-kecamatan mt-3">
                                        <span class="fs-6 text-secondary">{{ $kecamatans[1]->nama_kecamatan }}</span>
                                        <table cellpadding="">
                                            <thead>
                                                <th>Desa</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($kecamatans[1]->desa as $desa)
                                                    <tr>
                                                        <td>{{ $desa->nama_desa }}</td>
                                                        @for ($i = 1; $i <= $desa->jumlah_tps; $i++)
                                                            @php
                                                                $suaraTPS = $suara
                                                                    ->where('id_desa', $desa->id)
                                                                    ->where('id_tps', $i)
                                                                    ->where('id_user', 3)
                                                                    ->first();
                                                            @endphp
                                                            <td>
                                                                <input type="number" style="width:100%;"
                                                                    placeholder="tps {{ $i }}"
                                                                    value="{{ $suaraTPS ? $suaraTPS->jumlah_suara : '' }}"
                                                                    readonly>
                                                            </td>
                                                        @endfor
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="content-kecamatan mt-3">
                                        <span class="fs-6 text-secondary">{{ $kecamatans[2]->nama_kecamatan }}</span>
                                        <table cellpadding="">
                                            <thead>
                                                <th>Desa</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($kecamatans[2]->desa as $desa)
                                                    <tr>
                                                        <td>{{ $desa->nama_desa }}</td>
                                                        @for ($i = 1; $i <= $desa->jumlah_tps; $i++)
                                                            @php
                                                                $suaraTPS = $suara
                                                                    ->where('id_desa', $desa->id)
                                                                    ->where('id_tps', $i)
                                                                    ->where('id_user', 3)
                                                                    ->first();
                                                            @endphp
                                                            <td>
                                                                <input type="number" style="width:100%;"
                                                                    placeholder="tps {{ $i }}"
                                                                    value="{{ $suaraTPS ? $suaraTPS->jumlah_suara : '' }}"
                                                                    readonly>
                                                            </td>
                                                        @endfor
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col me-3 py-3" style="border-radius: 15px; background-color: #efb2b2">
                        <div class="row">
                            <div class="col mb-3">
                                <span class="fs-4 fw-bold text-dark">{{ $users[3]->name }}</span> <br>
                                <div class="tabel-content mt-2">
                                    <div class="content-kecamatan mt-3">
                                        <span class="fs-6 text-secondary">{{ $kecamatans[0]->nama_kecamatan }}</span>
                                        <table cellpadding="">
                                            <thead>
                                                <th>Desa</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($kecamatans[0]->desa as $desa)
                                                    <tr>
                                                        <td>{{ $desa->nama_desa }}</td>
                                                        @for ($i = 1; $i <= $desa->jumlah_tps; $i++)
                                                            @php
                                                                $suaraTPS = $suara
                                                                    ->where('id_desa', $desa->id)
                                                                    ->where('id_tps', $i)
                                                                    ->where('id_user', 4)
                                                                    ->first();
                                                            @endphp
                                                            <td>
                                                                <input type="number" style="width:100%;"
                                                                    placeholder="tps {{ $i }}"
                                                                    value="{{ $suaraTPS ? $suaraTPS->jumlah_suara : '' }}"
                                                                    readonly>
                                                            </td>
                                                        @endfor
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>


                                    <div class="content-kecamatan mt-3">
                                        <span class="fs-6 text-secondary">{{ $kecamatans[1]->nama_kecamatan }}</span>
                                        <table cellpadding="">
                                            <thead>
                                                <th>Desa</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($kecamatans[1]->desa as $desa)
                                                    <tr>
                                                        <td>{{ $desa->nama_desa }}</td>
                                                        @for ($i = 1; $i <= $desa->jumlah_tps; $i++)
                                                            @php
                                                                $suaraTPS = $suara
                                                                    ->where('id_desa', $desa->id)
                                                                    ->where('id_tps', $i)
                                                                    ->where('id_user', 4)
                                                                    ->first();
                                                            @endphp
                                                            <td>
                                                                <input type="number" style="width:100%;"
                                                                    placeholder="tps {{ $i }}"
                                                                    value="{{ $suaraTPS ? $suaraTPS->jumlah_suara : '' }}"
                                                                    readonly>
                                                            </td>
                                                        @endfor
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="content-kecamatan mt-3">
                                        <span class="fs-6 text-secondary">{{ $kecamatans[2]->nama_kecamatan }}</span>
                                        <table cellpadding="">
                                            <thead>
                                                <th>Desa</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($kecamatans[2]->desa as $desa)
                                                    <tr>
                                                        <td>{{ $desa->nama_desa }}</td>
                                                        @for ($i = 1; $i <= $desa->jumlah_tps; $i++)
                                                            @php
                                                                $suaraTPS = $suara
                                                                    ->where('id_desa', $desa->id)
                                                                    ->where('id_tps', $i)
                                                                    ->where('id_user', 4)
                                                                    ->first();
                                                            @endphp
                                                            <td>
                                                                <input type="number" style="width:100%;"
                                                                    placeholder="tps {{ $i }}"
                                                                    value="{{ $suaraTPS ? $suaraTPS->jumlah_suara : '' }}"
                                                                    readonly>
                                                            </td>
                                                        @endfor
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col">
                        <div class="card" style="background-color: #efb2b2; border-radius: 25px;">
                            <div class="card-body">
                                <h4 class="box-title ms-3 fw-bold fs-2 text-dark">Perhitungan Suara*</h4>
                                <p class="ms-3">*Tiap Caleg</p>
                            </div>
                            <div class="card-body">
                                <div class="card-content">
                                    <canvas id="doughnutChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card" style="background-color: #efb2b2; border-radius: 25px;">
                            <div class="card-body">
                                <h4 class="box-title ms-3 fw-bold fs-2 text-dark">Kesimpulan Sementara</h4>
                                <p class="ms-3">*Pengambilan Suara</p>
                            </div>

                            <div class="pemenang ms-5 mb-5 py-5">
                                <div class="row py-4" style="padding-bottom: 20%">
                                    <div class="col">
                                        <h5 class="mb-3 ms-2">Jumlah Suara Terbanyak</h5>
                                        <i class="fa-solid fa-crown fa-xl"></i>
                                        <span class="fs-1 fw-bold text-dark me-2 mt-4">{{ $pemenang }}</span>
                                        <span class="fw-bold">{{ $nilaiPemenang }}</span>
                                    </div>

                                    <div class="col">
                                        <div class="sorting">
                                            @foreach ($nilai as $key => $value)
                                                <span class="fs-4 me-2 mb-2">{{ $key }}</span>
                                                <span class="fw-bold">{{ $value }}</span> <br>
                                            @endforeach
                                        </div>
                                    </div>
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
            var ctx = document.getElementById("barChart").getContext('2d');
            var hasilSuaraPerKecamatan = @json($hasilSuaraPerKecamatan);
            var datasets = [];
            var colors = ['#00c292', '#ab8ce4', '#03a9f3', '#fb78fb'];

            hasilSuaraPerKecamatan.forEach(function(item, index) {
                var jumlahSuaraPerUser = [];

                Object.entries(item.hasil_suara).forEach(function([userId, jumlahSuara]) {
                    jumlahSuaraPerUser.push(jumlahSuara);
                });

                var dataset = {
                    label: 'Kecamatan ' + item.nama_kecamatan,
                    data: jumlahSuaraPerUser,
                    backgroundColor: colors[index],
                    borderColor: colors[index],
                    borderWidth: 1
                };

                datasets.push(dataset);
            });

            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: Object.keys(hasilSuaraPerKecamatan[0].hasil_suara),
                    datasets: datasets
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

            var dgc = document.getElementById("doughnutChart").getContext("2d");
            dgc.height = 150;
            var hasilSuaraPerUser = @json($hasilSuaraPerUser);
            var myChart = new Chart(dgc, {
                type: "doughnut",
                data: {
                    datasets: [{
                        data: Object.values(hasilSuaraPerUser),
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
                    labels: Object.keys(hasilSuaraPerUser),
                },
                options: {
                    responsive: true,
                },
            });
        });
    </script>
@endsection
