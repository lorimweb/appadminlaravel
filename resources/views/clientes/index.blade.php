@extends('layouts.dashboard')
@section('content')
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="{{url('dashboard')}}">Dashboard</a></li>
    <li class="active">Clientes</li>
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
                    <h3 class="panel-title"><span class="fa fa-shopping-cart"></span> Clientes cadastrados</h3>
                </div>
                <div class="panel-body">
                  <table class="table table-bordered table-striped table-hover datatable">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Endereço</th>
                        <th>Telefone</th>
                        <th>Data do Cadastro</th>
                        <th>Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($clientes as $c)
                        <tr>
                          <td>{{$c->nome}}</td>
                          <td>{{$c->endereco}}</td>
                          <td>{{$c->telefone}}</td>
                          <td>{{@date('d/m/Y', strtotime($c->created_at))}}</th>
                          <td>
                            <a href="clientes/editar/{{$c->id}}" class="edit"><span class="glyphicon glyphicon-pencil"></span></a>
                            <a href="clientes/excluir/{{$c->id}}" class="delete"><span class="glyphicon glyphicon-trash"></span></a>
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
