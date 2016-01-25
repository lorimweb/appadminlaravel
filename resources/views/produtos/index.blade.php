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
                    <h3 class="panel-title"><span class="fa fa-shopping-cart"></span> Produtos cadastrados</h3>
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
                      @foreach($produtos as $p)
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
