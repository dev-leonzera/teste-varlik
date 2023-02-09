@extends('layouts.evento')

<body>
    <div class="container-xl">
        <form class="card card-md" action="{{ url('evento/form') }}" method="post" autocomplete="off">
            @csrf
            <div class="card-header">
                <h1>{{ $evento->title . ' - ' . 'Inscrição' }}</h1>
            </div>
            <div class="card-body">
                <input type="hidden" name="evento_id" value="{{ $evento->id }}">
                <div class="mb-3">
                    <label class="form-label">{{ __('Nome completo') }}</label>
                    <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror"
                        placeholder="{{ __('Nome completo') }}">
                    @error('nome')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('Idade') }}</label>
                    <input type="number" name="idade" class="form-control @error('idade') is-invalid @enderror" placeholder="{{ __('Idade') }}">
                    @error('idade')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('Telefone') }}</label>
                    <input type="text" name="telefone" class="form-control @error('telefone') is-invalid @enderror" placeholder="{{ __('Telefone') }}">
                    @error('telefone')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('Email') }}</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('Email') }}">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">{{ __('Salvar') }}</button>
                </div>
            </div>
        </form>
    </div>
</body>
