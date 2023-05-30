@extends('template')
@section('title-view')
Meus Eventos
@endsection

@section('include-css')
<link rel="stylesheet" type="text/css" href="{{ asset('static/plugins/evo-calendar/css/evo-calendar.min.css') }}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('static/plugins/evo-calendar/css/evo-calendar.matte-dark.css') }}">
@endsection
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Calendário de eventos</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Eventos agendados</li>
    </ol>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fa-solid fa-calendar-days me-1"></i>
                    Seus Eventos
                </div>
                <div class="card-body">
                    <div id="evoCalendar"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('include-js')
<script src="{{ asset('static/plugins/evo-calendar/js/evo-calendar.min.js') }}"></script>
<script type="module" src="{{ asset('static/js/web/events-calendar.min.js') }}"></script>
@endsection