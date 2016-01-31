@extends('layouts.dashboard')
@section('content')
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="{{url('dashboard')}}">Dashboard</a></li>
    <li><a href="{{url('galeria')}}">Galeria</a></li>
    <li class="active">Adicionar Foto</li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
    <div class="row">
        <div class="content-frame-top">                        
            <div class="page-title">                    
                <h2><span class="fa fa-image"></span> {{$galeria->titulo}}</h2>
            </div>                                                            
        </div>
        <div class="col-md-9">
            @foreach($fotos as $f)
                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                      <a href="{{url($f->file_path)}}" rel="gallery1" class="galeria"><img src="{{url($f->file_path)}}" alt="..."></a>
                      <div class="caption">
                        <h3>Foto: {{$f->id}}</h3>
                        <p><a href="{{url('galeria/deletefoto/'.$f->id)}}" class="btn btn-danger" role="button">Deletar</a> <a href="{{url($f->file_path)}}" class="btn btn-default galeria" role="button" rel="gallery1">Visualizar</a></p>
                      </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-md-3">
            <form class="dropzone dropzone-mini" action="{{ url('galeria/upload') }}" method="post" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="galeria_id" value="{{ $galeria->galeria_id }}">
            </form>
            <h1></h1>
            <div class="list-group border-bottom push-down-20">
                <a href="#" class="list-group-item active">Todas Galerias</a>
                @foreach($galeria_list as $g)
                    <a href="{{url('galeria/foto/'.$g->galeria_id)}}" class="list-group-item">{{$g->titulo}}</a>
                @endforeach
            </div> 
        </div>
    </div>
</div>
<!-- END PAGE CONTENT WRAPPER -->
@stop
