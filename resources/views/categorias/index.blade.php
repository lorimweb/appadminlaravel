@extends('layouts.dashboard')
@section('content')
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="{{url('dashboard')}}">Dashboard</a></li>
    <li class="active">Categorias</li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="fa fa-list-ul"></span> Categorias cadastradas</h3>
                </div>
                <div class="panel-body">
                  <table class="table table-bordered table-striped table-hover datatable">
                    <thead>
                      <tr>
                        <th>Titulo</th>
                        <th>Criada em</th>
                        <th>Atualizada em</th>
                        <th>Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($cat as $c)
                        <tr>
                          <td>{{$c->titulo}}</td>
                          <td>{{@date('d/m/Y', strtotime($c->created_at))}}</th>
                          <td>{{@date('d/m/Y', strtotime($c->updated_at))}}</th>
                          <td>
                            <a href="categorias/editar/{{$c->id}}" class="edit"><span class="glyphicon glyphicon-pencil"></span></a>
                            <a href="categorias/excluir/{{$c->id}}" class="delete"><span class="glyphicon glyphicon-trash"></span></a>
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
