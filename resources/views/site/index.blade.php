@extends("layouts._includes.site.body")
@section("titulo", "Página Inicial")
@section("conteudo")
<div class="main-banner">
    <div class="owl-carousel owl-banner">
      <div class="item item-1">
        <div class="header-text">
          <span class="category">Toronto, <em>Canada</em></span>
          <h2>Hurry!<br>Get the Best Villa for you</h2>
        </div>
      </div>
      <div class="item item-2">
        <div class="header-text">
          <span class="category">Melbourne, <em>Australia</em></span>
          <h2>Be Quick!<br>Get the best villa in town</h2>
        </div>
      </div>
      <div class="item item-3">
        <div class="header-text">
          <span class="category">Miami, <em>South Florida</em></span>
          <h2>Act Now!<br>Get the highest level penthouse</h2>
        </div>
      </div>
    </div>
  </div>



  <div class="fun-facts">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="wrapper">
            <div class="row">
              <div class="col-lg-4">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="34" data-speed="1000"></h2>
                   <p class="count-text ">Buildings<br>Finished Now</p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="12" data-speed="1000"></h2>
                  <p class="count-text ">Years<br>Experience</p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="24" data-speed="1000"></h2>
                  <p class="count-text ">Awwards<br>Won 2023</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="properties section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4">
          <div class="text-center section-heading">
            <h6>| Properties</h6>
            <h2>We Provide The Best Property You Like</h2>
          </div>
        </div>
      </div>
      <div class="row">
        @foreach (propriedades()->where('estado',1)->limit(6)->get() as $propriedade)
        <div class="col-lg-4 col-md-6 align-self-center mb-30 properties-items {{$propriedade->tipo}}">
            <div class="item">
              <a href="{{route('villa.site.propertyDetail',['id'=>$propriedade->id])}}"><img src="{{asset($propriedade->imagem)}}" alt=""></a>
              <span class="category">{{$propriedade->tipo}}</span>
              <h6>$2.264.000</h6>
              <h4><a href="{{route('villa.site.propertyDetail',['id'=>$propriedade->id])}}">{{$propriedade->provincia.", ".$propriedade->municipio.", ".$propriedade->bairro." Rua ".$propriedade->rua}}</a></h4>
              <ul>
                <li>Quartos: <span>{{$propriedade->qtd_quartos}}</span></li>
                <li>Quartos de Banho: <span>{{$propriedade->banheiros}}</span></li>
                <li>Area: <span>{{$propriedade->largura*$propriedade->comprimento}}</span></li>
                <li>Andar: <span>{{$propriedade->andar}}</span></li>
                <li>Quintal: <span>{{$propriedade->quintal}}</span></li>
              </ul>
              <div class="main-button">
                <a href="{{route('villa.site.propertyDetail',['id'=>$propriedade->id])}}">Ver Mais</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>


@endsection
