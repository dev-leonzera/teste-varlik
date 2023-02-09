@extends('layouts.evento')
@section('content')
    <div class="row">
        <img src="{{ asset('img/'.$evento->banner) }}" alt="" srcset="">
    </div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="row">
        <h1 style="text-align: center">{{ $evento->title }}</h1>
        <p>
            {{ $evento->description }}
        </p>
        @if ($qnt_inscritos === $evento->capacidade)
            <a href="#" class="btn btn-secondary disabled">Inscrições Encerradas</a>
        @else
            <a href="{{ url('/evento/'. $evento->id .'/inscricao') }}" class="btn btn-success">Faça sua inscrição</a>
        @endif
    </div>
@endsection
