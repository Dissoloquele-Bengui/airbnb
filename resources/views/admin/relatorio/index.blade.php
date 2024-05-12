@extends('layouts._includes.admin.body')
@section('titulo', 'Lista dos Tipos de Consultas/Hospital')

@section('conteudo')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12">
      <div class="row">
        <!-- Small table -->
        <div class="my-4 col-md-12">
            <h2 class="">
                Relatório das Propriedades
            </h2>
          <div class="p-3 shadow card">
            <div class="card-body">
                <form action="{{route('admin.relatorio.gerar')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Data de Inicio</label>
                                    <input type="date" class="form-control" name="inicio">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Data de termino</label>
                                    <input type="date" class="form-control" name="termino">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-md">Cadastrar</button>
                    </div>
                </form>

            </div>
          </div>
        </div> <!-- customized table -->
      </div> <!-- end section -->
    </div> <!-- .col-12 -->
  </div> <!-- .row -->
</div> <!-- .container-fluid -->

@endsection
