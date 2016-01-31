@extends('layouts.dashboard')
@section('content')
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="{{url('dashboard')}}">Dashboard</a></li>
    <li><a href="{{url('post')}}">Post</a></li>
    <li class="active">Adicionar Foto</li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
    <div class="row">
        <div class="content-frame-top">                        
            <div class="page-title">                    
                <h2><span class="fa fa-image"></span> {{$post->titulo}}</h2>
            </div>                                                            
        </div>
        <div class="col-md-9">
            @foreach($imagens as $img)
                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                      <a href="{{url($img->img_path)}}" rel="gallery1" class="galeria"><img src="{{url($img->img_path)}}" alt="..."></a>
                      <div class="caption">
                        <h3>Foto: {{$img->id}}</h3>
                        <p><a href="{{url('post/deleteimagem/'.$img->post_img_id)}}" class="btn btn-danger" role="button">Deletar</a> <a href="{{url($img->img_path)}}" class="btn btn-default galeria" role="button" rel="gallery1">Visualizar</a></p>
                      </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-md-3">
            <form class="dropzone dropzone-mini" action="{{ url('post/upload') }}" method="post" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="post_id" value="{{ $post->post_id }}">
            </form>
            <h1></h1>
            <div class="list-group border-bottom push-down-20">
                <a href="#" class="list-group-item active">Todos Post's</a>
                @foreach($post_list as $pl)
                    <a href="{{url('post/imagem/'.$pl->post_id)}}" class="list-group-item">{{$pl->titulo}}</a>
                @endforeach
            </div> 
        </div>
    </div>
</div>
<!-- END PAGE CONTENT WRAPPER -->
@stop
