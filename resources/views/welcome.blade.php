<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body>
        <header class="container py-3">
            <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
                <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
                @if (Route::has('login'))
                    @auth
                    <a class="me-3 py-2 text-dark text-decoration-none"  href="{{ url('/home') }}" >Início</a>
                    @else
                    <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('login') }}">Entrar</a>
                        @if (Route::has('register'))
                    <a class="py-2 text-dark text-decoration-none" href="{{ route('register') }}">Cadastrar</a>
                        @endif
                    @endauth
                @endif
                </nav>
            </div>
        </header>
        <main>
            <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
                <div class="col-md-5 p-lg-5 mx-auto my-5">
                <img src="img/TodoTask.png" class="img-logo-inicio" alt="TodoTask">
                <h1 class="display-4 fw-normal">TodoTask</h1>
                <p class="lead fw-normal">Mantenha sua equipe na mesma página com nosso sistema de gerenciamento de tarefas online. Nosso sistema de gerenciamento de tarefas online é a solução perfeita para empresas que precisam manter suas equipes organizadas e produtivas. Com nosso sistema, você pode atribuir tarefas aos membros da equipe, definir prazos e acompanhar o progresso em tempo real.</p>
                <a class="btn btn-outline-secondary" href="{{ url('/home') }}">ENTRAR</a>
                </div>
                <div class="product-device shadow-sm d-none d-md-block"></div>
                <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
            </div>
        </main>
    </body>
</html>
