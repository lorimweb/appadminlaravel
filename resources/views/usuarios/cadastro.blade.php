@extends('layouts.dashboard')
@section('content')
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="{{url('dashboard')}}">Dashboard</a></li>
    <li><a href="{{url('usuarios')}}">Usuários</a></li>
    <li class="active">Cadastro</li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="fa fa-group"></span> Cadastro de Usuário</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                      <div class="col-md-6">
                        <form class="" action="/usuarios/inserir" method="post">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                              <label>Nome</label>
                              <input type="text" class="form-control" name="name" value="{{old('name')}}">
                              <span class="text-danger">{{($errors->first('name') ? $errors->first('name') : '')}} </span>
                            </div>
                            <div class="form-group">
                              <label>Endereço</label>
                              <input type="text" class="form-control" name="endereco" value="{{old('endereco')}}">
                              <span class="text-danger">{{($errors->first('endereco') ? $errors->first('endereco') : '')}} </span>
                            </div>
                            <div class="form-group">
                              <label>Telefone</label>
                              <input type="text" class="form-control" name="telefone" value="{{old('telefone')}}">
                              <span class="text-danger">{{($errors->first('telefone') ? $errors->first('telefone') : '')}} </span>
                            </div>
                            <div class="form-group">
                              <label>Email</label>
                              <input type="text" class="form-control" name="email" value="{{old('email')}}">
                              <span class="text-danger">{{($errors->first('email') ? $errors->first('email') : '')}} </span>
                            </div>
                            <div class="form-group">
                              <label>Senha</label>
                              <input type="password" class="form-control" name="password" value="{{old('password')}}">
                              <span class="text-danger">{{($errors->first('password') ? $errors->first('password') : '')}} </span>
                            </div>
                            <div class="form-group">
                              <label>Repita a Senha</label>
                              <input type="password" class="form-control" name="password_confirmation" value="">
                              <span class="text-danger">{{($errors->first('password_confirmation') ? $errors->first('password_confirmation') : '')}} </span>
                            </div>
                            @if(Auth::user()->nivel == 1)
                              <div class="form-group">
                                <label class="switch switch-small">
                                    <input type="checkbox" value="1" name="nivel"/>
                                    <span></span>
                                    Tornar usuário administrador
                                </label>
                              </div>
                            @endif
                            <div class="form-group">
                              <input type="submit" class="btn btn-info" value="Cadastrar">
                              <a href="{{url('usuarios')}}" class="btn btn-danger">Cancelar</a>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                      <div class="panel panel-info">
                          <div class="panel-heading">
                              <h3 class="panel-title"><span class="fa fa-group"></span> Usuários cadastrados</h3>
                          </div>
                          <div class="panel-body">
                            <table class="table table-bordered table-striped table-hover datatable">
                              <thead>
                                <tr>
                                  <th>Nome</th>
                                  <th>Email</th>
                                  <th>Nivel</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($usuarios as $u)
                                  @if(Auth::user()->id != $u->id)
                                    <tr>
                                      <td>{{$u->name}}</td>
                                      <td>{{$u->email}}</td>
                                      <td>{{$u->nivel == 1 ? 'Administrador': 'Usuário'}}</th>
                                    </tr>
                                  @endif
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- END PAGE CONTENT WRAPPER -->
@stop
