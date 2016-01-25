@extends('layouts.dashboard')
@section('content')
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="{{url('dashboard')}}">Dashboard</a></li>
    <li><a href="{{url('usuarios')}}">Usuários</a></li>
    <li class="active">Editar</li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="fa fa-group"></span> Editar Usuário</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                      <div class="col-md-12">
                        <form class="" action="/usuarios/atualizar" method="post">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input type="hidden" name="put" value="{{$usuarios->id}}">
                            <div class="form-group">
                              <label>Nome</label>
                              <input type="text" class="form-control" name="name" value="{{$usuarios->name}}">
                              <span class="text-danger">{{($errors->first('name') ? $errors->first('name') : '')}} </span>
                            </div>
                            <div class="form-group">
                              <label>Endereço</label>
                              <input type="text" class="form-control" name="endereco" value="{{$usuarios->endereco}}">
                              <span class="text-danger">{{($errors->first('endereco') ? $errors->first('endereco') : '')}} </span>
                            </div>
                            <div class="form-group">
                              <label>Telefone</label>
                              <input type="text" class="form-control" name="telefone" value="{{$usuarios->telefone}}">
                              <span class="text-danger">{{($errors->first('telefone') ? $errors->first('telefone') : '')}} </span>
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
                              <input type="submit" class="btn btn-info" value="Atualizar">
                              <a href="{{url('usuarios')}}" class="btn btn-danger">Cancelar</a>
                            </div>
                        </form>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- END PAGE CONTENT WRAPPER -->
@stop
