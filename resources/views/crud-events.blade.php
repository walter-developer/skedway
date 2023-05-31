@extends('template')
@section('title-view')
Gerenciar Eventos
@endsection
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Gerênciar evento(s)</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">
            {{ $event?->count() ? ('Editar Evento #'. $event?->get('id')) : 'Cadastrar Evento'}}
        </li>
    </ol>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fa-solid fa-calendar-days me-1"></i>
                    {{ $event?->count() ? ('Editar Evento #'. $event?->get('id')) : 'Cadastrar Evento'}}
                </div>
                <div class="card-body">
                    <form method="POST"
                        action="{{ $event?->count() ? route('events.event.post') : route('events.event.put') }}">
                        @csrf
                        @if ($event?->count())
                        @method('PUT')
                        @endif
                        <input type="hidden" id="id" name="id" value="{{ @old('id', $event?->get('id')) }}">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="value" class="form-label">Título</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ @old('title', $event?->get('title')) }}" placeholder="Titúlo do evento">
                            </div>
                            <div class="col-md-6">
                                <label for="timezone" class="form-label">Timezone Local</label>
                                <select class="form-select" id="timezone" name="timezone"
                                    aria-label="Default select example" readonly="readonly">
                                    @foreach (( $timezones?->toArray() ?: [] ) as $timezone )
                                    <option value="{{ $timezone['id'] ?? 0 }}"
                                        timezone="{{ strtoupper($timezone['description'] ?? 'UTC') }}" {{
                                        @old('timezone', $event?->
                                        get('timezone'))
                                        == ($timezone['id'] ?? 0) ? 'selected' : null }}>
                                        {{ $timezone['description'] ?? 'UTC' }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="start" class="form-label">Data e Hora de Início do Evento</label>
                                <input type="datetime-local" class=" form-control" id="start" name="start"
                                    cast-utc="{{ @old('start', 0) ? false : true }}"
                                    value="{{ @old('start', $event?->get('start')) }}" placeholder="01/01/2000">
                            </div>
                            <div class="col-md-6">
                                <label for="end" class="form-label">Data e Hora de Final do Evento</label>
                                <input type="datetime-local" class=" form-control" id="end" name="end"
                                    cast-utc="{{ @old('end', 0) ? false : true }}"
                                    value="{{ @old('end', $event?->get('end')) }}" placeholder="01/01/2000">
                            </div>
                            <div class="col-12">
                                <label for="description" class="form-label">Descrição do evento</label>
                                <textarea class="form-control" id="description" name="description" rows="3"
                                    value="{{ @old('description', $event?->get('description')) }}">{{ @old('description', $event?->get('description')) }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary mb-2">
                                    {{ $event?->count() ? 'Salvar Evento': 'Cadastrar Evento'}}
                                </button>
                            </div>
                            @if ($event?->count())
                            <div class="col-md-6">
                                <a href="{{ route('events.event.delete.get', [ 'event' =>  @old('id', $event?->get('id', 0)) ]) }}"
                                    class="btn btn-danger mb-2">
                                    Excluir Evento
                                </a>
                            </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('include-js')
<script type="module" src="{{ asset('static/js/web/crud-events.min.js') }}"></script>
@endsection