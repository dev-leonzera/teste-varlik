@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <!-- Page pre-title -->
                        <h2 class="page-title">
                            Eventos
                        </h2>
                    </div>
                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <a href="#" class="btn btn-success d-none d-sm-inline-block" data-bs-toggle="modal"
                                data-bs-target="#modal-create">
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 5l0 14"></path>
                                    <path d="M5 12l14 0"></path>
                                </svg>
                                Novo Evento
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">

            <div class="card">
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap datatable" id="dataTable" width="100%"
                        cellspacing="0">
                        <thead>
                            <tr>
                                <th>{{ __('Nome do evento') }}</th>
                                <th>{{ __('Data de Início') }}</th>
                                <th>{{ __('Data de Encerramento') }}</th>
                                <th>{{ __('Local') }}</th>
                                <th>{{ __('') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($eventos as $evento)
                                <tr>
                                    <td>{{ $evento->title }}</td>
                                    <td>{{ \date('d/m/Y', strtotime($evento->data_inicio)) }}</td>
                                    <td>{{ \date('d/m/Y', strtotime($evento->data_fim)) }}</td>
                                    <td>{{ $evento->local }}</td>
                                    <td>
                                        <span class="dropdown">
                                            <a href="{{ url('/eventos/' . $evento->id) }}" class="btn btn-primary">
                                                Visualizar
                                            </a>
                                            <a href="{{ url('/eventos/' . $evento->id) . '/edit' }}" class="btn btn-secondary d-none d-sm-inline-block">
                                                Editar
                                            </a>
                                            <form action="{{ url('/eventos/' . $evento->id) }}" method="post" style="display: inline">
                                                {{ @method_field('DELETE') }}
                                                {!! csrf_field() !!}
                                                <button type="submit" class="btn btn-danger">
                                                    Remover
                                                </button>
                                            </form>
                                            <div class="dropdown-menu dropdown-menu-end" style="">
                                                <a class="dropdown-item" href="#">
                                                    Visualizar Evento
                                                </a>
                                                <a class="dropdown-item" href="#">

                                                </a>
                                            </div>
                                        </span>
                                    </td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if ($eventos->hasPages())
                    <div class="card-footer pb-0">
                        {{ $eventos->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Modal Form Cadastro de Eventos -->
    <div class="modal modal-blur fade" id="modal-create" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Novo Evento') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="card card-md" action="{{ url('eventos') }}" method="post" autocomplete="off" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Nome do Evento') }}</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                placeholder="{{ __('Nome do Evento') }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{ __('Local do Evento') }}</label>
                            <input type="text" name="local" class="form-control @error('local') is-invalid @enderror"
                                placeholder="{{ __('Local do Evento') }}" required>
                            @error('local')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Início</label>
                            {{-- <input type="datetime-local" name="data_inicio" class="form-control"> --}}
                            <input name="data_inicio" type="date" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Fim</label>
                            <input name="data_fim" type="date" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Capacidade Máxima</label>
                            <input type="number" name="capacidade" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Banner</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label class="form-label">Descrição do Evento</label>
                                <textarea class="form-control" name="description" rows="5" required></textarea>
                            </div>
                        </div>
                        <div class="form-footer d-flex">
                            <button type="submit" class="btn btn-primary">{{ __('Salvar') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
