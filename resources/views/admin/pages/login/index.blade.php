@extends('admin.layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/login.stylesheet.css') }}">
@endpush

@section('title', 'Login')



@section('content')
    
    <section id="container-login" class="border-box">
        <div class="container-image flex-center">
            <img src="{{ asset('images/logomark.min.svg') }}" alt="logomarca da aplicação">
        </div>

        <h1>Portal da transparência</h1>

        <form action="">
            @csrf

            <div class="field-icon">
                <label><i class="fa fa-user"></i></label>
                <input type="email" name="email">
            </div>

            <div class="field-icon">
                <label><i class="fa fa-lock"></i></label>
                <input type="password" name="password">
            </div>

            <div class="container-button">
                <button type="submit" class="btn btn-info">Acessar</button>
            </div>

        </form>
    </section>

@endsection