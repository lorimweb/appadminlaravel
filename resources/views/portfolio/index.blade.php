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
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="fa fa-picture-o"></span> {{$titulo}}</h3>
                    <a href="{{'portfolio/cadastro'}}" class="btn btn-success pull-right"><i class="fa fa-plus-circle"></i>Novo portfólio</a>
                </div>
                <div class="panel-body">
                  <table class="table table-bordered table-striped table-hover datatable">
                    <thead>
                      <tr>
                        <th>Titulo</th>
                        <th>Job</th>
                        <th>Url</th>
                        <th>Imagem</th>
                        <th>Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($portfolio as $p)
                        <tr>
                          <td>{{$p->titulo}}</td>
                          <td>{{$p->job}}</td>
                          <td>{{$p->url}}</td>
                          <td><a href="{{url($p->img_path)}}" rel="gallery1" class="galeria"><img width="50" src="{{url($p->img_path)}}" alt=""></a></td>
                          <td>
                              <a href="portfolio/editar/{{$p->id}}" class="button"><span class="fa fa-pencil"></span></a>
                              &nbsp;
                              <a href="portfolio/excluir/{{$p->id}}" class="button" onclick="confirm('Deseja realemente deletar esse Portfólio?')"><span class="fa fa-trash-o"></span></a>
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
