@extends('layouts.app')

@section('content')
<div class="container">

    <form class="card card-md" action="{{ url('/eventos/' . $evento->id) }}" method="post" autocomplete="off">
        @csrf
        @method("PATCH")
        <div class="card-header">
            <h2>{{ $evento->title }}</h2>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">{{ __('Nome do Evento') }}</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                    placeholder="{{ __('Nome do Evento') }}" value="{{ $evento->title }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">{{ __('Local do Evento') }}</label>
                <input type="text" name="local" class="form-control @error('local') is-invalid @enderror"
                    placeholder="{{ __('Local do Evento') }}" value="{{ $evento->local }}">
                @error('local')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Data do Evento</label>
                <input type="date" name="data_inicio" class="form-control" value="{{ $evento->data_inicio }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Data do Encerramento</label>
                <input type="date" name="data_fim" class="form-control" value="{{ $evento->data_fim }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Capacidade Máxima</label>
                <input type="number" name="capacidade" class="form-control" value="{{ $evento->capacidade }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Banner</label>
                <input type="file" name="image" class="form-control">
            </div>

            <div class="col-lg-12">
                <div>
                    <label class="form-label">Descrição do Evento</label>
                    <textarea class="form-control" name="description" rows="3">{{ $evento->description }}</textarea>
                </div>
            </div>
            <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">{{ __('Salvar') }}</button>
            </div>
        </div>
    </form>
</div>

@endsection
