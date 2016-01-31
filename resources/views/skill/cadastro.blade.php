@extends('layouts.dashboard')
@section('content')
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="{{url('dashboard')}}">Dashboard</a></li>
    <li><a href="{{url('skill')}}">Skill</a></li>
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
                        <form class="" action="{{url('skill/inserir')}}" method="post">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Titulo</label>
                              <input type="text" class="form-control" name="titulo" value="{{old('titulo')}}">
                              <span class="text-danger">{{($errors->first('titulo') ? $errors->first('titulo') : '')}} </span>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Porcentagem</label>
                              <input type="text" class="form-control" name="porcentagem" value="{{old('porcentagem')}}">
                              <span class="text-danger">{{($errors->first('porcentagem') ? $errors->first('porcentagem') : '')}} </span>
                            </div>
                          </div>
                            <div class="col-md-12">
                              <div class="form-group"><br>
                                <input type="submit" class="btn btn-info" value="Cadastrar">
                                <a href="{{url('skill')}}" class="btn btn-danger">Cancelar</a>
                              </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- END PAGE CONTENT WRAPPER -->
@stop
