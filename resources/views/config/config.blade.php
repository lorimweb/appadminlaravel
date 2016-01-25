@extends('layouts.dashboard')
@section('content')
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="{{url('dashboard')}}">Dashboard</a></li>
    <li class="active">Configurações</li>
</ul>
<!-- END BREADCRUMB -->
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="fa fa-shopping-cart"></span> {{$titulo}}</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                      <div class="col-md-12">
                        <form class="" action="/config/atualizar" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="put" value="{{$config[0]->id}}">
                            <div class="form-group">
                              <label>Nome da Aplicação</label>
                              <input type="text" class="form-control" name="appnome" value="{{$config[0]->appnome}}">
                              <span class="text-danger">{{($errors->first('appnome') ? $errors->first('appnome') : '')}} </span>
                            </div>
                            <div class="form-group">
                              <label>Slogan</label>
                              <input type="text" class="form-control" name="slogan" value="{{$config[0]->slogan}}">
                              <span class="text-danger">{{($errors->first('slogan') ? $errors->first('slogan') : '')}} </span>
                            </div>
                            <div class="form-group">
                              <label>Url do site</label>
                              <div class="input-group input-group-lg">
                                  <span class="input-group-addon">http://</span>
                                  <input type="text" class="form-control" name="url" value="{{$config[0]->url}}">
                                  <span class="text-danger">{{($errors->first('url') ? $errors->first('url') : '')}} </span>
                              </div>
                            </div>
                            <div class="form-group">
                                <label>Temas</label>
                                <select class="form-control select" data-live-search="true" name="temas">
                                    <option value="{{$config[0]->temas}}" selected="selected">{{$config[0]->temas}}</option>
                                    <option value="default">Default</option>
                                    <option value="blue">Blue</option>
                                    <option value="brown">Brown</option>
                                    <option value="black">Black</option>
                                    <option value="white">White</option>
                                </select>
                            </div><br>
                            <div class="form-group">
                                <label>Layout</label>
                                <select class="form-control select" data-live-search="true" name="layout">
                                    <option value="{{$config[0]->layout}}" selected="selected">{{$config[0]->layout == 1 ? 'Encaixotado' : 'Tela Cheia'}}</option>
                                    <option value="1">Boxed</option>
                                    <option value="0">Full Width</option>
                                </select>
                            </div><br>
                            <div class="form-group">
                                <label>Navegação Alternada</label>
                                <select class="form-control select" data-live-search="true" name="toggled">
                                    <option value="{{$config[0]->toggled}}" selected="selected">{{$config[0]->toggled == 'page-navigation-toggled' ? '-> Sim' : '-> Não'}}</option>
                                    <option value="page-navigation-toggled">Sim</option>
                                    <option value="default">Não</option>
                                </select>
                            </div><br>
                            <div class="form-group">
                              <label>Sobre</label>
                              <textarea name="sobre" rows="8" cols="40" class="form-control">{{$config[0]->sobre}}</textarea>
                              <span class="text-danger">{{($errors->first('sobre') ? $errors->first('sobre') : '')}} </span>
                            </div>
                            <div class="form-group">
                              <button type="submit" class="btn btn-info"><i class="fa fa-check-square"></i> Atualizar</button>
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
