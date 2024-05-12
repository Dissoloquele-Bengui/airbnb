@extends("layouts._includes.site.body")
@section("titulo", "Página Inicial")
@section("conteudo")
<div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <span class="breadcrumb"><a href="#">Home</a> / Properties</span>
          <h3>Properties</h3>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="row">
          <!-- Small table -->
          <div class="my-4 col-md-12">
            <div class="p-3 shadow card">
              <div class="card-body">
                <div class="mb-3 toolbar row">
                  <div class="ml-auto col">
                      <div class="float-right dropdown">
                        <button class="float-right ml-3 btn btn-primary"
                        class="btn botao" data-bs-toggle="modal" data-bs-target="#ModalCreate"
                        type="button">Adicionar +</button>

                      </div>
                    </div>

                </div>
                <!-- table -->
                <table class="table datatables" id="dataTable-1">
                        <thead class="thead-dark">
                            <tr>
                                <th>PROVÍNCIA</th>
                                <th>MUNICÍPIO</th>
                                <th>BAIRRO</th>
                                <th>Nº QUARTOS</th>
                                <th>Nº BANHEIROS</th>
                                <th>LARGURA</th>
                                <th>COMPRIMENTO</th>
                                <th>QUINTAL</th>
                                <th>ANDAR</th>
                                <th>TIPO</th>
                                <th>OPÇÕES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (propriedades()->where('id_proprietario',Auth::id())->get() as $propriedade)
                            <tr>
                                <td>{{$propriedade->provincia}}</td>
                                <td>{{$propriedade->municipio}}</td>
                                <td>{{$propriedade->bairro}}</td>
                                <td>{{$propriedade->qtd_quartos}}</td>
                                <td>{{$propriedade->qtd_banheiros}}</td>
                                <td>{{$propriedade->largura}}</td>
                                <td>{{$propriedade->comprimento}}</td>
                                <td>{{$propriedade->quintal}}</td>
                                <td>{{$propriedade->andar}}</td>
                                <td>{{$propriedade->tipo}}</td>
                                <td>
                                    <ul class="list d-flex">
                                        <li class="me-3"><a class="list-item" href="#" data-bs-toggle="modal" data-bs-target="#ModalEdit{{$propriedade->id}}">{{ __('Editar') }}</a></li>
                                        <li><a class="list-item" href="{{route('admin.propriedade.purge',['id'=>$propriedade->id])}}">{{ __('Eliminar') }}</a></li>
                                    </ul>

                                    </div>

                                </td>
                            </tr>
                            <div class="modal fade" id="ModalEdit{{$propriedade->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="staticBackdropLabel">Editar Propriedade</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('admin.propriedade.update',['id'=>$propriedade->id])}}" method="post" enctype="multipart/form-data" >
                                            @csrf
                                            <div class="card-body">
                                                @include('_form.propriedadeForm.index')
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

  <div class="modal fade" id="ModalCreate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Adicionar Propriedade</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('admin.propriedade.store')}}" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="card-body">
                    {{ $propriedade = null }}
                    @include('_form.propriedadeForm.index')
                    <button type="submit" class="btn btn-primary w-md">Cadastrar</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>

  {{-- ModalCreate --}}
  {{-- ModalCreate --}}
  @if (session('propriedade.destroy.success'))
      <script>
          Swal.fire(
              'Hospital Eliminado com sucesso!',
              '',
              'success'
          )
      </script>
  @endif
  @if (session('propriedade.destroy.error'))
      <script>
          Swal.fire(
              'Erro ao Eliminar Hospital!',
              '',
              'error'
          )
      </script>
  @endif
  @if (session('propriedade.purge.success'))
      <script>
          Swal.fire(
              'Hospital Purgado com sucesso!',
              '',
              'success'
          )
      </script>
  @endif
  @if (session('propriedade.purge.error'))
      <script>
          Swal.fire(
              'Erro ao Purgar Hospital!',
              '',
              'error'
          )
      </script>
  @endif
  @if (session('propriedade.create.success'))
      <script>
          Swal.fire(
              'Hospital Cadastrado com sucesso!',
              '',
              'success'
          )
      </script>
  @endif
  @if (session('propriedade.create.error'))
      <script>
          Swal.fire(
              'Erro ao Cadostrar Hospital!',
              '',
              'error'
          )
      </script>
  @endif
  @if (session('propriedade.update.success'))
      <script>
          Swal.fire(
              'Hospital Actualizado com sucesso!',
              '',
              'success'
          )
      </script>
  @endif
  @if (session('propriedade.update.error'))
      <script>
          Swal.fire(
              'Erro ao Actualizar Hospital!',
              '',
              'error'
          )
      </script>
  @endif







@endsection
