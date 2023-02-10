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
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            Local do evento: {{ $evento->local }}
                        </div>
                        <div class="mb-3">
                            @if ($evento->data_fim)
                                Data do Evento: {{ \date("d/m/Y", strtotime($evento->data_inicio)) }} à {{ \date("d/m/Y", strtotime($evento->data_fim)) }}
                            @else
                                Data do Evento: {{ \date("d/m/Y", strtotime($evento->data_inicio)) }};
                            @endif
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <a href="{{ url('/evento/'.$evento->slug) }}" target="_blank" class="btn btn-primary">Link para a página do evento</a>
                        </div>
                    </div>
                </div>
                <div>
                    <table class="table">
                        <h2>Lista de Inscritos</h2>
                        <thead>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Idade</th>
                            <th>Telefone</th>
                            {{-- <th>Status Inscrição</th>
                            <th>Ações</th> --}}
                        </thead>
                        <tbody>
                            @foreach ($inscritos as $inscrito)
                            <tr>
                                <td>
                                    {{ $inscrito->nome }}
                                </td>
                                <td>
                                    {{ $inscrito->email }}
                                </td>
                                <td>
                                    {{ $inscrito->idade }}
                                </td>
                                <td>
                                    @php
                                        $mask = '(##) ####-####';
                                    @endphp
                                    {{ mask($mask, $inscrito->telefone) }}
                                </td>
                                {{-- <td>
                                    Aprovada
                                </td>
                                <td>
                                    <button>Aprovar</button>
                                    <button>Negar</button>
                                </td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
