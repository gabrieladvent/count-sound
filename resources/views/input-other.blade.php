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

                <p class="fs-2 fw-bold mb-3 text-dark">INPUT PERHITUNGAN SUARA</p>

                <div class="row ms-1 mb-3">
                    <div class="col me-3 py-3" style="border-radius: 15px; background-color: #efb2b2">
                        <div class="row">
                            <div class="col mb-3">
                                <span class="fs-4 fw-bold text-dark">{{ $user[0]->name }}</span> <br>
                                <div class="tabel-content mt-2">
                                    <form action="{{ route('input-suara') }}" method="POST">
                                        @csrf
                                        <span class="fs-6 text-secondary">{{ $kecamatans[0]->nama_kecamatan }}</span>
                                        <input type="hidden" name="id_user" value="{{ $user[0]->id }}">
                                        <input type="hidden" name="id_kecamatan" value="{{ $kecamatans[0]->id }}">
                                        <table cellpadding="">
                                            <thead>
                                                <th>Desa</th>
                                                <th></th>
                                            </thead>
                                            <tbody>
                                                @foreach ($kecamatans[0]->desa as $desa)
                                                    <tr>
                                                        <td>{{ $desa->nama_desa }}</td>
                                                        @php
                                                            $temp = $desa->jumlah_tps;
                                                        @endphp
                                                        @for ($i = 1; $i <= $temp; $i++)
                                                            <td>
                                                                <input type="hidden" name="id_desa[]"
                                                                    value="{{ $desa->id }}">
                                                                <input type="number" name="tps{{ $i . '_' . $desa->id }}"
                                                                    style="width:100%;"
                                                                    placeholder="tps {{ $i }}">
                                                            </td>
                                                        @endfor
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="6" class="text-center">
                                                        <button type="submit" class="btn btn-success py-2 mt-2">
                                                            Submit
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col mb-3">
                                <div class="tabel-content mt-2">
                                    <form action="{{ route('input-suara') }}" method="POST">
                                        @csrf
                                        <span class="fs-6 text-secondary">{{ $kecamatans[1]->nama_kecamatan }}</span>
                                        <input type="hidden" name="id_user" value="{{ $user[0]->id }}">
                                        <input type="hidden" name="id_kecamatan" value="{{ $kecamatans[1]->id }}">
                                        <table cellpadding="2">
                                            <thead>
                                                <th>Desa</th>
                                                <th></th>
                                            </thead>
                                            <tbody>
                                                @foreach ($kecamatans[1]->desa as $desa)
                                                    <tr>
                                                        <td>{{ $desa->nama_desa }}</td>
                                                        @php
                                                            $temp = $desa->jumlah_tps;
                                                        @endphp
                                                        @for ($i = 1; $i <= $temp; $i++)
                                                            <td>
                                                                <input type="hidden" name="id_desa[]"
                                                                    value="{{ $desa->id }}">
                                                                <input type="number"
                                                                    name="tps{{ $i . '_' . $desa->id }}"
                                                                    style="width:100%;"
                                                                    placeholder="tps {{ $i }}">
                                                            </td>
                                                        @endfor
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="6" class="text-center">
                                                        <button type="submit" class="btn btn-success py-2 mt-2">
                                                            Submit
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="tabel-content mt-2">
                                    <form action="{{ route('input-suara') }}" method="POST">
                                        @csrf
                                        <span class="fs-6 text-secondary">{{ $kecamatans[2]->nama_kecamatan }}</span>
                                        <input type="hidden" name="id_user" value="{{ $user[0]->id }}">
                                        <input type="hidden" name="id_kecamatan" value="{{ $kecamatans[2]->id }}">
                                        <table cellpadding="2">
                                            <thead>
                                                <th>Desa</th>
                                                <th></th>
                                            </thead>
                                            <tbody>
                                                @foreach ($kecamatans[2]->desa as $desa)
                                                    <tr>
                                                        <td>{{ $desa->nama_desa }}</td>
                                                        @php
                                                            $temp = $desa->jumlah_tps;
                                                        @endphp
                                                        @for ($i = 1; $i <= $temp; $i++)
                                                            <td>
                                                                <input type="hidden" name="id_desa[]"
                                                                    value="{{ $desa->id }}">
                                                                <input type="number"
                                                                    name="tps{{ $i . '_' . $desa->id }}"
                                                                    style="width:100%;"
                                                                    placeholder="tps {{ $i }}">
                                                            </td>
                                                        @endfor
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="6" class="text-center">
                                                        <button type="submit" class="btn btn-success py-2 mt-2">
                                                            Submit
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col me-3 py-3" style="border-radius: 15px; background-color: #efb2b2">
                        <div class="row">
                            <div class="col mb-3">
                                <span class="fs-4 fw-bold text-dark">{{ $user[1]->name }}</span> <br>
                                <div class="tabel-content mt-2">
                                    <form action="{{ route('input-suara') }}" method="POST">
                                        @csrf
                                        <span class="fs-6 text-secondary">{{ $kecamatans[0]->nama_kecamatan }}</span>
                                        <input type="hidden" name="id_user" value="{{ $user[1]->id }}">
                                        <input type="hidden" name="id_kecamatan" value="{{ $kecamatans[0]->id }}">
                                        <table cellpadding="">
                                            <thead>
                                                <th>Desa</th>
                                                <th></th>
                                            </thead>
                                            <tbody>
                                                @foreach ($kecamatans[0]->desa as $desa)
                                                    <tr>
                                                        <td>{{ $desa->nama_desa }}</td>
                                                        @php
                                                            $temp = $desa->jumlah_tps;
                                                        @endphp
                                                        @for ($i = 1; $i <= $temp; $i++)
                                                            <td>
                                                                <input type="hidden" name="id_desa[]"
                                                                    value="{{ $desa->id }}">
                                                                <input type="number"
                                                                    name="tps{{ $i . '_' . $desa->id }}"
                                                                    style="width:100%;"
                                                                    placeholder="tps {{ $i }}">
                                                            </td>
                                                        @endfor
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="6" class="text-center">
                                                        <button type="submit" class="btn btn-success py-2 mt-2">
                                                            Submit
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col mb-3">
                                <div class="tabel-content mt-2">
                                    <form action="{{ route('input-suara') }}" method="POST">
                                        @csrf
                                        <span class="fs-6 text-secondary">{{ $kecamatans[1]->nama_kecamatan }}</span>
                                        <input type="hidden" name="id_user" value="{{ $user[1]->id }}">
                                        <input type="hidden" name="id_kecamatan" value="{{ $kecamatans[1]->id }}">
                                        <table cellpadding="2">
                                            <thead>
                                                <th>Desa</th>
                                                <th></th>
                                            </thead>
                                            <tbody>
                                                @foreach ($kecamatans[1]->desa as $desa)
                                                    <tr>
                                                        <td>{{ $desa->nama_desa }}</td>
                                                        @php
                                                            $temp = $desa->jumlah_tps;
                                                        @endphp
                                                        @for ($i = 1; $i <= $temp; $i++)
                                                            <td>
                                                                <input type="hidden" name="id_desa[]"
                                                                    value="{{ $desa->id }}">
                                                                <input type="number"
                                                                    name="tps{{ $i . '_' . $desa->id }}"
                                                                    style="width:100%;"
                                                                    placeholder="tps {{ $i }}">
                                                            </td>
                                                        @endfor
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="6" class="text-center">
                                                        <button type="submit" class="btn btn-success py-2 mt-2">
                                                            Submit
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="tabel-content mt-2">
                                    <form action="{{ route('input-suara') }}" method="POST">
                                        @csrf
                                        <span class="fs-6 text-secondary">{{ $kecamatans[2]->nama_kecamatan }}</span>
                                        <input type="hidden" name="id_user" value="{{ $user[1]->id }}">
                                        <input type="hidden" name="id_kecamatan" value="{{ $kecamatans[2]->id }}">
                                        <table cellpadding="2">
                                            <thead>
                                                <th>Desa</th>
                                                <th></th>
                                            </thead>
                                            <tbody>
                                                @foreach ($kecamatans[2]->desa as $desa)
                                                    <tr>
                                                        <td>{{ $desa->nama_desa }}</td>
                                                        @php
                                                            $temp = $desa->jumlah_tps;
                                                        @endphp
                                                        @for ($i = 1; $i <= $temp; $i++)
                                                            <td>
                                                                <input type="hidden" name="id_desa[]"
                                                                    value="{{ $desa->id }}">
                                                                <input type="number"
                                                                    name="tps{{ $i . '_' . $desa->id }}"
                                                                    style="width:100%;"
                                                                    placeholder="tps {{ $i }}">
                                                            </td>
                                                        @endfor
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="6" class="text-center">
                                                        <button type="submit" class="btn btn-success py-2 mt-2">
                                                            Submit
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row ms-1 mb-3">
                    <div class="col me-3 py-3" style="border-radius: 15px; background-color: #efb2b2">
                        <div class="row">
                            <div class="col mb-3">
                                <span class="fs-4 fw-bold text-dark">{{ $user[2]->name }}</span> <br>
                                <div class="tabel-content mt-2">
                                    <form action="{{ route('input-suara') }}" method="POST">
                                        @csrf
                                        <span class="fs-6 text-secondary">{{ $kecamatans[0]->nama_kecamatan }}</span>
                                        <input type="hidden" name="id_user" value="{{ $user[2]->id }}">
                                        <input type="hidden" name="id_kecamatan" value="{{ $kecamatans[0]->id }}">
                                        <table cellpadding="">
                                            <thead>
                                                <th>Desa</th>
                                                <th></th>
                                            </thead>
                                            <tbody>
                                                @foreach ($kecamatans[0]->desa as $desa)
                                                    <tr>
                                                        <td>{{ $desa->nama_desa }}</td>
                                                        @php
                                                            $temp = $desa->jumlah_tps;
                                                        @endphp
                                                        @for ($i = 1; $i <= $temp; $i++)
                                                            <td>
                                                                <input type="hidden" name="id_desa[]"
                                                                    value="{{ $desa->id }}">
                                                                <input type="number"
                                                                    name="tps{{ $i . '_' . $desa->id }}"
                                                                    style="width:100%;"
                                                                    placeholder="tps {{ $i }}">
                                                            </td>
                                                        @endfor
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="6" class="text-center">
                                                        <button type="submit" class="btn btn-success py-2 mt-2">
                                                            Submit
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col mb-3">
                                <div class="tabel-content mt-2">
                                    <form action="{{ route('input-suara') }}" method="POST">
                                        @csrf
                                        <span class="fs-6 text-secondary">{{ $kecamatans[1]->nama_kecamatan }}</span>
                                        <input type="hidden" name="id_user" value="{{ $user[2]->id }}">
                                        <input type="hidden" name="id_kecamatan" value="{{ $kecamatans[1]->id }}">
                                        <table cellpadding="2">
                                            <thead>
                                                <th>Desa</th>
                                                <th></th>
                                            </thead>
                                            <tbody>
                                                @foreach ($kecamatans[1]->desa as $desa)
                                                    <tr>
                                                        <td>{{ $desa->nama_desa }}</td>
                                                        @php
                                                            $temp = $desa->jumlah_tps;
                                                        @endphp
                                                        @for ($i = 1; $i <= $temp; $i++)
                                                            <td>
                                                                <input type="hidden" name="id_desa[]"
                                                                    value="{{ $desa->id }}">
                                                                <input type="number"
                                                                    name="tps{{ $i . '_' . $desa->id }}"
                                                                    style="width:100%;"
                                                                    placeholder="tps {{ $i }}">
                                                            </td>
                                                        @endfor
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="6" class="text-center">
                                                        <button type="submit" class="btn btn-success py-2 mt-2">
                                                            Submit
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="tabel-content mt-2">
                                    <form action="{{ route('input-suara') }}" method="POST">
                                        @csrf
                                        <span class="fs-6 text-secondary">{{ $kecamatans[2]->nama_kecamatan }}</span>
                                        <input type="hidden" name="id_user" value="{{ $user[2]->id }}">
                                        <input type="hidden" name="id_kecamatan" value="{{ $kecamatans[2]->id }}">
                                        <table cellpadding="2">
                                            <thead>
                                                <th>Desa</th>
                                                <th></th>
                                            </thead>
                                            <tbody>
                                                @foreach ($kecamatans[2]->desa as $desa)
                                                    <tr>
                                                        <td>{{ $desa->nama_desa }}</td>
                                                        @php
                                                            $temp = $desa->jumlah_tps;
                                                        @endphp
                                                        @for ($i = 1; $i <= $temp; $i++)
                                                            <td>
                                                                <input type="hidden" name="id_desa[]"
                                                                    value="{{ $desa->id }}">
                                                                <input type="number"
                                                                    name="tps{{ $i . '_' . $desa->id }}"
                                                                    style="width:100%;"
                                                                    placeholder="tps {{ $i }}">
                                                            </td>
                                                        @endfor
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="6" class="text-center">
                                                        <button type="submit" class="btn btn-success py-2 mt-2">
                                                            Submit
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col me-3 py-3" style="border-radius: 15px; background-color: #efb2b2">
                        <div class="row">
                            <div class="col mb-3">
                                <span class="fs-4 fw-bold text-dark">{{ $user[3]->name }}</span> <br>
                                <div class="tabel-content mt-2">
                                    <form action="{{ route('input-suara') }}" method="POST">
                                        @csrf
                                        <span class="fs-6 text-secondary">{{ $kecamatans[0]->nama_kecamatan }}</span>
                                        <input type="hidden" name="id_user" value="{{ $user[3]->id }}">
                                        <input type="hidden" name="id_kecamatan" value="{{ $kecamatans[0]->id }}">
                                        <table cellpadding="">
                                            <thead>
                                                <th>Desa</th>
                                                <th></th>
                                            </thead>
                                            <tbody>
                                                @foreach ($kecamatans[0]->desa as $desa)
                                                    <tr>
                                                        <td>{{ $desa->nama_desa }}</td>
                                                        @php
                                                            $temp = $desa->jumlah_tps;
                                                        @endphp
                                                        @for ($i = 1; $i <= $temp; $i++)
                                                            <td>
                                                                <input type="hidden" name="id_desa[]"
                                                                    value="{{ $desa->id }}">
                                                                <input type="number"
                                                                    name="tps{{ $i . '_' . $desa->id }}"
                                                                    style="width:100%;"
                                                                    placeholder="tps {{ $i }}">
                                                            </td>
                                                        @endfor
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="6" class="text-center">
                                                        <button type="submit" class="btn btn-success py-2 mt-2">
                                                            Submit
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col mb-3">
                                <div class="tabel-content mt-2">
                                    <form action="{{ route('input-suara') }}" method="POST">
                                        @csrf
                                        <span class="fs-6 text-secondary">{{ $kecamatans[1]->nama_kecamatan }}</span>
                                        <input type="hidden" name="id_user" value="{{ $user[3]->id }}">
                                        <input type="hidden" name="id_kecamatan" value="{{ $kecamatans[1]->id }}">
                                        <table cellpadding="2">
                                            <thead>
                                                <th>Desa</th>
                                                <th></th>
                                            </thead>
                                            <tbody>
                                                @foreach ($kecamatans[1]->desa as $desa)
                                                    <tr>
                                                        <td>{{ $desa->nama_desa }}</td>
                                                        @php
                                                            $temp = $desa->jumlah_tps;
                                                        @endphp
                                                        @for ($i = 1; $i <= $temp; $i++)
                                                            <td>
                                                                <input type="hidden" name="id_desa[]"
                                                                    value="{{ $desa->id }}">
                                                                <input type="number"
                                                                    name="tps{{ $i . '_' . $desa->id }}"
                                                                    style="width:100%;"
                                                                    placeholder="tps {{ $i }}">
                                                            </td>
                                                        @endfor
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="6" class="text-center">
                                                        <button type="submit" class="btn btn-success py-2 mt-2">
                                                            Submit
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="tabel-content mt-2">
                                    <form action="{{ route('input-suara') }}" method="POST">
                                        @csrf
                                        <span class="fs-6 text-secondary">{{ $kecamatans[2]->nama_kecamatan }}</span>
                                        <input type="hidden" name="id_user" value="{{ $user[3]->id }}">
                                        <input type="hidden" name="id_kecamatan" value="{{ $kecamatans[2]->id }}">
                                        <table cellpadding="2">
                                            <thead>
                                                <th>Desa</th>
                                                <th></th>
                                            </thead>
                                            <tbody>
                                                @foreach ($kecamatans[2]->desa as $desa)
                                                    <tr>
                                                        <td>{{ $desa->nama_desa }}</td>
                                                        @php
                                                            $temp = $desa->jumlah_tps;
                                                        @endphp
                                                        @for ($i = 1; $i <= $temp; $i++)
                                                            <td>
                                                                <input type="hidden" name="id_desa[]"
                                                                    value="{{ $desa->id }}">
                                                                <input type="number"
                                                                    name="tps{{ $i . '_' . $desa->id }}"
                                                                    style="width:100%;"
                                                                    placeholder="tps {{ $i }}">
                                                            </td>
                                                        @endfor
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="6" class="text-center">
                                                        <button type="submit" class="btn btn-success py-2 mt-2">
                                                            Submit
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
