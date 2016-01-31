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
                        <form class="" action="/galeria/update" method="post">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input type="hidden" name="put" value="{{ $galeria->galeria_id }}">
                            <div class="form-group">
                              <label>Titulo</label>
                              <input type="text" class="form-control" name="titulo" value="{{ $galeria->titulo }}">
                              <span class="text-danger">{{($errors->first('titulo') ? $errors->first('titulo') : '')}} </span>
                            </div>
                            <div class="form-group">
                              <label>Descrição</label>
                              <input type="text" class="form-control" name="descricao" value="{{ $galeria->descricao }}">
                              <span class="text-danger">{{($errors->first('descricao') ? $errors->first('descricao') : '')}} </span>
                            </div>
                            <div class="form-group">
                              <label>Data</label>
                              <input type="text" class="form-control" name="data" value="{{ date('d/m/Y', strtotime($galeria->data)) }}">
                              <span class="text-danger">{{($errors->first('data') ? $errors->first('data') : '')}} </span>
                            </div>
                            <div class="form-group">
                              <label>Fotografo</label>
                              <input type="text" class="form-control" name="fotografo" value="{{ $galeria->fotografo }}">
                              <span class="text-danger">{{($errors->first('fotografo') ? $errors->first('fotografo') : '')}} </span>
                            </div>
                            <div class="form-group">
                              <button type="submit" class="btn btn-info">Atualizar</button>
                              <a href="{{url('galeria')}}" class="btn btn-danger">Cancelar</a>
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
