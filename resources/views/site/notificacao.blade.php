@extends("layouts._includes.site.body")
@section("titulo","Notificações de Consultas")

@section("conteudo")
    <!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Veja as notificações relacionadas às suas consultas agendadas</p>
						<h1>Notificações de Consultas</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

    <div class="container">
        <div class="row justify-content-center">
          <div class="col-12">

            <div class="row my-4">
              <!-- Small table -->
              <div class="col-md-12">
                <div class="card shadow">

                  <div class="card-body">

                      <!-- table -->
                    <table class="table datatables" id="dataTable-1">
                        {{-- @can('user-create') --}}

                      <thead>
                        <tr>
                            <th>Assunto</th>
                            <th>Descricao</th>
                            <th>Categória</th>
                            <th>Data</th>
                            <th>Hora</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach (minhasNotificacoes()['notificacoes'] as $notificacao)
                            <tr>
                                <td>{{{$notificacao->assunto}}}</td>
                                <td>{{{$notificacao->descricao}}}</td>
                                <td>{{{$notificacao->categoria}}}</td>
                                <td>{{{$notificacao->data}}}</td>
                                <td>{{{$notificacao->hora}}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                  </div>
                </div>
              </div> <!-- simple table -->
            </div> <!-- end section -->
          </div> <!-- .col-12 -->
        </div> <!-- .row -->
      </div> <!-- .container-fluid1 -->
@endsection
