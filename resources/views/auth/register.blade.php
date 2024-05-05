
@php
     $login = true;
@endphp
@extends('layouts._includes.admin.body')
@section('titulo',"Login")
@section('conteudo')

<div class="wrapper vh-100">
    <div class="row align-items-center h-100" >
      <form class="mx-auto text-center col-lg-6 col-md-8 col-10" method="POST" action="{{ route('register') }}">

        @csrf
        <h1 class="mb-3 h2">Registar</h1>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="inputEmail" class="sr-only">Nome </label>
                    <input name="name" type="text" id="name" class="form-control form-control-lg" placeholder="Nome Completo" required autofocus="">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputEmail" class="sr-only">Email </label>
                  <input name="email" type="email" id="inputEmail" class="form-control form-control-lg" placeholder="Endereço de Email " required autofocus="">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword" class="sr-only">Password</label>
                  <input type="password" name="password" required autocomplete="current-password" class="form-control form-control-lg" placeholder="Password" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" name="password_confirmation" required autocomplete="current-password" class="form-control form-control-lg" placeholder="Confirmar a Password" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="tipo">Nível de Acesso*</label>
                    <select name="tipo"
                        id="nivel" class="form-control select2">
                            @if (!isset($campeonato_view))
                                <option value="Admin de Campeonato" >Administrador de Campeonato</option>
                                <option value="Administrador de Equipa" >Administrador de Equipa</option>
                                <option value="Arbitro" >Arbitro</option>
                            @endif
                    </select>
                </div>
            </div>

        <div class="mb-3 checkbox">
          <label>
            <input type="checkbox" value="remember-me" name="remember"> Lembrar a senha </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Registrar Se</button>
        <p class="mt-5 mb-3 text-muted">© 2024</p>
      </form>
    </div>
@endsection

