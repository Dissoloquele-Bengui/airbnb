@extends('layouts._includes.admin.body')
@section('titulo', "Redefinir Senha")
@section('conteudo')
@php
    $login = true;
@endphp
<div class="wrapper vh-100">
    <div class="row align-items-center h-100">
        <form class="mx-auto text-center col-lg-3 col-md-4 col-10" method="POST" action="{{ route('password.update') }}">
            @csrf
            <h1 class="mb-3 h2">Redefinir Senha</h1>
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="form-group">
                <label for="email" class="sr-only">Email</label>
                <input id="email" name="email" type="email" class="form-control form-control-lg" placeholder="Endereço de Email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">
            </div>

            <div class="form-group">
                <label for="password" class="sr-only">Senha</label>
                <input id="password" name="password" type="password" class="form-control form-control-lg" placeholder="Nova Senha" required autocomplete="new-password">
            </div>

            <div class="form-group">
                <label for="password_confirmation" class="sr-only">Confirmação de Senha</label>
                <input id="password_confirmation" name="password_confirmation" type="password" class="form-control form-control-lg" placeholder="Confirme a Nova Senha" required autocomplete="new-password">
            </div>

            <button class="btn btn-lg btn-primary btn-block" type="submit">Redefinir Senha</button>
            <a class="btn btn-lg btn-link btn-block" href="/">Voltar à Página Inicial</a>
            <p class="mt-5 mb-3 text-muted">© 2024</p>
        </form>
    </div>
</div>
@endsection
