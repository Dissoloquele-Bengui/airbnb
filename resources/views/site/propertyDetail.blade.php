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

<!-- Adiciona o script da API da Yandex -->
<script src="https://api-maps.yandex.com/2.1/?apikey=1271170b-3c02-43b1-ad64-24b7963a585b&lang=pt_BR"></script>
<script>
    ymaps.ready(init);
    let minhasCoordenadas = { latitude:-8.0125,longitude:13.1352};
    function init() {
        var geolocation = ymaps.geolocation,
            myMap = new ymaps.Map('mapa', {
                center: [-8.835537, 13.233181],
                zoom: 10
            }, {
                searchControlProvider: 'yandex#search'
            });

        // Obtém a posição do usuário pelo IP e adiciona o marcador no mapa
        geolocation.get({
            provider: 'yandex',
            mapStateAutoApply: true
        }).then(function (result) {
            result.geoObjects.options.set('preset', 'islands#redCircleIcon');
            result.geoObjects.get(0).properties.set({
                balloonContentBody: 'Minha localização'
            });
            var userCoordinates = result.geoObjects.get(0).geometry.getCoordinates();
            console.log('User coordinates (Yandex):', userCoordinates[0]);
            minhasCoordenadas = {latitude:userCoordinates[0],longitude:userCoordinates[1]};
                   // Obtém a posição da propriedade
            var carro = {!! json_encode($propriedade) !!};
            var carroLatitude = parseFloat(carro.latitude);
            var carroLongitude = parseFloat(carro.longitude);

            var carroPlacemark = new ymaps.Placemark([carroLatitude, carroLongitude], {
                balloonContentBody: 'Propriedade'
            }, {
                preset: 'islands#greenDotIcon'
            });

            myMap.geoObjects.add(carroPlacemark);
            console.log(minhasCoordenadas);
            // Cria a rota entre a posição do usuário e a propriedade (exemplo com pontos fixos)
            var rota = new ymaps.multiRouter.MultiRoute({
                referencePoints: [
                    [carroLatitude, carroLongitude], // Posição da propriedade
                    [minhasCoordenadas.latitude, minhasCoordenadas.longitude] // Posição inicial (poderia ser a localização do usuário)
                ],
                params: {
                    results: 1
                }
            }, {
                boundsAutoApply: true
            });

            myMap.geoObjects.add(rota);
            myMap.geoObjects.add(result.geoObjects);
        });




    }
</script>
@endsection
