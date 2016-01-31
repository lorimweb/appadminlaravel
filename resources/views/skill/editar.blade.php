@extends('layouts.dashboard')
@section('content')
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="{{url('dashboard')}}">Dashboard</a></li>
    <li><a href="{{url('portfolio')}}">Portfólio</a></li>
    <li class="active">Editar</li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="fa fa-image"></span> Editando de Portfólio</h3>
                </div>
                <div class="panel-body">
                  <form class="" action="{{url('skill/update')}}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="put" value="{{ $skill->id }}">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Titulo</label>
                        <input type="text" class="form-control" name="titulo" value="{{ $skill->titulo }}">
                        <span class="text-danger">{{($errors->first('titulo') ? $errors->first('titulo') : '')}} </span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Porcentagem</label>
                        <input type="text" class="form-control" name="porcentagem" value="{{ $skill->porcentagem }}">
                        <span class="text-danger">{{($errors->first('porcentagem') ? $errors->first('porcentagem') : '')}} </span>
                      </div>
                    </div>
                      <div class="col-md-12">
                        <div class="form-group"><br>
                          <input type="submit" class="btn btn-info" value="Atualizar">
                          <a href="{{url('skill')}}" class="btn btn-danger">Cancelar</a>
                        </div>
                      </div>
                  </form>
                </div>
            </div>
            
        </div>
    </div>

</div>
<!-- END PAGE CONTENT WRAPPER -->
@stop
