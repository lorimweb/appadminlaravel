<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{$user[0]->name}} - Blog</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="{{asset("front-end/css/bootstrap.css")}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset("front-end/css/freelancer.css")}}" rel="stylesheet">
    <link href="{{asset("front-end/css/blog.css")}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset("front-end/font-awesome/css/font-awesome.min.css")}}" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat%3A400%2C700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato%3A400%2C700%2C400italic%2C700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">
    <!-- Header -->
    <header class="top-blog">
        <ol class="breadcrumb text-right">
          <li><a href="{{url('/')}}">Voltar ao site</a></li>
          <li class="active">Blog</li>
        </ol>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-text">
                        <span class="name">Blog</span>
                        <span class="skills">Dicas e truques de desenvolvimento</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="content">
                        @foreach($post as $p)
                            @if($p->ativo == 1)
                                <div class="row">
                                    <div class="col-sm-6 col-md-12">
                                        <a href="#">
                                            <div class="thumbnail">
                                              <img src="http://lorempixel.com/900/270/technics" width="100%" alt="...">
                                              <div class="caption">
                                                <h4>{{$p->titulo}}</h4>
                                                <p>{!!$p->conteudo!!}</p>
                                                <p><i class="glyphicon glyphicon-user"></i> {{$p->user_name}} <i class="glyphicon glyphicon-calendar"></i> {{date('d/m/Y', strtotime($p->data))}}</p>
                                              </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="thumbnail">
                        @if($user[0]->foto == null)
                          <img class="img-responsive" src="{{asset('assets/img/no-image.jpg')}}" alt="{{$user[0]->name}}"/>
                        @else
                          <img class="img-responsive" src="{{asset('assets/uploads/perfil/'.$user[0]->foto)}}" alt="{{$user[0]->name}}"/>
                        @endif
                      <div class="caption">
                        <h4>{{$user[0]->name}}</h4>
                        <p>{{$user[0]->sobre_nome}}</p>
                      </div>
                    </div>
                    <h4><i class="glyphicon glyphicon-th-list"></i> Categorias</h4>
                    <ul class="list-group">
                        @foreach($cat as $c)
                            <li class="list-group-item"><a href="#">{{$c->titulo}}</a></li>
                        @endforeach
                    </ul>
                    <h4><i class="glyphicon glyphicon-file"></i> Últimos posts</h4>
                    @foreach($post as $p)
                        <h6>
                            <a href="#">{{$p->titulo}}</a>
                            <h6>{{date('d/m/Y', strtotime($p->data))}}</h6>
                        </h6>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                         &#xA9; Copyright {{@date('Y')}} {{$user[0]->name}} - {{$user[0]->sobre_nome}}
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll visible-xs visible-sm">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <!-- jQuery -->
    <script src="{{asset("front-end/js/jquery.js")}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset("front-end/js/bootstrap.min.js")}}"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="{{asset("front-end/js/classie.js")}}"></script>
    <script src="js/cbpAnimatedHeader.js")}}"></script>

    <!-- Contact Form JavaScript -->
    <script src="{{asset("front-end/js/jqBootstrapValidation.js")}}"></script>
    <script src="js/contact_me.js")}}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{asset("front-end/js/freelancer.js")}}"></script>

</body>

</html>
