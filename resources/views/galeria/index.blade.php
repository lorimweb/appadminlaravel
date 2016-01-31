@extends('layouts.dashboard')
@section('content')
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="{{url('dashboard')}}">Dashboard</a></li>
    <li class="active">Galeria</li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="fa fa-group"></span> Galeria cadastrados</h3>
                    <a href="{{'galeria/cadastro'}}" class="btn btn-success pull-right"><i class="fa fa-plus-circle"></i>Nova galeria</a>
                </div>
                <div class="panel-body">
                  <table class="table table-striped table-hover datatable">
                    <thead>
                      <tr>
                        <th>Titulo</th>
                        <th>Fotografo</th>
                        <th>Ativar</th>
                        <th>Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($galeria as $g)
                          <tr>
                            <td>{{$g->titulo}}</td>
                            <td>{{$g->fotografo}}</td>
                            <td>
                              <div class="form-group">
                                <label class="switch">
                                    <input type="checkbox" name="ativo" data-plugin="switchery" onchange="ativando(this, 'galeria', {{$g->galeria_id}});" {{($g->ativo == 1 ? 'checked' : '')}}/>
                                    <span></span>
                                </label>
                              </div>
                            </th>
                            <td>
                              <a href="galeria/foto/{{$g->galeria_id}}" class="button"><span class="fa fa-picture-o"></span></a>
                              &nbsp;
                              <a href="galeria/editar/{{$g->galeria_id}}" class="button"><span class="fa fa-pencil"></span></a>
                              &nbsp;
                              <a href="galeria/excluir/{{$g->galeria_id}}" class="button" onclick="confirm('Deseja realemente deletar essa Galeria?')"><span class="fa fa-trash-o"></span></a>
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
