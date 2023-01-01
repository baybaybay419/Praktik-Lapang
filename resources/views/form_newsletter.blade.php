@extends('layouts.main')

@section('head')
    @include('partials.head')
@endsection

@section('header')
    @include('partials.header')
@endsection

@section('content')
    <section id="form" class="form">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>FORM BERITA ACARA</h2>
            </div>


            <div class="row mt-1 d-flex justify-content-center">

                <div class="col-lg-8 mt-5 mt-lg-0">

                    @if (empty($selectedNewsLetter))
                        <form action="{{ route('newsletter.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="title" class="form-control" id="title"
                                        placeholder="Judul Berita Acara" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="text" class="form-control" name="description" id="description"
                                        placeholder="Deskripsi Singkat Berita Acara" required>
                                </div>
                            </div>
                            <div class="row
                            mt-3">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="location" class="form-control" id="location"
                                        placeholder="Lokasi Kota" required>
                                </div>
                                <!-- Masih Ragu cara rubah date time untuk place holder dan valuenya -->
                                <div class="col-md-6
                            form-group mt-3 mt-md-0">
                                    <input type="text" data-date-format="DD MMMM YYYY" class="form-control"
                                        name="date" onfocus="(this.type='date')" placeholder="Masukkan Tanggal" required>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <fieldset class="col-md-6 form-group border border-dark">
                                    <legend class="text-center">PIHAK PERTAMA</legend>
                                    <div class="d-flex justify-content-center form-group">
                                        <select name="name_first" id="name_first" required>
                                            <option class="col-md-6 text-center" value="0">-- Pilih Pihak Pertama --
                                            </option>
                                            @foreach ($firstParty as $first)
                                                <option class="col-md-6 text-center" value="{{ $first->id }}">
                                                    {{ $first->fullname }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mt-3 form-group d-flex justify-content-center" id="nip_first">
                                        <label class="px-5 py-1 text-center" for="nip_first">
                                            NIP
                                        </label>

                                    </div>
                                    <div class="mt-2 form-group d-flex justify-content-center " id="position_first">
                                        <label class="px-5 py-1 text-center" for="position_first">
                                            JABATAN
                                        </label>
                                    </div>
                                    <div class="mt-2 form-group d-flex justify-content-center" id="agency">
                                        <label class="px-5 py-1 text-center" for="agency">
                                            INSTANSI
                                        </label>
                                    </div>
                                    <div class="mt-2 form-group d-flex justify-content-center" id="email_first">
                                        <label class="px-5 py-1 text-center" for="email_first">
                                            EMAIL
                                        </label>
                                    </div>
                                    <div class="mt-2 form-group d-flex justify-content-center" id="handphone_first">
                                        <label class="px-5 py-1 text-center" for="handphone_first">
                                            HANDPHONE
                                        </label>
                                    </div>
                                </fieldset>

                                <Fieldset class="col-md-6 form-group border border-dark">
                                    <legend class="text-center">PIHAK KEDUA</legend>

                                    <div class="d-flex justify-content-center form-group">
                                        <select name="category" id="category" required>
                                            <option class="text-center" value="">-- Pilih Kategori --</option>
                                            <option class="text-center" value="1">Kementrian / Lembaga</option>
                                            <option class="text-center" value="2">Provinsi</option>
                                            <option class="text-center" value="3">Kabupaten / Kota</option>
                                        </select>
                                    </div>
                                    <div class="d-flex justify-content-center form-group" id="provinsi">
                                    </div>
                                    <div class="mt-2 d-flex justify-content-center form-group" id="">
                                        <select name="kld" id="kld" class="" required>
                                            <option class="text-center" value="0">-- Pilih K/L/D --</option>
                                        </select>
                                    </div>


                                    <div class="mt-2 form-group ">
                                        <input type="text" name="number_letter_of_assignment"
                                            class="text-center form-control" id="number_letter_of_assignment"
                                            placeholder="No Surat Tugas / Mandat" required>
                                        @if ($numberLetterOfAssignment)
                                            <small class="d-flex justify-content-center text-danger">nomer surat sudah
                                                ada</small>
                                        @endif
                                    </div>
                                    <div class="mt-2 form-group ">
                                        <input type="text" name="name_second" class="text-center form-control"
                                            id="name_second" placeholder="Nama Lengkap" required>
                                    </div>
                                    <div class="mt-2 form-group">
                                        <input type="text" name="nip_second" class="text-center form-control"
                                            id="nip_second" placeholder="Nomer Induk Pegawai (NIP)" required>
                                    </div>
                                    <div class="mt-2 form-group ">
                                        <input type="text" name="position_second" class="text-center form-control"
                                            id="position__second" placeholder="Jabatan" required>
                                    </div>

                                    <div class="mt-2 form-group ">
                                        <input type="email" name="email_second" class="text-center form-control"
                                            id="email_Second" placeholder="Email" required>
                                    </div>
                                    <div class="mt-2 form-group ">
                                        <input type="text" name="handphone_second" class="text-center form-control"
                                            id="handphone_second" placeholder="Handphone" required>
                                    </div>
                                </Fieldset>
                            </div>
                            <div class="mt-2 text-center"><button class="btn btn-primary" type="submit">Buat
                                    Surat</button>
                            </div>
                        </form>
                    @else
                        <form action="{{ route('newsletter.update', ['id' => $selectedNewsLetter->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="newsletter_id" value="{{ $selectedNewsLetter->id }}">

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="title" class="form-control" id="title"
                                        placeholder="Judul Berita Acara" value="{{ $selectedNewsLetter->title }}"
                                        required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="text" class="form-control" name="description" id="description"
                                        placeholder="Deskripsi Singkat Berita Acara"
                                        value="{{ $selectedNewsLetter->description }}"" required>
                                </div>
                            </div>
                            <div class="row
                                mt-3">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="location" class="form-control" id="location"
                                        placeholder="Lokasi Kota" value="{{ $selectedNewsLetter->location_city }}""
                                        required>
                                </div>
                                <!-- Masih Ragu cara rubah date time untuk place holder dan valuenya -->
                                <div class="col-md-6
                                form-group mt-3 mt-md-0">
                                    <input type="text" data-date-format="DD MMMM YYYY" class="form-control"
                                        name="date" onfocus="(this.type='date')" placeholder="Masukkan Tanggal"
                                        value="{{ $selectedNewsLetter->event_date }}" required>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <fieldset class="col-md-6 form-group border border-dark">
                                    <legend class="text-center">PIHAK PERTAMA</legend>
                                    <div class="d-flex justify-content-center form-group">
                                        <select name="name_first" id="name_first" required>
                                            <option class="col-md-6 text-center" value="0">-- Pilih Pihak Pertama --
                                            </option>
                                            @foreach ($firstParty as $first)
                                                <option class="col-md-6 text-center" value="{{ $first->id }}"
                                                    {{ $selectedNewsLetter->first_party_id == $first->id ? 'selected' : '' }}>
                                                    {{ $first->fullname }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mt-3 form-group d-flex justify-content-center" id="nip_first">
                                        <label class="px-5 py-1 text-center" for="nip_first">
                                            @if ($selectedFirstParty->nip != null)
                                                {{ $selectedFirstParty->nip }}
                                            @else
                                                NIP
                                            @endif
                                        </label>

                                    </div>
                                    <div class="mt-2 form-group d-flex justify-content-center " id="position_first">
                                        <label class="px-5 py-1 text-center" for="position_first">
                                            @if ($selectedFirstParty->position != null)
                                                {{ $selectedFirstParty->position }}
                                            @else
                                                JABATAN
                                            @endif
                                        </label>
                                    </div>
                                    <div class="mt-2 form-group d-flex justify-content-center" id="agency">
                                        <label class="px-5 py-1 text-center" for="agency">
                                            @if ($selectedFirstParty->agency != null)
                                                {{ $selectedFirstParty->agency }}
                                            @else
                                                INSTANSI
                                            @endif
                                        </label>
                                    </div>
                                    <div class="mt-2 form-group d-flex justify-content-center" id="email_first">
                                        <label class="px-5 py-1 text-center" for="email_first">
                                            @if ($selectedFirstParty->email != null)
                                                {{ $selectedFirstParty->email }}
                                            @else
                                                EMAIL
                                            @endif
                                        </label>
                                    </div>
                                    <div class="mt-2 form-group d-flex justify-content-center" id="handphone_first">
                                        <label class="px-5 py-1 text-center" for="handphone_first">
                                            @if ($selectedFirstParty->handphone != null)
                                                {{ $selectedFirstParty->handphone }}
                                            @else
                                                HANDPHONE
                                            @endif
                                        </label>
                                    </div>
                                </fieldset>

                                <Fieldset class="col-md-6 form-group border border-dark">
                                    <legend class="text-center">PIHAK KEDUA</legend>
                                    <div class="mt-2 form-group ">
                                        <input type="text" name="number_letter_of_assignment"
                                            class="text-center form-control" id="number_letter_of_assignment"
                                            placeholder="No Surat Tugas / Mandat"
                                            value="{{ $selectedNewsLetter->number_letter_of_assignment }}" required>
                                        @if ($numberLetterOfAssignment)
                                            <small class="d-flex justify-content-center text-danger">nomer surat sudah
                                                ada</small>
                                        @endif
                                    </div>
                                    <div class="mt-2 form-group ">
                                        <input type="text" name="name_second" class="text-center form-control"
                                            id="name_second" placeholder="Nama Lengkap"
                                            value="{{ $selectedSecondParty->fullname }}" required>
                                    </div>
                                    <div class="mt-2 form-group">
                                        <input type="text" name="nip_second" class="text-center form-control"
                                            id="nip_second" placeholder="Nomer Induk Pegawai (NIP)"
                                            value="{{ $selectedSecondParty->nip }}" required>
                                    </div>
                                    <div class="mt-2 form-group ">
                                        <input type="text" name="position_second" class="text-center form-control"
                                            id="position__second" placeholder="Jabatan"
                                            value="{{ $selectedSecondParty->position }}" required>
                                    </div>

                                    <div class="mt-2 form-group ">
                                        <input type="email" name="email_second" class="text-center form-control"
                                            id="email_Second" placeholder="Email"
                                            value="{{ $selectedSecondParty->email }}" required>
                                    </div>
                                    <div class="mt-2 form-group ">
                                        <input type="text" name="handphone_second" class="text-center form-control"
                                            id="handphone_second" placeholder="Handphone"
                                            value="{{ $selectedSecondParty->handphone }}"required>
                                    </div>
                                </Fieldset>
                            </div>
                            <div class="mt-2 text-center"><button class="btn btn-primary" type="submit">Perbaharui
                                    Surat</button>
                            </div>
                        </form>
                    @endif


                </div>

            </div>

        </div>
    </section>
    <script type="text/javascript">
        // Date Picker
        $(document).ready(function() {
            $('#datepicker').datepicker({
                dateFormat: "DD, d MM, yy",
                changeMonth: true,
                changeYear: true,
                dayNames: ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"],
                monthNames: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus",
                    "September", "Oktober", "November", "Desemeber"
                ]
            });
        });

        //FirstParty
        $(document).ready(function() {
            $('#name_first').on('change', function() {
                var nameFirstId = this.value;
                console.log(nameFirstId);
                if (nameFirstId == 0) {

                    $('#nip_first').empty();
                    $('#position_first').empty();
                    $('#agency').empty();
                    $('#email_first').empty();
                    ''
                    $('#handphone_first').empty();

                    $('#nip_first').append(
                        '<label class="px-5 py-1 text-center" for="nip_first">NIP</label>');
                    $('#position_first').append(
                        '<label class="px-5 py-1 text-center" for="position_first">JABATAN</label>');
                    $('#agency').append(
                        '<label class="px-5 py-1 text-center" for="agency">INSTANSI</label>');
                    $('#email_first').append(
                        '<label class="px-5 py-1 text-center" for="email_first">EMAIL</label>');
                    $('#handphone_first').append(
                        '<label class="px-5 py-1 text-center" for="handphone_first">HANDPHONE</label>');
                } else {
                    $.ajax({
                        url: '/first-party/' + nameFirstId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {

                            $('#nip_first').empty();
                            $('#position_first').empty();
                            $('#agency').empty();
                            $('#email_first').empty();
                            $('#handphone_first').empty();
                            $.each(data, function(key, value) {
                                $('#nip_first').append(
                                    '<label class="px-5 py-1 text-center" for="nip_first">' +
                                    value.nip + '</label>'
                                );
                                $('#position_first').append(
                                    '<label class="px-5 py-1 text-center" for="position_first">' +
                                    value.position + '</label>'
                                );
                                $('#agency').append(
                                    '<label class="px-5 py-1 text-center" for="agency">' +
                                    value.agency + '</label>'
                                );
                                $('#email_first').append(
                                    '<label class="px-5 py-1 text-center" for="email_first">' +
                                    value.email + '</label>'
                                );
                                $('#handphone_first').append(

                                    '<label class="px-5 py-1 text-center" for="handphone_first">' +
                                    value.handphone + '</label>'
                                );
                            });
                        }
                    });
                }
            });
        });

        // Category KLD
        $(document).ready(function() {
            $('#category').on('change', function() {
                var value = this.value;

                if (value == "1") {

                    $('#provinsi').empty();
                    $('#kld').empty();
                    $('#kld').append(
                        '<option class="text-center" value="0">-- Pilih K/L/D --</option>'
                    );
                    $.ajax({
                        type: "GET",
                        url: "/kementrian",
                        dataType: "json",
                        success: function(response) {
                            console.log(response);
                            $.each(response, function(key, value) {
                                $('#kld').append(
                                    '<option class="text-center" value="' + value
                                    .kementrian +
                                    '">' +
                                    value.kementrian +
                                    '</option>'
                                );
                            });
                        }
                    });
                } else if (value == "2") {

                    $('#provinsi').empty();
                    $('#kld').empty();
                    $('#kld').append(
                        '<option class="text-center" value="0">-- Pilih K/L/D --</option>'
                    );
                    $.ajax({
                        type: "GET",
                        url: "/provinsi",
                        dataType: "json",
                        success: function(response) {
                            console.log(response);
                            $.each(response, function(key, value) {
                                $('#kld').append(
                                    '<option class="text-center" value="' + value
                                    .provinsi +
                                    '">' +
                                    value.provinsi +
                                    '</option>'
                                );
                            });
                        }
                    });
                } else if (value == "3") {

                    $('#provinsi').append(
                        '<select class="mt-2" name="selected_provinsi" id="dropdown_provinsi" required>' +
                        '<option value="">-- Pilih Provinsi --</option>' +
                        '</select>'
                    );
                    $('#kld').empty();
                    $('#kld').append(
                        '<option class="text-center" value="0">-- Pilih K/L/D --</option>'
                    );
                    $.ajax({
                        type: "GET",
                        url: "/provinsi",
                        dataType: "json",
                        success: function(response) {
                            console.log(response);
                            $.each(response, function(key, value) {
                                $('#dropdown_provinsi').append(
                                    '<option class="text-center" value="' + value
                                    .id +
                                    '">' +
                                    value.provinsi +
                                    '</option>'
                                );
                            });
                        }
                    });

                    // KLD Kabupaten Kota
                    $(document).ready(function() {
                        $('#dropdown_provinsi').on('change', function() {
                            var value = this.value;
                            value = value.split(' ').join('-');

                            $.ajax({
                                type: "GET",
                                url: "/kabupaten-kota/" + value,
                                dataType: "json",
                                success: function(response) {
                                    $('#kld').empty();
                                    $('#kld').append(
                                        '<option class="text-center" value="">-- Pilih K/L/D --</option>'
                                    );

                                    $.each(response, function(key, value) {
                                        $('#kld').append(
                                            '<option class="text-center" value="' +
                                            value
                                            .kabupaten_kota +
                                            '">' +
                                            value
                                            .kabupaten_kota +
                                            '</option>'
                                        );
                                    });


                                }
                            });
                        });
                    });
                } else {
                    $('#provinsi').empty();
                    $('#kld').empty();
                    $('#kld').append(
                        '<option class="text-center" value="0">-- Pilih K/L/D --</option>'
                    );
                }
            });
        });
    </script>
@endsection

@section('footer')
    @include('partials.footer')
@endsection
