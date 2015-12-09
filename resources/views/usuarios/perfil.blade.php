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
                    <div class="col-md-6">
                        <button class="btn btn-info btn-rounded btn-block"><span class="fa fa-check"></span> Seguir</button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-primary btn-rounded btn-block"><span class="fa fa-comments"></span> Chat</button>
                    </div>
                </div>
            </div>
            <div class="panel-body list-group border-bottom">
                <a href="#" class="list-group-item"><span class="fa fa-cog"></span> Editar Perfil</a>
                <a href="#" class="list-group-item"><span class="fa fa-image"></span> Alterar Foto </a>
                <a href="#" class="list-group-item"><span class="fa fa-lock"></span> Alterar Senha</a>
            </div>
            <div class="panel-body">
                <h4 class="text-title">Amigos</h4>
                <div class="row">
                    <div class="col-md-4 col-xs-4">
                        <a href="#" class="friend">
                            <img src="{{asset('assets/img/no-image.jpg')}}"/>
                            <span>Deus</span>
                        </a>
                    </div>
                </div>

                <h4 class="text-title">Fotos</h4>
                <div class="gallery" id="links">
                    <a href="{{asset('assets/img/nature-7.jpg')}}" title="Music Image 1" class="gallery-item" data-gallery>
                        <div class="image">
                            <img src="{{asset('assets/img/nature-7.jpg')}}" alt="Music Image 1"/>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </div>

    <div class="col-md-9">
      <div class="panel panel-default">
          <div class="panel-heading">
              <h3 class="panel-title"><span class="fa fa-user"></span> Editar Perfil</h3>
          </div>
          <div class="panel-body">
            <div class="form-group">
              <textarea name="status" class="form-control" rows="8" cols="40" placeholder="Status"></textarea>
            </div>
            <form action="" method="post">
              <div class="form-group">
                <label>Nome</label>
                <input type="text" name="name" value="{{Auth::user()->name}}" class="form-control text-info">
              </div>
              <div class="form-group">
                <label>Endereco</label>
                <input type="text" name="endereco" value="{{Auth::user()->endereco}}" class="form-control text-info">
              </div>
              <div class="form-group">
                <label>Telefone</label>
                <input type="text" name="telefone" value="{{Auth::user()->telefone}}" class="form-control text-info">
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" value="{{Auth::user()->email}}" class="form-control text-info">
              </div>
              <div class="form-group">
                <input type="submit" name="name" class="btn btn-info pull-right" value="Atualizar Perfil">
              </div>
            </form>
          </div>
      </div>
      <div class="panel panel-default">
          <div class="panel-heading">
              <h3 class="panel-title"><span class="fa fa-image"></span> Alterar Foto</h3>
          </div>
          <div class="panel-body">
            <form action="" method="post">
              <input type="file" name="foto" class="form-control">
            </form>
          </div>
      </div>
    </div>
</div>
@stop
