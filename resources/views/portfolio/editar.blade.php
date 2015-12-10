@extends('layouts.dashboard')
@section('content')
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="{{url('dashboard')}}">Dashboard</a></li>
    <li><a href="{{url('produtos')}}">Produtos</a></li>
    <li class="active">Editar</li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="fa fa-shopping-cart"></span> Editando de Produtos</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                      <div class="col-md-6">
                        <form class="" action="/produtos/atualizar" method="post">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="put" value="{{$prod->id}}">
                            <div class="form-group">
                              <label>Descrição</label>
                              <input type="text" class="form-control" name="descricao" value="{{$prod->descricao}}">
                              <span class="text-danger">{{($errors->first('descricao') ? $errors->first('descricao') : '')}} </span>
                            </div>
                            <div class="form-group">
                              <label>Preço</label>
                              <input type="text" class="form-control" name="preco" value="{{$prod->preco}}">
                              <span class="text-danger">{{($errors->first('preco') ? $errors->first('preco') : '')}} </span>
                            </div>
                            <div class="form-group">
                              <label>Quantidade</label>
                              <input type="number" class="form-control" name="qtdade" value="{{$prod->qtdade}}">
                              <span class="text-danger">{{($errors->first('qtdade') ? $errors->first('qtdade') : '')}} </span>
                            </div>
                            <div class="form-group">
                              <label>Observações</label>
                              <textarea name="obs" rows="8" cols="40" class="form-control">{{$prod->obs}}</textarea>
                              <span class="text-danger">{{($errors->first('obs') ? $errors->first('obs') : '')}} </span>
                            </div>
                            <div class="form-group">
                              <input type="submit" class="btn btn-info" value="Atualizar">
                              <a href="{{url('produtos')}}" class="btn btn-danger">Cancelar</a>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
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
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($produtos as $p)
                                  <tr class="{{$p->qtdade <= 2 ? 'text-danger' : ''}}">
                                    <td><a href="{{url('produtos/editar/'.$p->id)}}">{{$p->descricao}}</a></td>
                                    <td>{{$p->preco}}</td>
                                    <td>{{$p->qtdade}}</th>
                                  </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- END PAGE CONTENT WRAPPER -->
@stop
