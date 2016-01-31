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
                  <form class="" action="/portfolio/update" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="put" value="{{ $portfolio->id }}">
                      <div class="form-group">
                        <label>Titulo</label>
                        <input type="text" class="form-control" name="titulo" value="{{ $portfolio->titulo }}">
                        <span class="text-danger">{{($errors->first('titulo') ? $errors->first('titulo') : '')}} </span>
                      </div>
                      <div class="form-group">
                        <label>Job</label>
                        <input type="text" class="form-control" name="job" value="{{ $portfolio->job }}">
                        <span class="text-danger">{{($errors->first('job') ? $errors->first('job') : '')}} </span>
                      </div>
                      <div class="form-group">
                        <label>URL</label>
                        <input type="text" class="form-control" name="url" value="{{ $portfolio->url }}">
                        <span class="text-danger">{{($errors->first('url') ? $errors->first('url') : '')}} </span>
                      </div>
                      <div class="form-group">
                        <input type="submit" class="btn btn-info" value="Atualizar">
                        <a href="{{url('portfolio')}}" class="btn btn-danger">Cancelar</a>
                      </div>
                  </form>
                </div>
            </div>
            
        </div>
    </div>

</div>
<!-- END PAGE CONTENT WRAPPER -->
@stop
