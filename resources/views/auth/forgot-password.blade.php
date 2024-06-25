@extends('layouts._includes.admin.body')
@section('titulo', "Recuperar Senha")
@section('conteudo')
@php
    $login = true;
@endphp
<div class="wrapper vh-100">
    <div class="row align-items-center h-100">
        <form class="mx-auto text-center col-lg-3 col-md-4 col-10" method="POST" action="{{ route('password.email') }}">
            @csrf
            <h1 class="mb-3 h2">Recuperar Senha</h1>
            <div class="mb-4 text-sm text-gray-600">
                {{ __('Esqueceu sua senha? Sem problemas. Informe seu endereço de email e enviaremos um link para redefinição de senha.') }}
            </div>

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <div class="form-group">
                <label for="email" class="sr-only">Email</label>
                <input id="email" name="email" type="email" class="form-control form-control-lg" placeholder="Endereço de Email" value="{{ old('email') }}" required autofocus autocomplete="username">
            </div>

            <button class="btn btn-lg btn-primary btn-block" type="submit">Enviar Link de Redefinição de Senha</button>
            <a class="btn btn-lg btn-link btn-block" href="/">Voltar à Página Inicial</a>
            <p class="mt-5 mb-3 text-muted">© 2024</p>
        </form>
    </div>
</div>
@endsection
