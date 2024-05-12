<div class="row">
    <div class="col-md-4">
        <div class="mb-3 form-group">
            <label for="tipo">Tipo*</label>
            <select name="tipo" class="form-control" required>
                <option value="">Selecione o tipo</option>
                @foreach(tipo_propriedades() as $tipo)
                    <option value="{{ $tipo->id }}" {{ isset($propriedade) && $propriedade->id_tipo === $tipo->id ? 'selected' : '' }}>{{ $tipo->nome }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3 form-group">
            <label for="andar">Andar*</label>
            <input type="text" name="andar" class="form-control" value="{{ isset($propriedade) ? $propriedade->andar : old('andar') }}" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3 form-group">
            <label for="provincia">Província*</label>
            <input type="text" name="provincia" class="form-control" value="{{ isset($propriedade) ? $propriedade->provincia : old('provincia') }}" required>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-4">
        <div class="mb-3 form-group">
            <label for="municipio">Município*</label>
            <input type="text" name="municipio" class="form-control" value="{{ isset($propriedade) ? $propriedade->municipio : old('municipio') }}" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3 form-group">
            <label for="provincia">Preço*</label>
            <input type="number" name="preco" class="form-control" value="{{ isset($propriedade) ? $propriedade->preco : old('preco') }}" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3 form-group">
            <label for="url">Link da Rede Sócial*</label>
            <input type="text" name="url" class="form-control" value="{{ isset($propriedade) ? $propriedade->url : old('url') }}" required>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="mb-3 form-group">
            <label for="bairro">Bairro*</label>
            <input type="text" name="bairro" class="form-control" value="{{ isset($propriedade) ? $propriedade->bairro : old('bairro') }}" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3 form-group">
            <label for="latitude">Latitude*</label>
            <input type="text" name="latitude" class="form-control" value="{{ isset($propriedade) ? $propriedade->latitude : old('latitude') }}" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3 form-group">
            <label for="longitude">Longitude*</label>
            <input type="text" name="longitude" class="form-control" value="{{ isset($propriedade) ? $propriedade->longitude : old('longitude') }}" required>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-md-4">
        <div class="mb-3 form-group">
            <label for="n_quartos">Número de Quartos*</label>
            <input type="number" name="n_quartos" class="form-control" value="{{ isset($propriedade) ? $propriedade->qtd_quartos : old('n_quartos') }}" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3 form-group">
            <label for="n_banheiros">Número de Banheiros*</label>
            <input type="number" name="n_banheiros" class="form-control" value="{{ isset($propriedade) ? $propriedade->qtd_banheiros : old('n_banheiros') }}" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3 form-group">
            <label for="largura">Largura*</label>
            <input type="text" name="largura" class="form-control" value="{{ isset($propriedade) ? $propriedade->largura : old('largura') }}" required>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-4">
        <div class="mb-3 form-group">
            <label for="comprimento">Comprimento*</label>
            <input type="text" name="comprimento" class="form-control" value="{{ isset($propriedade) ? $propriedade->comprimento : old('comprimento') }}" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3 form-group">
            <label for="quintal">Quintal*</label>
            <input type="text" name="quintal" class="form-control" value="{{ isset($propriedade) ? $propriedade->quintal : old('quintal') }}" required>
        </div>
    </div>
    <div class="pt-2 col-md-4">
        <div class="mb-3 form-group">
            <label for="tipo">Estado*</label>
            <select name="estado" class="form-control select2" required>
                <option value="">Selecione o estado</option>

                <option value="2" {{ isset($propriedade) && $propriedade->id_tipo === 3 ? 'selected' : '' }}>Arrendado</option>
            </select>
        </div>
    </div>

    <div class="col-md-12">
        <div class="mb-3 form-group">
            <label for="quintal">Descrição*</label>
            <textarea name="descricao" id="" class="form-control " cols="0" rows="10">
                @if(isset($propriedade))
                    {!! $propriedade->descricao !!}

                @endif
            </textarea>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="mb-3 form-group">
            <label for="quintal">Imagem de Capa*</label>
            <input type="file" name="imagem" class="form-control"  required>
        </div>
    </div>
</div>

