@extends('layouts.dashboard')
@section('content')
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="{{url('dashboard')}}">Dashboard</a></li>
    <li class="active">Skill</li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="fa fa-picture-o"></span> {{$titulo}}</h3>
                    <a href="{{'skill/cadastro'}}" class="btn btn-success pull-right"><i class="fa fa-plus-circle"></i>Nova Skill</a>
                </div>
                <div class="panel-body">
                  <table class="table table-bordered table-striped table-hover datatable">
                    <thead>
                      <tr>
                        <th>Titulo</th>
                        <th>Porcentagem</th>
                        <th>Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($skill as $s)
                        <tr>
                          <td>{{$s->titulo}}</td>
                          <td>{{$s->porcentagem}}%</td>
                          <td>
                              <a href="skill/editar/{{$s->id}}" class="button"><span class="fa fa-pencil"></span></a>
                              &nbsp;
                              <a href="skill/excluir/{{$s->id}}" class="button" onclick="confirm('Deseja realemente deletar essa Skill?')"><span class="fa fa-trash-o"></span></a>
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
