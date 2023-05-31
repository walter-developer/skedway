<!DOCTYPE html>
<html lang="{{ config('app.configuration.lang', str_replace('_', '-', app()->getLocale())) }}">

<head>
    <title>{{ config('app.name') }} - @yield('title-view')</title>
    <meta name="description" content="Avaliação Skedway">
    <meta name="author" content="Walter de Padua junior">
    <meta charset="{{ config('app.configuration.charset') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="content-type" content="text/html; charset={{ config('app.configuration.charset') }}">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link href="{{ asset('static/img/favicon.svg') }}" rel="icon" type="image/svg+xml">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('static/plugins/bootstrap-5.0.2/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('static/plugins/bootstrap-icons-1.10.5/font/bootstrap-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('static/plugins/startbootstrap-sb/css/styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('static/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('static/css/web/template.css') }}">
    @yield('include-css')
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-3" href="index.html">Events Skedway</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Buscar Evento..." aria-label="Buscar Evento..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Eventos</div>
                        <a class="nav-link" href="{{ route('calendar.calendar.get') }}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-calendar-days"></i></div>
                            Meus Eventos
                        </a>
                        <a class="nav-link" href="{{ route('events.event.get')  }}">
                            <div class="sb-nav-link-icon"><i class="fa-regular fa-calendar-plus"></i></div>
                            Novo Evento
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <section id="alert" class="container container-alert" {{ !$errors->any() ? 'hidden' : ''}}>
                @if($errors->any())
                <div class="container p-5">
                    @foreach($errors->getMessages() as $errors)
                    <div class="alert alert-danger m-3 text-center" role="alert">
                        {{ $errors[0] ?? 'Um erro ocorreu, tente novamente!'}}
                    </div>
                    @endforeach
                </div>
                @endif
            </section>
            <main>
                @yield('content')
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Skedway Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('static/plugins/jquery-3.6.4/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('static/plugins/bootstrap-5.0.2/dist/js/bootstrap.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('static/plugins/bootstrap-5.0.2/dist/js/bootstrap.bundle.min.js') }}">
    </script>
    <script src="{{ asset('static/plugins/fontawesome-free/js/all.min.js') }}"></script>
    <script type="module" src="{{ asset('static/js/web/template.min.js') }}"></script>
    @yield('include-js')
</body>

</html>