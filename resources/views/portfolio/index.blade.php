@extends('layouts.dashboard')
@section('content')
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="{{url('dashboard')}}">Dashboard</a></li>
    <li class="active">Produtos</li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">
          @if(Session::has('message'))
            <div class="alert alert-{{ Session::get('type') }} alert-dismissable"><b><i class="icon fa fa-{{ Session::get('icon') }}"></i> {{ Session::get('message') }}</b><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>
          @endif
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="fa fa-picture-o"></span> {{$titulo}}</h3>
                    <a href="{{'portfolio/cadastro'}}" class="btn btn-success pull-right"><i class="fa fa-plus-circle"></i>Novo</a>
                </div>
                <div class="panel-body">
                  <table class="table table-bordered table-striped table-hover datatable">
                    <thead>
                      <tr>
                        <th>Descricao</th>
                        <th>Preço</th>
                        <th>Qtdade</th>
                        <th>Data do Cadastro</th>
                        <th>Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($portfolio as $p)
                        <tr class="{{$p->qtdade <= 2 ? 'text-danger' : ''}}">
                          <td>{{$p->descricao}}</td>
                          <td>R$ {{$p->preco}}</td>
                          <td>{{$p->qtdade}}</td>
                          <td>{{@date('d/m/Y', strtotime($p->created_at))}}</th>
                          <td>
                            <a href="produtos/add_image/{{$p->id}}" class="default"><span class="glyphicon glyphicon-picture"></span></a>
                            <a href="produtos/editar/{{$p->id}}" class="edit"><span class="glyphicon glyphicon-pencil"></span></a>
                            <a href="produtos/excluir/{{$p->id}}" class="delete"><span class="glyphicon glyphicon-trash"></span></a>
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
