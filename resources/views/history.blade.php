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
                <h2>History</h2>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">User</th>
                            <th scope="col">Updated At</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @for ($i = 0; $i < count($names); $i++)
                            <tr>
                                <th>{{ $i + 1 }}</th>
                                <td>{{ $names[$i] }}</td>
                                <td>{{ $updates[$i] }}</td>
                                <td>
                                    @if ($aksi[$i] != null)
                                        <a href="{{ route('newsletter-history.cetak', ['id' => $aksi[$i]]) }}"
                                            class="btn btn-success" target="_BLANK">CETAK</a>
                                    @endif
                                </td>
                            </tr>
                        @endfor
                        @foreach ($names as $index => $name)
                        @endforeach
                        @foreach ($updates as $update)
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- {{ $newsletters->links() }} --}}
        </div>
    </section><!-- End Contact Section -->
@endsection

@section('footer')
    @include('partials.footer')
@endsection
