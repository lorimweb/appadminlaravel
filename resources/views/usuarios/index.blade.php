@extends('layouts.dashboard')
@section('content')
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="{{url('dashboard')}}">Dashboard</a></li>
    <li class="active">Usuários</li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="fa fa-group"></span> Usuários cadastrados</h3>
                    <a href="{{'usuarios/cadastro'}}" class="btn btn-success pull-right"><i class="fa fa-plus-circle"></i>Novo</a>
                </div>
                <div class="panel-body">
                  <table class="table table-bordered table-striped table-hover datatable">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Nivel</th>
                        <th>Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($usuarios as $u)
                        @if(Auth::user()->id != $u->id)
                          <tr>
                            <td>{{$u->name}}</td>
                            <td>{{$u->email}}</td>
                            <td>{{$u->telefone}}</td>
                            <td>{{$u->nivel == 1 ? 'Administrador': 'Usuário'}}</th>
                            <td>
                              <a href="usuarios/editar/{{$u->id}}" class="edit"><span class="glyphicon glyphicon-pencil"></span></a>
                              <a href="usuarios/excluir/{{$u->id}}" class="delete"><span class="glyphicon glyphicon-trash"></span></a>
                            </td>
                          </tr>
                        @endif
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
