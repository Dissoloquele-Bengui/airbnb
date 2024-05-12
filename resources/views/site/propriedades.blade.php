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

  <div class="section properties">
    <div class="container">
      <div class="filter-form">
        <form id="property-filter-form">
          <div class="row">
            <div class="col-md-4">
              <input type="text" class="form-control" id="provincia" placeholder="Província">
            </div>
            <div class="col-md-4">
              <input type="text" class="form-control" id="municipio" placeholder="Município">
            </div>
            <div class="col-md-4">
              <input type="text" class="form-control" id="bairro" placeholder="Bairro">
            </div>
          </div>
          <button type="button" class="mt-3 btn btn-primary" id="filter-button">Filtrar</button>
        </form>
      </div>
      <ul class="properties-filter">
        <li>
            <a class="is_active" href="#!" data-filter="*">Todos</a>
          </li>
        @foreach (tipo_propriedades() as $tipo)

          <li>
            <a href="#!" data-filter=".{{$tipo->nome}}">{{$tipo->nome}}</a>
          </li>
        @endforeach
      </ul>
      <div class="row properties-box">
        @foreach (propriedades()->where('estado',1)->get() as $propriedade)
        <div class="col-lg-4 col-md-6 align-self-center mb-30 properties-items {{$propriedade->tipo}} {{$propriedade->provincia}} {{$propriedade->municipio}} {{$propriedade->bairro}}">
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

@section('scripts')
<script>
  $(document).ready(function(){
    // Função para filtrar os cards
    $("#filter-button").click(function(){
      var provincia = $("#provincia").val();
      var municipio = $("#municipio").val();
      var bairro = $("#bairro").val();

      $(".properties-items").hide(); // Esconder todos os cards

      // Mostrar apenas os cards que correspondem aos filtros selecionados
      $(".properties-items").filter(function(){
        var propriedade = $(this);
        return (
          (provincia === "" || propriedade.hasClass(provincia)) &&
          (municipio === "" || propriedade.hasClass(municipio)) &&
          (bairro === "" || propriedade.hasClass(bairro))
        );
      }).show();
    });
  });
</script>
@endsection
