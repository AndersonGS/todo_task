@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="float-start">{{ __('TAREFAS') }}</h2>
                    <div class="float-end" >
                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#adicionarTarefaModal">
                        <i class="bi bi-plus-circle-fill"></i>
                        Nova Tarefa
                    </button>

                </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form>
                        <input type="search" class="form-control" placeholder="Buscar tarefa aqui" name="search" value="{{ request('search') }}">
                    </form>

                    <!-- List items -->
                    <ul class="list-group mt-3">
                        @forelse($tarefas as $tarefa)
                        <li class="list-group-item">
                            <div class="float-start">
                                <b id='lst_trf_titulo_{{ $tarefa->id }}'>{{ $tarefa->titulo }}</b></br>
                                <i id='lst_trf_descricao_{{ $tarefa->id }}'>{{ $tarefa->descricao }}</i>
                            </div>
                            <div class="float-end" >
                                <td>
                                    <ul class="list-inline m-0">
                                        <li class="list-inline-item">
                                            <i id='lst_trf_data_{{ $tarefa->id }}'>{{ date('d/m/Y', strtotime($tarefa->data_limite_conclusao)); }}</i>
                                        </li>
                                        <li class="list-inline-item">
                                            @foreach ($tarefa->users as $user)
                                            <label class="circle-avatar"
                                            data-bs-toggle="tooltip"
                                            data-bs-placement="bottom"
                                            data-bs-title="{{ $user->name }}" value="{{ $user->id }}" id='lst_trf_usuario_{{ $tarefa->id }}'>
                                                {{ $user->name[0] . $user->name[1] }}
                                            </label>
                                            @endforeach
                                        </li>
                                        <li class="list-inline-item">
                                            <button
                                            type="button"
                                            class="btn btn-outline-warning btn-sm"
                                            data-bs-placement="bottom"
                                            data-bs-title="Editar"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editarTarefaModal"
                                            data-bs-whatever="{{ $tarefa->id }}">
                                                <i class="bi bi-pencil"></i></button>
                                        </li>
                                        <li class="list-inline-item">
                                            <button
                                            type="button"
                                            class="btn btn-outline-danger btn-sm"
                                            data-bs-placement="bottom"
                                            data-bs-title="Deletar"
                                            data-bs-toggle="modal"
                                            data-bs-target="#deletarTarefaModal"
                                            data-bs-whatever="{{ $tarefa->id }}">
                                                <i class="bi bi-trash"></i></button>
                                        </li>
                                    </ul>
                                </td>
                            </div>
                        </li>
                        @empty
                            <li class="list-group-item list-group-item-danger">Tarefa não Encontrada.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @include('modal.adicionar')
    @include('modal.editar')
    @include('modal.deletar')
</div>
@endsection
