@extends('layouts.app')

@section('content')
<div class="text-center">
    <div class="form-registro">
        <form  method="POST" action="{{ route('register') }}">
            @csrf
            <img class="mb-4" src="img/TodoTask.png" alt="" width="72" height="72">
            <h1 class="h3 mb-3 fw-normal">Cadastrar</h1>

            <div class="form-floating">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                <label for="name">Nome</label>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-floating">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                <label for="email">Email</label>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-floating">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                <label for="password">Senha</label>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-floating">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                <label for="password-confirm">Confirmar Senha</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Registrar</button>
        </form>
    </div>
</div>

@endsection
