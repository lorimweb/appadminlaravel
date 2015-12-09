@extends('layouts.dashboard')
@section('content')
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="{{url('dashboard')}}">Dashboard</a></li>
    <li><a href="{{url('categorias')}}">Categorias</a></li>
    <li class="active">Cadastro</li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="fa fa-list-ul"></span> Cadastro de Categorias</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                      <div class="col-md-6">
                        <form class="" action="/categorias/inserir" method="post">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                              <label>Titulo</label>
                              <input type="text" class="form-control" name="titulo" value="{{old('nome')}}">
                              <span class="text-danger">{{($errors->first('titulo') ? $errors->first('titulo') : '')}} </span>
                            </div>
                            <div class="form-group">
                              <input type="submit" class="btn btn-info" value="Cadastrar">
                              <a href="{{url('categorias')}}" class="btn btn-danger">Cancelar</a>
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
                                  <th>Titulo</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($cat as $c)
                                  <tr>
                                    <td><a href="{{url('categorias/editar/'.$c->id)}}">{{$c->titulo}}</a></td>
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
