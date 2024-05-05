@extends('layouts._includes.admin.body')
@section('titulo','Actualizar Usuário')
@php
    $user = Auth::user();
@endphp
@section('conteudo')
    <div class="mb-4 shadow card">
        <div class="card-header">
        <strong class="card-title">Actualizar Usuário</strong>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.user.update', ['id' => $user->id]) }}
                " method="post">
                @csrf
                <div class="card-body">
                    @include('_form.userForm.index')
                    <button type="submit" class="btn btn-primary w-md">Actualizar</button>
                </div>
            </form>
        </div>
    </div>

@if (session('restaurante.update.success'))
    <script>
        Swal.fire(
            'Usuário Actualizada com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('restaurante.update.error'))
    <script>
        Swal.fire(
            'Erro ao Actualizar Usuário!',
            '',
            'error'
        )
    </script>
@endif

@endsection
