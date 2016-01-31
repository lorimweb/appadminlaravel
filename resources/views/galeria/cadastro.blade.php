@extends('layouts.dashboard')
@section('content')
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="{{url('dashboard')}}">Dashboard</a></li>
    <li><a href="{{url('galeria')}}">Galeria</a></li>
    <li class="active">Cadastro</li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="fa fa-image"></span> {{$titulo}}</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                      <div class="col-md-12">
                        <form class="" action="/galeria/inserir" method="post">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                              <label>Titulo</label>
                              <input type="text" class="form-control" name="titulo" value="{{old('titulo')}}">
                              <span class="text-danger">{{($errors->first('titulo') ? $errors->first('titulo') : '')}} </span>
                            </div>
                            <div class="form-group">
                              <label>Descrição</label>
                              <input type="text" class="form-control" name="descricao" value="{{old('descricao')}}">
                              <span class="text-danger">{{($errors->first('descricao') ? $errors->first('descricao') : '')}} </span>
                            </div>
                            <div class="form-group">
                              <label>Data</label>
                              <input type="text" class="form-control" name="data" value="{{old('data')}}">
                              <span class="text-danger">{{($errors->first('data') ? $errors->first('data') : '')}} </span>
                            </div>
                            <div class="form-group">
                              <label>Fotografo</label>
                              <input type="text" class="form-control" name="fotografo" value="{{old('fotografo')}}">
                              <span class="text-danger">{{($errors->first('fotografo') ? $errors->first('fotografo') : '')}} </span>
                            </div>
                            <div class="form-group">
                              <button type="submit" class="btn btn-info">Cadastrar</button>
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
