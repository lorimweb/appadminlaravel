@extends('layouts.dashboard')
@section('content')
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="{{url('dashboard')}}">Dashboard</a></li>
    <li><a href="{{url('clientes')}}">Clientes</a></li>
    <li class="active">Cadastro</li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="fa fa-users"></span> Cadastro de Clientes</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                      <div class="col-md-6">
                        <form class="" action="/clientes/inserir" method="post">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                              <label>Nome</label>
                              <input type="text" class="form-control" name="nome" value="{{old('nome')}}">
                              <span class="text-danger">{{($errors->first('nome') ? $errors->first('nome') : '')}} </span>
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
                              <label>CPF</label>
                              <input type="text" class="form-control" name="cpf" value="{{old('cpf')}}">
                              <span class="text-danger">{{($errors->first('cpf') ? $errors->first('cpf') : '')}} </span>
                            </div>
                            <div class="form-group">
                              <label>Observações</label>
                              <textarea name="obs" rows="8" cols="40" class="form-control">{{old('obs')}}</textarea>
                              <span class="text-danger">{{($errors->first('obs') ? $errors->first('obs') : '')}} </span>
                            </div>
                            <div class="form-group">
                              <input type="submit" class="btn btn-info" value="Cadastrar">
                              <a href="{{url('clientes')}}" class="btn btn-danger">Cancelar</a>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                      <div class="panel panel-info">
                          <div class="panel-heading">
                              <h3 class="panel-title"><span class="fa fa-users"></span> Clientes cadastrados</h3>
                          </div>
                          <div class="panel-body">
                            <table class="table table-bordered table-striped table-hover datatable">
                              <thead>
                                <tr>
                                  <th>Nome</th>
                                  <th>Endereço</th>
                                  <th>Telefone</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($clientes as $c)
                                  <tr>
                                    <td><a href="{{url('produtos/editar/'.$c->id)}}">{{$c->nome}}</a></td>
                                    <td>{{$c->endereco}}</td>
                                    <td>{{$c->telefone}}</th>
                                  </tr>
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
