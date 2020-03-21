<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> --}}
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/main.stylesheet.css') }}">

    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    
    @stack('styles')
    
    <title>Portal da transparência - @yield('title') </title>
</head>
<body>
    
    <header>
        <div class="container-icon">
            <i class="fa fa-bars"></i>
        </div>

        <h5> Portal da Transferência - API </h5>

        <div class="container-image-header">
            <img src="{{ asset('images/user.jpg') }}" alt="">
        </div>
    </header>

    <nav id="sidebar">
        <ul>
            <li>
                <div class="container-icon">
                    <i class="fa fa-bars"></i>
                </div>
                <a href="">Bolsa Família</a>
            </li>
        </ul>
        
        <ul>
            <li>
                <div class="container-icon">
                    <i class="fa fa-bars"></i>
                </div>
                <a href="">Despesas Públicas</a>
            </li>
        </ul>

        <ul>
            <li>
                <div class="container-icon">
                    <i class="fa fa-bars"></i>
                </div>
                <a href="">Viagens a Serviço</a>
            </li>
        </ul>
    </nav>

    <section id="container-content" class="flex-center panel">
        
        @yield('content')

    </section>
    
    <script type="text/javascript" src="{{ asset('js/dev.js') }}"></script>
</body>
</html>