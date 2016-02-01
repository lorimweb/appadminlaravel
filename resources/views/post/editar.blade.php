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
                        <form class="" action="/post/update" method="post">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input type="hidden" name="put" value="{{ $post->post_id }}">
                            <div class="form-group">
                              <label>Titulo</label>
                              <input type="text" class="form-control" name="titulo" value="{{ $post->titulo }}">
                              <span class="text-danger">{{($errors->first('titulo') ? $errors->first('titulo') : '')}} </span>
                            </div>
                            <div class="form-group">
                              <label>Data</label>
                              <input type="text" class="form-control" name="data" value="{{ date('d/m/Y', strtotime($post->data)) }}">
                              <span class="text-danger">{{($errors->first('data') ? $errors->first('data') : '')}} </span>
                            </div>
                            <div class="form-group">
                                <label>Categoria</label>
                                <a href="#" class="btn btn-success pull-right btn-sm" data-toggle="modal" data-target="#categoria"><i class="fa fa-bars"></i> Nova Categoria</a>
                                <select class="form-control select" data-live-search="true" name="post_cat_id">
                                    <option value="" selected="selected">Selecione uma Categoria</option>
                                    @foreach($cat as $c)
                                      <option value="{{ $c->post_cat_id }}" selected="selected">{{ $c->titulo }}</option>
                                      <option value="{{ $c->post_cat_id }}">{{ $c->titulo }}</option>
                                    @endforeach
                                </select>
                            </div><br>
                            <div class="form-group">
                              <label>Conteudo</label>
                              <textarea class="summernote" name="conteudo">{{ $post->conteudo }}</textarea>
                              <span class="text-danger">{{($errors->first('conteudo') ? $errors->first('conteudo') : '')}} </span>
                            </div>
                            <div class="form-group">
                              <button type="submit" class="btn btn-info">Atualizar</button>
                              <a href="{{url('post')}}" class="btn btn-danger">Cancelar</a>
                            </div>
                        </form>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="modal" id="categoria" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">                    
            <div class="modal-body">
                <h3><i class="fa fa-bars"></i> Cadastro de Categoria</h3>
                <form class="" action="/post/inserircat" method="post">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group">
                    <label>Categoria</label>
                    <input type="text" class="form-control" name="titulo" value="{{old('titulo')}}">
                    <span class="text-danger">{{($errors->first('titulo') ? $errors->first('titulo') : '')}} </span>
                  </div>
            </div>
            <div class="modal-footer">
                  <button type="submit" class="btn btn-success">Cadastrar</button>
                </form>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div> 
<!-- END PAGE CONTENT WRAPPER -->
@stop
