@extends("layouts._includes.site.body")
@section("titulo", "Página Inicial")
@section("conteudo")
<div class="single-property section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="main-image">
            <img src="{{asset($propriedade->imagem)}}" alt="">
          </div>
          <div class="main-content">
            <span class="category">{{$propriedade->tipo}}</span>
            <h4>{{$propriedade->provincia.", ".$propriedade->municipio.", ".$propriedade->bairro." Rua ".$propriedade->rua}}</h4>
            <p>{{$propriedade->descricao}}</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="info-table">
            <ul>
              <li>
                <img src="assets/images/info-icon-01.png" alt="" style="max-width: 52px;">
                <h4>{{$propriedade->largura * $propriedade->comprimento}}<br><span>Área</span></h4>
              </li>
              <li>
                <img src="assets/images/info-icon-02.png" alt="" style="max-width: 52px;">
                <h4>Quantidade de Quartos <br>
                    <span>{{$propriedade->qtd_quartos}}</span><br></h4>
              </li>
              <li>
                <img src="assets/images/info-icon-03.png" alt="" style="max-width: 52px;">
                <h4>{{$propriedade->quintal}}<br><span>Quintal</span></h4>
              </li>
              <li>
                <a href="{{$propriedade->url}}" class="btn btn-primary" target="_blank">Entre em Contacto</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row justify-content-center align-items-center">
    <div class="col-lg-8">
        <div id="mapa" style="width:100%;height:400px;margin:0 auto;"></div>
    </div>
</div>





    <!-- simulação de um trajecto -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
    <script>
        var mapa;
        var pessoaMarker, carroMarker, linhaMovimento, linhaRota;

        // Iniciar o mapa com as posições iniciais
        iniciarMapa();

        // Função para iniciar o mapa e atualizar as posições
        function iniciarMapa() {
            mapa = L.map('mapa').setView([0, 0], 11); // Definir a visão inicial com valores temporários

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
            }).addTo(mapa);

            // Obter a posição inicial da pessoa do navegador
            if ("geolocation" in navigator) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var minhaLatitude = position.coords.latitude;
                    var minhaLongitude = position.coords.longitude;

                    pessoaMarker = L.marker([minhaLatitude, minhaLongitude]).addTo(mapa);
                    pessoaMarker.bindTooltip('EU').openTooltip(); // Adicionar label "EU" ao marcador da pessoa

                    mapa.setView([minhaLatitude, minhaLongitude], 11); // Definir a visão para a posição da pessoa

                    // Obter a posição inicial do carro
                    var carro = {!! json_encode($propriedade) !!};
                    var carroLatitude = parseFloat(carro.latitude);
                    var carroLongitude = parseFloat(carro.longitude);

                    carroMarker = L.marker([carroLatitude, carroLongitude]).addTo(mapa);
                    carroMarker.bindTooltip('Propriedade').openTooltip(); // Adicionar label "Propriedade" ao marcador do carro

                    // Roteamento da pessoa ao carro
                    linhaRota =  L.Routing.control({
                        waypoints: [
                            L.latLng(minhaLatitude, minhaLongitude),
                            L.latLng(carroLatitude, carroLongitude)
                        ],
                        language: 'es', // Altere para o idioma desejado
                        lineOptions: {
                            styles: [{color: 'blue', opacity: 0.6, weight: 6}]
                        }
                    }).addTo(mapa);

                    // Linha de movimento do carro (vermelha)
                    linhaMovimento = L.polyline([carroMarker.getLatLng()], { color: 'red' }).addTo(mapa);

                    // Linha de rota da pessoa ao carro (azul)
                    linhaRota.addTo(mapa);


                }, function(error) {
                    console.error("Erro ao obter a localização:", error);
                });
            } else {
                console.log("Geolocalização não suportada pelo navegador.");
            }
        }
    </script>
@endsection
