@extends('layouts.main')

@section('head')
    @include('partials.head')
@endsection

@section('header')
    @include('partials.header')
@endsection

@section('content')
    <!-- ======= Contact Section ======= -->
    <section id="storage" class="storage">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Storage</h2>
            </div>

            <div class="table-responsive">
                <table class="table table-hover" id="example">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($newsletters as $key => $newsletter)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $newsletter->title }}</td>
                                <td>{{ $newsletter->kld }}</td>
                                <td>
                                    <ul class="list-group list-group-horizontal">
                                        <li class="list-group-item"><a
                                                href="{{ route('newsletter.edit', ['newsletter' => $newsletter->id]) }}"
                                                class="btn btn-warning">EDIT</a></li>
                                        <li class="list-group-item"><a
                                                href="{{ route('newsletter.cetak', ['id' => $newsletter->id]) }}"
                                                class="btn btn-success" target="_BLANK">CETAK</a></li>
                                        <li class="list-group-item"><a
                                                href="{{ route('newsletter.delete', ['newsletter' => $newsletter->id]) }}"
                                                class="btn btn-danger">DELETE</a></li>
                                        <li class="list-group-item"> <a
                                                href="{{ route('newsletter.history', ['newsletter' => $newsletter->id]) }}"
                                                class="btn btn-secondary">RIWAYAT</a></li>
                                    </ul>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- {{ $newsletters->links() }} --}}
        </div>
    </section><!-- End Contact Section -->
@endsection

@section('footer')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    @include('partials.footer')
@endsection
