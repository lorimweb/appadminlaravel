<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{$user[0]->name}} - {{$user[0]->sobre_nome}}</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="{{asset("front-end/css/bootstrap.css")}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset("front-end/css/freelancer.css")}}" rel="stylesheet">

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

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#page-top">{{$user[0]->name}}</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="#portfolio">Portfolio</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#about">Quem sou</a>
                    </li>
                    <li class="page-scroll">
                        <a href="{{url('blog')}}">Blog</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#contact">Contato</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if($user[0]->foto == null)
                      <img class="img-responsive img-round" src="{{asset('assets/img/no-image.jpg')}}" alt="{{$user[0]->name}}"/>
                    @else
                      <img class="img-responsive img-round" src="{{asset('assets/uploads/perfil/'.$user[0]->foto)}}" alt="{{$user[0]->name}}"/>
                    @endif
                    <div class="intro-text">
                        <span class="name">{{$user[0]->name}}</span>
                        <hr class="star-light">
                        <span class="skills">{{$user[0]->sobre_nome}}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Portfolio</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                @foreach($portfolio as $p)
                <div class="col-sm-4 portfolio-item">
                    <a href="#{{str_slug($p->titulo)}}" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="{{url($p->img_path)}}" class="img-responsive" alt="">
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

	<!-- Sobre Section -->
    <section class="success" id="about">
        <div class="container">
            <div class="text-center">
                <h2>Quem Sou</h2>
                <hr class="star-light">
            </div>
            <div class="row">
                <div class="col-md-6 text-center">
                    <h5>Sobre Min</h5>
                    <p>{{$user[0]->sobre}}</p>
                </div>
                <div class="col-md-6 text-center">
                    <h5>Minhas habilidades</h5>
                    @if(!$skill == null)
                        @foreach($skill as $s)
                                <h6>{{$s->titulo}}</h6>
                                <div class="progress">
                                  <div class="progress-bar" role="progressbar" aria-valuenow="{{$s->porcentagem}}" aria-valuemin="0" aria-valuemax="{{$s->porcentagem}}" style="width: {{$s->porcentagem}}%;">
                                    {{$s->porcentagem}}%
                                  </div>
                                </div>
                        @endforeach
                    @else
                        <span class="text-danger">Não tem habilidades cadastrada no momento</span>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="text-center">
                    <h2>Contato</h2>
                    <hr class="star-primary">
                </div>
                <div class="col-md-4">
                    <div class="col-md-12  text-left">
                        <h5>Encontre-me</h5>
                        <div class="text-left">
                            <p><i class="fa fa-envelope"></i> {{$user[0]->email}}</p>
                            <p><i class="fa fa-mobile"></i> {{$user[0]->telefone}}</p>
                            <p><i class="fa fa-skype"></i> {{@strtolower($user[0]->name)}}</p>
                            <ul class="list-inline">
                                <h5>Redes Sociais</h5>
                                <li>
                                    <a href="http://www.facebook.com/{{@strtolower($user[0]->name)}}" target="_blanck"><h3><i class="fa fa-facebook"></i></h3></a>
                                    <a href="http://www.twitter.com/{{@strtolower($user[0]->name)}}" target="_blanck"><h3><i class="fa fa-twitter"></i></h3></a>
                                    <a href="http://www.twitter.com/{{@strtolower($user[0]->name)}}" target="_blanck"><h3><i class="fa fa-google-plus"></i></h3></a>
                                    <a href="http://www.twitter.com/{{@strtolower($user[0]->name)}}" target="_blanck"><h3><i class="fa fa-linkedin"></i></h3></a>
                                    <a href="http://www.bitbucket.org/{{@strtolower($user[0]->name)}}" target="_blanck"><h3><i class="fa fa-bitbucket"></i></h3></a>
                                    <a href="http://www.github.com/{{@strtolower($user[0]->name)}}" target="_blanck"><h3><i class="fa fa-github"></i></h3></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="col-md-12 text-left">
                        <h5>Enviar Mensagem</h5>
                    </div>
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <form name="sentMessage" id="contactForm" action="contato/enviar_msg#contact" method="post">
                        @if(Session::has('message'))
                          <div class="alert alert-{{ Session::get('type') }} alert-dismissable"><b><i class="icon fa fa-{{ Session::get('icon') }}"></i> {{ Session::get('message') }}</b><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>
                        @endif
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Nome</label>
                                <input type="text" class="form-control" name="nome" placeholder="Nome" id="name" required data-validation-required-message="Please enter your name.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>E-mail</label>
                                <input type="email" class="form-control" name="email" placeholder="E-mail" id="email" required data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Assunto</label>
                                <input type="tel" class="form-control" name="assunto" placeholder="Assunto" id="phone" required data-validation-required-message="Please enter your phone number.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Mensagem</label>
                                <textarea rows="5" class="form-control" name="msg" placeholder="Mensagem" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg">Enviar Mensagem</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4"></div>
                    <div class="footer-col col-md-4">
                        <h3>Redes Sociais</h3>
                        <ul class="list-inline">
                            <li>
                                <a href="http://www.facebook.com/LorimWeb" target="_blanck" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="http://www." class="btn-social btn-outline"><i target="_blanck" class="fa fa-fw fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="http://www.twitter.com/LorimWeb" class="btn-social btn-outline"><i target="_blanck" class="fa fa-fw fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="http://www." class="btn-social btn-outline"><i target="_blanck" class="fa fa-fw fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col col-md-4"></div>
                </div>
            </div>
        </div>
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

    @foreach($portfolio as $p)
    <!-- Portfolio Modals -->
    <div class="portfolio-modal modal fade" id="{{str_slug($p->titulo)}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>{{$p->titulo}}</h2>
                            <hr class="star-primary">
                            <img src="{{url($p->img_path)}}" class="img-responsive img-centered" alt="">
                            <ul class="list-inline item-details">
                                <li>Cliente:
                                    <strong><a href="http://{{$p->url}}">{{$p->url}}</a>
                                    </strong>
                                </li>
                                <li>Job:
                                    <strong><a href="http://{{$p->url}}">{{$p->job}}</a>
                                    </strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
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
