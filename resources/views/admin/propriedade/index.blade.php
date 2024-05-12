@extends('layouts._includes.admin.body')
@section('titulo', 'Lista das Propriedades')

@section('conteudo')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12">
      <div class="row">
        <!-- Small table -->
        <div class="my-4 col-md-12">
            <h2 class="">
              Lista das Propriedades
            </h2>
          <div class="p-3 shadow card">
            <div class="card-body">

              <!-- table -->
              <table class="table datatables" id="dataTable-1">
                <thead class="thead-dark">
                    <tr>
                        <th>PROVÍNCIA</th>
                        <th>MUNICÍPIO</th>
                        <th>BAIRRO</th>
                        <th>LARGURA</th>
                        <th>COMPRIMENTO</th>
                        <th>QUINTAL</th>
                        <th>ANDAR</th>
                        <th>TIPO</th>
                        <th>OPÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (propriedades()->get() as $propriedade)
                    <tr>
                        <td>{{$propriedade->provincia}}</td>
                        <td>{{$propriedade->municipio}}</td>
                        <td>{{$propriedade->bairro}}</td>
                        <td>{{$propriedade->largura}}</td>
                        <td>{{$propriedade->comprimento}}</td>
                        <td>{{$propriedade->quintal}}</td>
                        <td>{{$propriedade->andar}}</td>
                        <td>{{$propriedade->tipo}}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" ariaexpanded="false">
                                <span class="sr-only text-muted">Action</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#ModalEdit{{$propriedade->id}}">{{ __('Editar') }}</a>
                                    <a class="dropdown-item" href="{{route('admin.propriedade.destroy',['id'=>$propriedade->id])}}">{{ __('Remover') }}</a>
                                    <a class="dropdown-item" href="{{route('admin.propriedade.purge',['id'=>$propriedade->id])}}">{{ __('Purgar') }}</a>
                                </div>
                            </div>
                    </td>
                    </tr>
                    <div class="modal fade" id="ModalEdit{{$propriedade->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="staticBackdropLabel">Editar Propriedade</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('admin.propriedade.updateAdmin',['id'=>$propriedade->id])}}" method="post" enctype="multipart/form-data" >
                                    @csrf
                                    <div class="card-body">
                                        @include('_form.propriedadeForm.index_admin')
                                        <button type="submit" class="btn btn-primary w-md">Actualizar</button>
                                    </div>
                                </form>
                            </div>
                          </div>
                        </div>
                      </div>
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
@if (session('propriedade.destroy.success'))
    <script>
        Swal.fire(
            'Propriedade Eliminado com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('propriedade.destroy.error'))
    <script>
        Swal.fire(
            'Erro ao Eliminar Propriedade!',
            '',
            'error'
        )
    </script>
@endif
@if (session('propriedade.purge.success'))
    <script>
        Swal.fire(
            'Propriedade Purgado com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('propriedade.purge.error'))
    <script>
        Swal.fire(
            'Erro ao Purgar Propriedade!',
            '',
            'error'
        )
    </script>
@endif
@if (session('propriedade.create.success'))
    <script>
        Swal.fire(
            'Propriedade Cadastrado com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('propriedade.create.error'))
    <script>
        Swal.fire(
            'Erro ao Cadostrar Propriedade!',
            '',
            'error'
        )
    </script>
@endif
@if (session('propriedade.update.success'))
    <script>
        Swal.fire(
            'Propriedade Actualizado com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('propriedade.update.error'))
    <script>
        Swal.fire(
            'Erro ao Actualizar Propriedade!',
            '',
            'error'
        )
    </script>
@endif
@endsection
