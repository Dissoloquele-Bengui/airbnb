<div class="row">
    <div class="col-md-6">
        <div class="mb-3 form-group">
            <label for="name">Nome Completo*</label>
            <input type="text"   id="name" name="name" class="form-control" value="{{isset($user) ?$user->name: old('name') }}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3 form-group">
            <label for="password">Password*</label>
            <input type="password"    name="password" class="form-control"  required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3 form-group">
            <label for="email">E-mail*</label>
            <input type="email"   id="email" name="email" class="form-control" value="{{isset($user) ?$user->email: old('email') }}" required>
        </div>
    </div>


    <div class="col-md-6">
        <div class="mb-3 form-group">
            <label for="tipo">Nível de Acesso*</label>
            <select name="tipo"
                id="nivel{{isset($user)?$user->id:''}}" class="form-control select2">
                    @if (Auth::user()->nivel=="Administrador" || Auth::user()->nivel=="Admin de Campeonato")
                        <option value="Admin de Campeonato" {{isset($user)?$user->nivel=="Admin de Campeonato"?'selected':'':''}}>Administrador de Campeonato</option>
                        <option value="Administrador de Equipa"  {{isset($user)?$user->nivel=="Admin de Equipa"?'selected':'':''}}>Administrador de Equipa</option>
                        <option value="Arbitro" {{isset($user)?$user->nivel=="Arbitro"?'selected':'':''}}>Arbitro</option>
                        <option value="Administrador" {{isset($user)?$user->nivel=="Administrador"?'selected':'':''}}>Administrador</option>
                    @else
                        <option value="{{Auth::user()->nivel}}" >{{Auth::user()->nivel}}</option>

                    @endif
            </select>
        </div>
    </div>

</div>
