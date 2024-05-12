<div class="row">
    <div class="col-md-12 ">
        @foreach (imagens()->where('id_propriedade',$propriedade->id) as $imagem)
            <img class="" src="{{asset($imagem->caminho)}}" width="100%">
            </img>
        @endforeach

    </div>
    <br><br>
    <div class="pt-2 col-md-12">
        <div class="mb-3 form-group">
            <label for="tipo">Estado*</label>
            <select name="estado" class="form-control select2" required>
                <option value="">Selecione o estado</option>
                    <option value="0" {{ isset($propriedade) && $propriedade->id_tipo === 0 ? 'selected' : '' }}>Aguardando Parecer</option>
                    <option value="1" {{ isset($propriedade) && $propriedade->id_tipo === 1 ? 'selected' : '' }}>Aprovado</option>

                    <option value="3" {{ isset($propriedade) && $propriedade->id_tipo === 3 ? 'selected' : '' }}>Reprovado</option>
            </select>
        </div>
    </div>


</div>


