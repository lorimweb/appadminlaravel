@extends('layouts.dashboard')
@section('content')
<ul class="breadcrumb">
    <li><a href="{{url('dashboard')}}">Dashboard</a></li>
    <li><a href="{{url('usuarios')}}">Usuários</a></li>
    <li class="active">Perfil</li>
</ul>
<!-- END BREADCRUMB -->
<div class="row">
    <div class="col-md-3">

        <div class="panel panel-default">
            <div class="panel-body profile" style="background: url('../assets/img/nature-7.jpg') center center no-repeat;">
                <div class="profile-image">
                    @if(Auth::user()->foto == null)
                      <img src="{{asset('assets/img/no-image.jpg')}}" alt="{{Auth::user()->name}}"/>
                    @else
                      <img src="{{asset('assets/uploads/'.Auth::user()->foto)}}" alt="{{Auth::user()->name}}"/>
                    @endif
                </div>
                <div class="profile-data">
                    <div class="profile-data-name">{{Auth::user()->name}}</div>
                    <div class="profile-data-title" style="color: #FFF;">{{Auth::user()->nivel == 1 ? 'Administrador' : 'Usuário'}}</div>
                </div>
                <div class="profile-controls">
                    <a href="#" class="profile-control-left twitter"><span class="fa fa-twitter"></span></a>
                    <a href="#" class="profile-control-right facebook"><span class="fa fa-facebook"></span></a>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        {{Auth::user()->email}}
                    </div>
                </div>
            </div>
            <div class="panel-body list-group border-bottom">
                <a href="#" class="list-group-item" data-toggle="modal" data-target="#modal_foto"><span class="fa fa-image"></span> Alterar Foto </a>
                <a href="#" class="list-group-item" data-toggle="modal" data-target="#modal_senha"><span class="fa fa-lock"></span> Alterar Senha</a>
            </div>
        </div>

    </div>

    <div class="col-md-9">
      <div class="panel panel-default">
          <div class="panel-heading">
              <h3 class="panel-title"><span class="fa fa-user"></span> Editar Perfil</h3>
          </div>
          <div class="panel-body">
            <form action="/usuarios/perfilupdate" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="put" value="{{ $usuarios[0]->id }}">
                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" name="name" value="{{$usuarios[0]->name}}" class="form-control text-success">
                    <span class="text-danger">{{($errors->first('name') ? $errors->first('name') : '')}} </span>
                </div>
                <div class="form-group">
                    <label>Sobre nome</label>
                    <input type="text" name="sobre_nome" value="{{$usuarios[0]->sobre_nome}}" class="form-control text-success">
                    <span class="text-danger">{{($errors->first('sobre_nome') ? $errors->first('sobre_nome') : '')}} </span>
                </div>
                <div class="form-group">
                    <label>Endereco</label>
                    <input type="text" name="endereco" value="{{$usuarios[0]->endereco}}" class="form-control text-success">
                    <span class="text-danger">{{($errors->first('endereco') ? $errors->first('endereco') : '')}} </span>
                </div>
                <div class="form-group">
                    <label>Telefone</label>
                    <input type="text" name="telefone" value="{{$usuarios[0]->telefone}}" class="form-control text-success">
                    <span class="text-danger">{{($errors->first('telefone') ? $errors->first('telefone') : '')}} </span>
                </div>
                <div class="form-group">
                    <label>Sobre mim</label>
                    <textarea name="sobre" class="form-control text-success" rows="8" cols="40" placeholder="Status">{{ $usuarios[0]->sobre }}</textarea>
                    <span class="text-danger">{{($errors->first('sobre') ? $errors->first('sobre') : '')}} </span>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info pull-right" name="button">Atualizar Perfil</button>
                </div>
            </form>
          </div>
      </div>
    </div>
</div>

<div class="modal" id="modal_foto" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
                <h4 class="modal-title" id="defModalHead">Alterar foto</h4>
            </div>
            <div class="modal-body">
                <form class="dropzone dropzone-mini" action="{{url('usuarios/uploadfoto')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="id" value="{{$usuarios[0]->id}}">
                </form>
            </div>
            <div class="modal-footer">
                <a href="{{url('usuarios/perfil')}}" class="btn btn-default" data-dismiss="modal" onclick="atualiza()">Fechar</a>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modal_senha" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
                <h4 class="modal-title" id="defModalHead">Alterar Senha</h4>
            </div>
            <div class="modal-body">
                <form class="" action="{{url('usuarios/updatesenha')}}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="put" value="{{ $usuarios[0]->id }}">
                    <div class="form-group">
                        <label for="">Senha</label>
                        <input type="password" name="password" value="" class="form-control">
                        <span class="text-danger">{{($errors->first('password') ? $errors->first('password') : '')}} </span>
                    </div>
                    <div class="form-group">
                        <label for="">Repita a Senha</label>
                        <input type="password" name="password_confirmation" value="" class="form-control">
                        <span class="text-danger">{{($errors->first('password_confirmation') ? $errors->first('password_confirmation') : '')}} </span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info pull-right" name="button">Salvar</button><br><br>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function atualiza(){
        window.location.reload();
    }
</script>
@stop
