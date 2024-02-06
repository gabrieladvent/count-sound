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
                                                    class="count fw-bold fs-2">2</span></div>
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
                                                    class="count fw-bold fs-2">2</span></div>
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
                                                    class="count fw-bold fs-2">2</span></div>
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
                                                    class="count fw-bold fs-2">2</span></div>
                                            <div class="stat-heading fw-bold">Suara</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <p class="fs-2 fw-bold mb-3 text-dark">INPUT PERHITUNGAN SUARA</p>

                <div class="row ms-1">
                    <div class="col-md-8 me-3 py-3" style="border-radius: 15px; background-color: #efb2b2">
                        <span class="fs-4 fw-bold text-dark">{{ $user[0]->name }}</span> <br>
                        <span class="fs-6 text-secondary ms-2">{{ $kecamatans[0]->nama_kecamatan }}</span>
                        <input type="hidden" value="{{ $user[0]->name }}">
                        <input type="hidden" value="{{ $kecamatans[0]->nama_kecamatan }}">
                        <div class="tabel-content mt-2">
                            <form action="{{ route('input-suara') }}" method="POST">
                                @csrf
                                <table cellpadding="2">
                                    <thead>
                                        <th>Desa</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Wailolong</td>
                                            @php
                                                $temp = $kecamatans[0]->desa[0]->jumlah_tps;
                                            @endphp
                                            @for ($i = 1; $i <= $temp; $i++)
                                                <td>
                                                    <input type="number"
                                                        name="tps{{ $i . $kecamatans[0]->desa[0]->nama_desa }}"
                                                        style="width:100%;" placeholder="tps {{ $i }}">
                                                </td>
                                            @endfor
                                        </tr>
                                        <tr>
                                            <td>Lewoloba</td>
                                            @php
                                                $temp = $kecamatans[0]->desa[1]->jumlah_tps;
                                            @endphp
                                            @for ($i = 1; $i <= $temp; $i++)
                                                <td>
                                                    <input type="number"
                                                        name="tps{{ $i . $kecamatans[0]->desa[1]->nama_desa }}"
                                                        style="width:100%;" placeholder="tps {{ $i }}">
                                                </td>
                                            @endfor
                                        </tr>
                                        <tr>
                                            <td>Tiwatobi</td>
                                            @php
                                                $temp = $kecamatans[0]->desa[2]->jumlah_tps;
                                            @endphp
                                            @for ($i = 1; $i <= $temp; $i++)
                                                <td>
                                                    <input type="number"
                                                        name="tps{{ $i . $kecamatans[0]->desa[2]->nama_desa }}"
                                                        style="width:100%;" placeholder="tps {{ $i }}">
                                                </td>
                                            @endfor
                                        </tr>
                                        <tr>
                                            <td>Watotutu</td>
                                            @php
                                                $temp = $kecamatans[0]->desa[3]->jumlah_tps;
                                            @endphp
                                            @for ($i = 1; $i <= $temp; $i++)
                                                <td>
                                                    <input type="number"
                                                        name="tps{{ $i . $kecamatans[0]->desa[3]->nama_desa }}"
                                                        style="width:100%;" placeholder="tps {{ $i }}">
                                                </td>
                                            @endfor
                                        </tr>
                                        <tr>
                                            <td>Riangkemie</td>
                                            @php
                                                $temp = $kecamatans[0]->desa[4]->jumlah_tps;
                                            @endphp
                                            @for ($i = 1; $i <= $temp; $i++)
                                                <td>
                                                    <input type="number"
                                                        name="tps{{ $i . $kecamatans[0]->desa[4]->nama_desa }}"
                                                        style="width:100%;" placeholder="tps {{ $i }}">
                                                </td>
                                            @endfor
                                        </tr>
                                        <tr>
                                            <td>Lewohala</td>
                                            @php
                                                $temp = $kecamatans[0]->desa[5]->jumlah_tps;
                                            @endphp
                                            @for ($i = 1; $i <= $temp; $i++)
                                                <td>
                                                    <input type="number"
                                                        name="tps{{ $i . $kecamatans[0]->desa[5]->nama_desa }}"
                                                        style="width:100%;" placeholder="tps {{ $i }}">
                                                </td>
                                            @endfor
                                        </tr>
                                        <tr>
                                            <td>Halakodanuan</td>
                                            @php
                                                $temp = $kecamatans[0]->desa[6]->jumlah_tps;
                                            @endphp
                                            @for ($i = 1; $i <= $temp; $i++)
                                                <td>
                                                    <input type="number"
                                                        name="tps{{ $i . $kecamatans[0]->desa[6]->nama_desa }}"
                                                        style="width:100%;" placeholder="tps {{ $i }}">
                                                </td>
                                            @endfor
                                        </tr>
                                        <tr>
                                            <td>Mudakeputu</td>
                                            @php
                                                $temp = $kecamatans[0]->desa[7]->jumlah_tps;
                                            @endphp
                                            @for ($i = 1; $i <= $temp; $i++)
                                                <td>
                                                    <input type="number"
                                                        name="tps{{ $i . $kecamatans[0]->desa[7]->nama_desa }}"
                                                        style="width:100%;" placeholder="tps {{ $i }}">
                                                </td>
                                            @endfor
                                        </tr>
                                        <tr>
                                            <td colspan="7" class="text-center">
                                                <button type="submit" class="btn btn-success py-2 mt-2">
                                                    <i class="fa-solid fa-hand-pointer fa-xl"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>

                    <div class="col py-3" style="border-radius: 15px; background-color: #efb2b2">
                        <p>has</p>
                    </div>
                </div>


                    {{-- <div class="col me-3 py-3" style="border-radius: 15px; background-color: #efb2b2">
                        <p class="fs-4 fw-bold text-dark">{{ $kecamatans[1]->nama_kecamatan }}</p>
                    </div>
                    <div class="col me-3 py-3" style="border-radius: 15px; background-color: #efb2b2">
                        <p class="fs-4 fw-bold text-dark">{{ $kecamatans[2]->nama_kecamatan }}</p>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
