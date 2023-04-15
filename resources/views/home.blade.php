@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

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
                            <li class="list-group-item media-right">
                                {{ $tarefa->tarefa }}
                                <a class="media-object">BV</a>
                            </li>
                        @empty
                            <li class="list-group-item list-group-item-danger">Tarefa não Encontrada.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
