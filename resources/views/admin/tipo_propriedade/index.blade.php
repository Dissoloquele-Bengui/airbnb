@extends('layouts._includes.admin.body')
@section('titulo', 'Lista dos Tipos de Propriedades')

@section('conteudo')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12">
      <div class="row">
        <!-- Small table -->
        <div class="my-4 col-md-12">
            <h2 class="">
              Lista dos Tipos de Propriedades
            </h2>
          <div class="p-3 shadow card">
            <div class="card-body">
              <div class="mb-3 toolbar row">
                <div class="ml-auto col">
                    <div class="float-right dropdown">
                      <button class="float-right ml-3 btn btn-primary"
                      class="btn botao" data-toggle="modal" data-target="#ModalCreate"
                      type="button">Adicionar +</button>

                    </div>
                  </div>

              </div>
              <!-- table -->
              <table class="table datatables" id="dataTable-1">
                <thead class="thead-dark">
                  <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>OPÇÕES</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($tipo_propriedades as $tipo_propriedade)
                        <tr>
                            <td>{{$tipo_propriedade->id}}</td>
                            <td>{{{$tipo_propriedade->nome}}}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" ariaexpanded="false">
                                    <span class="sr-only text-muted">Action</span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#ModalEdit{{$tipo_propriedade->id}}">{{ __('Editar') }}</a>
                                        <a class="dropdown-item" href="{{route('admin.tipo_propriedade.destroy',['id'=>$tipo_propriedade->id])}}">{{ __('Remover') }}</a>
                                        <a class="dropdown-item" href="{{route('admin.tipo_propriedade.purge',['id'=>$tipo_propriedade->id])}}">{{ __('Purgar') }}</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        {{-- ModalUpdate --}}
                        <div class="text-left modal fade" id="ModalEdit{{$tipo_propriedade->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-md" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">{{ __('Editar Tipo de Propriedade') }}</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.tipo_propriedade.update', ['id' => $tipo_propriedade->id]) }}
                                            " method="post">
                                            @csrf
                                            <div class="card-body">
                                                @include('_form.tipo_propriedadeForm.index')
                                                <button type="submit" class="btn btn-primary w-md">Actualizar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- ModalUpdate --}}
                    @endforeach
                </tbody>
              </table>

            </div>
          </div>
        </div> <!-- customized table -->
      </div> <!-- end section -->
    </div> <!-- .col-12 -->
  </div> <!-- .row -->
</div> <!-- .container-fluid -->

{{-- ModalCreate --}}
<div class="text-left modal fade" id="ModalCreate" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('Adicionar Tipo de Propriedade') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.tipo_propriedade.store')}}" method="post">
                    @csrf
                    <div class="card-body">
                        {{ $tipo_propriedade = null }}
                        @include('_form.tipo_propriedadeForm.index')
                        <button type="submit" class="btn btn-primary w-md">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- ModalCreate --}}
@if (session('tipo_propriedade.destroy.success'))
    <script>
        Swal.fire(
            'Tipo de Propriedade Eliminado com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('tipo_propriedade.destroy.error'))
    <script>
        Swal.fire(
            'Erro ao Eliminar Tipo de Propriedade!',
            '',
            'error'
        )
    </script>
@endif
@if (session('tipo_propriedade.purge.success'))
    <script>
        Swal.fire(
            'Tipo de Propriedade Purgado com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('tipo_propriedade.purge.error'))
    <script>
        Swal.fire(
            'Erro ao Purgar Tipo de Propriedade!',
            '',
            'error'
        )
    </script>
@endif
@if (session('tipo_propriedade.create.success'))
    <script>
        Swal.fire(
            'Tipo de Propriedade Cadastrado com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('tipo_propriedade.create.error'))
    <script>
        Swal.fire(
            'Erro ao Cadastrar Tipo de Propriedade!',
            '',
            'error'
        )
    </script>
@endif
@if (session('tipo_propriedade.update.success'))
    <script>
        Swal.fire(
            'Tipo de Propriedade Actualizado com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('tipo_propriedade.update.error'))
    <script>
        Swal.fire(
            'Erro ao Actualizar Tipo de Propriedade!',
            '',
            'error'
        )
    </script>
@endif
@endsection
