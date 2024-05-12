<div class="row">
    <div class="col-md-4">
        <div class="mb-3 form-group">
            <label for="name">Nome Completo*</label>
            <input type="text"   id="name" name="name" class="form-control" value="{{isset($user) ?$user->name: old('name') }}" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3 form-group">
            <label for="password">Password*</label>
            <input type="password"    name="password" class="form-control"  required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3 form-group">
            <label for="email">E-mail*</label>
            <input type="email"   id="email" name="email" class="form-control" value="{{isset($user) ?$user->email: old('email') }}" required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3 form-group">
            <label for="genero">Genero*</label>
            <select name="genero" class="form-control select2">
                    <option value="Masculino" {{isset($user)?$user->nivel=="Masculino"?'selected':'':''}}>Masculino</option>

                    <option value="Feminino" {{isset($user)?$user->nivel=="Feminino"?'selected':'':''}}>Feminino</option>

            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3 form-group">
            <label for="tipo">Nível de Acesso*</label>
            <select name="tipo"
                id="nivel{{isset($user)?$user->id:''}}" onchange="{{isset($user)?'addFieldUserUpdate('.$user->id.')':'addFieldUser()'}}" class="form-control select2">
                @if (isset($medico_view))
                    <option value="Médico" {{isset($user)?$user->nivel=="Médico"?'selected':'':''}}>Médico</option>
                @elseif(isset($funcionario_view))
                    <option value="Funcionário" {{isset($user)?$user->nivel=="Funcionário"?         'selected':'':''}}>Funcionário</option>
               @else
                    <option value="Administrador" {{isset($user)?$user->nivel=="Administrador"?'selected':'':''}}>Administrador</option>

                @endif
            </select>
        </div>
    </div>

</div>

