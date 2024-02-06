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

                <p class="fw-bold text-dark mt-2 ms-3 fs-2">INPUT PERHITUNGAN SUARA</p>
                <form action="{{ route('take-tps') }}" method="post">
                    @csrf
                    <div class="row mt-3 ms-1">
                        <div class="col-md-2">
                            <div>
                                <select class="form-select" name="kecamatan" id="kecamatan">
                                    <option value="" selected disabled>Pilih Kecamatan</option>
                                    @foreach ($kecamatan as $kec)
                                        <option value="{{ $kec->id }}" data-kecamatan="{{ $kec->id }}">
                                            {{ $kec->nama_kecamatan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-2" id="desa-container" style="display: none;">
                            <div>
                                <select class="form-select" name="desa" id="desa" disabled multiple>
                                    @foreach ($desa as $desaItem)
                                        <option value="{{ $desaItem->id }}" data-kecamatan="{{ $desaItem->id_kecamatan }}"
                                            class="desa-option">
                                            {{ $desaItem->nama_desa }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-success">Cari TPS</button>
                        </div>
                    </div>
                </form>

                @if (session('desa'))
                    @php
                        $temp = session('desa')->jumlah_tps;
                    @endphp

                    <form action="{{ route('input-suara') }}" method="post">
                        @csrf
                        @foreach ($user as $item)
                            <div class="row mt-5">
                                <h4 class="fw-bold mb-2">{{ $item->name }}</h4>
                                <input type="hidden" name="id_user" value="{{ $item_name }}">
                                <div class="col-md-10 py-3 mb-3" style="background-color: #efb2b2; border-radius: 15px;">

                                    @for ($i = 1; $i <= $temp; $i++)
                                        <input type="number" name="input{{ $i }}"
                                            id="input{{ $i }}" placeholder="TPS {{ $i }}"
                                            class="mb-2">
                                    @endfor

                                </div>
                                <div class="col ">
                                    <div class="col py-2 mb-3" style="background-color: #efb2b2; border-radius: 15px;">
                                        <div class="stat-text"><span class="count fw-bold fs-2">23569</span></div>
                                        <div class="stat-heading fw-bold text-center">Total Sementara</div>
                                    </div>
                                </div>

                                <div class="col py-3 mt-3">
                                    <button type="submit" class="btn btn-info">
                                        <i class="fa-solid fa-hand-pointer"></i>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </form>
                @else
                    <p class="fs-3 fw-bold text-secondary ms-3 mt-5">Silahkan Memilih Kecamatan dan Desa</p>
                @endif
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#kecamatan').change(function() {
                var selectedKecamatan = $(this).val();

                $('.desa-option').each(function() {
                    var optionKecamatan = $(this).data('kecamatan');

                    if (selectedKecamatan === '' || selectedKecamatan == optionKecamatan) {
                        $(this).prop('disabled', false);
                    } else {
                        $(this).prop('disabled', true);
                    }
                });

                if (selectedKecamatan === '') {
                    $('#desa-container').hide();
                    $('#desa').val('').prop('disabled', true);
                } else {
                    $('#desa-container').show();
                    $('#desa').prop('disabled', false);
                }
            });
        });
    </script>
@endsection
