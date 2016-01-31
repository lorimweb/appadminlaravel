@extends('layouts.dashboard')
@section('content')
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="{{url('dashboard')}}">Dashboard</a></li>
    <li class="active">Post</li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="fa fa-file-text-o"></span> {{$titulo}}</h3>
                    <a href="{{'post/cadastro'}}" class="btn btn-success pull-right"><i class="fa fa-plus-circle"></i>Novo post</a>
                </div>
                <div class="panel-body">
                  <table class="table table-striped table-hover datatable">
                    <thead>
                      <tr>
                        <th>Titulo</th>
                        <th>Data</th>
                        <th>Categoria</th>
                        <th>Postado por</th>
                        <th>Ativar</th>
                        <th>Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($post as $p)
                          <tr>
                            <td>{{$p->titulo}}</td>
                            <td>{{date('d/m/Y', strtotime($p->data))}}</td>
                            <td>{{$p->post_cat_id}}</td>
                            <td>{{$p->user_name}}</td>
                            <td>
                              <div class="form-group">
                                <label class="switch">
                                    <input type="checkbox" name="ativo" data-plugin="switchery" onchange="ativando(this, 'post', {{$p->post_id}});" {{($p->ativo == 1 ? 'checked' : '')}}/>
                                    <span></span>
                                </label>
                              </div>
                            </th>
                            <td>
                              <a href="post/imagem/{{$p->post_id}}" class="button"><span class="fa fa-picture-o"></span></a>
                              &nbsp;
                              <a href="post/editar/{{$p->post_id}}" class="button"><span class="fa fa-pencil"></span></a>
                              &nbsp;
                              <a href="post/excluir/{{$p->post_id}}" class="button" onclick="confirm('Deseja realemente deletar essa Post?')"><span class="fa fa-trash-o"></span></a>
                            </td>
                          </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- END PAGE CONTENT WRAPPER -->
@stop
