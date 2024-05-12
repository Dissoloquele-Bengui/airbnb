<!DOCTYPE html>
<html lang="pt-br">

@include('layouts._includes.site.head')
<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->
  @include('layouts._includes.site.menu')
  @yield('conteudo')


  <div aria-hidden="true" class="modal fade modal-notify modal-slide" id="ModalNotify" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-end" style="min-width: 40%!important;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Quadro de Notificações</h5>
                <button type="button" class="close btn" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="bg-white modal-body">
                <div class="mt-1 mb-4 col-md-12" id="quadro-notificacoes">
                    <div class="list-group list-group-flush my-n3">
                        <div class="list-group-item">
                            @foreach (minhasNotificacoes()['notificacoes'] as $notificacao)
                            <a class="text-justify row align-items-center btn" onclick="getNotificacao({{$notificacao->id_estado}})">
                                <div class="col-auto">
                                    <span class="circle circle-sm bg-warning"><i class="text-white fe fe-shield-off fe-16"></i></span>
                                </div>
                                <div class="col">
                                    <small><strong>{{formatarDataPortugues($notificacao->created_at)}}</strong></small>
                                    <div class="mb-2 text-muted small">{{$notificacao->descricao}}</div>
                                    <span class="badge badge-pill badge-warning">{{$notificacao->categoria}}</span>
                                </div>
                                <div class="col-auto pr-0">
                                    <small class="fe fe-more-vertical fe-16 text-muted"></small>
                                </div>
                            </a> <!-- / .row -->
                            @endforeach
                        </div>
                    </div> <!-- / .list-group -->
                </div>
            </div>
            <div class="bg-white modal-footer">
                <button type="button" class="mb-2 btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<div class="text-left modal fade" id="ModalNotificacao" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="notificacao-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4 class="title" id="notificacao-assunto"></h4>
                <p class="mt-4 text-justify" id="notificacao-descricao">
                </p>
                <h5 id="notificacao-data" > </h5>
            </div>
        </div>
    </div>
</div>
  @include('layouts._includes.site.footer')
  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('site/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('site/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('site/assets/js/isotope.min.js')}}"></script>
  <script src="{{asset('site/assets/js/owl-carousel.js')}}"></script>
  <script src="{{asset('site/assets/js/counter.js')}}"></script>
  <script src="{{asset('site/assets/js/custom.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.25.2/trumbowyg.min.js" integrity="sha512-mBsoM2hTemSjQ1ETLDLBYvw6WP9QV8giiD33UeL2Fzk/baq/AibWjI75B36emDB6Td6AAHlysP4S/XbMdN+kSA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $('.form-control').select2();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.descricao').trumbowyg();
        });
    </script>
        <script>
            function formatarDataLaravelParaPortugues(dataLaravel) {
                // Converte a string de data do Laravel para um objeto Date
                const data = new Date(dataLaravel);

                // Obtém o dia, mês e ano
                const dia = data.getDate();
                const mes = data.getMonth() + 1; // Lembrando que os meses em JavaScript começam do zero
                const ano = data.getFullYear();

                // Formata a data no padrão português
                const dataFormatada = `${dia}/${mes}/${ano}`;

                return dataFormatada;
            }



    </script>
  </body>
</html>
