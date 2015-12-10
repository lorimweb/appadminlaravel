<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <!-- META SECTION -->
        <title>{{$titulo or ''}} LW Admin</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon" />
        <!-- END META SECTION -->

        <!-- CSS INCLUDE -->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/base.css')}}"/>
        <link rel="stylesheet" type="text/css" id="theme" href="{{asset('assets/css/theme-default.css')}}"/>
        <!-- EOF CSS INCLUDE -->
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">

            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="{{url('dashboard')}}">LW Admin</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                          @if(Auth::user()->foto == null)
                            <img src="{{asset('assets/img/no-image.jpg')}}" alt="{{Auth::user()->name}}"/>
                          @else
                            <img src="{{asset('assets/uploads/'.Auth::user()->foto)}}" alt="{{Auth::user()->name}}"/>
                          @endif
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                              @if(Auth::user()->foto == null)
                                <img src="{{asset('assets/img/no-image.jpg')}}" alt="{{Auth::user()->name}}"/>
                              @else
                                <img src="{{asset('assets/uploads/'.Auth::user()->foto)}}" alt="{{Auth::user()->name}}"/>
                              @endif
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name">{{Auth::user()->name}}</div>
                                <div class="profile-data-title">{{Auth::user()->nivel == 1 ? 'Administrador' : 'Usuário'}}</div>
                            </div>
                            <div class="profile-controls">
                                <a href="{{url('usuarios/perfil')}}" class="profile-control-left"><span class="fa fa-info"></span></a>
                                <a href="pages-messages.html" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="{{url('dashboard')}}"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>
                    </li>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-users"></span> <span class="xn-text">Clientes</span></a>
                        <ul>
                            <li><a href="{{url('clientes/cadastro')}}"><span class="fa fa-plus-circle"></span> Novo</a></li>
                            <li><a href="{{url('clientes')}}"><span class="fa fa-list-ul"></span> Lista</a></li>
                        </ul>
                    </li>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-list-ul"></span> <span class="xn-text">Categorias</span></a>
                        <ul>
                            <li><a href="{{url('categorias/cadastro')}}"><span class="fa fa-plus-circle"></span> Novo</a></li>
                            <li><a href="{{url('categorias')}}"><span class="fa fa-list-ul"></span> Lista</a></li>
                        </ul>
                    </li>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-shopping-cart"></span> <span class="xn-text">Produtos</span></a>
                        <ul>
                            <li><a href="{{url('produtos/cadastro')}}"><span class="fa fa-plus-circle"></span> Novo</a></li>
                            <li><a href="{{url('produtos')}}"><span class="fa fa-list-ul"></span> Lista</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><span class="fa fa-money"></span> <span class="xn-text">Vendas</span></a></li>
                    <li><a href="#"><span class="fa fa-folder-open"></span> <span class="xn-text">Lançamentos</span></a></li>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-picture-o"></span> <span class="xn-text">Portfólio</span></a>
                        <ul>
                            <li><a href="{{url('portfolio/cadastro')}}"><span class="fa fa-plus-circle"></span> Novo</a></li>
                            <li><a href="{{url('portfolio')}}"><span class="fa fa-list-ul"></span> Lista</a></li>
                        </ul>
                    </li>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-user"></span> <span class="xn-text">Usuários</span></a>
                        <ul>
                            <li><a href="{{url('usuarios/cadastro')}}"><span class="fa fa-plus-circle"></span> Novo</a></li>
                            <li><a href="{{url('usuarios')}}"><span class="fa fa-list-ul"></span> Lista</a></li>
                        </ul>
                    </li>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-gears"></span> <span class="xn-text">Configurações</span></a>
                        <ul>
                            <li><a href=""><span class="fa fa-gear"></span> Basica</a></li>
                            <li><a href=""><span class="fa fa-gears"></span> Avançada</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->

            <!-- PAGE CONTENT -->
            <div class="page-content">
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <li class="xn-icon-button pull-right">
                        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>
                    </li>
                    <!-- TASKS -->
                    <li class="xn-icon-button pull-right">
                        <a href="#"><span class="fa fa-bell"></span></a>
                        <div class="informer informer-danger">3</div>
                        <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="fa fa-bell"></span> Notificações</h3>
                                <div class="pull-right">
                                    <span class="label label-warning">3 Nova</span>
                                </div>
                            </div>
                            <div class="panel-body list-group scroll" style="height: 200px;">
                                <a class="list-group-item" href="#">
                                    <strong class="pull-center">Sem notificação</strong>
                                </a>
                            </div>
                            <div class="panel-footer text-center">
                                <a href="pages-tasks.html">Todas as notificações</a>
                            </div>
                        </div>
                    </li>
                    <li class="xn-icon-button pull-right">
                        <a href="/" target="_blank"><span class="fa fa-tachometer"></span></a>
                    </li>
                    <!-- END TASKS -->
                    <!-- END TOGGLE NAVIGATION -->
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->
                @yield('content')
            </div>
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Sair do <strong>Sistema</strong></div>
                    <div class="mb-content">
                        <p>Deseja realmente sair do sistema?</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="/auth/logout" class="btn btn-success btn-lg">Sim</a>
                            <button class="btn btn-default btn-lg mb-control-close">Não</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="{{asset('audio/alert.mp3')}}" preload="auto"></audio>
        <audio id="audio-fail" src="{{asset('audio/fail.mp3')}}" preload="auto"></audio>
        <!-- END PRELOADS -->

    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="{{asset('assets/js/plugins/jquery/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/js/plugins/jquery/jquery-ui.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/js/plugins/bootstrap/bootstrap.min.js')}}"></script>
        <!-- END PLUGINS -->

        <!-- THIS PAGE PLUGINS -->
        <script type='text/javascript' src="{{asset('assets/js/plugins/icheck/icheck.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js')}}"></script>
        <script type="text/javascript" src="js/plugins/scrolltotop/scrolltopcontrol.js')}}"></script>

        <script type="text/javascript" src="{{asset('assets/js/plugins/morris/raphael-min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/js/plugins/morris/morris.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/js/plugins/rickshaw/d3.v3.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/js/plugins/rickshaw/rickshaw.min.js')}}"></script>
        <script type='text/javascript' src="{{asset('assets/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
        <script type='text/javascript' src="{{asset('assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
        <script type='text/javascript' src="{{asset('assets/js/plugins/bootstrap/bootstrap-datepicker.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/js/plugins/owl/owl.carousel.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/js/plugins/fileinput/fileinput.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/js/plugins/filetree/jqueryFileTree.js')}}"></script>

        <script type="text/javascript" src="{{asset('assets/js/plugins/moment.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/js/plugins/daterangepicker/daterangepicker.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/js/plugins/blueimp/jquery.blueimp-gallery.min.js')}}"></script>
        <!-- END PAGE PLUGINS -->

        <!-- START TEMPLATE -->
        @if(Auth::user()->nivel == 1)
        <script type="text/javascript" src="{{asset('assets/js/settings.js')}}"></script>
        @endif
        <script type="text/javascript" src="{{asset('assets/js/plugins.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/js/actions.js')}}"></script>
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->
    </body>
</html>
