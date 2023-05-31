@extends('template')
@section('title-view')
Meus Eventos
@endsection

@section('include-css')
<link rel="stylesheet" type="text/css" href="{{ asset('static/plugins/tabulator-5.3.1/css/tabulator.min.css') }}" />
<link rel="stylesheet" type="text/css"
    href="{{ asset('static/plugins/tabulator-5.3.1/css/tabulator_bootstrap5.min.css') }}" />
@endsection
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Listagem de eventos</h1>
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
                    <div id="table-events"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('include-js')
<script type="text/javascript" src="{{ asset('static/plugins/tabulator-5.3.1/js/tabulator.min.js') }}"></script>
<script type="module" src="{{ asset('static/js/web/all-events.min.js') }}"></script>
@endsection