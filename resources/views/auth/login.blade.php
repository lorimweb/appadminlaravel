<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>
        <!-- META SECTION -->
        <title>Login  </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->

        <!-- CSS INCLUDE -->
        <link rel="stylesheet" type="text/css" id="theme" href="{{asset('assets/css/theme-default.css')}}"/>
        <!-- EOF CSS INCLUDE -->
    </head>
    <body>

        <div class="login-container">

            <div class="login-box animated fadeInDown">
                <div class="login-logo"></div>
                <div class="login-body">
                    <div class="login-title"><strong>Entre com</strong> seu email e senha</div>
                    @if (count($errors) > 0)
                        @foreach ($errors->all() as $error)
                            <strong></strong>
                            <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                            <strong>Ops!</strong> {{ $error }}
                            </div>
                        @endforeach
                        <br><br>
                    @endif
                    <form action="/auth/login" class="form-horizontal" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="email" placeholder="E-mail"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" class="form-control" name="password" placeholder="Senha"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <a href="#" class="btn btn-link btn-block">Esqueceu sua senha?</a>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-info btn-block">Logar</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; {{@date('Y')}} LW Admin
                    </div>
                    <div class="pull-right">
                        <a href="#">Sobre</a> |
                        <a href="#">Contato</a>
                    </div>
                </div>
            </div>

        </div>
        <!-- START SCRIPTS -->
            <!-- START PLUGINS -->
            <script type="text/javascript" src="{{asset('assets/js/plugins/jquery/jquery.min.js')}}"></script>
            <script type="text/javascript" src="{{asset('assets/js/plugins/jquery/jquery-ui.min.js')}}"></script>
            <script type="text/javascript" src="{{asset('assets/js/plugins/bootstrap/bootstrap.min.js')}}"></script>
            <!-- END PLUGINS -->

            <!-- THIS PAGE PLUGINS -->
            <script type='text/javascript' src="{{asset('assets/js/plugins/icheck/icheck.min.js')}}"></script>
            <script type="text/javascript" src="{{asset('assets/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js')}}"></script>
            <script type="text/javascript" src="{{asset('assets/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
            <!-- END PAGE PLUGINS -->

            <!-- START TEMPLATE -->
            <script type="text/javascript" src="{{asset('assets/js/plugins.js')}}"></script>
            <script type="text/javascript" src="{{asset('assets/js/actions.js')}}"></script>
            <!-- END TEMPLATE -->
        <!-- END SCRIPTS -->
    </body>
</html>
