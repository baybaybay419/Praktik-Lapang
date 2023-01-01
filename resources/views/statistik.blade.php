@extends('layouts.main')

@section('head')
    @include('partials.head')
@endsection

@section('header')
    @include('partials.header')
@endsection

@section('content')
    <section id="storage" class="storage">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Statistik</h2>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Bar Chart</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="barChart"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col">
                    <table class="table table-light">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Sudah</th>
                                <th scope="col">Belum</th>
                                <th scope="col">Persentase</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Kementrian / Lembaga</th>
                                <td><a href="/statistik/jumlah-kementrian"
                                        class="btn btn-primary w-100 h-100">{{ $countSudahKementrian + $countBelumKementrian }}</a>
                                </td>
                                <td><a href="/statistik/sudah-kementrian"
                                        class="btn btn-primary w-100 h-100">{{ $countSudahKementrian }}</a>
                                </td>
                                <td><a href="/statistik/belum-kementrian"
                                        class="btn btn-primary w-100 h-100">{{ $countBelumKementrian }}</a>
                                </td>
                                <td>{{ $countSudahKementrian / ($countSudahKementrian + $countBelumKementrian) }} %</td>
                            </tr>
                            <tr>
                                <th scope="row">Provinsi</th>
                                <td><a href="/statistik/jumlah-provinsi"
                                        class="btn btn-primary w-100 h-100">{{ $countSudahProvinsi + $countBelumProvinsi }}</a>
                                </td>
                                <td><a href="/statistik/sudah-provinsi"
                                        class="btn btn-primary w-100 h-100">{{ $countSudahProvinsi }}</a></td>
                                <td><a href="/statistik/belum-provinsi"
                                        class="btn btn-primary w-100 h-100">{{ $countBelumProvinsi }}</a></td>
                                <td>{{ $countSudahProvinsi / ($countSudahProvinsi + $countBelumProvinsi) }} %</td>
                            </tr>
                            <tr>
                                <th scope="row">Kabupaten / Kota</th>
                                <td><a href="/statistik/jumlah-kabupaten-kota"
                                        class="btn btn-primary w-100 h-100">{{ $countSudahKabupatenKota + $countBelumKabupatenKota }}</a>
                                </td>
                                <td><a href="/statistik/sudah-kabupaten-kota"
                                        class="btn btn-primary w-100 h-100">{{ $countSudahKabupatenKota }}</a>
                                </td>
                                <td><a href="/statistik/jumlah-kabupaten-kota"
                                        class="btn btn-primary w-100 h-100">{{ $countBelumKabupatenKota }}</a>
                                </td>
                                <td>{{ $countSudahKabupatenKota / ($countSudahKabupatenKota + $countBelumKabupatenKota) }}
                                    %</td>
                            </tr>
                            <tr>
                                <th scope="row">Total</th>
                                <td><a href="/statistik/jumlah-keseluruhan"
                                        class="btn btn-primary w-100 h-100">{{ $countSudahKementrian + $countBelumKementrian + $countSudahProvinsi + $countBelumProvinsi + $countSudahKabupatenKota + $countBelumKabupatenKota }}</a>
                                </td>
                                <td><a href="/statistik/sudah-keseluruhan"
                                        class="btn btn-primary w-100 h-100">{{ $countSudahKementrian + $countSudahProvinsi + $countSudahKabupatenKota }}</a>
                                </td>
                                <td><a href="/statistik/belum-keseluruhan"
                                        class="btn btn-primary w-100 h-100">{{ $countBelumKementrian + $countBelumProvinsi + $countBelumKabupatenKota }}</a>
                                </td>
                                <td>{{ ($countSudahKementrian + $countSudahProvinsi + $countSudahKabupatenKota) / ($countSudahKementrian + $countBelumKementrian + $countSudahProvinsi + $countBelumProvinsi + $countSudahKabupatenKota + $countBelumKabupatenKota) }}

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row" id="keseluruhan_data">

                <h3>List Surat</h3>
                <table class="table table-light">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($param == 'jumlah-kementrian')
                            @php
                                $no = 0;
                            @endphp
                            @foreach ($sudahKementrian as $data => $value)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $value->kementrian }}</td>
                                </tr>
                                @php
                                    $no = $no + 1;
                                @endphp
                            @endforeach
                            @foreach ($belumKementrian as $data => $value)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $value->kementrian }}</td>
                                </tr>
                                @php
                                    $no = $no + 1;
                                @endphp
                            @endforeach
                        @endif
                        @if ($param == 'sudah-kementrian')
                            @foreach ($sudahKementrian as $data => $value)
                                <tr>
                                    <td>{{ $data + 1 }}</td>
                                    <td>{{ $value->kementrian }}</td>
                                </tr>
                            @endforeach
                        @endif
                        @if ($param == 'belum-kementrian')
                            @foreach ($belumKementrian as $data => $value)
                                <tr>
                                    <td>{{ $data + 1 }}</td>
                                    <td>{{ $value->kementrian }}</td>
                                </tr>
                            @endforeach
                        @endif

                        @if ($param == 'jumlah-provinsi')
                            @php
                                $no = 0;
                            @endphp
                            @foreach ($sudahProvinsi as $data => $value)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $value->provinsi }}</td>
                                </tr>
                                @php
                                    $no = $no + 1;
                                @endphp
                            @endforeach
                            @foreach ($belumProvinsi as $data => $value)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $value->provinsi }}</td>
                                </tr>
                                @php
                                    $no = $no + 1;
                                @endphp
                            @endforeach
                        @endif
                        @if ($param == 'sudah-provinsi')
                            @foreach ($sudahProvinsi as $data => $value)
                                <tr>
                                    <td>{{ $data + 1 }}</td>
                                    <td>{{ $value->provinsi }}</td>
                                </tr>
                            @endforeach
                        @endif
                        @if ($param == 'belum-provinsi')
                            @foreach ($belumProvinsi as $data => $value)
                                <tr>
                                    <td>{{ $data + 1 }}</td>
                                    <td>{{ $value->provinsi }}</td>
                                </tr>
                            @endforeach
                        @endif

                        @if ($param == 'jumlah-kabupaten-kota')
                            @php
                                $no = 0;
                            @endphp
                            @foreach ($sudahKabupatenKota as $data => $value)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $value->kabupaten_kota }}</td>
                                </tr>
                                @php
                                    $no = $no + 1;
                                @endphp
                            @endforeach
                            @foreach ($belumKabupatenKota as $data => $value)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $value->kabupaten_kota }}</td>
                                </tr>
                                @php
                                    $no = $no + 1;
                                @endphp
                            @endforeach
                        @endif
                        @if ($param == 'sudah-kabupaten-kota')
                            @foreach ($sudahKabupatenKota as $data => $value)
                                <tr>
                                    <td>{{ $data + 1 }}</td>
                                    <td>{{ $value->kabupaten_kota }}</td>
                                </tr>
                            @endforeach
                        @endif
                        @if ($param == 'belum-kabupaten-kota')
                            @foreach ($belumKabupatenKota as $data => $value)
                                <tr>
                                    <td>{{ $data + 1 }}</td>
                                    <td>{{ $value->kabupaten_kota }}</td>
                                </tr>
                            @endforeach
                        @endif

                        @if ($param == 'jumlah-keseluruhan')
                            @php
                                $no = 0;
                            @endphp
                            @foreach ($sudahKementrian as $data => $value)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $value->kementrian }}</td>
                                </tr>
                                @php
                                    $no = $no + 1;
                                @endphp
                            @endforeach
                            @foreach ($belumKementrian as $data => $value)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $value->kementrian }}</td>
                                </tr>
                                @php
                                    $no = $no + 1;
                                @endphp
                            @endforeach
                            @foreach ($sudahProvinsi as $data => $value)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $value->provinsi }}</td>
                                </tr>
                                @php
                                    $no = $no + 1;
                                @endphp
                            @endforeach
                            @foreach ($belumProvinsi as $data => $value)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $value->provinsi }}</td>
                                </tr>
                                @php
                                    $no = $no + 1;
                                @endphp
                            @endforeach
                            @foreach ($sudahKabupatenKota as $data => $value)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $value->kabupaten_kota }}</td>
                                </tr>
                                @php
                                    $no = $no + 1;
                                @endphp
                            @endforeach
                            @foreach ($belumKabupatenKota as $data => $value)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $value->kabupaten_kota }}</td>
                                </tr>
                                @php
                                    $no = $no + 1;
                                @endphp
                            @endforeach
                        @endif
                        @if ($param == 'sudah-keseluruhan')
                            @php
                                $no = 0;
                            @endphp
                            @foreach ($sudahKementrian as $data => $value)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $value->kementrian }}</td>
                                </tr>
                                @php
                                    $no = $no + 1;
                                @endphp
                            @endforeach
                            @foreach ($sudahProvinsi as $data => $value)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $value->provinsi }}</td>
                                </tr>
                                @php
                                    $no = $no + 1;
                                @endphp
                            @endforeach
                            @foreach ($sudahKabupatenKota as $data => $value)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $value->kabupaten_kota }}</td>
                                </tr>
                                @php
                                    $no = $no + 1;
                                @endphp
                            @endforeach
                        @endif
                        @if ($param == 'belum-keseluruhan')
                            @php
                                $no = 0;
                            @endphp
                            @foreach ($belumKementrian as $data => $value)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $value->kementrian }}</td>
                                </tr>
                                @php
                                    $no = $no + 1;
                                @endphp
                            @endforeach
                            @foreach ($belumProvinsi as $data => $value)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $value->provinsi }}</td>
                                </tr>
                                @php
                                    $no = $no + 1;
                                @endphp
                            @endforeach
                            @foreach ($belumKabupatenKota as $data => $value)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $value->kabupaten_kota }}</td>
                                </tr>
                                @php
                                    $no = $no + 1;
                                @endphp
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

        </div>

        </div>
    </section><!-- End Contact Section -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script type="text/javascript">
        var areaChartData = {
            labels: ['Kementrian/Lembaga', 'Provinsi', 'Kabupaten/Kota', ],
            datasets: [{
                    label: 'Sudah',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: [{{ $countSudahKementrian }}, {{ $countSudahProvinsi }},
                        {{ $countSudahKabupatenKota }}
                    ]
                },
                {
                    label: 'Belum',
                    backgroundColor: 'rgba(210, 214, 222, 1)',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: [{{ $countBelumKementrian }}, {{ $countBelumProvinsi }},
                        {{ $countBelumKabupatenKota }}
                    ]
                },
            ]
        }

        //-------------
        //- BAR CHART -
        //-------------
        var barChartCanvas = $('#barChart').get(0).getContext('2d')
        var barChartData = $.extend(true, {}, areaChartData)
        var temp0 = areaChartData.datasets[0]
        var temp1 = areaChartData.datasets[1]
        barChartData.datasets[0] = temp1
        barChartData.datasets[1] = temp0

        var barChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            datasetFill: false
        }

        new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
        })
    </script>
@endsection

@section('footer')
    @include('partials.footer')
@endsection
