<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>



<!-- Vendor JS Files -->
<script src={{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}></script>
<script src={{ asset('assets/vendor/aos/aos.js') }}></script>
<script src={{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}></script>
<script src={{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}></script>
<script src={{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}></script>
<script src={{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}></script>
<script src={{ asset('assets/vendor/typed.js/typed.min.js') }}></script>
<script src={{ asset('assets/vendor/waypoints/noframework.waypoints.js') }}></script>
<script src={{ asset('assets/vendor/php-email-form/validate.js') }}></script>
<!-- Template Main JS File -->
<script src={{ asset('assets/js/main.js') }}></script>

{{-- <script src="{{ asset('assets/jquery/jquery-3.6.1.min.js') }}"></script>
<script src="{{ asset('assets/jquery/jquery-ui.min.js') }}"></script> --}}

{{--
<script type="text/javascript">
    $(document).ready(function() {
        $('#name_first').on('change', function() {
            var nameFirstId = this.value;
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

    // Getting Value Category
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
                                .nama_kementrian +
                                '">' +
                                value.nama_kementrian +
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
                    url: "/provinsi/kabupaten-kota",
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        $.each(response, function(key, value) {
                            $('#kld').append(
                                '<option class="text-center" value="' + value +
                                '">' +
                                value +
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
                    url: "/provinsi/kabupaten-kota",
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        $.each(response, function(key, value) {
                            $('#dropdown_provinsi').append(
                                '<option class="text-center" value="' + value +
                                '">' +
                                value +
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

    $(document).ready(function() {
        isi()
    });

    function isi() {

        $('#table1').DataTable({
            serverside: true,
            responseive: true,
            ajax: {
                url: "{{ route('datatables') }}"
            },
            columns: [{
                    "data": null,
                    "sortable": false,
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1
                    }
                }, {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'description',
                    name: 'description'
                },
                {
                    data: 'category',
                    name: 'category'
                },
                {
                    data: 'aksi',
                    name: 'aksi'
                },


            ]
        })
    }







    // $(document).ready(function() {
    //     $("#searching").on("keyup", function() {
    //         let value = this.value;
    //         console.log(value);
    //         $.ajax({
    //             type: "GET",
    //             url: "/autocomplete",
    //             data: {
    //                 'search': value
    //             },
    //             dataType: "json",
    //             success: function(response) {
    //                 let result = `
    //                 <table class="table table-hover">
    //             <thead>
    //                 <tr>
    //                     <th scope="col">No</th>
    //                     <th scope="col">Judul</th>
    //                     <th scope="col">Deskripsi</th>
    //                     <th scope="col">Aksi</th>
    //                 </tr>
    //             </thead>
    //             <tbody>
    //                 `;
    //                 // result .= ''
    //                 $.each(response, function(key, value) {
    //                     result += `<tr>
    //                         <th scope="row">${key+1} + $newsletters -> firstItem()</th>
    //                         <td> $newsletter->title </td>
    //                         <td> $newsletter->description </td>
    //                         <td class="list-group">
    //                             <ul class="list-group list-group-horizontal">
    //                                 <li class="list-group-item"><a
    //                                         href= url('/storage/' . $newsletter->id . '/edit')
    //                                         class="bx bx-user list-group-item list-group-item-action"><span
    //                                             class="mx-2">Edit</span></a></li>
    //                                 <li class="list-group-item"><a href="/newsletter/ $newsletter->id "
    //                                         class="bx bx-user list-group-item list-group-item-action"><span
    //                                             class="mx-2">View</span></a></li>
    //                                 <li class="list-group-item"><a href="/delete/ $newsletter->id "
    //                                         class="bx bx-user list-group-item list-group-item-action"><span
    //                                             class="mx-2">Delete</span></a></li>
    //                                 <li class="list-group-item"><a href="/"
    //                                         class="bx bx-user list-group-item list-group-item-action"><span
    //                                             class="mx-2">Unduh</span></a></li>
    //                                 <li class="list-group-item"><a href="/"
    //                                         class="bx bx-user list-group-item list-group-item-action"><span
    //                                             class="mx-2">History</span></a></li>
    //                             </ul>
    //                         </td>
    //                     </tr>`;
    //                 });
    //                 result += `</tbody></table>`;
    //                 $ {
    //                     "#result"
    //                 }.html(result);
    //             }

    //         });
    //     });
    // });
</script> --}}
