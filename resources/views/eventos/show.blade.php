@extends('layouts.app')

@section('content')
<div class="page-body">

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>
                    {{ $evento->title }}
                </h2>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    Local do evento: {{ $evento->local }}
                </div>
                <div class="mb-3">
                    Data do Evento: {{ \date("d/m/Y", strtotime($evento->data_evento)) }}
                </div>
                <div class="mb-3">
                    <p>
                        {{ $evento->description }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
