@extends('layouts.dashboard')
@section('content')
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="{{url('dashboard')}}">Dashboard</a></li>
    <li><a href="{{url('produtos')}}">Produtos</a></li>
    <li class="active">Cadastro</li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="fa fa-picture-o"></span> {{$titulo}}</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                      <div class="col-md-12">
                          @if(session('erro'))
                            <div class="alert alert-danger">
                                {{session('erro')}}
                            </div>
                          @endif
                        <form class="" action="/portfolio/inserir" method="post">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                              <label>Titulo</label>
                              <input type="text" class="form-control" name="titulo" value="{{old('titulo')}}">
                              <span class="text-danger">{{($errors->first('titulo') ? $errors->first('titulo') : '')}} </span>
                            </div>
                            <div class="form-group">
                              <label>Job</label>
                              <input type="text" class="form-control" name="job" value="{{old('job')}}">
                              <span class="text-danger">{{($errors->first('job') ? $errors->first('job') : '')}} </span>
                            </div>
                            <div class="form-group">
                              <label>URL</label>
                              <input type="text" class="form-control" name="url" value="{{old('url')}}">
                              <span class="text-danger">{{($errors->first('url') ? $errors->first('url') : '')}} </span>
                            </div>
                            <div class="form-group">
                              <label>Imagem</label>
                              <input type="file" name="img"/>
                            </div>
                            <div class="form-group">
                              <input type="submit" class="btn btn-info" value="Cadastrar">
                              <a href="{{url('portfolio')}}" class="btn btn-danger">Cancelar</a>
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
