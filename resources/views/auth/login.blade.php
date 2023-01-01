@extends('layouts.main')

@section('head')
    @include('partials.head')
@endsection

@section('header')
    @include('partials.header')
@endsection

@section('content')
    @if (session()->has('registered'))
        <script type="text/javascript">
            window.alert("Already Registered Please Login")
        </script>
    @endif
    <section id="form" class="form">
        <div class="container w-50" data-aos="fade-up">

            <div class="section-title">
                <h2>Form Login</h2>
            </div>
            <form method="POST" action="{{ route('login.auth') }}">
                @csrf
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>
                <div class="form-group py-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <div class="row justify-content-center">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('footer')
    @include('partials.footer')
@endsection
